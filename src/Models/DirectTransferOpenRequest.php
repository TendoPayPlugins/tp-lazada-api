<?php

declare(strict_types=1);

namespace TendoPay\LazadaApi\Models;

use TendoPay\LazadaApi\Constants;

class DirectTransferOpenRequest implements RequestModelInterface
{
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
            'account_number' => $this->accountNumber
        ];
    }

    public function getRoute(): string
    {
        return Constants::API_WALLET_DIRECT_TRANSFER_OPEN_REQUEST;
    }
}
