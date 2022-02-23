<?php

declare(strict_types=1);

namespace TendoPay\LazadaApi\Models;

use TendoPay\LazadaApi\Constants;

class GiftCodeCreateOpenQuery implements RequestModelInterface
{
    private string $transferOrderId;

    private array $errors = [
        Constants::GIFT_CODE_LOCK_CONFLICT,
        Constants::OPEN_API_CALL_EXCEED_LIMIT,
        Constants::PROCEED_TRANSFER_EXCEPTION,
        Constants::USER_IS_NOT_LOGGED_IN,
        Constants::APP_KEY_INVALID,
        Constants::TRANSFER_ERROR_TRANSFER_ORDER_ID_INVALID,
        Constants::GIFT_CODE_QUERY_EMPTY
    ];

    public function __construct(
        string $transferOrderId
    ) {
        $this->transferOrderId = $transferOrderId;
    }

    public function toArray(): array
    {
        return [
            'transfer_order_id' => $this->transferOrderId
        ];
    }

    public function getRoute(): string
    {
        return Constants::API_WALLET_GIFT_CODE_CREATE_OPEN_QUERY;
    }

    public function getRequestType(): string
    {
        return Constants::REQUEST_TYPE_POST;
    }

    public function isResponseCodeError(string $code): bool
    {
        return in_array($code, $this->errors);
    }
}
