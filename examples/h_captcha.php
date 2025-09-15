<?php

set_time_limit(130);

require(__DIR__ . '/../src/autoloader.php');

$solver = new \TwoCaptcha\TwoCaptcha([
    'apiKey'	=> 'YOUR_API_KEY',
    'server'	=> 'http://2captcha.com',
    'json'	=> 1
]);

try {
    $result = $solver->hcaptcha([
        'sitekey' => 'c0421d06-b92e-47fc-ab9a-5caa43c04538',
        'url'     => 'https://api.solvecaptcha.com/demo/hcaptcha',
        'json'    => 1
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);