<?php

namespace TwoCaptcha\Tests;

class YidunTest extends AbstractWrapperTestCase
{
    protected $method = 'yidun';

    public function testAllOptions()
    {
        $params = [
            'sitekey' => '0f743r3g1...8rz3grz0ym5',
            'url'     => 'https://example.com/page-with-yidun',
            'proxy'     => [
            'type' => 'HTTPS',
            'uri'  => 'login:password@IP_address:PORT',
            ]
        ];

        $sendParams = [
            'method'     => 'yidun',
            'sitekey'    => '0f743r3g1...8rz3grz0ym5',
            'pageurl'    => 'https://example.com/page-with-yidun',
            'proxy'      => 'login:password@IP_address:PORT',
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
