<?php

namespace springimport\yii2\magento2\activeapi\models\common;

use yii\base\Model;
use springimport\yii2\magento2\activeapi;

class ExtensionAttributes extends Model
{

    use activeapi\components\ModelValidatorTrait;
    public $agreement_ids;

    public function rules()
    {
        return [
            [
                'agreement_ids', 'safe',
            ],
            [
                'agreement_ids', 'isArray'
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'agreement_ids' => 'Agreement IDs',
        ];
    }
}
