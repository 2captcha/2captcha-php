<?php

namespace TwoCaptcha\Tests;

class BinanceTest extends AbstractWrapperTestCase
{
    protected $method = 'binance';

    public function testAllOptions()
    {
        $params = [
            'sitekey'  => 'login',
            'pageurl'  => 'https://example.com/page-with-binance',
            'validate_id' => 'cb0bfef...e54ecd57b',
            'proxy'    => [
                'type' => 'HTTPS',
                'uri'  => 'username:str0ngP@$$W0rd@1.2.3.4:4321',
            ]
        ];

        $sendParams = [
            'method'     => 'binance',
            'sitekey'    => 'login',
            'pageurl'    => 'https://example.com/page-with-binance',
            'validate_id' => 'cb0bfef...e54ecd57b',
            'proxy'      => 'username:str0ngP@$$W0rd@1.2.3.4:4321',
            'proxytype'  => 'HTTPS',
            'soft_id'    => '4585',
            'json'       => '0'
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => [],
        ]);
    }
}
