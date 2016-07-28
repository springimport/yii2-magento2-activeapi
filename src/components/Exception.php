<?php

namespace springimport\yii2\magento2\activeapi\components;

/**
 * Exception for ActiveAPI.
 */
class Exception extends \yii\base\Exception
{

    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Magento 2 ActiveAPI';
    }
}
