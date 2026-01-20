<?php

namespace TwoCaptcha\Tests;

class VkImageTest extends AbstractWrapperTestCase
{
    protected $method = 'vkimage';


    public function testAllParameters()
    {
        $captchaImg = __DIR__ . '/../examples/images/vk.jpg';

        $params = [
            'base64' => '...',
            'file'  => $captchaImg,
        ];

        $sendParams = [
            'method'           => 'vkimage',
            'body'             => '...',
            'soft_id' => 4585,
            'json'    => 0
        ];

        $sendFiles = [
            'file' => $captchaImg,
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => $sendFiles,
        ]);
    }
}
