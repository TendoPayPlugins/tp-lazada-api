<?php

namespace TendoPay\LazadaApi;

use TendoPay\LazadaApi\Traits\ApiCallable;

final class LazadaApi
{
    use ApiCallable;

    private string $appKey;
    private string $appSecret;
    private string $callbackUrl;

    public function __construct()
    {
        $this->appKey = config('lazada.api_key', '');
        $this->appSecret = config('lazada.api_secret', '');
        $this->callbackUrl = config('lazada.callback_url', '');
    }
}
