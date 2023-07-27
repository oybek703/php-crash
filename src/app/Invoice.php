<?php

declare(strict_types=1);

namespace App;

class Invoice
{
    public function __construct(
        public int $id,
        public string $desc,
        public string $cardNumber
    ) {
    }


    public function __sleep(): array
    {
        return ['id', 'desc'];
    }


    public function __serialize(): array
    {
     return [
         'id' => $this->id,
         'desc' => $this->desc,
         'cardNumber' => base64_encode($this->cardNumber),
     ];
    }

    public function __unserialize(array $data): void
    {

        var_dump($data);
    }

}