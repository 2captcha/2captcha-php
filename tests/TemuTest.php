<?php

namespace TwoCaptcha\Tests;

class TemuTest extends AbstractWrapperTestCase
{
    protected $method = 'temu';

    public function test()
    {
        $body = base64_encode(file_get_contents(__DIR__ . '/../examples/resources/temu/body.png'));
        $part1 = base64_encode(file_get_contents(__DIR__ . '/../examples/resources/temu/part1.png'));
        $part2 = base64_encode(file_get_contents(__DIR__ . '/../examples/resources/temu/part2.png'));
        $part3 = base64_encode(file_get_contents(__DIR__ . '/../examples/resources/temu/part3.png'));


        $params = [
            'body'  => $body,
            'part1' => $part1,
            'part2' => $part2,
            'part3' => $part3
        ];

        $sendParams = [
            'method'  => 'temuimage',
            'body'    => $body,
            'part1'   => $part1,
            'part2'   => $part2,
            'part3'   => $part3,
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
