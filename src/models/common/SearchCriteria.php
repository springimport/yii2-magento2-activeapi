<?php

namespace springimport\yii2\magento2\activeapi\models\common;

use yii\base\Model;
use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;
use springimport\yii2\magento2\activeapi\models\common\SearchCriteria\FilterGroups;

/**
 * Search criteria
 */
class SearchCriteria extends Model implements ContainerInterface
{

    use ContainerTrait;
    public $filterGroups = [];
    public $sortOrders   = [];
    public $pageSize;
    public $currentPage;

    public function rules()
    {
        return [
            [
                ['filterGroups'], 'required',
            ],
            [
                ['filterGroups', 'sortOrders', 'pageSize', 'currentPage'], 'safe',
            ],
            [
                'filterGroups', 'yii2tech\embedded\Validator'
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'filterGroups' => 'Filter Groups',
            'sortOrders' => 'Sort Orders',
            'pageSize' => 'Page Size',
            'currentPage' => 'Current Page',
        ];
    }

    public function embedFilterGroups()
    {
        return $this->mapEmbeddedList(
        'filterGroups', FilterGroups::className(), ['unsetSource' => false]
        );
    }
}
