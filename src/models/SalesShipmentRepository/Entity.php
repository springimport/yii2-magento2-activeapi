<?php

namespace springimport\yii2\magento2\activeapi\models\SalesShipmentRepository;

use yii\base\Model;
use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;
use springimport\yii2\magento2\activeapi\models\SalesShipmentRepository\Item;
use springimport\yii2\magento2\activeapi\models\common\ExtensionAttributes;

class Entity extends Model implements ContainerInterface
{

    use ContainerTrait;
    public $billing_address_id;
    public $created_at;
    public $customer_id;
    public $email_sent;
    public $entity_id;
    public $increment_id;
    public $order_id;
    public $packages;
    public $shipment_status;
    public $shipping_address_id;
    public $shipping_label;
    public $store_id;
    public $total_qty;
    public $total_weight;
    public $updated_at;
    public $items;
    public $tracks;
    public $comments;
    public $extension_attributes;

    public function rules()
    {
        return [
            [
                [
                    'billing_address_id',
                    'created_at',
                    'customer_id',
                    'email_sent',
                    'entity_id',
                    'increment_id',
                    'order_id',
                    'packages',
                    'shipment_status',
                    'shipping_address_id',
                    'shipping_label',
                    'store_id',
                    'total_qty',
                    'total_weight',
                    'updated_at',
                    'tracks',
                    'comments',
                    'extension_attributes',
                ], 'safe',
            ],
            [
                ['items'], 'required',
            ],
            [
                ['extension_attributes', 'items'], 'yii2tech\embedded\Validator',
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'billing_address_id' => 'Billing address ID',
            'created_at' => 'Created At',
            'customer_id' => 'Customer ID',
            'email_sent' => 'Email sent',
            'entity_id' => 'Entity ID',
            'increment_id' => 'Increment ID',
            'order_id' => 'Order ID',
            'packages' => 'Packages',
            'shipment_status' => 'Shipment Status',
            'shipping_address_id' => 'Shipping Address ID',
            'shipping_label' => 'Shipping Label',
            'store_id' => 'Store ID',
            'total_qty' => 'Total Qty',
            'updated_at' => 'Updated At',
            'items' => 'Items',
            'tracks' => 'Tracks',
            'comments' => 'Comments',
            'extension_attributes' => 'Extension Attributes',
        ];
    }

    public function embedExtension_attributes()
    {
        return $this->mapEmbedded(
        'extension_attributes',
        ExtensionAttributes::className(),
        ['unsetSource' => false]
        );
    }

    public function embedItems()
    {
        return $this->mapEmbeddedList(
        'items', Item::className(), ['unsetSource' => false]
        );
    }
}
