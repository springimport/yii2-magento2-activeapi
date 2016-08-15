<?php

namespace springimport\yii2\magento2\activeapi\models;

use springimport\yii2\magento2\activeapi\components\ActiveApi;
use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;
use springimport\yii2\magento2\activeapi\models\common\SearchCriteria;

class CustomerCustomerRepository extends ActiveApi implements ContainerInterface
{

    use ContainerTrait;
    const SCENARIO_GET_CUSTOMERS_SEARCH     = 'getCustomersSearch';
    const SCENARIO_GET_CUSTOMERS_CUSTOMERID = 'getCustomersCustomerId';

    public $searchCriteria;

    public function rules()
    {
        return [
            [
                'searchCriteria', 'required',
            ],
            [
                'searchCriteria', 'yii2tech\embedded\Validator',
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'searchCriteria' => 'Search Criteria',
        ];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_GET_CUSTOMERS_SEARCH => ['searchCriteria'],
            self::SCENARIO_GET_CUSTOMERS_CUSTOMERID => [],
        ];
    }

    public function urls()
    {
        return [
            self::SCENARIO_GET_CUSTOMERS_SEARCH => 'customers/search',
            self::SCENARIO_GET_CUSTOMERS_CUSTOMERID => 'customers/%s',
        ];
    }

    public function embedSearchCriteria()
    {
        return $this->mapEmbedded(
        'searchCriteria', SearchCriteria::className(), ['unsetSource' => false]
        );
    }
}
