<?php

namespace springimport\yii2\magento2\activeapi\models\SalesOrderRepository;

use yii\base\Model;
use springimport\yii2\magento2\activeapi;

class Entity extends Model
{
    public $entity_id;
    public $extension_attributes;
    // custom attributes
    public $order_date;

    public function rules()
    {
        return [
            [
                [
                ],
                'required',
            ],
            [
                ['extension_attributes', 'order_date'], 'safe',
            ],
            [
                ['extension_attributes'], 'yii2tech\embedded\Validator',
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'extension_attributes' => 'Extension Attributes',
        ];
    }

    public function embedExtension_attributes()
    {
        return $this->mapEmbedded(
        'extension_attributes',
        activeapi\models\common\ExtensionAttributes::className(),
        ['unsetSource' => false]
        );
    }
}
