<?php

use TwoCaptcha\TwoCaptcha;

set_time_limit(610);

require(__DIR__ . '/../src/autoloader.php');

//$argv[1] = YOUR_API_KEY
$solver = new TwoCaptcha($argv[1]);

try {
    //image-based
    $result = $solver->vk([
        //'method' => 'vkimage',
        'body' => base64_encode(file_get_contents(__DIR__ . '/images/vk.jpg')),
        'steps' => '[5,12,22,24,21,23,10,7,2,8,19,18,8,24,21,22,11,14,16,5,18,20,4,21,12,6,0,0,11,12,8,20,19,3,14,8,9,13,16,24,18,3,2,23,8,12,6,1,11,0,20,15,19,22,17,24,8,0,12,5,19,14,11,6,7,14,23,24,23,20,4,20,6,12,4,17,4,18,6,20,17,5,23,7,10,2,8,9,5,4,17,24,11,14,4,10,12,22,21,2]',
    ]);

    //token-based
    /*
    $tokenBasedResult = $solver->vk([
        'method' => 'vkcaptcha',
        'redirect_uri' => 'https://id.vk.com/not_robot_captcha?domain=vk.com&session_token=eyJ....HGsc5B4LyvjA&variant=popup&blank=1',
        'userAgent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
        'proxy' => [
            'type' => 'HTTPS',
            'uri' => 'login:password@IP_address:PORT',
        ],
    ]);

    echo 'TokenBasedResult Captcha solved: ' . $tokenBasedResult->code;
    */

} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
