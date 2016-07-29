<?php

namespace springimport\yii2\magento2\activeapi\components;

use Teapot\HttpResponse\Status\StatusCode;

class TextResultHandler implements ResultHandlerInterface
{

    public function checkResponse($query)
    {
        return $query->getStatusCode() == StatusCode::OK;
    }

    public function result($query)
    {
        //echo $query->getBody();
        return $this->checkResponse($query) ? $query->getBody() : false;
    }
}
