<?php

namespace springimport\yii2\magento2\activeapi\models;

use springimport\yii2\magento2\activeapi;
use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;
use springimport\yii2\magento2\activeapi\models\common\SearchCriteria;

class SalesOrderRepository extends activeapi\components\ActiveApi implements ContainerInterface
{

    use ContainerTrait;
    const SCENARIO_POST_ORDERS = 'postOrders';
    const SCENARIO_GET_ORDERS  = 'getOrders';
    const SCENARIO_GET_ORDER  = 'getOrder';

    public $entity;
    public $searchCriteria;

    public function rules()
    {
        return [
            [
                ['entity', 'searchCriteria'], 'required',
            ],
            [
                ['entity', 'searchCriteria'], 'yii2tech\embedded\Validator',
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'entity' => 'Entity',
            'searchCriteria' => 'Search Criteria',
        ];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_POST_ORDERS => ['entity'],
            self::SCENARIO_GET_ORDERS => ['searchCriteria'],
            self::SCENARIO_GET_ORDER => [],
        ];
    }

    public function urls()
    {
        return [
            self::SCENARIO_POST_ORDERS => 'orders',
            self::SCENARIO_GET_ORDERS => 'orders',
            self::SCENARIO_GET_ORDER => 'orders/%s',
        ];
    }

    public function embedEntity()
    {
        return $this->mapEmbedded(
        'entity', activeapi\models\SalesOrderRepository\Entity::className(),
        ['unsetSource' => false]
        );
    }

    public function embedSearchCriteria()
    {
        return $this->mapEmbedded(
        'searchCriteria', SearchCriteria::className(), ['unsetSource' => false]
        );
    }
}
