<?php

namespace springimport\yii2\magento2\activeapi\models\CheckoutPaymentInformationManagement;

use yii\base\Model;
use springimport\yii2\magento2\activeapi;

class PaymentMethod extends Model
{

    use activeapi\components\ModelValidatorTrait;
    public $po_number;
    public $method;
    public $additional_data;
    public $extension_attributes;

    public function rules()
    {
        return [
            [
                ['po_number', 'additional_data', 'extension_attributes'], 'safe',
            ],
            [
                'method', 'required',
            ],
            [
                'additional_data', 'isArray'
            ],
            [
                'extension_attributes', 'yii2tech\embedded\Validator',
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'po_number' => 'PO Number',
            'method' => 'Method',
            'additional_data' => 'Additional Data',
            'extension_attributes' => 'Extension Attributes',
        ];
    }

    public function embedExtension_Attributes()
    {
        return $this->mapEmbedded(
        'extension_attributes',
        activeapi\models\common\CustomAttributes::className(),
        ['unsetSource' => false]
        );
    }
}
