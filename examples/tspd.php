<?php
use TwoCaptcha\TwoCaptcha;

require(__DIR__ . '/../src/autoloader.php');

//$argv[1] = YOUR_API_KEY
$solver = new TwoCaptcha($argv[1]);

try {
    $result = $solver->tspd([
        'url'            => 'https://example.com/page-with-tspd',
        'tspdcookie'     => 'tspd_101=abcdef1234567890;',
        'htmlPageBase64' => base64_encode(file_get_contents('path/to/challenge-page.html')),
        'proxy'          => [
            'type' => 'HTTPS',
            'uri'  => 'login:password@IP_address:PORT',
        ],
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
