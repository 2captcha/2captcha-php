<?php

namespace TwoCaptcha\Tests;

class ImpervaTest extends AbstractWrapperTestCase
{
    protected $method = 'imperva';

    public function testAllOptions()
    {
        $params = [
            'url'                => 'https://example.com/login',
            'incapsulaScriptUrl' => '/_Incapsula_Resource?SWUDNSAI=31&xinfo=1',
            'incapsulaCookies'   => 'visid_incap_123456=sample; incap_ses_123_123456=sample',
            'reese84UrlEndpoint' => 'https://example.com/_Incapsula_Resource?reese84=1',
            'userAgent'          => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36',
            'proxy'              => [
                'type' => 'HTTP',
                'uri'  => 'login:password@1.2.3.4:8080',
            ],
        ];

        $sendParams = [
            'method'               => 'incapsula',
            'pageurl'              => 'https://example.com/login',
            'incapsula_script_url' => '/_Incapsula_Resource?SWUDNSAI=31&xinfo=1',
            'incapsula_cookies'    => 'visid_incap_123456=sample; incap_ses_123_123456=sample',
            'reese84_url_endpoint' => 'https://example.com/_Incapsula_Resource?reese84=1',
            'useragent'            => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36',
            'proxy'                => 'login:password@1.2.3.4:8080',
            'proxytype'            => 'HTTP',
            'soft_id'              => '4585',
            'json'                 => '0',
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => [],
        ]);
    }
}
