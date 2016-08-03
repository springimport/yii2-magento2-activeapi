<?php

namespace springimport\yii2\magento2\activeapi\components;

interface ResultHandlerInterface
{

    public function __construct($response);

    public function getContent();

    public function hasErrors();

    public function getErrors();
}
