<?php

namespace springimport\yii2\magento2\activeapi\models;

use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;
use springimport\yii2\magento2\activeapi\components\ActiveApi;
use springimport\yii2\magento2\activeapi\models\common\SearchCriteria;
use springimport\yii2\magento2\activeapi\models\CatalogProductRepository\Product;

class CatalogProductRepository extends ActiveApi implements ContainerInterface
{

    use ContainerTrait;
    const SCENARIO_GET_PRODUCTS        = 'getProducts';
    const SCENARIO_DELETE_PRODUCTS_SKU = 'deleteProductsSku';
    const SCENARIO_PUT_PRODUCTS_SKU    = 'putProductsSku';

    public $searchCriteria;
    public $product;
    public $saveOptions;

    public function rules()
    {
        return [
            [
                ['searchCriteria', 'product'], 'required',
            ],
            [
                'saveOptions', 'safe', 'rule' => ['in', 'range' => ['true', 'false']],
            ],
            [
                ['searchCriteria', 'product'], 'yii2tech\embedded\Validator'
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'searchCriteria' => 'Search Criteria',
            'product' => 'Product',
            'saveOptions' => 'Save Options',
        ];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_GET_PRODUCTS => ['searchCriteria'],
            self::SCENARIO_DELETE_PRODUCTS_SKU => [],
            self::SCENARIO_PUT_PRODUCTS_SKU => ['product', 'saveOptions'],
        ];
    }

    public function urls()
    {
        return [
            self::SCENARIO_GET_PRODUCTS => 'products',
            self::SCENARIO_DELETE_PRODUCTS_SKU => 'products/%s',
            self::SCENARIO_PUT_PRODUCTS_SKU => 'products/%s',
        ];
    }

    public function embedSearchCriteria()
    {
        return $this->mapEmbedded(
        'searchCriteria', SearchCriteria::className(), ['unsetSource' => false]
        );
    }

    public function embedProduct()
    {
        return $this->mapEmbedded(
        'product', Product::className(), ['unsetSource' => false]
        );
    }
}
