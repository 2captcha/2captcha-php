<?php

set_time_limit(610);

require(__DIR__ . '/../src/autoloader.php');

//$argv[1] = YOUR_API_KEY
$solver = new \TwoCaptcha\TwoCaptcha($argv[1]);

try {
    $result = $solver->vk([
        'sitekey' => 'Y5Lh0tiycconMJGsFd3EbbuNKSp1yaZESUOIHfeV',
        'url'     => 'https://rutube.ru',
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
