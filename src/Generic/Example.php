<?php
use TwoCaptcha\Generic\ApiClient;

set_time_limit(130);

require(__DIR__ . '/../src/autoloader.php');

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
    'task' => $this->dataInner
];

$createTaskUri = "https://api.rucaptcha.com/createTask";

try {

    $result = $solver->request($data, $this->createTaskUri);

} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result);
