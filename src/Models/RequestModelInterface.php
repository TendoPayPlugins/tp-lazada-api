<?php

declare(strict_types=1);

namespace TendoPay\LazadaApi\Models;

/**
 * Api endpoints
 */
interface RequestModelInterface
{
    function getRoute(): string;

    function toArray(): array;

}
