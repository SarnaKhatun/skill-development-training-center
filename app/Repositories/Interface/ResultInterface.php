<?php

namespace App\Repositories\Interface;
interface ResultInterface
{
    public function all();

    public function store(array $data);

    public function get($id);

    public function update(array $data,$id);

    public function delete($id);
}
