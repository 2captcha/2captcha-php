<?php

namespace TwoCaptcha\Tests;

class TurnstileTest extends AbstractWrapperTestCase
{
    protected $method = 'turnstile';

    public function testAllOptions()
    {
        $params = [
            'sitekey'  => '0x4AAAAAAAChNiVJM_WtShFf',
            'pageurl'  => 'https://ace.fusionist.io',
            'proxy'    => [
                'type' => 'HTTPS',
                'uri'  => 'username:str0ngP@$$W0rd@1.2.3.4:4321',
            ]
        ];

        $sendParams = [
            'method'     => 'turnstile',
            'sitekey'    => '0x4AAAAAAAChNiVJM_WtShFf',
            'pageurl'    => 'https://ace.fusionist.io',
            'proxy'      => 'username:str0ngP@$$W0rd@1.2.3.4:4321',
            'proxytype'  => 'HTTPS'                 
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => [],
        ]);
    }
}
