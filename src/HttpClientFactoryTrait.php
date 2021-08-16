<?php
namespace DoubleBreak\Spapi;

trait HttpClientFactoryTrait {
  private function createHttpClient($config = [])
  {
    $httpConfig = $this->config['http'] ?? [];
    $httpConfig = array_merge($httpConfig, $config);
    if (!$this->httpClient) {
      $this->httpClient = new \GuzzleHttp\Client($httpConfig);
    }
    return $this->httpClient;
  }

  public function getHttpClient()
  {
    return $this->createHttpClient();
  }

}
