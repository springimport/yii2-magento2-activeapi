<?php

namespace springimport\yii2\magento2\activeapi\models\CheckoutShippingInformationManagement;

use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;
use yii\base\Model;
use springimport\yii2\magento2\activeapi\models\common\Address;
use springimport\yii2\magento2\activeapi\models\common\CustomAttributes;

class AddressInformation extends Model implements ContainerInterface
{

    use ContainerTrait;
    public $shipping_address;
    public $billing_address;
    public $shipping_method_code;
    public $shipping_carrier_code;
    public $extension_attributes;
    public $custom_attributes;

    public function rules()
    {
        return [
            [
                [
                    'shipping_address', 'shipping_method_code', 'shipping_carrier_code'
                ],
                'required',
            ],
            [
                ['billing_address', 'extension_attributes', 'custom_attributes'], 'safe',
            ],
            [
                [
                    'shipping_address', 'billing_address', 'custom_attributes'
                ], 'yii2tech\embedded\Validator',
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'shipping_address' => 'Shipping Address',
            'billing_address' => 'Billing Address',
            'shipping_method_code' => 'Billing Address',
            'shipping_carrier_code' => 'Shipping Carrier Code',
            'extension_attributes' => 'Extension Attributes',
            'custom_attributes' => 'Custom Attributes',
        ];
    }

    public function embedShipping_address()
    {
        return $this->mapEmbedded(
        'shipping_address', Address::className(),
        ['unsetSource' => false]
        );
    }

    public function embedBilling_address()
    {
        return $this->mapEmbedded(
        'billing_address', Address::className(),
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
