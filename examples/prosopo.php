<?php

use TwoCaptcha\TwoCaptcha;

set_time_limit(610);

require(__DIR__ . '/../src/autoloader.php');

//$argv[1] = YOUR_API_KEY
$solver = new TwoCaptcha($argv[1]);

try {
    $result = $solver->prosopo([
        'sitekey' => '5EZVvsHMrKCFKp5NYNoTyDjTjetoVo1Z4UNNbTwJf1GfN6Xm',
        'url'     => 'https://www.twickets.live/',
    ]);

} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);

