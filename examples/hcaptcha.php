<?php

set_time_limit(130);

require(__DIR__ . '/../src/autoloader.php');
$apikey = getenv("APIKEY");
$solver = new \TwoCaptcha\TwoCaptcha($apikey);

try {
    $result = $solver->hcaptcha([
        'sitekey' => 'c0421d06-b92e-47fc-ab9a-5caa43c04538',
        'url'     => 'https://2captcha.com/demo/hcaptcha',
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

var_dump($result);
die('Captcha ' . $result->captchaId .' solved! Token: ' . $result->code . ' respKey: ' . $result->respKey . ' useragent: ' . $result->useragent);
