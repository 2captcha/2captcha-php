<?php

namespace TwoCaptcha\Generic;

use Exception;

class ApiClient
{
    private $softId = 4585;
    public $apiKey = -1;
    private $curl = "";
    public $timeout = 160;
    public $pollingInterval = 10;
    public $taskId = -1;

    private $createTaskUri = "https://api.rucaptcha.com/createTask";
    private $getTaskResultUri = "https://api.rucaptcha.com/getTaskResult";
    private $getBalanceUri = "https://api.rucaptcha.com/getBalance";
    private $reportCorrectUri = "https://api.rucaptcha.com/reportCorrect";
    private $reportIncorrectUri = "https://api.rucaptcha.com/reportIncorrect";

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    private function doRequest($uri, $data)
    {
        $response = $this->request($uri, $data);

        echo "\n" . $response;
        
        $responseJson = json_decode($response);

        return $responseJson;
    }

    private function createTask($data)
    {
        echo "\n CreateTask Request";
        return $this->doRequest($this->createTaskUri, $data);
    }

    public function getTaskResult($taskId)
    {
        $data = [
            'clientKey' => $this->apiKey,
            'taskId' => $taskId
        ];

        $startedAt = time();
        $requestNum = 0;

        while (true) {
            $now = time();
            if ($now - $startedAt < $this->timeout) {
                sleep($this->pollingInterval);
            } else {
                break;
            }

            try {
                echo "\n GetTaskResult Request N: " . ++$requestNum;
                $response = $this->doRequest($this->getTaskResultUri, $data);

                if ($response->errorId) {
                    return $response;
                }

                $status = $response->status;
                if ($status == "ready") {
                    return $response;
                }

            } catch (\Exception $e) {
                die($e->getMessage());
            }
        }

        throw new Exception("\n Timeout " . $this->timeout . " seconds reached");
    }

    public function solve($data)
    {
        $data["softId"] = $this->softId;
        $response = $this->createTask($data);
        $this->taskId = $response->taskId;
        echo $this->taskId;

        if ($data["callbackUrl"]) return $response;

        return $this->getTaskResult($this->taskId);
    }

    function request($uri, $data)
    {

        if (!$this->curl) $this->curl = curl_init();

        curl_setopt($this->curl, CURLOPT_URL, $uri);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($data));

        $resp = curl_exec($this->curl);
        //curl_close($curl);

        return $resp;
    }

    public function getBalance($data)
    {
        echo "\n Get Balance Request";
        return $this->doRequest($this->getBalanceUri, $data);
    }

    public function reportCorrect($data)
    {
        echo "\n Report Correct Request";
        return $this->doRequest($this->reportCorrectUri, $data);
    }

    public function reportIncorrect($data)
    {
        echo "\n Report Incorrect Request";
        return $this->doRequest($this->reportIncorrectUri, $data);
    }
}
/*
$url = "https://reqbin.com/echo/post/json";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$data = <<<DATA
{
  "Id": 78912,
  "Customer": "Jason Sweet",
  "Quantity": 1,
  "Price": 18.00
}
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

$resp = curl_exec($curl);
curl_close($curl);

echo $resp;
?>
*/
