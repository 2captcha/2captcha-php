<?php

namespace TwoCaptcha\Tests;

class GeeTest extends AbstractWrapperTestCase
{
    protected $method = 'geetest';

    public function testAllOptions()
    {
        $params = [
            'gt'        => 'f2ae6cadcf7886856696502e1d55e00c',
            'apiServer' => 'api-na.geetest.com',
            'challenge' => '69A21A01-CC7B-B9C6-0F9A-E7FA06677FFC',
            'url'       => 'https://launches.endclothing.com/distil_r_captcha.html',
        ];

        $sendParams = [
            'method'     => 'geetest',
            'gt'         => 'f2ae6cadcf7886856696502e1d55e00c',
            'api_server' => 'api-na.geetest.com',
            'challenge'  => '69A21A01-CC7B-B9C6-0F9A-E7FA06677FFC',
            'pageurl'    => 'https://launches.endclothing.com/distil_r_captcha.html',
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => [],
        ]);
    }
}
