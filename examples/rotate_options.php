<?php

set_time_limit(130);

require(__DIR__ . '/../src/autoloader.php');

$solver = new \TwoCaptcha\TwoCaptcha([
    'apiKey'	=> 'YOUR_API_KEY',
    'server'	=> 'http://2captcha.com'
]);

try {
    $result = $solver->rotate([
        'body' => base64_encode(file_get_contents(__DIR__ . '/images/rotate.jpg')),
        'angle'    => 40,
        'lang'     => 'en',
        'hintText' => 'Put the images in the correct way up',
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
