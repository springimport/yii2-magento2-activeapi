<?php

namespace springimport\yii2\magento2\activeapi\components;

use Teapot\StatusCode;

abstract class AbstractResultHandler implements ResultHandlerInterface
{

    abstract public function __construct($response);

    abstract public function getContent();

    abstract public function hasErrors();

    abstract public function getErrors();

    public function responseCodeIsOk()
    {
        return $this->response->getStatusCode() == StatusCode::OK;
    }
}
