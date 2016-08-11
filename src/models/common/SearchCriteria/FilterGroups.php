<?php

namespace springimport\yii2\magento2\activeapi\models\common\SearchCriteria;

use yii\base\Model;
use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;
use springimport\yii2\magento2\activeapi\models\common\SearchCriteria\FilterGroups\Filters;

class FilterGroups extends Model implements ContainerInterface
{

    use ContainerTrait;
    public $filters = [];

    public function rules()
    {
        return [
            [
                'filters', 'required',
            ],
            [
                'filters', 'yii2tech\embedded\Validator'
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'filters' => 'Filters',
        ];
    }

    public function embedFilters()
    {
        return $this->mapEmbeddedList(
        'filters', Filters::className(), ['unsetSource' => false]
        );
    }
}
