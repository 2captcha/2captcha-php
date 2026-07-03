<?php

namespace TwoCaptcha\Tests;

class TspdTest extends AbstractWrapperTestCase
{
    protected $method = 'tspd';

    public function testAllOptions()
    {
        $params = [
            'url'           => 'https://example.com/page-with-tspd',
            'tspdcookie'    => 'tspd_101=abcdef1234567890;',
            'htmlPageBase64'=> base64_encode('<html>challenge page</html>'),
            'userAgent'     => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
            'proxy'         => [
                'type' => 'HTTPS',
                'uri'  => 'login:password@IP_address:PORT',
            ],
        ];

        $sendParams = [
            'method'         => 'tspd',
            'pageurl'        => 'https://example.com/page-with-tspd',
            'tspdcookie'     => 'tspd_101=abcdef1234567890;',
            'htmlPageBase64' => base64_encode('<html>challenge page</html>'),
            'userAgent'      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
            'proxy'          => 'login:password@IP_address:PORT',
            'proxytype'      => 'HTTPS',
            'soft_id'        => '4585',
            'json'           => '0',
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => [],
        ]);
    }
}
