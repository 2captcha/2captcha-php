<?php
use TwoCaptcha\TwoCaptcha;

require(__DIR__ . '/../src/autoloader.php');

//$argv[1] = YOUR_API_KEY
$solver = new TwoCaptcha($argv[1]);

try {
    $result = $solver->alibaba([
        'url'           => 'https://example.com/page-with-alibaba',
        'sceneId'       => 'bxs_login',
        'prefix'        => 'a',
        'userId'        => 'user123',
        'userUserId'    => 'user456',
        'verifyType'    => '3',
        'region'        => 'cn',
        'userCertifyId' => 'certify-id-value',
        'apiGetLib'     => 'https://example.com/captcha.js',
        'userAgent'     => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
        'proxy'         => [
            'type' => 'HTTPS',
            'uri'  => 'login:password@IP_address:PORT',
        ],
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
