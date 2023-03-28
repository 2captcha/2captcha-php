<?php

namespace TwoCaptcha\Tests;

class LeminTest extends AbstractWrapperTestCase
{
    protected $method = 'lemin';

    public function testAllOptions()
    {
        $params = [
            'captcha_id'  => 'CROPPED_d3d4d56_73ca4008925b4f83a8bed59c2dd0df6d',
            'api_server' => 'api.leminnow.com',
            'pageurl'  => 'http://sat2.aksigorta.com.tr',
            'proxy'    => [
                'type' => 'HTTPS',
                'uri'  => 'username:str0ngP@$$W0rd@1.2.3.4:4321',
            ]
        ];

        $sendParams = [
            'method'     => 'lemin',
            'captcha_id' => 'CROPPED_d3d4d56_73ca4008925b4f83a8bed59c2dd0df6d',
            'api_server' => 'api.leminnow.com',
            'pageurl'    => 'http://sat2.aksigorta.com.tr',
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
