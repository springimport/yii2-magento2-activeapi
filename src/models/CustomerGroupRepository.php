<?php

namespace springimport\yii2\magento2\activeapi\models;

use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;
use springimport\yii2\magento2\activeapi\components\ActiveApi;
use springimport\yii2\magento2\activeapi\models\common\SearchCriteria;

/**
 * Customer groups.
 */
class CustomerGroupRepository extends ActiveApi implements ContainerInterface
{

    use ContainerTrait;
    const SCENARIO_GET_CUSTOMER_GROUPS_SEARCH = 'getCustomerGroupsSearch';

    public $searchCriteria;

    public function rules()
    {
        return [
            [
                ['searchCriteria'], 'required',
            ],
            [
                'searchCriteria', 'yii2tech\embedded\Validator'
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
            self::SCENARIO_GET_CUSTOMER_GROUPS_SEARCH => ['searchCriteria'],
        ];
    }

    public function urls()
    {
        return [
            self::SCENARIO_GET_CUSTOMER_GROUPS_SEARCH => 'customerGroups/search',
        ];
    }

    public function embedSearchCriteria()
    {
        return $this->mapEmbedded(
        'searchCriteria', SearchCriteria::className(), ['unsetSource' => false]
        );
    }
}
