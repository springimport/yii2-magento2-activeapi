<?php

namespace springimport\yii2\magento2\activeapi\components\EmbedValidationMethods;

use springimport\yii2\magento2\activeapi\models\common\ExtensionAttributes;

trait ExtensionAttributesTrait
{

    public function embedExtension_attributes()
    {
        return $this->mapEmbedded(
        'extension_attributes', ExtensionAttributes::className(),
        ['unsetSource' => false]
        );
    }
}
