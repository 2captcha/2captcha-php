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

    private $createTaskUri = "https://api.rucaptcha.com/createTask";

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    private function doRequest($uri, $data)
    {
        $response = $this->request($uri, $data);

        echo $response;
        $responseJson = json_decode($response);

        return $responseJson;
    }

    private function createTask($data)
    {
        echo "CreateTask Request";
        return $this->doRequest($this->createTaskUri, $data);
    }

    public function getTaskResult($taskId)
    {
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
                                JSONObject jsonObject = new JSONObject();
                jsonObject.put("clientKey", this.apiKey);
                jsonObject.put("taskId", taskId);

                HttpRequest request = request(jsonObject, getTaskResultUri);
                
            } catch (\Exception $e) {
                die($e->getMessage());
            }
        }

        throw new Exception('Timeout ' . $this->timeout . ' seconds reached');
    }

    public function solve($data)
    {
        $data["softId"] = $this->softId;
        $response = $this->createTask($data);
        //echo $response;
        $taskId = $response->taskId;
        echo $taskId;

        if ($data["callbackUrl"]) return $response;

        return $this->getTaskResult($taskId);
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
/*    private int softId = 4581;
    String apiKey;
    Long taskId = -1L;
    int timeout = 160;
    int pollingInterval = 10;
    HttpClient httpClient = HttpClient.newHttpClient();
    String createTaskUri = "https://api.rucaptcha.com/createTask";
    String getTaskResultUri = "https://api.rucaptcha.com/getTaskResult";
    String getBalanceUri = "https://api.rucaptcha.com/getBalance";
    String reportCorrectUri = "https://api.rucaptcha.com/reportCorrect";
    String reportIncorrectUri = "https://api.rucaptcha.com/reportIncorrect";
*/