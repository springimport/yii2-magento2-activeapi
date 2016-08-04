<?php

namespace springimport\yii2\magento2\activeapi\models;

use springimport\yii2\magento2\activeapi;
use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;

class CheckoutPaymentInformationManagement extends activeapi\components\ActiveApi implements ContainerInterface
{

    use ContainerTrait;
    const SCENARIO_PUT_CARTS_MINE_PAYMENT_INFORMATION = 'putCartsMinePaymentInformation';

    public $paymentMethod;
    public $billingAddress;

    public function rules()
    {
        return [
            [
                'paymentMethod', 'required',
            ],
            [
                'billingAddress', 'safe',
            ],
            [
                ['paymentMethod', 'billingAddress'], 'yii2tech\embedded\Validator',
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'paymentMethod' => 'Payment Method',
            'billingAddress' => 'Billing Address',
        ];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_PUT_CARTS_MINE_PAYMENT_INFORMATION =>
            [
                'paymentMethod',
                'billingAddress'
            ],
        ];
    }

    public function urls()
    {
        return [
            self::SCENARIO_PUT_CARTS_MINE_PAYMENT_INFORMATION => 'carts/%s/order',
        ];
    }

    public function embedPaymentMethod()
    {
        return $this->mapEmbedded(
        'paymentMethod',
        activeapi\models\CheckoutPaymentInformationManagement\PaymentMethod::className(),
        ['unsetSource' => false]
        );
    }

    public function embedBillingAddress()
    {
        return $this->mapEmbedded(
        'billingAddress', activeapi\models\common\Address::className(),
        ['unsetSource' => false]
        );
    }
}
