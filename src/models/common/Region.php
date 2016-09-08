<?php

namespace springimport\yii2\magento2\activeapi\models\common;

use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;
use yii\base\Model;
use springimport\yii2\magento2\activeapi\components\EmbedValidationMethods\ExtensionAttributesTrait as EmbedValidationExtensionAttributesTrait;

class Region extends Model implements ContainerInterface
{

    use ContainerTrait,
        EmbedValidationExtensionAttributesTrait;
    public $region_code;
    public $region;
    public $region_id;
    public $extension_attributes;

    public function rules()
    {
        return [
            [
                [
                    'region_code', 'region', 'region_id',
                ],
                'safe',
            ],
            [
                'extension_attributes', 'yii2tech\embedded\Validator',
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'region_code' => 'Region Code',
            'region' => 'Region',
            'region_id' => 'Region_id',
            'extension_attributes' => 'Extension Attributes',
        ];
    }
}
