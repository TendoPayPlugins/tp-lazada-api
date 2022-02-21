<?php

namespace TendoPay\LazadaApi;

class LazadaApi
{
    private string $clientId;
    private string $clientSecret;
    private string $callbackUrl;

    public function __construct()
    {
        $this->clientId = getenv('TP_LAZADA_CLIENT_ID');
        $this->clientSecret = getenv('TP_LAZADA_CLIENT_SECRET');
        $this->callbackUrl = getenv('TP_LAZADA_CALLBACK_URL');
    }
}
