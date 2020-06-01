<?php

set_time_limit(130);

require(__DIR__ . '/../src/autoloader.php');

$solver = new \TwoCaptcha\TwoCaptcha('YOUR_API_KEY');

try {
    $result = $solver->rotate([
        __DIR__ . '/images/rotate.jpg',
        __DIR__ . '/images/rotate_2.jpg',
        __DIR__ . '/images/rotate_3.jpg',
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
