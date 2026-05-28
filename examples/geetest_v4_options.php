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
        'url'       => 'https://mysite.com/captcha.html',
        'risk_type' => 'slide|1779953415.471155|dfb79e61dd2c437b8e524291ce692d58|a322dcdc9f533fb86aa1d8c275c52981e1528f53fd62a03ccb42608ca0b3c075',
        'proxy'     => [
            'type' => 'HTTPS',
            'uri'  => 'login:password@IP_address:PORT',
        ],
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
