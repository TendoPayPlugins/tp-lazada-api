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
        $this->appKey = getenv('TP_LAZADA_APP_KEY');
        $this->appSecret = getenv('TP_LAZADA_APP_SECRET');
        $this->callbackUrl = getenv('TP_LAZADA_CALLBACK_URL');
    }
}
