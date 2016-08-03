<?php

namespace springimport\yii2\magento2\activeapi\models\common;

use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;
use springimport\yii2\magento2\activeapi\models\common\CustomAttributes;

class Address implements ContainerInterface
{

    use ContainerTrait;
    public $id;
    public $region;
    public $region_id;
    public $region_code;
    public $country_id;
    public $street;
    public $company;
    public $telephone;
    public $fax;
    public $postcode;
    public $city;
    public $firstname;
    public $lastname;
    public $middlename;
    public $prefix;
    public $suffix;
    public $vat_id;
    public $customer_id;
    public $email;
    public $same_as_billing;
    public $customer_address_id;
    public $save_in_address_book;
    public $extension_attributes;
    public $custom_attributes;

    public function rules()
    {
        return [
            [
                [
                    'region', 'region_id', 'region_code', 'country_id', 'street',
                    'telephone', 'postcode', 'city', 'firstname', 'lastname', 'email',
                ],
                'required',
            ],
            [
                ['id', 'company', 'fax', 'middlename', 'prefix', 'suffix', 'vat_id',
                    'customer_id', 'same_as_billing', 'customer_address_id', 'save_in_address_book',
                    'extension_attributes', 'custom_attributes',],
                'safe',
            ],
            [
                ['street', 'extension_attributes', 'custom_attributes'], 'isArray',
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
            'id' => 'ID',
            'region' => 'Region',
            'region_id' => 'Region ID',
            'region_code' => 'Region Code',
            'country_id' => 'Country ID',
            'street' => 'Street',
            'company' => 'Company',
            'telephone' => 'Telephone',
            'fax' => 'Fax',
            'postcode' => 'Zip Code',
            'city' => 'City',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'middlename' => 'Middlename',
            'prefix' => 'Prefix',
            'suffix' => 'Suffix',
            'vat_id' => 'Vat ID',
            'customer_id' => 'Customer ID',
            'email' => 'Email',
            'same_as_billing' => 'Same as billing',
            'customer_address_id' => 'Customer address ID',
            'save_in_address_book' => 'Save in address book',
            'extension_attributes' => 'Extension Attributes',
            'custom_attributes' => 'Custom Attributes',
        ];
    }

    public function embedCustom_attributes()
    {
        return $this->mapEmbedded(
        'custom_attributes', CustomAttributes::className(),
        ['unsetSource' => false]
        );
    }

    private function isArray($attribute)
    {
        return is_array($this->$attribute);
    }
}
