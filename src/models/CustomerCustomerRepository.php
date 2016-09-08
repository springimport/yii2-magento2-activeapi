<?php

namespace springimport\yii2\magento2\activeapi\models;

use springimport\yii2\magento2\activeapi\components\ActiveApi;
use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;
use springimport\yii2\magento2\activeapi\models\common\SearchCriteria;
use springimport\yii2\magento2\activeapi\models\CustomerCustomerRepository\Customer;

class CustomerCustomerRepository extends ActiveApi implements ContainerInterface
{

    use ContainerTrait;
    const SCENARIO_GET_CUSTOMERS_SEARCH      = 'getCustomersSearch';
    const SCENARIO_GET_CUSTOMERS_CUSTOMER_ID = 'getCustomersCustomerId';
    const SCENARIO_PUT_CUSTOMERS_ID          = 'putCustomersId';

    public $searchCriteria;
    public $customer;
    public $passwordHash;

    public function rules()
    {
        return [
            [
                ['searchCriteria', 'customer'], 'required',
            ],
            [
                ['searchCriteria', 'customer'], 'yii2tech\embedded\Validator',
            ],
            [
                'passwordHash', 'safe'
            ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'searchCriteria' => 'Search Criteria',
            'customer' => 'Customer',
            'passwordHash' => 'Password Hash',
        ];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_GET_CUSTOMERS_SEARCH => ['searchCriteria'],
            self::SCENARIO_GET_CUSTOMERS_CUSTOMER_ID => [],
            self::SCENARIO_PUT_CUSTOMERS_ID => ['customer', 'passwordHash'],
        ];
    }

    public function urls()
    {
        return [
            self::SCENARIO_GET_CUSTOMERS_SEARCH => 'customers/search',
            self::SCENARIO_GET_CUSTOMERS_CUSTOMER_ID => 'customers/%s',
            self::SCENARIO_PUT_CUSTOMERS_ID => 'customers/%s',
        ];
    }

    public function embedSearchCriteria()
    {
        return $this->mapEmbedded(
        'searchCriteria', SearchCriteria::className(), ['unsetSource' => false]
        );
    }

    public function embedCustomer()
    {
        return $this->mapEmbedded(
        'customer', Customer::className(), ['unsetSource' => false]
        );
    }
}
