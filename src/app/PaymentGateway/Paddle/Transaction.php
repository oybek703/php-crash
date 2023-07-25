<?php

namespace App\PaymentGateway\Paddle;

use App\Enums\Status;
use http\Exception\InvalidArgumentException;

class Transaction
{
    public string $status;

    public function __construct()
    {
        $this->setStatus(Status::PENDING);
    }

    public function setStatus($status): self
    {
        if (!isset(Status::ALL_STATUSES[$status])) {
            throw new \InvalidArgumentException('Invalid Status!');
        }
        $this->status = $status;
        return $this;
    }

}