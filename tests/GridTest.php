<?php

namespace TwoCaptcha\Tests;

class GridTest extends AbstractWrapperTestCase
{
    protected $method = 'grid';

    private $captchaImg = __DIR__ . '/../examples/images/grid.jpg';

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
            'file'       => $this->captchaImg,
            'rows'       =>	3,
            'cols'       =>	3,
            'previousId' =>	0,
            'canSkip'    =>	0,
            'lang'       =>	'en',
            'hintImg'    => $hintImg,
            'hintText'   =>	'Select all images with an Orange',
        ];

        $sendParams = [
            'method'           => 'post',
            'recaptcharows'    => 3,
            'recaptchacols'    => 3,
            'previousID'       => 0,
            'can_no_answer'    => 0,
            'lang'             => 'en',
            'textinstructions' => 'Select all images with an Orange',
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
