<?php

declare(strict_types=1);

namespace TendoPay\LazadaApi;

use TendoPay\LazadaApi\Exceptions\IncompleteSignatureException;

final class Constants
{
    # General
    public const SIGN_METHOD = 'sha256';

    # Base URLs
    public const PH_BASE_URL = 'https://api.lazada.com.ph/rest';

    /**
     * API Endpoints for Wallet
     * https://open.lazada.com/doc/api.htm?spm=a2o9m.11193494.0.0.757f266blBYXW4#/permission?groupId=54&path=/wallet/transfer/query
     */
    public const API_WALLET_DIRECT_TRANSFER_OPEN_QUERY = '/wallet/transfer/query';
    public const API_WALLET_DIRECT_TRANSFER_OPEN_REQUEST = '/wallet/transfer/request';
    public const API_WALLET_GIFT_CODE_CREATE_OPEN_REQUEST = '/wallet/giftcode/request';
    public const API_WALLET_GIFT_CODE_CREATE_OPEN_QUERY = '/wallet/giftcode/query';

    # Request types
    public const REQUEST_TYPE_POST = 'POST';
    public const REQUEST_TYPE_GET = 'GET';

    # Response codes
    public const INCOMPLETE_SIGNATURE = 'IncompleteSignature';
    public const APP_KEY_INVALID = 'APP_KEY_INVALID';

    # Exception mapping
    public const INCOMPLETE_SIGNATURE_EXCEPTION = IncompleteSignatureException::class;
    public const APP_KEY_INVALID_EXCEPTION = App
}
