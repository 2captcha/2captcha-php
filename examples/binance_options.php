<?php
use TwoCaptcha\TwoCaptcha;

require(__DIR__ . '/../src/autoloader.php');

//$argv[1] = YOUR_API_KEY
$solver = new TwoCaptcha($argv[1]);

try {
    $result = $solver->binance([
        'sitekey' => 'login',
        'url'     => 'https://example.com/page-with-binance',
        'validate_id' => 'cb0bfef...e54ecd57b',
        'proxy'   => [
            'type' => 'HTTPS',
            'uri'  => 'login:password@IP_address:PORT',
        ],
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
