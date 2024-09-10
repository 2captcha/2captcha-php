<?php

namespace TwoCaptcha\Tests;

class GridTest extends AbstractWrapperTestCase
{
    protected $method = 'grid';

    private $captchaImg = __DIR__ . '/../examples/images/grid.jpg';

    public function testMissingParameterCase()
    {
        $this->checkIfExceptionThrownOnMissingParameter([
            'params'     => $this->captchaImg,
            'sendParams' => ['method' => 'post', 'recaptcha' => 1, 'soft_id' => 4585,],
            'sendFiles'  => ['file' => $this->captchaImg],
        ]);
    }


    // public function testSingleFile()
    // {
    //     $this->checkIfCorrectParamsSendAndResultReturned([
    //         'params'     => $this->captchaImg,
    //         'sendParams' => ['method' => 'post','soft_id' => '4585', 'hintText' => 'Select all images with an Orange'],
    //         'sendFiles'  => ['file' => $this->captchaImg],
    //     ]);
    // }

    public function testSingleFileParameter()
    {
        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => ['file' => $this->captchaImg, 'hintText' => 'Select all images with an Orange'],
            'sendParams' => ['method' => 'post', 'recaptcha' => 1, 'soft_id' => 4585, 'textinstructions' => 'Select all images with an Orange'],
            'sendFiles'  => ['file' => $this->captchaImg],
        ]);
    }

    public function testBase64()
    {
        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => ['base64' => '...', 'hintText' => 'Select all images with an Orange'],
            'sendParams' => ['method' => 'base64', 'recaptcha' => 1, 'body' => '...','soft_id' => 4585, 'textinstructions' => 'Select all images with an Orange'],
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
            'recaptcha'        => 1,
            'recaptcharows'    => 3,
            'recaptchacols'    => 3,
            'previousID'       => 0,
            'can_no_answer'    => 0,
            'lang'             => 'en',
            'textinstructions' => 'Select all images with an Orange',
            'soft_id'          => 4585,
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
