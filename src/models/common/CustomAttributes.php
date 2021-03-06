<?php

namespace springimport\yii2\magento2\activeapi\models\common;

use yii\base\Model;

class CustomAttributes extends Model
{
    public $attribute_code;
    public $value;

    public function rules()
    {
        return [
            [
                ['attribute_code', 'value'], 'required',
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'attribute_code' => 'Attribute Code',
            'value' => 'Value',
        ];
    }
}
