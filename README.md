# PHP Module for 2Captcha API
The easiest way to quickly integrate [2Captcha] into your code to automate solving of any types of captcha.

- [Installation](#installation)
  - [Composer](#composer)
  - [Manual](#manual)
- [Configuration](#configuration)
- [Solve captcha](#solve-captcha)
  - [Normal Captcha](#normal-captcha)
  - [Text](#text-captcha)
  - [ReCaptcha v2](#recaptcha-v2)
  - [ReCaptcha v3](#recaptcha-v3)
  - [FunCaptcha](#funcaptcha)
  - [GeeTest](#geetest)
  - [hCaptcha](#hcaptcha)
  - [KeyCaptcha](#keycaptcha)
  - [Capy](#capy)
  - [Grid (ReCaptcha V2 Old Method)](#grid)
  - [Canvas](#canvas)
  - [ClickCaptcha](#clickcaptcha)
  - [Rotate](#rotate)
- [Other methods](#other-methods)
  - [send / getResult](#send--getresult)
  - [balance](#balance)
  - [report](#report)
- [Error handling](#error-handling)


## Installation
This package can be installed via composer or manually

### Composer
```
composer require 2captcha/2captcha
```

### Manual
Copy `src` directory to your project and then `require` autoloader (`src/autoloader.php`) where needed:
```php
require 'path/to/autoloader.php';
```

## Configuration
`TwoCaptcha` instance can be created like this:
```php
$solver = new \TwoCaptcha\TwoCaptcha('YOUR_API_KEY');
```
Also there are few options that can be configured:
```php
$solver = new \TwoCaptcha\TwoCaptcha([
    'apiKey'           => 'YOUR_API_KEY',
    'softId'           => 123,
    'callback'         => 'https://your.site/result-receiver',
    'defaultTimeout'   => 120,
    'recaptchaTimeout' => 600,
    'pollingInterval'  => 10,
]);
```

## Solve captcha
Below shown only base examples for every captcha type. Check out `examples` directory to find more examples with all available options.

### Normal Captcha
```php
$result = $solver->normal('path/to/captcha.jpg');
```
### Text Captcha
```php
$result = $solver->text('If tomorrow is Saturday, what day is today?');
```
### ReCaptcha v2
```php
$result = $solver->recaptcha([
    'sitekey' => '6Le-wvkSVVABCPBMRTvw0Q4Muexq1bi0DJwx_mJ-',
    'url'     => 'https://mysite.com/page/with/recaptcha',
]);
```
### ReCaptcha v3
```php
$result = $solver->recaptcha([
    'sitekey' => '6Le-wvkSVVABCPBMRTvw0Q4Muexq1bi0DJwx_mJ-',
    'url'     => 'https://mysite.com/page/with/recaptcha',
    'version' => 'v3',
]);
```
### FunCaptcha
```php
$result = $solver->funcaptcha([
    'sitekey' => '6Le-wvkSVVABCPBMRTvw0Q4Muexq1bi0DJwx_mJ-',
    'url'     => 'https://mysite.com/page/with/funcaptcha',
]);
```
### GeeTest
```php
$result = $solver->geetest([
    'gt'        => 'f1ab2cdefa3456789012345b6c78d90e',
    'challenge' => '12345678abc90123d45678ef90123a456b',
    'url'       => 'https://www.site.com/page/',
]);
```
### hCaptcha
```php
$result = $solver->hcaptcha([
    'sitekey'   => '10000000-ffff-ffff-ffff-000000000001',
    'url'       => 'https://www.site.com/page/',
]);
```
### KeyCaptcha
```php
$result = $solver->keycaptcha([
    's_s_c_user_id'          => 10,
    's_s_c_session_id'       => '493e52c37c10c2bcdf4a00cbc9ccd1e8',
    's_s_c_web_server_sign'  => '9006dc725760858e4c0715b835472f22-pz-',
    's_s_c_web_server_sign2' => '2ca3abe86d90c6142d5571db98af6714',
    'url'                    => 'https://www.keycaptcha.ru/demo-magnetic/',
]);
```
### Capy
```php
$result = $solver->capy([
    'sitekey' => 'PUZZLE_Abc1dEFghIJKLM2no34P56q7rStu8v',
    'url'     => 'http://mysite.com/',
]);
```
### Grid
```php
$result = $solver->grid('path/to/captcha.jpg');
```
### Canvas
```php
$result = $solver->canvas('path/to/captcha.jpg');
```
### ClickCaptcha
```php
$result = $solver->coordinates('path/to/captcha.jpg');
```
### Rotate
```php
$result = $solver->rotate('path/to/captcha.jpg');
```

## Other methods

### send / getResult
```php
$id = $solver->send(['file' => 'path/to/captcha.jpg', ...]);

sleep(20);

$code = $solver->getResult($id);
```
### balance
```php
$balance = $solver->balance();
```
### report
```php
$solver->report($id, true); // captcha solved correctly
$solver->report($id, false); // captcha solved incorrectly
```

## Error handling
```php
try {
    $result = $solver->text('If tomorrow is Saturday, what day is today?');
} catch (\TwoCaptcha\Exception\ValidationException $e) {
    // invalid parameters passed
} catch (\TwoCaptcha\Exception\NetworkException $e) {
    // network error occurred
} catch (\TwoCaptcha\Exception\ApiException $e) {
    // api respond with error
} catch (\TwoCaptcha\Exception\TimeoutException $e) {
    // captcha is not solved so far
}
```
[2Captcha]: https://2captcha.com/