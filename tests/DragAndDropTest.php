<?php

namespace TwoCaptcha\Tests;

class DragAndDropTest extends AbstractWrapperTestCase
{
    protected $method = 'drag_and_drop';

    public function testAllOptions()
    {
        $body = base64_encode(file_get_contents(__DIR__ . '/../examples/resources/drag_and_drop/background.jpeg'));
        $image1 = base64_encode(file_get_contents(__DIR__ . '/../examples/resources/drag_and_drop/image1.jpeg'));
        $image2 = base64_encode(file_get_contents(__DIR__ . '/../examples/resources/drag_and_drop/image2.jpeg'));

        $params = [
            'body'     => $body,
            'images'   => [$image1, $image2],
            'hintText' => 'Drag the images to proper position',
        ];

        $sendParams = [
            'method'           => 'drag_drop',
            'body'             => $body,
            'images'           => json_encode([$image1, $image2]),
            'textinstructions' => 'Drag the images to proper position',
            'soft_id'          => 4585,
            'json'             => 0,
        ];

        $this->checkIfCorrectParamsSendAndResultReturned([
            'params'     => $params,
            'sendParams' => $sendParams,
            'sendFiles'  => [],
        ]);
    }
}
