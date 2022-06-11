<?php
/**
* This class is autogenerated by the Spapi class generator
* Date of generation: 2022-01-09
* Specification: https://github.com/amzn/selling-partner-api-models/blob/main/models/listings-items-api-model/listingsItems_2021-08-01.json
* Source MD5 signature: b994b6eb780be178c9d6034aaf31c16c
*
*
* Selling Partner API for Listings Items
* The Selling Partner API for Listings Items (Listings Items API) provides programmatic access to selling partner listings on Amazon. Use this API in collaboration with the Selling Partner API for Product Type Definitions, which you use to retrieve the information about Amazon product types needed to use the Listings Items API.

For more information, see the [Listings Items API Use Case Guide](https://github.com/amzn/selling-partner-api-docs/blob/main/guides/en-US/use-case-guides/listings-items-api-use-case-guide/listings-items-api-use-case-guide_2021-08-01.md).
*/
namespace DoubleBreak\Spapi\Api;
use DoubleBreak\Spapi\Client;

class ListingsItems extends Client {

  protected $apiVersion = '2021-08-01';

  protected $versions = [
    '2021-08-01' => '2021-08-01',
    '2020-09-01' => '2020-09-01',
  ];

  /**
  * Operation deleteListingsItem
  *
  * @param string $sellerId A selling partner identifier, such as a merchant account or vendor code.
  * @param string $sku A selling partner provided identifier for an Amazon listing.
  *
  * @param array $queryParams
  *    - *marketplaceIds* array - A comma-delimited list of Amazon marketplace identifiers for the request.
  *    - *issueLocale* string - A locale for localization of issues. When not provided, the default language code of the first marketplace is used. Examples: "en_US", "fr_CA", "fr_FR". Localized messages default to "en_US" when a localization is not available in the specified locale.
  *
  */
  public function deleteListingsItem($sellerId, $sku, $queryParams = [])
  {
    return $this->send("/listings/{$this->apiVersion}/items/{$sellerId}/{$sku}", [
      'method' => 'DELETE',
      'query' => $queryParams,
    ]);
  }

  public function deleteListingsItemAsync($sellerId, $sku, $queryParams = [])
  {
    return $this->sendAsync("/listings/{$this->apiVersion}/items/{$sellerId}/{$sku}", [
      'method' => 'DELETE',
      'query' => $queryParams,
    ]);
  }

  /**
  * Operation getListingsItem
  *
  * @param string $sellerId A selling partner identifier, such as a merchant account or vendor code.
  * @param string $sku A selling partner provided identifier for an Amazon listing.
  *
  * @param array $queryParams
  *    - *marketplaceIds* array - A comma-delimited list of Amazon marketplace identifiers for the request.
  *    - *issueLocale* string - A locale for localization of issues. When not provided, the default language code of the first marketplace is used. Examples: "en_US", "fr_CA", "fr_FR". Localized messages default to "en_US" when a localization is not available in the specified locale.
  *    - *includedData* array - A comma-delimited list of data sets to include in the response. Default: summaries.
  *
  */
  public function getListingsItem($sellerId, $sku, $queryParams = [])
  {
    return $this->send("/listings/{$this->apiVersion}/items/{$sellerId}/{$sku}", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }

  public function getListingsItemAsync($sellerId, $sku, $queryParams = [])
  {
    return $this->sendAsync("/listings/{$this->apiVersion}/items/{$sellerId}/{$sku}", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }

  /**
  * Operation patchListingsItem
  *
  * @param string $sellerId A selling partner identifier, such as a merchant account or vendor code.
  * @param string $sku A selling partner provided identifier for an Amazon listing.
  *
  * @param array $queryParams
  *    - *marketplaceIds* array - A comma-delimited list of Amazon marketplace identifiers for the request.
  *    - *issueLocale* string - A locale for localization of issues. When not provided, the default language code of the first marketplace is used. Examples: "en_US", "fr_CA", "fr_FR". Localized messages default to "en_US" when a localization is not available in the specified locale.
  *
  */
  public function patchListingsItem($sellerId, $sku, $queryParams = [], $body = [])
  {
    return $this->send("/listings/{$this->apiVersion}/items/{$sellerId}/{$sku}", [
      'method' => 'PATCH',
      'query' => $queryParams,
      'json' => $body
    ]);
  }

  public function patchListingsItemAsync($sellerId, $sku, $queryParams = [], $body = [])
  {
    return $this->sendAsync("/listings/{$this->apiVersion}/items/{$sellerId}/{$sku}", [
      'method' => 'PATCH',
      'query' => $queryParams,
      'json' => $body
    ]);
  }

  /**
  * Operation putListingsItem
  *
  * @param string $sellerId A selling partner identifier, such as a merchant account or vendor code.
  * @param string $sku A selling partner provided identifier for an Amazon listing.
  *
  * @param array $queryParams
  *    - *marketplaceIds* array - A comma-delimited list of Amazon marketplace identifiers for the request.
  *    - *issueLocale* string - A locale for localization of issues. When not provided, the default language code of the first marketplace is used. Examples: "en_US", "fr_CA", "fr_FR". Localized messages default to "en_US" when a localization is not available in the specified locale.
  *
  */
  public function putListingsItem($sellerId, $sku, $queryParams = [], $body = [])
  {
    return $this->send("/listings/{$this->apiVersion}/items/{$sellerId}/{$sku}", [
      'method' => 'PUT',
      'query' => $queryParams,
      'json' => $body
    ]);
  }

  public function putListingsItemAsync($sellerId, $sku, $queryParams = [], $body = [])
  {
    return $this->sendAsync("/listings/{$this->apiVersion}/items/{$sellerId}/{$sku}", [
      'method' => 'PUT',
      'query' => $queryParams,
      'json' => $body
    ]);
  }
}
