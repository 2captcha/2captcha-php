<?php

set_time_limit(130);

require(__DIR__ . '/../src/autoloader.php');

$solver = new \TwoCaptcha\TwoCaptcha('YOUR_API_KEY');

try {
    $result = $solver->imperva([
        'url'                => 'https://example.com/login',
        'incapsulaScriptUrl' => '/_Incapsula_Resource?SWUDNSAI=31&xinfo=1',
        'incapsulaCookies'   => 'visid_incap_123456=sample; incap_ses_123_123456=sample',
        'proxy'              => [
            'type' => 'HTTP',
            'uri'  => 'login:password@1.2.3.4:8080',
        ],
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
