<?php

namespace springimport\yii2\magento2\activeapi\models\CustomerCustomerRepository;

use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;
use yii\base\Model;
use springimport\yii2\magento2\activeapi\components\EmbedValidationMethods\ExtensionAttributesTrait as EmbedValidationExtensionAttributesTrait;
use springimport\yii2\magento2\activeapi\components\EmbedValidationMethods\CustomAttributesTrait as EmbedValidationCustomAttributesTrait;

class Customer extends Model implements ContainerInterface
{

    use ContainerTrait,
        EmbedValidationExtensionAttributesTrait,
        EmbedValidationCustomAttributesTrait;
    public $id;
    public $group_id;
    public $default_billing;
    public $default_shipping;
    public $confirmation;
    public $created_at;
    public $updated_at;
    public $created_in;
    public $dob;
    public $email;
    public $firstname;
    public $lastname;
    public $middlename;
    public $prefix;
    public $suffix;
    public $gender;
    public $store_id;
    public $taxvat;
    public $website_id;
    public $addresses;
    public $disable_auto_group_change;
    public $extension_attributes;
    public $custom_attributes;

    public function rules()
    {
        return [
            [
                [
                    'email', 'firstname', 'lastname',
                ],
                'required',
            ],
            [
                [
                    'id', 'group_id', 'default_billing', 'default_shipping', 'confirmation',
                    'created_at', 'updated_at', 'created_in', 'dob', 'middlename',
                    'prefix', 'suffix', 'gender', 'store_id', 'taxvat', 'website_id',
                    'disable_auto_group_change'
                ], 'safe',
            ],
            [
                [
                    'addresses', 'extension_attributes', 'custom_attributes',
                ], 'yii2tech\embedded\Validator',
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'default_billing' => 'Default Billing',
            'default_shipping' => 'Default Shipping',
            'confirmation' => 'Confirmation',
            'created_at' => 'Сreated At',
            'updated_at' => 'Updated At',
            'created_in' => 'Created In',
            'dob' => 'Dob',
            'email' => 'Email',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'middlename' => 'Middlename',
            'prefix' => 'Prefix',
            'suffix' => 'Suffix',
            'gender' => 'Gender',
            'store_id' => 'Store ID',
            'taxvat' => 'Taxvat',
            'website_id' => 'Website ID',
            'addresses' => 'Addresses',
            'disable_auto_group_change' => 'Disable auto group change',
            'extension_attributes' => 'Extension Attributes',
            'custom_attributes' => 'Custom Attributes',
        ];
    }

    public function embedAddresses()
    {
        return $this->mapEmbeddedList(
        'addresses', Address::className(), ['unsetSource' => false]
        );
    }
}
