<?php

namespace TwoCaptcha\Generic;

class ApiClient
{
    public $apiKey;
    private $curl;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    function request($data, $uri) {

        if (!$this->curl) $this->curl = curl_init();

        curl_setopt($this->curl, CURLOPT_URL, $uri);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);

        $resp = curl_exec($this->curl);
        //curl_close($curl);

        return $resp;
    }
/*
        public function solve($data) {
        jsonObject.put("softId", softId);
        JSONObject responseJsonObject = createTask(jsonObject);
        this.taskId = responseJsonObject.getLong("taskId");

        if (jsonObject.getJSONObject("task").has("callbackUrl")
                && !jsonObject.getJSONObject("task").getString("callbackUrl").isEmpty())
            return responseJsonObject;
        return getTaskResult(this.taskId);
    }
    */
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