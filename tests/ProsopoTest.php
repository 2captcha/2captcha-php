<?php

namespace TwoCaptcha\Tests;

class ProsopoTest extends AbstractWrapperTestCase
{
    protected $method = 'prosopo';

    public function testAllOptions()
    {
        $params = [
            'sitekey'  => '5EZVvsHMrKCFKp5NYNoTyDjTjetoVo1Z4UNNbTwJf1GfN6Xm',
            'pageurl'  => 'https://www.twickets.live/',
            'proxy'    => [
                'type' => 'HTTPS',
                'uri'  => 'username:str0ngP@$$W0rd@1.2.3.4:4321',
            ]
        ];

        $sendParams = [
            'method'     => 'prosopo',
            'sitekey'    => '5EZVvsHMrKCFKp5NYNoTyDjTjetoVo1Z4UNNbTwJf1GfN6Xm',
            'pageurl'    => 'https://www.twickets.live/',
            'proxy'      => 'username:str0ngP@$$W0rd@1.2.3.4:4321',
            'proxytype'  => 'HTTPS',
            'soft_id' => 4585,
            'json'    => 0
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => [],
        ]);
    }
}
