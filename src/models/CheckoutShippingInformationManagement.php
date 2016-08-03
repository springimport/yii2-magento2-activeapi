<?php

namespace springimport\yii2\magento2\activeapi\models;

use springimport\yii2\magento2\activeapi\components\ActiveApi;
use springimport\yii2\magento2\activeapi\models\CheckoutShippingInformationManagement\AddressInformation;
use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;

class CheckoutShippingInformationManagement extends ActiveApi implements ContainerInterface
{

    use ContainerTrait;
    const SCENARIO_POST_CARTS_SHIPPING_INFORMATION = 'postShippingInformation';

    public $addressInformation;

    public function rules()
    {
        return [
            [
                'addressInformation', 'required',
            ],
            [
                'addressInformation', 'yii2tech\embedded\Validator',
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'addressInformation' => 'Address Information',
        ];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_POST_CARTS_ITEMS => ['addressInformation'],
        ];
    }

    public function urls()
    {
        return [
            self::SCENARIO_POST_CARTS_ITEMS => 'carts/%s/shipping-information',
        ];
    }

    public function embedAddressInformation()
    {
        return $this->mapEmbedded(
        'addressInformation', AddressInformation::className(), ['unsetSource' => false]
        );
    }
}
