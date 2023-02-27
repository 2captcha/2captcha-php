<?php

set_time_limit(130);

require(__DIR__ . '/../src/autoloader.php');

$image = __DIR__ . '/images/normal.jpg';
$base64 = base64_encode(file_get_contents($image));

$solver = new \TwoCaptcha\TwoCaptcha([
    'apiKey'	=> 'YOUR_API_KEY',
    'server'	=> 'http://2captcha.com'
]);

try {
    $result = $solver->normal(['base64' => $base64]);
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
