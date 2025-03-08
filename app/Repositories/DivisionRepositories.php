<?php

namespace App\Repositories;

use App\Models\Division;
use App\Traits\Uploadable;
use App\Repositories\Interface\DivisionInterface;

class DivisionRepositories implements DivisionInterface
{
    use Uploadable;
    public function all()
    {
        return Division::Orderby('name', 'asc')->get();
    }
    public function store(array $data)
    {
        $division = new Division();
        $status = 1;
        if (array_key_exists('status', $data)) {
            if ($data['status'] === null) {
                $status = 0;
            }
        } else {
            $status = 0;
        }
        $division->name = $data['name'];
        //  $division->priority =$data['priority'];
        $division->status = $status;
        $division->save();
    }
    public function get($id)
    {
        return Division::find($id);
    }
    public function update(array $data, $id)
    {
        $division = Division::find($id);
        $status = 1;
        if (array_key_exists('status', $data)) {
            if ($data['status'] === null) {
                $status = 0;
            }
        } else {
            $status = 0;
        }
        $division->name = $data['name'];
        //  $division->priority =$data['priority'];
        $division->status = $status;
        $division->save();
    }
    public function delete($id)
    {
        $division = Division::find($id);
        if (!empty($division)) {
            $division->delete();
        }
    }
    public function statusChange(array $data)
    {
        //dd($data);
        $division = Division::find($data['id']);
        if ($division) {
            $division->status = $division->status ? 0 : 1;
            $division->save();
        }
    }
}