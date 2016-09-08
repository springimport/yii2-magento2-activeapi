<?php

namespace springimport\yii2\magento2\activeapi\models\CustomerCustomerRepository;

use springimport\yii2\magento2\activeapi\models\common\Address as BaseAddress;
use springimport\yii2\magento2\activeapi\models\common\Region;

class Address extends BaseAddress
{
    public $default_shipping;
    public $default_billing;

    public function rules()
    {
        $parentRules = parent::rules();

        $rules = [
            [
                [
                    'default_shipping', 'default_billing'
                ],
                'safe',
            ],
            [
                'region', 'yii2tech\embedded\Validator',
            ],
        ];

        return array_merge($parentRules, $rules);
    }

    public function attributeLabels()
    {
        $parentAttributeLabels = parent::attributeLabels();

        $attributeLabels = [
            'default_shipping' => 'Default Shipping',
            'default_billing' => 'Default Billing',
        ];

        return array_merge($parentAttributeLabels, $attributeLabels);
    }

    public function embedRegion()
    {
        return $this->mapEmbedded(
        'region', Region::className(), ['unsetSource' => false]
        );
    }
}
