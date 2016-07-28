<?php

namespace springimport\yii2\magento2\activeapi\models;

use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;
use springimport\yii2\magento2\activeapi\components\ActiveApi;

class Example extends ActiveApi implements ContainerInterface
{

    use ContainerTrait;
    const SCENARIO_EXAMPLE_URL = 'example';

    public $entity_id;

    public function rules()
    {
        return [
            [
                ['entity_id'], 'required',
            ],
            [
                'entity_id', 'yii2tech\embedded\Validator'
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'entity_id' => 'Entity ID',
        ];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_EXAMPLE_URL => ['entity_id'],
        ];
    }

    public function urls()
    {
        return [
            self::SCENARIO_EXAMPLE_URL => sprintf('example/%s', $this->entity_id),
        ];
    }

    public function embedCustomer()
    {
        return $this->mapEmbedded(
        'entity_id', Magento2ApiARTest2::className(), ['unsetSource' => false]
        );
    }
}
