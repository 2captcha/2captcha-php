<?php

use TwoCaptcha\TwoCaptcha;

set_time_limit(610);

require(__DIR__ . '/../src/autoloader.php');

//$argv[1] = YOUR_API_KEY
$solver = new TwoCaptcha($argv[1]);

try {

    $tokenBasedResult = $solver->vkCaptcha([
        'redirect_uri' => 'https://id.vk.com/not_robot_captcha?domain=vk.com&session_token=eyJ....HGsc5B4LyvjA&variant=popup&blank=1',
        'userAgent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
        'proxy' => [
            'type' => 'HTTPS',
            'uri' => 'login:password@IP_address:PORT',
        ],
    ]);

    echo 'TokenBasedResult Captcha solved: ' . $tokenBasedResult->code;

} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
