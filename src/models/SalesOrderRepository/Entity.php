<?php

namespace springimport\yii2\magento2\activeapi\models\SalesOrderRepository;

use yii\base\Model;
use springimport\yii2\magento2\activeapi;
use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;

class Entity extends Model implements ContainerInterface
{

    use ContainerTrait;
    public $entity_id;
    public $extension_attributes;

    public function rules()
    {
        return [
            [
                'extension_attributes', 'safe',
            ],
            [
                'extension_attributes', 'yii2tech\embedded\Validator',
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
