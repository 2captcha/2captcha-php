<?php

use TwoCaptcha\Generic\ApiClient;

set_time_limit(130);

require(__DIR__ . '/../autoloader.php');

//$argv[1] = YOUR_API_KEY
$key = $argv[1];
$apiClient = new ApiClient($key);

$dataInner = [
    'type' => 'TextCaptchaTask',
    'comment' => 'If tomorrow is Saturday, what day is today?'
];

$data = [
    'clientKey' => $argv[1],
    'languagePool' => 'en',
    'task' => $dataInner
];

function getBalance($apiClient, $key){
    $data = [
        'clientKey' => $key
    ];

    $result = $apiClient->getBalance($data);
}

function reportCorrect($apiClient, $key){
    $data = [
        'clientKey' => $key,
        "taskId" => $apiClient->taskId
    ];

    $result = $apiClient->reportCorrect($data);
}

function reportIncorrect($apiClient, $key){
    $data = [
        'clientKey' => $key,
        "taskId" => $apiClient->taskId
    ];

    $result = $apiClient->reportIncorrect($data);
}

try {

    $result = $apiClient->solve($data);

    getBalance($apiClient, $key);
    reportCorrect($apiClient, $key);
    reportIncorrect($apiClient, $key);

} catch (\Exception $e) {
    die($e->getMessage());
}

die("\n Captcha solved");
