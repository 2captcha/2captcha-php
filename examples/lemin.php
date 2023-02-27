<?php

set_time_limit(130);

require(__DIR__ . '/../src/autoloader.php');

$solver = new \TwoCaptcha\TwoCaptcha('YOUR_API_KEY');

try {
    $result = $solver->lemin([
        'captchaId' => 'CROPPED_d3d4d56_73ca4008925b4f83a8bed59c2dd0df6d',
        'apiServer' => 'api.leminnow.com',
        'url'       => 'http://sat2.aksigorta.com.tr',
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
