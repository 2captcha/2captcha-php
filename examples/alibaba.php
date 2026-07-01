<?php
use TwoCaptcha\TwoCaptcha;

require(__DIR__ . '/../src/autoloader.php');

//$argv[1] = YOUR_API_KEY
$solver = new TwoCaptcha($argv[1]);

try {
    $result = $solver->alibaba([
        'url'     => 'https://example.com/page-with-alibaba',
        'sceneId' => 'bxs_login',
        'prefix'  => 'a',
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
