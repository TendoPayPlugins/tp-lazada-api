<?php

declare(strict_types=1);

namespace TendoPay\LazadaApi\Models;

use TendoPay\LazadaApi\Constants;

class GiftCodeCreateOpenRequest implements RequestModelInterface
{
    private array $errors = [
        Constants::OPEN_API_TIMESTAMP_INVALID,
        Constants::BIZ_DEGRADATION_ERROR,
        Constants::OPEN_API_CALL_EXCEED_LIMIT,
        Constants::PROCEED_TRANSFER_EXCEPTION,
        Constants::USER_IS_NOT_LOGGED_IN,
        Constants::APP_KEY_INVALID,
        Constants::TRANSFER_ERROR_TRANSFER_ORDER_ID_INVALID,
        Constants::TRANSFER_ERROR_MSG_AMOUNT_INVALID,
        Constants::TRANSFER_ERROR_MSG_QUANTITY_INVALID,
        Constants::GIFT_CODE_LOCK_CONFLICT,
        Constants::BATCH_CREATE_ERROR,
        Constants::BALANCE_ACCOUNT_NOT_ENOUGH,
    ];

    private string $amount;
    private int $quantity;
    private string $transferOrderId;
    private int $startTimestamp;
    private int $endTimestamp;


    public function __construct(
        string $amount,
        int $quantity,
        string $transferOrderId,
        int $startTimestamp,
        int $endTimestamp
    ) {
        $this->amount = $amount;
        $this->quantity = $quantity;
        $this->transferOrderId = $transferOrderId;
        $this->startTimestamp = $startTimestamp;
        $this->endTimestamp = $endTimestamp;
    }

    public function toArray(): array
    {
        return [
            'transfer_order_id' => $this->transferOrderId,
            'amount' => $this->amount,
            'quantity' => $this->quantity,
            'start_timestamp' => $this->startTimestamp,
            'end_timestamp' => $this->endTimestamp,
        ];
    }

    public function getRoute(): string
    {
        return Constants::API_WALLET_GIFT_CODE_CREATE_OPEN_REQUEST;
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
