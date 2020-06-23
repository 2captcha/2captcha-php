# PHP Module for 2Captcha API
The easiest way to quickly integrate [2Captcha] captcha solving service into your code to automate solving of any types of captcha.

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
Below you can find basic examples for every captcha type. Check out `examples` directory to find more examples with all available options.

### Normal Captcha
To bypass a normal captcha (distorted text on image) use the following method. This method also can be used to recognize any text on the image.
```php
$result = $solver->normal('path/to/captcha.jpg');
```
### Text Captcha
This method can be used to bypass a captcha that requires to answer a question provided in clear text.
```php
$result = $solver->text('If tomorrow is Saturday, what day is today?');
```
### ReCaptcha v2
Use this method to solve ReCaptcha V2 and obtain a token to bypass the protection.
```php
$result = $solver->recaptcha([
    'sitekey' => '6Le-wvkSVVABCPBMRTvw0Q4Muexq1bi0DJwx_mJ-',
    'url'     => 'https://mysite.com/page/with/recaptcha',
]);
```
### ReCaptcha v3
This method provides ReCaptcha V3 solver and returns a token.
```php
$result = $solver->recaptcha([
    'sitekey' => '6Le-wvkSVVABCPBMRTvw0Q4Muexq1bi0DJwx_mJ-',
    'url'     => 'https://mysite.com/page/with/recaptcha',
    'version' => 'v3',
]);
```
### FunCaptcha
FunCaptcha (Arkoselabs) solving method. Returns a token.
```php
$result = $solver->funcaptcha([
    'sitekey' => '6Le-wvkSVVABCPBMRTvw0Q4Muexq1bi0DJwx_mJ-',
    'url'     => 'https://mysite.com/page/with/funcaptcha',
]);
```
### GeeTest
Method to solve GeeTest puzzle captcha. Returns a set of tokens as JSON.
```php
$result = $solver->geetest([
    'gt'        => 'f1ab2cdefa3456789012345b6c78d90e',
    'challenge' => '12345678abc90123d45678ef90123a456b',
    'url'       => 'https://www.site.com/page/',
]);
```
### hCaptcha
Use this method to solve hCaptcha challenge. Returns a token to bypass captcha.
```php
$result = $solver->hcaptcha([
    'sitekey'   => '10000000-ffff-ffff-ffff-000000000001',
    'url'       => 'https://www.site.com/page/',
]);
```
### KeyCaptcha
Token-based method to solve KeyCaptcha.
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
Token-based method to bypass Capy puzzle captcha.
```php
$result = $solver->capy([
    'sitekey' => 'PUZZLE_Abc1dEFghIJKLM2no34P56q7rStu8v',
    'url'     => 'http://mysite.com/',
]);
```
### Grid
Grid method is originally called Old ReCaptcha V2 method. The method can be used to bypass any type of captcha where you can apply a grid on image and need to click specific grid boxes. Returns numbers of boxes.
```php
$result = $solver->grid('path/to/captcha.jpg');
```
### Canvas
Canvas method can be used when you need to draw a line around an object on image. Returns a set of points' coordinates to draw a polygon.
```php
$result = $solver->canvas('path/to/captcha.jpg');
```
### ClickCaptcha
ClickCaptcha method returns coordinates of points on captcha image. Can be used if you need to click on particular points on the image.
```php
$result = $solver->coordinates('path/to/captcha.jpg');
```
### Rotate
This method can be used to solve a captcha that asks to rotate an object. Mostly used to bypass FunCaptcha. Returns the rotation angle.
```php
$result = $solver->rotate('path/to/captcha.jpg');
```

## Other methods

### send / getResult
These methods can be used for manual captcha submission and answer polling.
```php
$id = $solver->send(['file' => 'path/to/captcha.jpg', ...]);

sleep(20);

$code = $solver->getResult($id);
```
### balance
Use this method to get your account's balance
```php
$balance = $solver->balance();
```
### report
Use this method to report good or bad captcha answer.
```php
$solver->report($id, true); // captcha solved correctly
$solver->report($id, false); // captcha solved incorrectly
```

## Error handling
If case of an error captch solver throws an exception. It's important to properly handle these cases. We recommend to use `try catch` to handle exceptions. 
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