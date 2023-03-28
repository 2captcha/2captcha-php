<?php

namespace TwoCaptcha\Tests;

class RotateTest extends AbstractWrapperTestCase
{
    protected $method = 'rotate';

    private $img  = __DIR__ . '/../examples/images/rotate.jpg';
    private $img2 = __DIR__ . '/../examples/images/rotate_2.jpg';
    private $img3 = __DIR__ . '/../examples/images/rotate_3.jpg';

    public function testFile()
    {
        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => ['base64' => '...'],
            'sendParams' => ['method' => 'rotatecaptcha', 'body' => '...'],
            'sendFiles'  => [],
        ]);        
    }

    public function testAllParameters()
    {
        $hintImg = __DIR__ . '/../examples/images/grid_hint.jpg';

        $params = [
            'base64' => '...',
            'angle'    => 40,
            'lang'     => 'en',
            'hintImg'  => $hintImg,
            'hintText' => 'Put the images in the correct way up',
        ];

        $sendParams = [
            'method'           => 'rotatecaptcha',
            'angle'            => 40,
            'lang'             => 'en',
            'textinstructions' => 'Put the images in the correct way up',
            'body' => '...'
        ];

        $sendFiles = [
            'imginstructions' => $hintImg,
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => $sendFiles,
        ]);
    }

    public function testInvalidFileException()
    {
        $this->checkIfExceptionThrownOnInvalidFile();
    }

    public function testTooManyFilesException()
    {
        $this->checkIfExceptionThrownOnTooManyFiles();
    }
}
