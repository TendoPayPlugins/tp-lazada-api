<?php

namespace TendoPay\LazadaApi;

class LazadaApi
{
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
