<?php

namespace TwoCaptcha\Tests;

class ReCaptchaTest extends AbstractWrapperTestCase
{
    protected $method = 'recaptcha';

    public function testV2()
    {
        $params = [
            'sitekey'   => '6Le-wvkSVVABCPBMRTvw0Q4Muexq1bi0DJwx_mJ-',
            'url'       => 'https://mysite.com/page/with/recaptcha',
            'invisible' => 1,
            'action'    => 'verify',
        ];

        $sendParams = [
            'method'    => 'userrecaptcha',
            'googlekey' => '6Le-wvkSVVABCPBMRTvw0Q4Muexq1bi0DJwx_mJ-',
            'pageurl'   => 'https://mysite.com/page/with/recaptcha',
            'invisible' => 1,
            'action'    => 'verify',
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => [],
        ]);
    }

    public function testV3()
    {
        $params = [
            'sitekey' => '6Le-wvkSVVABCPBMRTvw0Q4Muexq1bi0DJwx_mJ-',
            'url'     => 'https://mysite.com/page/with/recaptcha',
            'version' => 'v3',
            'action'  => 'verify',
            'score'   => 0.3,
        ];

        $sendParams = [
            'method'    => 'userrecaptcha',
            'googlekey' => '6Le-wvkSVVABCPBMRTvw0Q4Muexq1bi0DJwx_mJ-',
            'pageurl'   => 'https://mysite.com/page/with/recaptcha',
            'version'   => 'v3',
            'action'    => 'verify',
            'min_score' => 0.3,
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => [],
        ]);
    }
}
