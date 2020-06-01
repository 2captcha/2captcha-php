<?php

set_time_limit(130);

require(__DIR__ . '/../src/autoloader.php');

$solver = new \TwoCaptcha\TwoCaptcha('YOUR_API_KEY');

try {
    $result = $solver->normal(__DIR__ . '/images/normal.jpg');
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
