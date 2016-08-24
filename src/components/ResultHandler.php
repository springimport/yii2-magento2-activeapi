<?php

namespace springimport\yii2\magento2\activeapi\components;

use StringTemplate;

class ResultHandler extends AbstractResultHandler
{
    const LEFT_ERROR_DELIMITER  = '%';
    const RIGHT_ERROR_DELIMITER = '';

    protected $response;
    private $content;
    private $errors;

    public function __construct($response)
    {
        $this->setResponse($response);
        $this->makeContent();
        $this->parseErrors();
    }

    protected function setResponse($response)
    {
        $this->response = $response;
    }

    protected function makeContent()
    {
        if ($this->response) {
            $content       = $this->response->getBody()->getContents();
            $objectContent = json_decode($content);
            $this->setContent($objectContent);
        }
    }

    public function getContent()
    {
        if ($this->responseCodeIsOk() && !$this->hasErrors()) {
            return $this->content;
        }

        return false;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function hasErrors()
    {
        return count($this->errors) > 0;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    protected function parseErrors()
    {
        if ($this->content && isset($this->content->message)) {
            if (isset($this->content->parameters)) {
                $engine = new StringTemplate\Engine(
                self::LEFT_ERROR_DELIMITER, self::RIGHT_ERROR_DELIMITER
                );

                $error = $engine->render(
                $this->content->message, (array) $this->content->parameters
                );
            } else {
                $error = $this->content->message;
            }

            $this->addError($error);
        }
    }

    protected function addError($error)
    {
        $this->errors[] = $error;
    }
}
