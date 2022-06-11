<?php
/**
* This class is autogenerated by the Spapi class generator
* Date of generation: 2022-01-09
* Specification: https://github.com/amzn/selling-partner-api-models/blob/main/models/uploads-api-model/uploads_2020-11-01.json
* Source MD5 signature: 139a9f466e1d3ff37f3d70529f290a0b
*
*
* Selling Partner API for Uploads
* The Uploads API lets you upload files that you can programmatically access using other Selling Partner APIs, such as the A+ Content API and the Messaging API.
*/
namespace DoubleBreak\Spapi\Api;
use DoubleBreak\Spapi\Client;

class Uploads extends Client {

  protected $apiVersion = '2020-11-01';

  protected $versions = [
    '2020-11-01' => '2020-11-01',
  ];

  /**
  * Operation createUploadDestinationForResource
  *
  * @param string $resource The resource for the upload destination that you are creating. For example, if you are creating an upload destination for the createLegalDisclosure operation of the Messaging API, the {resource} would be /messaging/v1/orders/{amazonOrderId}/messages/legalDisclosure, and the entire path would be /uploads/{$this->apiVersion}/uploadDestinations/messaging/v1/orders/{amazonOrderId}/messages/legalDisclosure.
  *
  * @param array $queryParams
  *    - *marketplaceIds* array - A list of marketplace identifiers. This specifies the marketplaces where the upload will be available. Only one marketplace can be specified.
  *    - *contentMD5* string - An MD5 hash of the content to be submitted to the upload destination. This value is used to determine if the data has been corrupted or tampered with during transit.
  *    - *contentType* string - The content type of the file to be uploaded.
  *
  */
  public function createUploadDestinationForResource($resource, $queryParams = [])
  {
    return $this->send("/uploads/{$this->apiVersion}/uploadDestinations/{$resource}", [
      'method' => 'POST',
      'query' => $queryParams,
    ]);
  }

  public function createUploadDestinationForResourceAsync($resource, $queryParams = [])
  {
    return $this->sendAsync("/uploads/{$this->apiVersion}/uploadDestinations/{$resource}", [
      'method' => 'POST',
      'query' => $queryParams,
    ]);
  }
}
