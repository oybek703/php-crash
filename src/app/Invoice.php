<?php

namespace App;

class Invoice {
    public function __construct(
        public string $id,
        public int $amount,
        public string $description,
        public string $cardNumber,
    )
    {
    }

    public function __serialize(): array
    {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'description' => $this->description,
            'cardNumber' => base64_encode($this->cardNumber),
        ];
    }

    public function __unserialize(array $data): void
    {
        foreach ($data as $key => $value):
            echo $key  . ' => '. $value . '<br>';
        endforeach;
    }
}