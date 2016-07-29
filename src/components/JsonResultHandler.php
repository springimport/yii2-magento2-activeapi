<?php

namespace springimport\yii2\magento2\activeapi\components;

class JsonResultHandler extends TextResultHandler
{

    public function result($query)
    {
        $data = parent::result($query);
        //echo $query->getBody();
        //print_r(json_decode($query->getBody()));exit;
        
        return $data ? json_decode($data) : false;
    }
}
