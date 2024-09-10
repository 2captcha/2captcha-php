<?php

set_time_limit(130);

require(__DIR__ . '/../src/autoloader.php');

$apikey = getenv("APIKEY");
$solver = new \TwoCaptcha\TwoCaptcha($apikey);

try {
    $result = $solver->coordinates([
        'file'     => __DIR__ . '/images/grid_2.jpg',
        'hintImg'  => __DIR__ . '/images/grid_hint.jpg'
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

var_dump($result);
// die('Captcha solved: ' . $result->code);
