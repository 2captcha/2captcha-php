<?php

set_time_limit(130);

require(__DIR__ . '/../src/autoloader.php');

$image = __DIR__ . '/images/grid.jpg';
$base64 = base64_encode(file_get_contents($image));

$apikey = getenv("APIKEY");
$solver = new \TwoCaptcha\TwoCaptcha($apikey);

try {
    $result = $solver->coordinates(['base64' => $base64]);
} catch (\Exception $e) {
    die($e->getMessage());
}

var_dump($result);
die('Captcha solved: ' . $result->code);
