<?php

namespace App\Common\Domain\Payloads;

abstract class Payload
{
    protected $data = null;

    protected $status = 200;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
