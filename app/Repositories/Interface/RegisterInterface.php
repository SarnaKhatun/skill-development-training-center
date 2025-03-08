<?php

namespace App\Repositories\Interface;
interface RegisterInterface
{
    public function all();

    public function store(array $data);
}
