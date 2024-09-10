<?php

set_time_limit(130);

require(__DIR__ . '/../src/autoloader.php');

$apikey = getenv("APIKEY");
$solver = new \TwoCaptcha\TwoCaptcha($apikey);

// To bypass GeeTest first we need to get new challenge value
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://2captcha.com/api/v1/captcha-demo/gee-test/init-params?t=" . time());
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$resp = curl_exec($ch);
$challenge = json_decode($resp)->challenge;

var_dump($resp);
var_dump($challenge);

// Then we are ready to make a call to 2captcha API
try {
    $result = $solver->geetest([
        'gt'        => '81388ea1fc187e0c335c0a8907ff2625',
        'apiServer' => 'api.geetest.com',
        'challenge' => $challenge,
        'url'       => 'https://2captcha.com/demo/geetest',
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

var_dump($result);
die('Captcha solved: ' . $result->code);
