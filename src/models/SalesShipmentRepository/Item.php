<?php

namespace springimport\yii2\magento2\activeapi\models\SalesShipmentRepository;

use yii\base\Model;
use springimport\yii2\magento2\activeapi\models\common\ExtensionAttributes;
use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;

class Item extends Model implements ContainerInterface
{

    use ContainerTrait;
    public $additional_data;
    public $description;
    public $entity_id;
    public $name;
    public $order_item_id;
    public $parent_id;
    public $price;
    public $product_id;
    public $qty;
    public $row_total;
    public $sku;
    public $weight;
    public $extension_attributes;

    public function rules()
    {
        return [
            [
                [
                    'additional_data',
                    'description',
                    'entity_id',
                    'name',
                    'order_item_id',
                    'parent_id',
                    'price',
                    'product_id',
                    'qty',
                    'row_total',
                    'sku',
                    'weight',
                    'extension_attributes',
                ], 'safe',
            ],
            [
                'extension_attributes', 'yii2tech\embedded\Validator',
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'additional_data' => 'Additional data',
            'description' => 'Description',
            'entity_id' => 'Entity ID',
            'name' => 'Name',
            'order_item_id' => 'Order item ID',
            'parent_id' => 'Parent ID',
            'price' => 'Price',
            'product_id' => 'Product ID',
            'qty' => 'Qty',
            'row_total' => 'Row Total',
            'sku' => 'Sku',
            'weight' => 'Weight',
            'extension_attributes' => 'Extension Attributes',
        ];
    }

    public function embedExtension_attributes()
    {
        return $this->mapEmbedded(
        'extension_attributes', ExtensionAttributes::className(),
        ['unsetSource' => false]
        );
    }
}
