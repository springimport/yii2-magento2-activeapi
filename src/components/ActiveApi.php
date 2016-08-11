<?php

namespace springimport\yii2\magento2\activeapi\components;

use yii\base\InvalidParamException;

class ActiveApi extends \yii\base\Model
{

    use ArrayableTrait;
    const ERROR_ATTRIBUTE      = 'response';
    const EVENT_INITIALIZATION = 'initialization';

    protected static $source;
    private $resultHandlerClassName = 'springimport\yii2\magento2\activeapi\components\ResultHandler';

    public function __construct($config = array())
    {
        $this->trigger(self::EVENT_INITIALIZATION);

        parent::__construct($config);
    }

    public function setResultHandler($resultHandler)
    {
        $reflection = new \ReflectionClass($this->resultHandlerClassName);

        if (!$reflection->implementsInterface('ResultHandlerInterface')) {
            throw new InvalidParamException('Result handler not implement ResultHandlerInterface');
        }

        $this->resultHandler = $resultHandler;
    }

    public function getResultHandler()
    {
        return $this->resultHandler;
    }

    private function getScenarioUrl(array $options = [])
    {
        $urls = $this->urls();

        if (!isset($urls[$this->scenario])) {
            throw new Exception('URL not found for selected scenario.');
        }

        return self::formatUrlWithArguments($urls[$this->scenario], $options);
    }

    public function urls()
    {
        return [];
    }

    public function get(array $options = [])
    {
        $url = $this->getScenarioUrl($options);

        $response = self::getSource()->get($url, ['query' => $this->toArray()]);

        return $this->result($response);
    }

    public function post(array $options = [])
    {
        $url = $this->getScenarioUrl($options);

        $response = self::getSource()->post($url, ['json' => $this->toArray()]);

        return $this->result($response);
    }

    public function delete(array $options = [])
    {
        $url = $this->getScenarioUrl($options);

        $response = self::getSource()->delete($url, ['json' => $this->toArray()]);

        return $this->result($response);
    }

    public function put(array $options = [])
    {
        $url = $this->getScenarioUrl($options);

        $response = self::getSource()->put($url, ['json' => $this->toArray()]);

        return $this->result($response);
    }

    protected function result($response)
    {
        $resultHandler = new $this->resultHandlerClassName($response);

        if ($resultHandler->hasErrors()) {
            foreach ($resultHandler->getErrors() as $error) {
                $this->addError(self::ERROR_ATTRIBUTE, $error);
            }
        }

        return $resultHandler->getContent();
    }

    public static function setSource($source)
    {
        self::$source = $source;
    }

    public static function getSource()
    {
        return self::$source;
    }

    public static function formatUrlWithArguments($url, array $args)
    {
        $pattern = "~%(?:(\d+)[$])?[-+]?(?:[ 0]|['].)?(?:[-]?\d+)?(?:[.]\d+)?[%bcdeEufFgGosxX]~";

        $countArgs      = count($args);
        preg_match_all($pattern, $url, $expected);
        $countVariables = isset($expected[0]) ? count($expected[0]) : 0;

        if ($countArgs !== $countVariables) {
            throw new InvalidParamException('The number of arguments in the URL does not match the number of arguments in a template.');
        } else {
            return $countArgs > 1 ? vsprintf($url, $args) : sprintf($url,
            reset($args));
        }
    }
}
