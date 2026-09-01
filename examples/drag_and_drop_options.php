<?php

use TwoCaptcha\TwoCaptcha;

set_time_limit(130);

require(__DIR__ . '/../src/autoloader.php');

$solver = new TwoCaptcha([
    'apiKey' => $argv[1],
    'server' => 'http://2captcha.com',
]);

$body = base64_encode(file_get_contents(__DIR__ . '/resources/drag_and_drop/background.jpeg'));
$images = [
    base64_encode(file_get_contents(__DIR__ . '/resources/drag_and_drop/image1.jpeg')),
    base64_encode(file_get_contents(__DIR__ . '/resources/drag_and_drop/image2.jpeg')),
];

try {
    $result = $solver->drag_and_drop([
        'body'        => $body,
        'images'      => $images,
        'hintText'    => 'Drag the images to proper position',
        'language'    => 2,
        'lang'        => 'en',
        'header_acao' => 1,
    ]);

} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
