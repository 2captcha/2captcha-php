<?php

set_time_limit(130);

require(__DIR__ . '/../src/autoloader.php');

$solver = new \TwoCaptcha\TwoCaptcha([
    'apiKey'	=> 'YOUR_API_KEY',
    'server'	=> 'http://2captcha.com'
]);

try {
    $result = $solver->imperva([
        'url'                => 'https://example.com/login',
        'incapsulaScriptUrl' => '/_Incapsula_Resource?SWUDNSAI=31&xinfo=1',
        'incapsulaCookies'   => 'visid_incap_123456=sample; incap_ses_123_123456=sample',
        'reese84UrlEndpoint' => 'https://example.com/_Incapsula_Resource?reese84=1',
        'userAgent'          => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36',
        'proxy'              => [
            'type' => 'HTTP',
            'uri'  => 'login:password@1.2.3.4:8080',
        ],
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
