<?php

namespace TwoCaptcha\Tests;

class CoordinatesTest extends AbstractWrapperTestCase
{
    protected $method = 'coordinates';

    private $captchaImg = __DIR__ . '/../examples/images/grid.jpg';

    public function testSingleFile()
    {
        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $this->captchaImg,
            'sendParams' => ['method' => 'post', 'coordinatescaptcha' => 1],
            'sendFiles'  => ['file' => $this->captchaImg],
        ]);
    }

    public function testSingleFileParameter()
    {
        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => ['file' => $this->captchaImg],
            'sendParams' => ['method' => 'post', 'coordinatescaptcha' => 1],
            'sendFiles'  => ['file' => $this->captchaImg],
        ]);
    }

    public function testBase64()
    {
        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => ['base64' => '...'],
            'sendParams' => ['method' => 'base64', 'coordinatescaptcha' => 1, 'body' => '...'],
            'sendFiles'  => [],
        ]);
    }

    public function testAllParameters()
    {
        $hintImg = __DIR__ . '/../examples/images/grid_hint.jpg';

        $params = [
            'file'       => $this->captchaImg,
            'lang'       =>	'en',
            'hintImg'    => $hintImg,
            'hintText'   =>	'Select all images with an Orange',
        ];

        $sendParams = [
            'method'             => 'post',
            'coordinatescaptcha' => 1,
            'lang'               => 'en',
            'textinstructions'   => 'Select all images with an Orange',
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
