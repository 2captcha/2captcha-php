<?php

namespace TwoCaptcha\Tests;

class TextTest extends AbstractWrapperTestCase
{
    protected $method = 'text';

    public function testSimpleText()
    {
        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => 'Today is monday?',
            'sendParams' => ['method' => 'post', 'textcaptcha' => 'Today is monday?'],
            'sendFiles'  => [],
        ]);
    }

    public function testTextParameter()
    {
        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => ['text' => 'Today is monday?'],
            'sendParams' => ['method' => 'post', 'textcaptcha' => 'Today is monday?'],
            'sendFiles'  => [],
        ]);
    }

    public function testAllParameters()
    {
        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => ['text' => 'Today is monday?', 'lang' => 'en'],
            'sendParams' => ['method' => 'post', 'textcaptcha' => 'Today is monday?', 'lang' => 'en'],
            'sendFiles'  => [],
        ]);
    }
}
