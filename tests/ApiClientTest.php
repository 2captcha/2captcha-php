<?php

namespace TwoCaptcha\Tests;

use PHPUnit\Framework\TestCase;
use TwoCaptcha\ApiClient;
use TwoCaptcha\Exception\NetworkException;

class ApiClientTest extends TestCase
{
    public function testDestructWithoutDeprecations()
    {
        $apiClient = new ApiClient('http://127.0.0.1:1');

        try {
            $apiClient->res([]);
        } catch (NetworkException $e) {
            // Nothing listens on port 1, the request only creates the CURL handle
        }

        $deprecations = [];
        set_error_handler(function ($errno, $errstr) use (&$deprecations) {
            $deprecations[] = $errstr;
            return true;
        }, E_DEPRECATED);

        unset($apiClient);
        restore_error_handler();

        $this->assertSame([], $deprecations);
    }
}
