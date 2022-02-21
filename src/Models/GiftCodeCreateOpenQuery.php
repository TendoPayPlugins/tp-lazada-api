<?php

declare(strict_types=1);

namespace TendoPay\LazadaApi\Models;

use TendoPay\LazadaApi\Constants;

class GiftCodeCreateOpenRequest implements RequestModelInterface
{
    private string $transferOrderId;
    private string $amount;
    private int $quantity;
    private int $startTimestamp;
    private int $endTimestamp;

    public function __construct(
        string $transferOrderId,
        string $amount,
        int $quantity,
        int $startTimestamp,
        int $endTimestamp
    ) {
        $this->transferOrderId = $transferOrderId;
        $this->amount = $amount;
        $this->quantity = $quantity;
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
        return Constants::API_WALLET_GIFT_CODE_CREATE_OPEN_QUERY;
    }
}
