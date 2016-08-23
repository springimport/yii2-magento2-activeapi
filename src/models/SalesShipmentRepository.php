<?php

namespace springimport\yii2\magento2\activeapi\models;

use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;
use springimport\yii2\magento2\activeapi\components\ActiveApi;
use springimport\yii2\magento2\activeapi\models\common\SearchCriteria;
use springimport\yii2\magento2\activeapi\models\SalesShipmentRepository\Entity;

class SalesShipmentRepository extends ActiveApi implements ContainerInterface
{

    use ContainerTrait;
    const SCENARIO_POST_SHIPMENT = 'postShipment';
    const SCENARIO_GET_SHIPMENTS  = 'getShipments';
    const SCENARIO_GET_SHIPMENT  = 'getShipment';

    public $entity;
    public $searchCriteria;

    public function rules()
    {
        return [
            [
                ['entity', 'searchCriteria'], 'required',
            ],
            [
                ['entity', 'searchCriteria'], 'yii2tech\embedded\Validator'
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
            self::SCENARIO_POST_SHIPMENT => ['entity'],
            self::SCENARIO_GET_SHIPMENTS => ['searchCriteria'],
            self::SCENARIO_GET_SHIPMENT => [],
        ];
    }

    public function urls()
    {
        return [
            self::SCENARIO_POST_SHIPMENT => 'shipment',
            self::SCENARIO_GET_SHIPMENTS => 'shipments',
            self::SCENARIO_GET_SHIPMENT => 'shipment/%s',
        ];
    }

    public function embedEntity()
    {
        return $this->mapEmbedded(
        'entity', Entity::className(), ['unsetSource' => false]
        );
    }

    public function embedSearchCriteria()
    {
        return $this->mapEmbedded(
        'searchCriteria', SearchCriteria::className(), ['unsetSource' => false]
        );
    }
}
