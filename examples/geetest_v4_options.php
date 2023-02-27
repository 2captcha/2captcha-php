<?php

set_time_limit(130);

require(__DIR__ . '/../src/autoloader.php');

$solver = new \TwoCaptcha\TwoCaptcha([
    'apiKey'	=> 'YOUR_API_KEY',
    'server'	=> 'http://2captcha.com'
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://mysite.com/captcha_challenge");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$resp = curl_exec($ch);
$challenge = explode(";", $resp)[0];

try {
    $result = $solver->geetest_v4([
        'captchaId' => '72bf15796d0b69c43867452fea615052',
        'apiServer' => 'api.geetest.com',
        'challenge' => $challenge,
        'url'       => 'https://mysite.com/captcha.html',
        'proxy'     => [
            'type' => 'HTTPS',
            'uri'  => 'login:password@IP_address:PORT',
        ],
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
