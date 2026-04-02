<?php
use TwoCaptcha\TwoCaptcha;

set_time_limit(610);

require(__DIR__ . '/../src/autoloader.php');

//$argv[1] = YOUR_API_KEY
$solver = new TwoCaptcha($argv[1]);

try {
    $result = $solver->altchacaptcha([
        'challenge_url' => 'https://.../captcha/api/altcha/challenge',
        'pageurl'     => 'https://site.com/',
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
