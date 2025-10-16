<?php

set_time_limit(130);

require(__DIR__ . '/../src/autoloader.php');

//$argv[1] = YOUR_API_KEY
$solver = new \TwoCaptcha\TwoCaptcha($argv[1]);

try {
    $result = $solver->text('If tomorrow is Saturday, what day is today?');
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
