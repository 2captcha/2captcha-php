<?php

set_time_limit(130);

require(__DIR__ . '/../src/autoloader.php');

$solver = new \TwoCaptcha\TwoCaptcha('YOUR_API_KEY');

try {
    $result = $solver->hcaptcha([
        'sitekey' => '10000000-ffff-ffff-ffff-000000000001',
        'url'     => 'https://www.site.com/page/',
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha ' . $result->captchaId .' solved! Token: ' . $result->code . ' respKey: ' . $result->respKey . ' useragent: ' . $result->useragent);
