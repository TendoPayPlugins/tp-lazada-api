<?php

declare(strict_types=1);

namespace TendoPay\LazadaApi\Models;

use TendoPay\LazadaApi\Constants;

class DirectTransferOpenQuery implements RequestModelInterface
{
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
}
