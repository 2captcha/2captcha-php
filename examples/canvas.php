<?php

set_time_limit(130);

require(__DIR__ . '/../src/autoloader.php');

$apikey = getenv("APIKEY");
$solver = new \TwoCaptcha\TwoCaptcha($apikey);

try {
    $result = $solver->canvas([
        'file' => __DIR__ . '/images/canvas.jpg',
        'hintText' => 'Draw around apple',
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

var_dump($result);
// die('Captcha solved: ' . $result->code);
