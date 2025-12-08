<?php

namespace TwoCaptcha\Tests;

class CaptchafoxTest extends AbstractWrapperTestCase
{
    protected $method = 'captchafox';

    public function testAllOptions()
    {
        $params = [
            'sitekey'  => 'sk_ILKWNruBBVKDOM7dZs59KHnDLEWiH',
            'pageurl'  => 'https://mysite.com/page/with/captchafox',
            'userAgent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
            'proxy'    => [
                'type' => 'HTTPS',
                'uri'  => 'username:str0ngP@$$W0rd@1.2.3.4:4321',
            ]
        ];

        $sendParams = [
            'method'     => 'captchafox',
            'sitekey'    => 'sk_ILKWNruBBVKDOM7dZs59KHnDLEWiH',
            'pageurl'    => 'https://mysite.com/page/with/captchafox',
            'userAgent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
            'proxy'      => 'username:str0ngP@$$W0rd@1.2.3.4:4321',
            'proxytype'  => 'HTTPS',
            'soft_id'    => '4585',
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => [],
        ]);
    }
}
