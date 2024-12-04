<a href="https://github.com/2captcha/2captcha-python"><img src="https://github.com/user-attachments/assets/37e1d860-033b-4cf3-a158-468fc6b4debc" width="82" height="30"></a>
<a href="https://github.com/2captcha/2captcha-javascript"><img src="https://github.com/user-attachments/assets/4d3b4541-34b2-4ed2-a687-d694ce67e5a6" width="36" height="30"></a>
<a href="https://github.com/2captcha/2captcha-go"><img src="https://github.com/user-attachments/assets/ab22182e-6cb2-41fa-91f4-d5e89c6d7c6f" width="63" height="30"></a>
<a href="https://github.com/2captcha/2captcha-ruby"><img src="https://github.com/user-attachments/assets/0270d56f-79b0-4c95-9b09-4de89579914b" width="75" height="30"></a>
<a href="https://github.com/2captcha/2captcha-cpp"><img src="https://github.com/user-attachments/assets/36de8512-acfd-44fb-bb1f-b7c793a3f926" width="45" height="30"></a>
<a href="https://github.com/2captcha/2captcha-php"><img src="https://github.com/user-attachments/assets/c27d7db5-c20f-47c1-b252-96ee76503b9e" width="52" height="30"></a>
<a href="https://github.com/2captcha/2captcha-java"><img src="https://github.com/user-attachments/assets/a3d923f6-4fec-4c07-ac50-e20da6370911" width="50" height="30"></a>
<a href="https://github.com/2captcha/2captcha-csharp"><img src="https://github.com/user-attachments/assets/f4d449de-780b-49ed-bb0a-b70c82ec4b32" width="38" height="30"></a>

# PHP Module for 2Captcha API (captcha solver)
The easiest way to quickly integrate [2Captcha] captcha solving service into your code to automate solving of any types of captcha.
Examples of API requests for different captcha types are available on the [PHP captcha solver] page.
- [PHP Module for 2Captcha API (captcha solver)](#php-module-for-2captcha-api-captcha-solver)
  - [Installation](#installation)
    - [Composer](#composer)
    - [Manual](#manual)
  - [Configuration](#configuration)
    - [TwoCaptcha instance options](#twocaptcha-instance-options)
  - [Solve captcha](#solve-captcha)
    - [Captcha options](#captcha-options)
    - [Normal Captcha](#normal-captcha)
    - [Text Captcha](#text-captcha)
    - [reCAPTCHA v2](#recaptcha-v2)
    - [reCAPTCHA v3](#recaptcha-v3)
    - [FunCaptcha](#funcaptcha)
    - [GeeTest](#geetest)
    - [GeeTest V4](#geetest-v4)
    - [KeyCaptcha](#keycaptcha)
    - [Capy](#capy)
    - [Grid](#grid)
    - [Canvas](#canvas)
    - [ClickCaptcha](#clickcaptcha)
    - [Rotate](#rotate)
    - [Audio Captcha](#audio)
    - [Yandex](#yandex)
    - [Lemin Cropped Captcha](#lemin-cropped-captcha)
    - [Cloudflare Turnstile](#cloudflare-turnstile)
    - [Amazon WAF](#amazon-waf)
    - [Tencent](#tencent)
    - [MTCaptcha](#mtcaptcha)
    - [Cutcaptcha](#cutcaptcha)
    - [Friendly Captcha](#friendly-captcha)
    - [atbCAPTCHA](#atbcaptcha)
    - [DataDome](#datadome)
    - [CyberSiARA](#cybersiara)
  - [Other methods](#other-methods)
    - [send / getResult](#send--getresult)
    - [balance](#balance)
    - [report](#report)
  - [Proxies](#proxies)
  - [Error handling](#error-handling)
  - [Examples](#examples)
  - [Get in touch](#get-in-touch)
  - [Join the team 👪](#join-the-team-)
  - [License](#license)
    - [Graphics and Trademarks](#graphics-and-trademarks)


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
    'server'           => 'http://rucaptcha.com',
    'apiKey'           => 'YOUR_API_KEY',
    'softId'           => 123,
    'callback'         => 'https://your.site/result-receiver',
    'defaultTimeout'   => 120,
    'recaptchaTimeout' => 600,
    'pollingInterval'  => 10,
]);
```

### TwoCaptcha instance options

| Option           | Default value | Description                                                                                                                                        |
| ---------------- | ------------- | -------------------------------------------------------------------------------------------------------------------------------------------------- |
| softId           | 4585             | your software ID obtained after publishing in [2captcha software catalog]                                                                          |
| callback         | -             | URL of your web-sever that receives the captcha recognition result. The URl should be first registered in [pingback settings] of your account      |
| defaultTimeout   | 120           | Polling timeout in seconds for all captcha types except reCAPTCHA. Defines how long the module tries to get the answer from `res.php` API endpoint |
| recaptchaTimeout | 600           | Polling timeout for reCAPTCHA in seconds. Defines how long the module tries to get the answer from `res.php` API endpoint                          |
| pollingInterval  | 10            | Interval in seconds between requests to `res.php` API endpoint, setting values less than 5 seconds is not recommended                              |

> [!IMPORTANT]
> Once `callback` is defined for `TwoCaptcha` instance, all methods return only the captcha ID and DO NOT poll the API to get the result. The result will be sent to the callback URL.

To get the answer manually use [getResult method](#send--getresult)

## Solve captcha
When you submit any image-based captcha use can provide additional options to help 2captcha workers to solve it properly.

### Captcha options
| Option        | Default Value | Description                                                                                        |
| ------------- | ------------- | -------------------------------------------------------------------------------------------------- |
| numeric       | 0             | Defines if captcha contains numeric or other symbols [see more info in the API docs][post options] |
| minLength     | 0             | minimal answer length                                                                              |
| maxLength     | 0             | maximum answer length                                                                              |
| phrase        | 0             | defines if the answer contains multiple words or not                                               |
| caseSensitive | 0             | defines if the answer is case sensitive                                                            |
| calc          | 0             | defines captcha requires calculation                                                               |
| lang          | -             | defines the captcha language, see the [list of supported languages]                                |
| hintImg       | -             | an image with hint shown to workers with the captcha                                               |
| hintText      | -             | hint or task text shown to workers with the captcha                                                |

Below you can find basic examples for every captcha type. Check out [examples directory] to find more examples with all available options.

### Normal Captcha

<sup>[API method description.](https://2captcha.com/2captcha-api#solving_normal_captcha)</sup>

To bypass a normal captcha (distorted text on image) use the following method. This method also can be used to recognize any text on the image.

```php
$result = $solver->normal('path/to/captcha.jpg');
```

### Text Captcha

<sup>[API method description.](https://2captcha.com/2captcha-api#solving_text_captcha)</sup>

This method can be used to bypass a captcha that requires to answer a question provided in clear text.

```php
$result = $solver->text('If tomorrow is Saturday, what day is today?');
```

### reCAPTCHA v2

<sup>[API method description.](https://2captcha.com/2captcha-api#solving_recaptchav2_new)</sup>

Use this method to solve reCAPTCHA V2 and obtain a token to bypass the protection.

```php
$result = $solver->recaptcha([
    'sitekey' => '6Le-wvkSVVABCPBMRTvw0Q4Muexq1bi0DJwx_mJ-',
    'url'     => 'https://mysite.com/page/with/recaptcha',
]);
```

### reCAPTCHA v3

<sup>[API method description.](https://2captcha.com/2captcha-api#solving_recaptchav3)</sup>

This method provides reCAPTCHA V3 solver and returns a token.

```php
$result = $solver->recaptcha([
    'sitekey' => '6Le-wvkSVVABCPBMRTvw0Q4Muexq1bi0DJwx_mJ-',
    'url'     => 'https://mysite.com/page/with/recaptcha',
    'version' => 'v3',
]);
```

### FunCaptcha

<sup>[API method description.](https://2captcha.com/2captcha-api#solving_funcaptcha_new)</sup>

FunCaptcha (Arkoselabs) solving method. Returns a token.

```php
$result = $solver->funcaptcha([
    'sitekey' => '6Le-wvkSVVABCPBMRTvw0Q4Muexq1bi0DJwx_mJ-',
    'url'     => 'https://mysite.com/page/with/funcaptcha',
]);
```

### GeeTest

<sup>[API method description.](https://2captcha.com/2captcha-api#solving_geetest)</sup>

Method to solve GeeTest puzzle captcha. Returns a set of tokens as JSON.

```php
$result = $solver->geetest([
    'gt'        => 'f1ab2cdefa3456789012345b6c78d90e',
    'challenge' => '12345678abc90123d45678ef90123a456b',
    'url'       => 'https://www.site.com/page/',
]);
```

### GeeTest V4

<sup>[API method description.](https://2captcha.com/2captcha-api#geetest-v4)</sup>

Method to solve GeeTest V4 puzzle captcha. Returns a set of tokens as JSON.

```php
$result = $solver->geetest_v4([
    'captchaId' => '72bf15796d0b69c43867452fea615052',
    'url'       => 'https://mysite.com/captcha.html',
]);
```

### KeyCaptcha

<sup>[API method description.](https://2captcha.com/2captcha-api#solving_keycaptcha)</sup>

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

<sup>[API method description.](https://2captcha.com/2captcha-api#solving_capy)</sup>

Token-based method to bypass Capy puzzle captcha.

```php
$result = $solver->capy([
    'sitekey' => 'PUZZLE_Abc1dEFghIJKLM2no34P56q7rStu8v',
    'url'     => 'http://mysite.com/',
    'api_server' => 'https://jp.api.capy.me/',
]);
```

### Grid

<sup>[API method description.](https://2captcha.com/2captcha-api#grid)</sup>

Grid method is originally called Old reCAPTCHA V2 method. The method can be used to bypass any type of captcha where you can apply a grid on image and need to click specific grid boxes. Returns numbers of boxes.

```php
$result = $solver->grid('path/to/captcha.jpg');
```

### Canvas

<sup>[API method description.](https://2captcha.com/2captcha-api#canvas)</sup>

Canvas method can be used when you need to draw a line around an object on image. Returns a set of points' coordinates to draw a polygon.

```php
$result = $solver->canvas('path/to/captcha.jpg');
```

### ClickCaptcha

<sup>[API method description.](https://2captcha.com/2captcha-api#coordinates)</sup>

ClickCaptcha method returns coordinates of points on captcha image. Can be used if you need to click on particular points on the image.

```php
$result = $solver->coordinates('path/to/captcha.jpg');
```

### Rotate

<sup>[API method description.](https://2captcha.com/2captcha-api#solving_rotatecaptcha)</sup>

This method can be used to solve a captcha that asks to rotate an object. Mostly used to bypass FunCaptcha. Returns the rotation angle.

```php
$result = $solver->rotate('path/to/captcha.jpg');
```

### Audio

<sup>[API method description.](https://2captcha.com/2captcha-api#audio)</sup>

This method can be used to solve a audio captcha

```php
$result = $solver->audio('path/to/audio.mp3');
```

### Yandex

Use this method to solve Yandex and obtain a token to bypass the protection.

```php
$result = $solver->yandex([
    'sitekey' => 'Y5Lh0tiycconMJGsFd3EbbuNKSp1yaZESUOIHfeV',
    'url'     => 'https://rutube.ru',
]);
```

### Lemin Cropped Captcha

<sup>[API method description.](https://2captcha.com/2captcha-api#lemin)</sup>

Use this method to solve Lemin and obtain a token to bypass the protection.

```php
$result = $solver->lemin([
    'captchaId' => 'CROPPED_d3d4d56_73ca4008925b4f83a8bed59c2dd0df6d',
    'apiServer' => 'api.leminnow.com',
    'url'       => 'https://www.site.com/page/',
]);
```

### Cloudflare Turnstile

<sup>[API method description.](https://2captcha.com/2captcha-api#turnstile)</sup>

Use this method to solve Turnstile and obtain a token to bypass the protection.

```php
$result = $solver->turnstile([
    'sitekey' => '0x4AAAAAAAChNiVJM_WtShFf',
    'url'     => 'https://ace.fusionist.io',
]);
```

### Amazon WAF

<sup>[API method description.](https://2captcha.com/2captcha-api#amazon-waf)</sup>

Use this method to solve Amazon WAF and obtain a token to bypass the protection.

```php
$result = $solver->amazon_waf([
    'sitekey' => 'AQIDAHjcYu/GjX+QlghicBgQ/7bFaQZ+m5FKCMDnO+vTbNg96AF5H1K/siwSLK7RfstKtN5bAAAAfjB8BgkqhkiG9w0BBwagbzBtAgEAMGgGCSqGSIb3DQEHATAeBglg',
    'url'     => 'https://non-existent-example.execute-api.us-east-1.amazonaws.com',
    'iv'      => 'test_iv',
    'context' => 'test_context'
]);
```

### Tencent

<sup>[API method description.](https://2captcha.com/2captcha-api#tencent)</sup>

Use this method to bypass Tencent.

```php
$result = $solver->tencent([
    'sitekey' => '123456789',
    'url'     => 'https://www.site.com/page/',
]);
```


### MTCaptcha

<sup>[API method description.](https://2captcha.com/2captcha-api#mtcaptcha)</sup>

Use this method to bypass MTCaptcha.

```php
$result = $solver->mt_captcha([
    'sitekey' => 'MTPublic-KzqLY1cKH',
    'url'     => 'https://2captcha.com/demo/mtcaptcha',
]);
```

### Cutcaptcha

<sup>[API method description.](https://2captcha.com/2captcha-api#cutcaptcha)</sup>

Use this method to bypass Cutcaptcha.

```php
$result = $solver->cutcaptcha([
    'misery_key' => 'a1488b66da00bf332a1488993a5443c79047e752',
    'api_key'    => 'SAb83IIB',
    'url'        => 'https://example.cc/foo/bar.html',
]);
```

### Friendly Captcha

<sup>[API method description.](https://2captcha.com/2captcha-api#friendly-captcha)</sup>

Use this method to bypass Friendly Captcha.

```php
$result = $solver->friendly_captcha([
    'sitekey' => '2FZFEVS1FZCGQ9',
    'url'     => 'https://example.com/',
]);
```

### atbCAPTCHA

<sup>[API method description.](https://2captcha.com/2captcha-api#atb-captcha)</sup>

Use this method to bypass atbCAPTCHA.

```php
$result = $solver->atb_captcha([
    'sitekey'     => 'af23e041b22d000a11e22a230fa8991c',
    'api_server' => 'https://cap.aisecurius.com',
    'url'        => 'https://example.com/',
]);
```

### DataDome

<sup>[API method description.](https://2captcha.com/2captcha-api#datadome)</sup>

Use this method to bypass DataDome.

> [!IMPORTANT]
> To solve the DataDome captcha, you must use a proxy. It is recommended to use [residential proxies].

```php
$result = $solver->datadome([
    'captcha_url'     => 'https://geo.captcha-delivery.com/captcha/?initialCid=AHrlqAAA...P~XFrBVptk&t=fe&referer=https%3A%2F%2Fhexample.com&s=45239&e=c538be..c510a00ea',
    'userAgent' => 'https://cap.aisecurius.com',
    'url'        => 'https://example.com/',
    'proxy'       => [
        'type' => 'HTTPS',
        'uri'  => 'username:str0ngP@$$W0rd@1.2.3.4:4321',
    ],
]);
```

### CyberSiARA

<sup>[API method description.](https://2captcha.com/2captcha-api#cybersiara)</sup>

Use this method to bypass CyberSiARA.

```php
$result = $solver->cybersiara([
    'master_url_id' => 'tpjOCKjjpdzv3d8Ub2E9COEWKt1vl1Mv',
    'pageurl' => 'https://demo.mycybersiara.com/',
    'userAgent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
]);
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

<sup>[API method description.](https://2captcha.com/2captcha-api#additional-methods)</sup>

Use this method to get your account's balance

```php
$balance = $solver->balance();
```

### report

<sup>[API method description.](https://2captcha.com/2captcha-api#complain)</sup>

Use this method to report good or bad captcha answer.

```php
$solver->report($id, true); // captcha solved correctly
$solver->report($id, false); // captcha solved incorrectly
```

## Proxies

You can pass your proxy as an additional argument for methods: recaptcha, funcaptcha, geetest, geetest v4, keycaptcha, capy puzzle, lemin, turnstile, amazon waf and etc. The proxy will be forwarded to the API to solve the captcha.

We have our own proxies that we can offer you. [Buy residential proxies] for avoid restrictions and blocks. [Quick start].

Example solving reCAPTCHA V2 using proxy:

```php
$result = $solver->recaptcha([
    'sitekey'   => '6Le-wvkSVVABCPBMRTvw0Q4Muexq1bi0DJwx_mJ-',
    'url'       => 'https://mysite.com/page/with/recaptcha',
    'proxy'     => [
        'type' => 'HTTPS',
        'uri'  => 'login:password@IP_address:PORT',
    ],
]);
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

## Examples

Examples of solving all supported captcha types are located in the [examples] directory.

## Get in touch

<a href="mailto:support@2captcha.com"><img src="https://github.com/user-attachments/assets/539df209-7c85-4fa5-84b4-fc22ab93fac7" width="80" height="30"></a>
<a href="https://2captcha.com/support/tickets/new"><img src="https://github.com/user-attachments/assets/be044db5-2e67-46c6-8c81-04b78bd99650" width="81" height="30"></a>

## Join the team 👪

There are many ways to contribute, of which development is only one! Find your next job. Open positions: AI experts, scrapers, developers, technical support, and much more! 😍

<a href="mailto:job@2captcha.com"><img src="https://github.com/user-attachments/assets/36d23ef5-7866-4841-8e17-261cc8a4e033" width="80" height="30"></a>

## License

The code in this repository is licensed under the MIT License. See the [LICENSE](./LICENSE) file for more details.

### Graphics and Trademarks

The graphics and trademarks included in this repository are not covered by the MIT License. Please contact <a href="mailto:support@2captcha.com">support</a> for permissions regarding the use of these materials.

<!-- Shared links -->
[2Captcha]: https://2captcha.com/
[2captcha software catalog]: https://2captcha.com/software
[pingback settings]: https://2captcha.com/setting/pingback
[post options]: https://2captcha.com/2captcha-api#normal_post
[list of supported languages]: https://2captcha.com/2captcha-api#language
[examples directory]: /examples
[examples]: /examples
[PHP captcha solver]: https://2captcha.com/lang/php
[Buy residential proxies]: https://2captcha.com/proxy/residential-proxies
[residential proxies]: https://2captcha.com/proxy/residential-proxies
[Quick start]: https://2captcha.com/proxy?openAddTrafficModal=true