<?php

namespace TwoCaptcha\Tests;

class HCaptchaTest extends AbstractWrapperTestCase
{
    protected $method = 'hcaptcha';

    public function testAllOptions()
    {
        $params = [
            'sitekey' => 'f1ab2cdefa3456789012345b6c78d90e',
            'url'     => 'https://www.site.com/page/',
        ];

        $sendParams = [
            'method'  => 'hcaptcha',
            'sitekey' => 'f1ab2cdefa3456789012345b6c78d90e',
            'pageurl' => 'https://www.site.com/page/',
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => [],
        ]);
    }
}
