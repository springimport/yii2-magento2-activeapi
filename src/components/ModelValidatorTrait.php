<?php

namespace springimport\yii2\magento2\activeapi\components;

trait ModelValidatorTrait
{

    public function isArray($attribute)
    {
        return is_array($this->$attribute);
    }
}
