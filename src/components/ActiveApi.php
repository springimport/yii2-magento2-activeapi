<?php

namespace springimport\yii2\magento2\activeapi\components;

use springimport\magento2\apiv1\ApiFactory;

class ActiveApi extends \yii\base\Model
{

    use ArrayableTrait;
    protected static $source;
    private $resultHandler;

    public function __construct($config = array())
    {
        $resultHandler = new TextResultHandler;

        $this->setResultHandler($resultHandler);

        parent::__construct($config);
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

    private function getUrlByScenario($urlOptions = [])
    {
        $this->validateUrls();

        $urls = $this->urls();

        return vsprintf($urls[$this->scenario], $urlOptions);
    }

    public function get($urlOptions = [])
    {
        $url = $this->getUrlByScenario($urlOptions);

        $query = self::getSource()->get($url, ['query' => $this->toArray()]);

        return $this->getResultHandler()->result($query);
    }

    public function post($urlOptions = [])
    {
        $url = $this->getUrlByScenario($urlOptions);

        $query = self::getSource()->post($url, ['json' => $this->toArray()]);
        
        return $this->getResultHandler()->result($query);
    }

    public function delete($urlOptions = [])
    {
        $url = $this->getUrlByScenario($urlOptions);

        $query = self::getSource()->delete($url, ['json' => $this->toArray()]);

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
