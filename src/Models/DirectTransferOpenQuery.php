<?php

declare(strict_types=1);

namespace TendoPay\LazadaApi\Models;

use TendoPay\LazadaApi\Constants;

final class DirectTransferOpenQuery implements RequestModelInterface
{
    private array $errors = [
        Constants::TRANSFER_ERROR_MSG_RESPONSED_FAILED,
        Constants::TRANSFER_ERROR_MSG_UNKNOWN_FAILED,
        Constants::OPEN_DIRECT_TRANSFER_INTERNAL_FAIL,
        Constants::TRANSFER_ERROR_MSG_AMOUNT_INVALID,
        Constants::APP_KEY_INVALID,
        Constants::USER_IS_NOT_LOGGED_IN,
        Constants::PROCEED_TRANSFER_EXCEPTION,
        Constants::OPEN_API_CALL_EXCEED_LIMIT,
    ];

    private string $transferOrderId;

    public function __construct(
        string $transferOrderId
    ) {
        $this->transferOrderId = $transferOrderId;
    }

    public function toArray(): array
    {
        return [
            'transfer_order_id' => $this->transferOrderId,
        ];
    }

    public function getRoute(): string
    {
        return Constants::API_WALLET_DIRECT_TRANSFER_OPEN_QUERY;
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
