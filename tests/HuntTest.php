<?php

namespace TwoCaptcha\Tests;

class HuntTest extends AbstractWrapperTestCase
{
    protected $method = 'hunt';

    public function testAllOptions()
    {
        $params = [
            'url'       => 'https://example.com/page-with-hunt',
            'apiGetLib' => 'https://example.com/hd-api/external/apps/app-id/api.js',
            'userAgent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
            'data'      => 'kufyHK/s/j...wIW',
            'proxy'     => [
                'type' => 'HTTPS',
                'uri'  => 'login:password@IP_address:PORT',
            ],
        ];

        $sendParams = [
            'method'    => 'hunt',
            'pageurl'   => 'https://example.com/page-with-hunt',
            'apiGetLib' => 'https://example.com/hd-api/external/apps/app-id/api.js',
            'userAgent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
            'data'      => 'kufyHK/s/j...wIW',
            'proxy'     => 'login:password@IP_address:PORT',
            'proxytype' => 'HTTPS',
            'soft_id'   => '4585',
            'json'      => '0',
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => [],
        ]);
    }
}
