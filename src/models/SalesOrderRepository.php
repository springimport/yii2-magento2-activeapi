<?php

namespace springimport\yii2\magento2\activeapi\models;

use springimport\yii2\magento2\activeapi;
use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;

class SalesOrderRepository extends activeapi\components\ActiveApi implements ContainerInterface
{

    use ContainerTrait;
    const SCENARIO_POST_ORDERS = 'postOrders';

    public $entity;

    public function rules()
    {
        return [
            [
                'entity', 'required',
            ],
            [
                'entity', 'yii2tech\embedded\Validator',
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'entity' => 'Entity',
        ];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_POST_ORDERS => ['entity'],
        ];
    }

    public function urls()
    {
        return [
            self::SCENARIO_POST_ORDERS => 'orders',
        ];
    }

    public function embedEntity()
    {
        return $this->mapEmbedded(
        'entity', activeapi\models\SalesOrderRepository\Entity::className(),
        ['unsetSource' => false]
        );
    }
}
