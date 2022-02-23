<?php

declare(strict_types=1);

namespace TendoPay\LazadaApi\Models;

interface RequestModelInterface
{
    public function getRoute(): string;
    public function getRequestType(): string;

    public function toArray(): array;

    public function isResponseCodeError(string $code): bool;
}
