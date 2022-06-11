<?php
/**
* This class is autogenerated by the Spapi class generator
* Date of generation: 2022-01-09
* Specification: https://github.com/amzn/selling-partner-api-models/blob/main/models/vendor-shipments-api-model/vendorShipments.json
* Source MD5 signature: 9b26cd549a0b932b08b9d5624a059ed5
*
*
* Selling Partner API for Retail Procurement Shipments
* The Selling Partner API for Retail Procurement Shipments provides programmatic access to retail shipping data for vendors.
*/
namespace DoubleBreak\Spapi\Api;
use DoubleBreak\Spapi\Client;

class VendorShipments extends Client {

  protected $apiVersion = 'v1';

  protected $versions = [
    'v1' => 'v1',
  ];

  /**
  * Operation SubmitShipmentConfirmations
  *
  */
  public function SubmitShipmentConfirmations($body = [])
  {
    return $this->send("/vendor/shipping/{$this->apiVersion}/shipmentConfirmations", [
      'method' => 'POST',
      'json' => $body
    ]);
  }

  public function SubmitShipmentConfirmationsAsync($body = [])
  {
    return $this->sendAsync("/vendor/shipping/{$this->apiVersion}/shipmentConfirmations", [
      'method' => 'POST',
      'json' => $body
    ]);
  }
}