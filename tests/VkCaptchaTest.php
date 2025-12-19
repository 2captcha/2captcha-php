<?php

namespace TwoCaptcha\Tests;

class VkCaptchaTest extends AbstractWrapperTestCase
{
    protected $method = 'vkcaptcha';

    public function testAllOptions()
    {
        $params = [
            'url'     => 'https://www.site.com/page/',
            'proxy'     => [
                'type' => 'HTTPS',
                'uri'  => 'username:str0ngP@$$W0rd@1.2.3.4:4321',
                
            ]
        ];

        $sendParams = [
            'method'    => 'vkcaptcha',
            'pageurl'   => 'https://www.site.com/page/',
            'proxy'     => 'username:str0ngP@$$W0rd@1.2.3.4:4321',
            'proxytype' => 'HTTPS',
            'soft_id' => '4585'
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => [],
        ]);
    }
}
