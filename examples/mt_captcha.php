<?php

set_time_limit(130);

require(__DIR__ . '/../src/autoloader.php');

$solver = new \TwoCaptcha\TwoCaptcha('YOUR_API_KEY');

try {
    $result = $solver->mt_captcha([
        'sitekey' => 'MTPublic-KzqLY1cKH',
        'url'     => 'https://2captcha.com/demo/mtcaptcha',
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
