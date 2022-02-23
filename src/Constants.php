<?php

declare(strict_types=1);

namespace TendoPay\LazadaApi;

use TendoPay\LazadaApi\Exceptions\AppKeyInvalidException;
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
    public const APP_WHITE_IP_LIMIT = 'AppWhiteIpLimit';
    public const APP_KEY_INVALID = 'APP_KEY_INVALID';
    public const TRANSFER_ERROR_MSG_USER_NOT_FOUND = 'TRANSFER_ERROR_MSG_USER_NOT_FOUND';
    public const TRANSFER_ERROR_ACCOUNT_NUMBER_INVALID = 'TRANSFER_ERROR_ACCOUNT_NUMBER_INVALID';
    public const TRANSFER_ERROR_TRANSFER_ORDER_ID_INVALID = 'TRANSFER_ERROR_TRANSFER_ORDER_ID_INVALID';
    public const TRANSFER_ERROR_MSG_RESPONSED_FAILED = 'TRANSFER_ERROR_MSG_RESPONSED_FAILED';
    public const TRANSFER_ERROR_MSG_UNKNOWN_FAILED = 'TRANSFER_ERROR_MSG_UNKNOWN_FAILED';
    public const OPEN_DIRECT_TRANSFER_INTERNAL_FAIL = 'OPEN_DIRECT_TRANSFER_INTERNAL_FAIL';
    public const TRANSFER_ERROR_MSG_AMOUNT_INVALID = 'TRANSFER_ERROR_MSG_AMOUNT_INVALID';
    public const USER_IS_NOT_LOGGED_IN = 'USER_IS_NOT_LOGGED_IN';
    public const PROCEED_TRANSFER_EXCEPTION = 'PROCEED_TRANSFER_EXCEPTION';
    public const OPEN_API_CALL_EXCEED_LIMIT = 'OPEN_API_CALL_EXCEED_LIMIT';
    public const OPEN_DIRECT_TRANSFER_LOCK_CONFLICT = 'OPEN_DIRECT_TRANSFER_LOCK_CONFLICT';
    public const TRANSFER_VALUE_UNMATCHED = 'TRANSFER_VALUE_UNMATCHED';
    public const TRANSFER_USER_UNMATCHED = 'TRANSFER_USER_UNMATCHED';
    public const BIZ_DEGRADATION_ERROR = 'BIZ_DEGRADATION_ERROR';
    public const OPEN_API_TIMESTAMP_INVALID = 'OPEN_API_TIMESTAMP_INVALID';
    public const TRANSFER_ERROR_MSG_WALLET_INACTIVATED = 'TRANSFER_ERROR_MSG_WALLET_INACTIVATED';
    public const TRANSFER_ERROR_MSG_QUANTITY_INVALID = 'TRANSFER_ERROR_MSG_QUANTITY_INVALID';
    public const GIFT_CODE_LOCK_CONFLICT = 'GIFT_CODE_LOCK_CONFLICT';
    public const BATCH_CREATE_ERROR = 'BATCH_CREATE_ERROR';
    public const BALANCE_ACCOUNT_NOT_ENOUGH = 'BALANCE_ACCOUNT_NOT_ENOUGH';
    public const GIFT_CODE_QUERY_EMPTY = 'GIFT_CODE_QUERY_EMPTY';
    public const NO_RESPONSE = '0';
}
