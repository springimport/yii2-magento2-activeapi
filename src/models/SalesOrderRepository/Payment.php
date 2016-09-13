<?php

namespace springimport\yii2\magento2\activeapi\models\SalesOrderRepository;

use yii\base\Model;
use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;
use springimport\yii2\magento2\activeapi\components\EmbedValidationMethods\ExtensionAttributesTrait;

class Payment extends Model implements ContainerInterface
{

    use ContainerTrait,
        ExtensionAttributesTrait;
    public $po_number;
    public $method;
    public $entity_id;
    public $extension_attributes;

    public function rules()
    {
        return [
            [
                ['po_number', 'entity_id'], 'safe',
            ],
            [
                ['method'], 'required',
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
            'po_number' => 'PO number',
            'method' => 'Method',
            'entity_id' => 'entity_id',
        ];
    }
}
