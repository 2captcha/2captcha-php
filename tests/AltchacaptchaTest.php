<?php

namespace TwoCaptcha\Tests;

class AltchacaptchaTest extends AbstractWrapperTestCase
{
    protected $method = 'altchacaptcha';

    public function testAllOptions()
    {
        $params = [
            'challenge_url' => 'https://.../captcha/api/altcha/challenge',
            'pageurl'     => 'https://site.com/',
        ];

        $sendParams = [
            'method' => 'altcha',
            'challenge_url' => 'https://.../captcha/api/altcha/challenge',
            'pageurl'     => 'https://site.com/',
            'soft_id' => 4585,
            'json'    => 0
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => [],
        ]);
    }
}
