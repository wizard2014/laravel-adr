<?php

namespace App\Common\Domain;

interface ServiceInterface
{
    public function handle($data = []);
}
