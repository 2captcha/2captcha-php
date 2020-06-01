<?php

namespace TwoCaptcha\Tests;

class RotateTest extends AbstractWrapperTestCase
{
    protected $method = 'rotate';

    private $img  = __DIR__ . '/../examples/images/rotate.jpg';
    private $img2 = __DIR__ . '/../examples/images/rotate_2.jpg';
    private $img3 = __DIR__ . '/../examples/images/rotate_3.jpg';

    public function testSingleFile()
    {
        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $this->img,
            'sendParams' => ['method' => 'rotatecaptcha'],
            'sendFiles'  => ['file_1' => $this->img],
        ]);
    }

    public function testSingleFileParameter()
    {
        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => ['file' => $this->img],
            'sendParams' => ['method' => 'rotatecaptcha'],
            'sendFiles'  => ['file_1' => $this->img],
        ]);
    }

    public function testFilesList()
    {
        $files = [
            $this->img,
            $this->img2,
            $this->img3,
        ];

        $sendFiles = [
            'file_1' => $this->img,
            'file_2' => $this->img2,
            'file_3' => $this->img3,
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $files,
            'sendParams' => ['method' => 'rotatecaptcha'],
            'sendFiles'  => $sendFiles,
        ]);
    }

    public function testFilesListParameter()
    {
        $files = [
            $this->img,
            $this->img2,
            $this->img3,
        ];

        $sendFiles = [
            'file_1' => $this->img,
            'file_2' => $this->img2,
            'file_3' => $this->img3,
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => ['files' => $files],
            'sendParams' => ['method' => 'rotatecaptcha'],
            'sendFiles'  => $sendFiles,
        ]);
    }

    public function testAllParameters()
    {
        $hintImg = __DIR__ . '/../examples/images/grid_hint.jpg';

        $params = [
            'file'     => $this->img,
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
        ];

        $sendFiles = [
            'file_1'          => $this->img,
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
