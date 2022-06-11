<?php
/**
* This class is autogenerated by the Spapi class generator
* Date of generation: 2022-01-09
* Specification: https://github.com/amzn/selling-partner-api-models/blob/main/models/product-type-definitions-api-model/definitionsProductTypes_2020-09-01.json
* Source MD5 signature: 5f6c68af0c8ce98b374ff4dcc81ffec6
*
*
* Selling Partner API for Product Type Definitions
* The Selling Partner API for Product Type Definitions provides programmatic access to attribute and data requirements for product types in the Amazon catalog. Use this API to return the JSON Schema for a product type that you can then use with other Selling Partner APIs, such as the Selling Partner API for Listings Items, the Selling Partner API for Catalog Items, and the Selling Partner API for Feeds (for JSON-based listing feeds).

For more information, see the [Product Type Definitions API Use Case Guide](https://github.com/amzn/selling-partner-api-docs/blob/main/guides/en-US/use-case-guides/product-type-definitions-api-use-case-guide/definitions-product-types-api-use-case-guide_2020-09-01.md).
*/
namespace DoubleBreak\Spapi\Api;
use DoubleBreak\Spapi\Client;

class ProductTypeDefinitions extends Client {

  protected $apiVersion = '2020-09-01';

  protected $versions = [
    '2020-09-01' => '2020-09-01',
  ];

  /**
  * Operation searchDefinitionsProductTypes
  *
  * @param array $queryParams
  *    - *keywords* array - A comma-delimited list of keywords to search product types by.
  *    - *marketplaceIds* array - A comma-delimited list of Amazon marketplace identifiers for the request.
  *
  */
  public function searchDefinitionsProductTypes($queryParams = [])
  {
    return $this->send("/definitions/{$this->apiVersion}/productTypes", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }

  public function searchDefinitionsProductTypesAsync($queryParams = [])
  {
    return $this->sendAsync("/definitions/{$this->apiVersion}/productTypes", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }

  /**
  * Operation getDefinitionsProductType
  *
  * @param string $productType The Amazon product type name.
  *
  * @param array $queryParams
  *    - *sellerId* string - A selling partner identifier. When provided, seller-specific requirements and values are populated within the product type definition schema, such as brand names associated with the selling partner.
  *    - *marketplaceIds* array - A comma-delimited list of Amazon marketplace identifiers for the request.
  *Note: This parameter is limited to one marketplaceId at this time.
  *    - *productTypeVersion* string - The version of the Amazon product type to retrieve. Defaults to "LATEST",. Prerelease versions of product type definitions may be retrieved with "RELEASE_CANDIDATE". If no prerelease version is currently available, the "LATEST" live version will be provided.
  *    - *requirements* string - The name of the requirements set to retrieve requirements for.
  *    - *requirementsEnforced* string - Identifies if the required attributes for a requirements set are enforced by the product type definition schema. Non-enforced requirements enable structural validation of individual attributes without all the required attributes being present (such as for partial updates).
  *    - *locale* string - Locale for retrieving display labels and other presentation details. Defaults to the default language of the first marketplace in the request.
  *
  */
  public function getDefinitionsProductType($productType, $queryParams = [])
  {
    return $this->send("/definitions/{$this->apiVersion}/productTypes/{$productType}", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }

  public function getDefinitionsProductTypeAsync($productType, $queryParams = [])
  {
    return $this->sendAsync("/definitions/{$this->apiVersion}/productTypes/{$productType}", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }
}
