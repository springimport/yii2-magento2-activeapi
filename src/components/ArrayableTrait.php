<?php

namespace springimport\yii2\magento2\activeapi\components;

trait ArrayableTrait
{

    /**
     * @inheritdoc
     */
    public function toArray(
    array $fields = [], array $expand = [], $recursive = true
    )
    {
        $scenarios = $this->scenarios();

        if (!isset($scenarios[$this->scenario])) {
            throw new Exception('Undefined scenario.');
        }

        $fields = $scenarios[$this->scenario];

        return parent::toArray($fields);
    }

    /**
     * @inheritdoc
     */
    protected function resolveFields(array $fields, array $expand)
    {
        return empty($fields) ? [] : parent::resolveFields($fields, $expand);
    }
}
