<?php

namespace TwoCaptcha\Tests;

class NormalTest extends AbstractWrapperTestCase
{
    protected $method = 'normal';

    private $captchaImg = __DIR__ . '/../examples/images/normal.jpg';

    public function testSingleFile()
    {
        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $this->captchaImg,
            'sendParams' => ['method' => 'post'],
            'sendFiles'  => ['file' => $this->captchaImg],
        ]);
    }

    public function testSingleFileParameter()
    {
        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => ['file' => $this->captchaImg],
            'sendParams' => ['method' => 'post'],
            'sendFiles'  => ['file' => $this->captchaImg],
        ]);
    }

    public function testBase64()
    {
        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => ['base64' => '...'],
            'sendParams' => ['method' => 'base64', 'body' => '...'],
            'sendFiles'  => [],
        ]);
    }

    public function testAllParameters()
    {
        $hintImg = __DIR__ . '/../examples/images/grid_hint.jpg';

        $params = [
            'file'          => $this->captchaImg,
            'numeric'       => 4,
            'minLen'        => 4,
            'maxLen'        => 20,
            'phrase'        => 1,
            'caseSensitive' => 1,
            'calc'          => 0,
            'lang'          => 'en',
            'hintImg'       => $hintImg,
            'hintText'      => 'Type red symbols only',
        ];

        $sendParams = [
            'method'           => 'post',
            'numeric'          => 4,
            'min_len'          => 4,
            'max_len'          => 20,
            'phrase'           => 1,
            'regsense'         => 1,
            'calc'             => 0,
            'lang'             => 'en',
            'textinstructions' => 'Type red symbols only',
        ];

        $sendFiles = [
            'file'            => $this->captchaImg,
            'imginstructions' => $hintImg,
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => $sendFiles,
        ]);
    }

    public function testNormalFileException()
    {
        $this->checkIfExceptionThrownOnInvalidFile();
    }
}
