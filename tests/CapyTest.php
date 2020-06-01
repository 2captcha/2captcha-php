<?php

namespace TwoCaptcha\Tests;

class CapyTest extends AbstractWrapperTestCase
{
    protected $method = 'capy';

    public function testAllOptions()
    {
        $params = [
            'sitekey' => 'PUZZLE_Abc1dEFghIJKLM2no34P56q7rStu8v',
            'url'     => 'http://mysite.com/',
        ];

        $sendParams = [
            'method'     => 'capy',
            'captchakey' => 'PUZZLE_Abc1dEFghIJKLM2no34P56q7rStu8v',
            'pageurl'    => 'http://mysite.com/',
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => [],
        ]);
    }
}
