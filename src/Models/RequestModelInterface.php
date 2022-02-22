<?php

declare(strict_types=1);

namespace TendoPay\LazadaApi\Models;

/**
 * Api endpoints
 */
interface RequestModelInterface
{
    public function getRoute(): string;

    public function toArray(): array;
}
