<?php

namespace springimport\yii2\magento2\activeapi\components;

use Teapot\HttpResponse\Status\StatusCode;

class DefaultResultHandler implements ResultHandlerInterface
{

    public function result($query)
    {
        if ($query->getStatusCode() == StatusCode::OK) {
            return json_decode($query->getBody());
        }

        return false;
    }
}
