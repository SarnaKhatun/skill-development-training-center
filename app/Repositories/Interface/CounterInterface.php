<?php

namespace App\Repositories\Interface;
interface CounterInterface
{
    public function all();

    public function store(array $data);

    public function get($id);
    
    public function first();

    public function update(array $data,$id);

    public function delete($id);

    public function statusChange(array $data);
}
