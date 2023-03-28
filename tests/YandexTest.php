<?php

namespace TwoCaptcha\Tests;

class YandexTest extends AbstractWrapperTestCase
{
    protected $method = 'yandex';

    public function testAllOptions()
    {
        $params = [
            'sitekey'  => 'Y5Lh0tiycconMJGsFd3EbbuNKSp1yaZESUOIHfeV',
            'pageurl'  => 'https://rutube.ru',
            'proxy'    => [
                'type' => 'HTTPS',
                'uri'  => 'username:str0ngP@$$W0rd@1.2.3.4:4321',
            ]
        ];

        $sendParams = [
            'method'     => 'yandex',
            'sitekey'    => 'Y5Lh0tiycconMJGsFd3EbbuNKSp1yaZESUOIHfeV',
            'pageurl'    => 'https://rutube.ru',
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
