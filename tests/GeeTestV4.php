<?php

namespace TwoCaptcha\Tests;

class GeeTestV4 extends AbstractWrapperTestCase
{
    protected $method = 'geetest_v4';

    public function testAllOptions()
    {
        $params = [
            'apiServer' => 'api-na.geetest.com',
            'challenge' => '69A21A01-CC7B-B9C6-0F9A-E7FA06677FFC',
            'url'       => 'https://launches.endclothing.com/distil_r_captcha.html',
            'captcha_id'=> '72bf15796d0b69c43867452fea615052',
            'proxy'     => [
                'type' => 'HTTPS',
                'uri'  => 'username:str0ngP@$$W0rd@1.2.3.4:4321',
            ]
        ];

        $sendParams = [
            'method'     => 'geetest_v4',
            'api_server' => 'api-na.geetest.com',
            'challenge'  => '69A21A01-CC7B-B9C6-0F9A-E7FA06677FFC',
            'pageurl'    => 'https://launches.endclothing.com/distil_r_captcha.html',
            'captcha_id'=> '72bf15796d0b69c43867452fea615052',
            'proxy'     => 'username:str0ngP@$$W0rd@1.2.3.4:4321',
            'proxytype' => 'HTTPS'            
        ];

 

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => [],
        ]);
    }
}
