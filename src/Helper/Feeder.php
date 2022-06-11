<?php
/*
 *  @author MST1122
 *  @email: sikandartariq25@gmail.com
 */

namespace DoubleBreak\Spapi\Helper;


use DoubleBreak\Spapi\ASECryptoStream;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Feeder
{
    /**
     * @param $payload : Response from createFeedDocument Function. e.g.: response['payload']
     * @param $contentType : Content type used during createFeedDocument function call.
     * @param $feedContentFilePath : Path to file that contain data to be uploaded.
     * @return string
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function uploadFeedDocument($payload, $contentType, $feedContentFilePath)
    {
        $key = null;
        $initializationVector = null;
        $feedUploadUrl = $payload['url'];

        // check if encryption in required
        if (isset($payload['encryptionDetails'])) {
            $key = $payload['encryptionDetails']['key'];
            $initializationVector = $payload['encryptionDetails']['initializationVector'];

            // base64 decode before using in encryption
            $initializationVector = base64_decode($initializationVector, true);
            $key = base64_decode($key, true);
        }

        // get file to upload
        $fileResourceType = gettype($feedContentFilePath);

        // resource or string ? make it to a string
        if ($fileResourceType == 'resource') {
            $file_content = stream_get_contents($feedContentFilePath);
        } elseif (file_exists($feedContentFilePath)) {
            $file_content = file_get_contents($feedContentFilePath);
        } else {
            $file_content = $feedContentFilePath;
        }

        if (!is_null($key)) {
            // encrypt string and get value as base64 encoded string
            $file_content = ASECryptoStream::encrypt($file_content, $key, $initializationVector);
        }

        // my http client
        $client = new Client(['exceptions' => false]);

        $request = new Request(
            // PUT!
            'PUT',
            // predefined url
            $feedUploadUrl,
            // content type equal to content type from response createFeedDocument-operation
            array('Content-Type' => $contentType),
            // resource File
            $file_content
        );

        $response = $client->send($request);
        $HTTPStatusCode = $response->getStatusCode();

        if ($HTTPStatusCode == 200) {
            return 'Done';
        } else {
            return $response->getBody()->getContents();
        }
    }

    /**
     * @param $payload : Response from getFeedDocument Function. e.g.: response['payload']
     * @return array : Feed Processing Report.
     */
    public function downloadFeedProcessingReport($payload)
    {
        $key = null;
        $initializationVector = null;
        $feedDownloadUrl = $payload['url'];
        // check if decryption in required
        if (isset($payload['encryptionDetails'])) {
            $key = $payload['encryptionDetails']['key'];
            $initializationVector = $payload['encryptionDetails']['initializationVector'];

            // base64 decode before using in encryption
            $initializationVector = base64_decode($initializationVector, true);
            $key = base64_decode($key, true);
        }

        $response = (new \GuzzleHttp\Client())->get($feedDownloadUrl, [
            'verify' => false,
        ]);
        $file_content = $response->getBody()->getContents();
        $content_type = $response->getHeader('content-type');
        extract($this->parseContentType($content_type));
        if (!is_null($key)) {
            $feed_processing_report_content = ASECryptoStream::decrypt($file_content, $key, $initializationVector);
        } else {
            $feed_processing_report_content = $file_content;
        }

        if (isset($payload['compressionAlgorithm']) && $payload['compressionAlgorithm'] == 'GZIP') {
            $feed_processing_report_content = gzdecode($feed_processing_report_content);
        }
        return [
            'content_type' => $content_type,
            'charset' => $charset,
            'content' => $feed_processing_report_content,
        ];
    }

    public function parseContentType($type)
    {
        if (count($type) <= 0) {
            return [
                'content_type' => null,
                'charset' => null,
            ];
        }
        $type = explode(';', $type[0], 2);
        $content_type = $type[0];
        $charset = $type[1] ?? null;
        $charset = trim(str_replace('charset=', '', $charset));
        return [
            'content_type' => $content_type,
            'charset' => $charset,
        ];
    }
}
