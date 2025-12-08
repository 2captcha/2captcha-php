<?php

use TwoCaptcha\TwoCaptcha;

set_time_limit(610);

require(__DIR__ . '/../src/autoloader.php');

//$argv[1] = YOUR_API_KEY
$solver = new TwoCaptcha($argv[1]);

$body = base64_encode(file_get_contents(__DIR__ . '/resources/temu/body.png'));
$part1 = base64_encode(file_get_contents(__DIR__ . '/resources/temu/part1.png'));
$part2 = base64_encode(file_get_contents(__DIR__ . '/resources/temu/part2.png'));
$part3 = base64_encode(file_get_contents(__DIR__ . '/resources/temu/part3.png'));


try {
    $result = $solver->temu([
        'body'  => $body,
        'part1' => $part1,
        'part2' => $part2,
        'part3' => $part3,
    ]);

} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);

