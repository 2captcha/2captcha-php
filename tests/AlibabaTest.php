<?php

namespace TwoCaptcha\Tests;

class AlibabaTest extends AbstractWrapperTestCase
{
    protected $method = 'alibaba';

    public function testAllOptions()
    {
        $params = [
            'url'           => 'https://example.com/page-with-alibaba',
            'sceneId'       => 'bxs_login',
            'prefix'        => 'a',
            'userId'        => 'user123',
            'userUserId'    => 'user456',
            'verifyType'    => '3',
            'region'        => 'cn',
            'userCertifyId' => 'certify-id-value',
            'apiGetLib'     => 'https://example.com/captcha.js',
            'userAgent'     => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
            'proxy'         => [
                'type' => 'HTTPS',
                'uri'  => 'login:password@IP_address:PORT',
            ],
        ];

        $sendParams = [
            'method'        => 'alibaba',
            'pageurl'       => 'https://example.com/page-with-alibaba',
            'sceneId'       => 'bxs_login',
            'prefix'        => 'a',
            'userId'        => 'user123',
            'userUserId'    => 'user456',
            'verifyType'    => '3',
            'region'        => 'cn',
            'userCertifyId' => 'certify-id-value',
            'apiGetLib'     => 'https://example.com/captcha.js',
            'userAgent'     => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
            'proxy'         => 'login:password@IP_address:PORT',
            'proxytype'     => 'HTTPS',
            'soft_id'       => '4585',
            'json'          => '0',
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => [],
        ]);
    }
}
