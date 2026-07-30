<?php

use TwoCaptcha\Generic\ApiClient;

set_time_limit(130);

require(__DIR__ . '/../autoloader.php');

//$argv[1] = YOUR_API_KEY
$solver = new ApiClient($argv[1]);



//test
$dataInner = [
    'type' => 'TextCaptchaTask',
    'comment' => 'If tomorrow is Saturday, what day is today?'
];

$data = [
    'clientKey' => $argv[1],
    'languagePool' => 'en',
    'task' => $dataInner
];

try {

    $result = $solver->solve($data);
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result);
