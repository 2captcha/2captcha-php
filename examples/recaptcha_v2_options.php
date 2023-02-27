<?php

set_time_limit(610);

require(__DIR__ . '/../src/autoloader.php');

$solver = new \TwoCaptcha\TwoCaptcha([
    'apiKey'	=> 'YOUR_API_KEY',
    'server'	=> 'http://2captcha.com'
]);

try {
    $result = $solver->recaptcha([
        'sitekey'   => '6Le-wvkSVVABCPBMRTvw0Q4Muexq1bi0DJwx_mJ-',
        'url'       => 'https://mysite.com/page/with/recaptcha',
        'invisible' => 1,
        'action'    => 'verify',
        'proxy'     => [
            'type' => 'HTTPS',
            'uri'  => 'login:password@IP_address:PORT',
        ],
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
