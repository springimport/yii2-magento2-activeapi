<?php

namespace springimport\yii2\magento2\activeapi\models\common\SearchCriteria\FilterGroups;

use yii\base\Model;

class Filters extends Model
{
    public $field;
    public $value;
    public $conditionType;

    /**
     * @inheritdoc
     *
     * @link https://github.com/magento/magento2/blob/develop/lib/internal/Magento/Framework/Api/CriteriaInterface.php#L37 List of conditions
     *
     * @return array
     */
    public function rules()
    {
        return [
            [
                ['field', 'value'], 'required',
            ],
            [
                'conditionType', 'safe',
            ],
            [
                // from .. to | todo
                'conditionType', 'in', 'range' =>
                [
                    'eq', 'neq', 'like', 'in', 'nin', 'notnull', 'null', 'moreq',
                    'gt', 'lt', 'gteq', 'lteq', 'finset'
                ],
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'field' => 'Field',
            'value' => 'Value',
            'conditionType' => 'Condition Type',
        ];
    }
}
