<?php

namespace App;

class InvoiceCollection implements \Iterator
{

    private int $key;

    public function __construct(public array $invoices)
    {
    }

    public function current()
    {
        echo __METHOD__ . '<br>';
        echo  'THIS IS KEY => ' . $this->key;
        return $this->invoices[$this->key];
    }

    public function next()
    {
        echo __METHOD__ . '<br>';
        ++$this->key;
    }

    public function key()
    {
        echo __METHOD__ . '<br>';
        return $this->key;
    }

    public function valid()
    {
        echo __METHOD__ . '<br>';
        return isset($this->invoices[$this->key]);
    }

    public function rewind()
    {
        echo __METHOD__ . '<br>';
        $this->key = 0;
    }
}