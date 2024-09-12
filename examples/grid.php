<?php

set_time_limit(130);

require(__DIR__ . '/../src/autoloader.php');

$apikey = getenv("APIKEY");
$solver = new \TwoCaptcha\TwoCaptcha($apikey);

try {
    $result = $solver->grid([
        'file'       => __DIR__ . '/images/grid_2.jpg',
        'rows'       =>	3,
        'cols'       =>	3,
        'lang'       =>	'en',
        // 'hintText'   =>	'Select all images with an Orange',
         'hintImg'    => __DIR__ . '/images/grid_hint.jpg',
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

var_dump($result);
die('Captcha solved: ' . $result->code);
