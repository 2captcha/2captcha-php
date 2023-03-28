<?php

namespace TwoCaptcha\Tests;

class AudioTest extends AbstractWrapperTestCase
{
    protected $method = 'audio';

    private $captchaImg = __DIR__ . '/../examples/images/normal.jpg';

    public function test()
    {
        $audio = __DIR__ . '/../examples/audio/audio-en.mp3';


        $params = [
            'base64' => base64_encode(file_get_contents($audio)),
        ];

        $sendParams = [
            'method'           => 'audio',
            'body' => base64_encode(file_get_contents($audio))
        ];


        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => [],
        ]);
    }


    public function testAllParameters()
    {
        $audio = __DIR__ . '/../examples/audio/audio-ru.mp3';


        $params = [
            'base64' => base64_encode(file_get_contents($audio)),
            'lang'   => 'ru'
        ];

        $sendParams = [
            'method'           => 'audio',
            'body' => base64_encode(file_get_contents($audio)),
            'lang'   => 'ru'
        ];


        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => [],
        ]);
    }
}
