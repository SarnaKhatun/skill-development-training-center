<?php
namespace App\Repositories;
namespace App\Repositories\Interface;
interface ExaminationInterface
{
    public function all();

    public function store(array $data);

    public function get($id);

    public function update(array $data,$id);

    public function delete($id);

}
