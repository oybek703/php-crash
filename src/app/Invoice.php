<?php

declare(strict_types=1);

namespace App;

class
Invoice
{
    private string $name = 'Test';
    private int $accountId = 324567890765432;

    public function __debugInfo(): ?array
    {
        return [
            'name' => $this->name,
            'account_id' => '****   ' . substr((string)$this->accountId, -4),
        ];
    }

}