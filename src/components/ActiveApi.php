<?php

namespace springimport\yii2\magento2\activeapi\components;

use springimport\magento2\apiv1\ApiFactory;

class ActiveApi extends \yii\base\Model
{
    protected static $source;
    private $resultHandler;

    public function __construct($config = array())
    {
        $resultHandler = new DefaultResultHandler;

        $this->setResultHandler($resultHandler);

        parent::__construct($config);
    }

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

    public function setResultHandler(ResultHandlerInterface $resultHandler)
    {
        $this->resultHandler = $resultHandler;
    }

    public function getResultHandler()
    {
        return $this->resultHandler;
    }

    private function validateUrls()
    {
        $urls = $this->urls();

        if (!isset($urls[$this->scenario])) {
            throw new Exception('URL not found for selected scenario.');
        }

        return true;
    }

    public function urls()
    {
        return [];
    }

    public function post()
    {
        $this->validateUrls();

        $urls = $this->urls();

        $query = self::getSource()->post($urls[$this->scenario],
        ['json' => $this->toArray()]);

        return $this->getResultHandler()->result($query);
    }

    public static function setSource($source)
    {
        self::$source = $source;
    }

    public static function getSource()
    {
        return self::$source;
    }
}
