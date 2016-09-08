<?php

namespace springimport\yii2\magento2\activeapi\models\CatalogProductRepository;

use yii\base\Model;
use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;
use springimport\yii2\magento2\activeapi\models\common\CustomAttributes;
use springimport\yii2\magento2\activeapi\models\common\ExtensionAttributes;

class Product extends Model implements ContainerInterface
{

    use ContainerTrait;
    public $id;
    public $sku;
    public $name;
    public $attribute_set_id;
    public $price;
    public $status;
    public $visibility;
    public $type_id;
    public $created_at;
    public $updated_at;
    public $weight;
    public $extension_attributes;
    public $downloadable_product_links;
    public $downloadable_product_samples;
    public $stock_item;
    public $product_links;
    public $options;
    public $media_gallery_entries;
    public $tier_prices;
    public $custom_attributes;

    public function rules()
    {
        return [
            [
                'sku', 'required',
            ],
            [
                [
                    'id', 'name', 'attribute_set_id', 'price', 'status', 'visibility',
                    'type_id', 'created_at', 'updated_at', 'weight', 'extension_attributes',
                    'downloadable_product_links', 'downloadable_product_samples',
                    'stock_item', 'product_links', 'options', 'media_gallery_entries',
                    'tier_prices', 'custom_attributes',
                ], 'safe',
            ],
            [
                [
                    'extension_attributes', 'downloadable_product_links',
                    'downloadable_product_samples', 'stock_item', 'product_links',
                    'options', 'media_gallery_entries', 'tier_prices', 'custom_attributes',
                ], 'yii2tech\embedded\Validator',
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'attribute_set_id' => 'Attribute set id',
            'price' => 'Price',
            'status' => 'Status',
            'visibility' => 'Visibility',
            'type_id' => 'Type_id',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'weight' => 'Weight',
            'extension_attributes' => 'Extension attributes',
            'downloadable_product_links' => 'Downloadable product links',
            'downloadable_product_samples' => 'Downloadable product samples',
            'stock_item' => 'Stock item',
            'product_links' => 'Product links',
            'options' => 'Options',
            'media_gallery_entries' => 'Media gallery entries',
            'tier_prices' => 'Tier_prices',
            'custom_attributes' => 'Custom attributes',
        ];
    }

    public function embedExtension_attributes()
    {
        return $this->mapEmbedded(
        'extension_attributes', ExtensionAttributes::className(),
        ['unsetSource' => false]
        );
    }

    public function embedCustom_attributes()
    {
        return $this->mapEmbeddedList(
        'custom_attributes', CustomAttributes::className(),
        ['unsetSource' => false]
        );
    }
}
