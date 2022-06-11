<?php
/**
* This class is autogenerated by the Spapi class generator
* Date of generation: 2022-01-09
* Specification: https://github.com/amzn/selling-partner-api-models/blob/main/models/listings-restrictions-api-model/listingsRestrictions_2021-08-01.json
* Source MD5 signature: 1805c0bd57e8a8b9794a507f09e6cd00
*
*
* Selling Partner API for Listings Restrictions
* The Selling Partner API for Listings Restrictions provides programmatic access to restrictions on Amazon catalog listings.

For more information, see the [Listings Restrictions API Use Case Guide](https://github.com/amzn/selling-partner-api-docs/blob/main/guides/en-US/use-case-guides/listings-restrictions-api-use-case-guide/listings-restrictions-api-use-case-guide_2021-08-01.md).
*/
namespace DoubleBreak\Spapi\Api;
use DoubleBreak\Spapi\Client;

class ListingsRestrictions extends Client {

  protected $apiVersion = '2021-08-01';

  protected $versions = [
    '2021-08-01' => '2021-08-01',
  ];

  /**
  * Operation getListingsRestrictions
  *
  * @param array $queryParams
  *    - *asin* string - The Amazon Standard Identification Number (ASIN) of the item.
  *    - *conditionType* string - The condition used to filter restrictions.
  *    - *sellerId* string - A selling partner identifier, such as a merchant account.
  *    - *marketplaceIds* array - A comma-delimited list of Amazon marketplace identifiers for the request.
  *    - *reasonLocale* string - A locale for reason text localization. When not provided, the default language code of the first marketplace is used. Examples: "en_US", "fr_CA", "fr_FR". Localized messages default to "en_US" when a localization is not available in the specified locale.
  *
  */
  public function getListingsRestrictions($queryParams = [])
  {
    return $this->send("/listings/{$this->apiVersion}/restrictions", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }

  public function getListingsRestrictionsAsync($queryParams = [])
  {
    return $this->sendAsync("/listings/{$this->apiVersion}/restrictions", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }
}
