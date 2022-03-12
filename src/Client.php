<?php
namespace DoubleBreak\Spapi;

class Client {

  use HttpClientFactoryTrait;

  protected $credentials;
  protected $config;
  protected $signer;
  protected $lastHttpResponse = null;

  /**
   * @var \GuzzleHttp\Client
   */
  protected $httpClient = null;

  public function __construct(array $credentials = [], array $config = [])
  {
    $this->credentials = $credentials;
    $this->config = $config;
    $this->signer = new Signer(); //Should be injected :(
    $this->httpClient = $this->createHttpClient([
      'base_uri' => 'https://' . $this->config['host']
    ]);
  }

  public function setCredentials($credentials)
  {
    $this->credentials = $credentials;
    return $this;
  }

  private function normalizeHeaders($headers)
  {
    return $result = array_combine(
       array_map(function($header) { return strtolower($header); }, array_keys($headers)),
       $headers
    );

  }

  private function headerValue($header)
  {
      return \GuzzleHttp\Psr7\Header::parse($header)[0];
  }

  public function send($uri, $requestOptions = [])
  {
    $requestOptions['headers'] = $requestOptions['headers'] ?? [];
    $requestOptions['headers']['accept'] = 'application/json';
    $requestOptions['headers'] = $this->normalizeHeaders($requestOptions['headers']);


    //Prepare for signing
    $signOptions = [
      'service' => 'execute-api',
      'access_token' => $this->credentials['access_token'],
      'access_key' => $this->credentials['sts_credentials']['access_key'],
      'secret_key' =>  $this->credentials['sts_credentials']['secret_key'],
      'security_token' =>  $this->credentials['sts_credentials']['session_token'],
      'region' =>  $this->config['region'] ?? null,
      'host' => $this->config['host'],
      'uri' =>  $uri,
      'method' => $requestOptions['method']
    ];

    if (isset($requestOptions['query'])) {
      $query = $requestOptions['query'];
      ksort($query);
      $signOptions['query_string'] =  \GuzzleHttp\Psr7\Query::build($query);
    }

    if (isset($requestOptions['form_params'])) {
      ksort($requestOptions['form_params']);
      $signOptions['payload'] = \GuzzleHttp\Psr7\Query::build($requestOptions['form_params']);
    }

    if (isset($requestOptions['json'])) {
      ksort($requestOptions['json']);
      $signOptions['payload'] = json_encode($requestOptions['json']);
    }

    //Sign
    $requestOptions = $this->signer->sign($requestOptions, $signOptions);

    //Prep client and send the request
    $client = $this->getHttpClient();

    try {
      $this->lastHttpResponse = null;
      $method = $requestOptions['method'];
      unset($requestOptions['method']);
      $response = $client->request($method, $uri, $requestOptions);
      $this->lastHttpResponse = $response;
      return json_decode($response->getBody(), true);
    } catch (\GuzzleHttp\Exception\RequestException $e) {
      $this->lastHttpResponse = $e->getResponse();
      $ex = new \GuzzleHttp\Exception\RequestException(
        $this->lastHttpResponse->getBody()->getContents(),
        $e->getRequest(),
        $e->getResponse(),
        $e,
        $e->getHandlerContext()
      );
      throw $ex;
    }

  }

  public function getLastHttpResponse()
  {
    return $this->lastHttpResponse;
  }

}
