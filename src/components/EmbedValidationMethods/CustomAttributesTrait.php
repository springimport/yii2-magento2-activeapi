<?php

namespace springimport\yii2\magento2\activeapi\components\EmbedValidationMethods;

use springimport\yii2\magento2\activeapi\models\common\CustomAttributes;

trait CustomAttributesTrait
{

    public function embedCustom_attributes()
    {
        return $this->mapEmbeddedList(
        'custom_attributes', CustomAttributes::className(),
        ['unsetSource' => false]
        );
    }
}
