<?php
/**
* This class is autogenerated by the Spapi class generator
* Date of generation: 2022-01-09
* Specification: https://github.com/amzn/selling-partner-api-models/blob/main/models/product-fees-api-model/productFeesV0.json
* Source MD5 signature: a4e44e14c5f78a9443646662cbff5f31
*
*
* Selling Partner API for Product Fees
* The Selling Partner API for Product Fees lets you programmatically retrieve estimated fees for a product. You can then account for those fees in your pricing.
*/
namespace DoubleBreak\Spapi\Api;
use DoubleBreak\Spapi\Client;

class ProductFees extends Client {

  protected $apiVersion = 'v0';

  protected $versions = [
    'v0' => 'v0',
  ];

  /**
  * Operation getMyFeesEstimateForSKU
  *
  * @param string $sellerSKU Used to identify an item in the given marketplace. SellerSKU is qualified by the seller's SellerId, which is included with every operation that you submit.
  *
  */
  public function getMyFeesEstimateForSKU($sellerSKU, $body = [])
  {
    return $this->send("/products/fees/{$this->apiVersion}/listings/{$sellerSKU}/feesEstimate", [
      'method' => 'POST',
      'json' => $body
    ]);
  }

  public function getMyFeesEstimateForSKUAsync($sellerSKU, $body = [])
  {
    return $this->sendAsync("/products/fees/{$this->apiVersion}/listings/{$sellerSKU}/feesEstimate", [
      'method' => 'POST',
      'json' => $body
    ]);
  }

  /**
  * Operation getMyFeesEstimateForASIN
  *
  * @param string $asin The Amazon Standard Identification Number (ASIN) of the item.
  *
  */
  public function getMyFeesEstimateForASIN($asin, $body = [])
  {
    return $this->send("/products/fees/{$this->apiVersion}/items/{$asin}/feesEstimate", [
      'method' => 'POST',
      'json' => $body
    ]);
  }

  public function getMyFeesEstimateForASINAsync($asin, $body = [])
  {
    return $this->sendAsync("/products/fees/{$this->apiVersion}/items/{$asin}/feesEstimate", [
      'method' => 'POST',
      'json' => $body
    ]);
  }
}
