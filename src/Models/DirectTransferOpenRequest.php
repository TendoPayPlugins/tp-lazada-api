<?php

declare(strict_types=1);

namespace TendoPay\LazadaApi\Models;

use TendoPay\LazadaApi\Constants;

class DirectTransferOpenRequest implements RequestModelInterface
{
    private array $errors = [
        Constants::OPEN_DIRECT_TRANSFER_LOCK_CONFLICT,
        Constants::TRANSFER_ERROR_MSG_RESPONSED_FAILED,
        Constants::TRANSFER_ERROR_MSG_UNKNOWN_FAILED,
        Constants::TRANSFER_ERROR_MSG_USER_NOT_FOUND,
        Constants::TRANSFER_VALUE_UNMATCHED,
        Constants::TRANSFER_USER_UNMATCHED,
        Constants::TRANSFER_ERROR_ACCOUNT_NUMBER_INVALID,
        Constants::OPEN_DIRECT_TRANSFER_INTERNAL_FAIL,
        Constants::TRANSFER_ERROR_TRANSFER_ORDER_ID_INVALID,
        Constants::TRANSFER_ERROR_MSG_AMOUNT_INVALID,
        Constants::APP_KEY_INVALID,
        Constants::USER_IS_NOT_LOGGED_IN,
        Constants::PROCEED_TRANSFER_EXCEPTION,
        Constants::OPEN_API_CALL_EXCEED_LIMIT,
        Constants::BIZ_DEGRADATION_ERROR,
        Constants::OPEN_API_TIMESTAMP_INVALID,
        Constants::TRANSFER_ERROR_MSG_WALLET_INACTIVATED,
    ];

    private string $transferOrderId;
    private string $amount;
    private string $accountNumber;

    public function __construct(
        string $transferOrderId,
        string $amount,
        string $accountNumber
    ) {
        $this->transferOrderId = $transferOrderId;
        $this->amount = $amount;
        $this->accountNumber = $accountNumber;
    }

    public function toArray(): array
    {
        return [
            'transfer_order_id' => $this->transferOrderId,
            'amount' => $this->amount,
            'account_number' => $this->accountNumber,
        ];
    }

    public function getRoute(): string
    {
        return Constants::API_WALLET_DIRECT_TRANSFER_OPEN_REQUEST;
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
