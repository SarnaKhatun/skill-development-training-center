<?php

namespace App\Repositories;

use App\Models\District;
use App\Traits\Uploadable;
use App\Repositories\Interface\DistrictInterface;

class DistrictRepositories implements DistrictInterface
{
    use Uploadable;
    public function all()
    {
        return District::Orderby('name', 'desc')->get();
    }
    public function store(array $data)
    {
        $district = new District();
        $status = 1;
        if (array_key_exists('status', $data)) {
            if ($data['status'] === null) {
                $status = 0;
            }
        } else {
            $status = 0;
        }
        $district->name = $data['name'];
        // $district->priority=$data['priority'];
        $district->division_id = $data['division_id'];
        $district->status = $status;
        $district->save();
    }
    public function get($id)
    {
        return District::find($id);
    }
    public function update(array $data, $id)
    {
        $district = District::find($id);
        $status = 1;
        if (array_key_exists('status', $data)) {
            if ($data['status'] === null) {
                $status = 0;
            }
        } else {
            $status = 0;
        }
        $district->name = $data['name'];
        // $district->priority=$data['priority'];
        $district->division_id = $data['division_id'];
        $district->status = $status;
        $district->save();
    }
    public function delete($id)
    {
        $district = District::find($id);
        if (!empty($district)) {
            $district->delete();
        }
    }
    public function statusChange(array $data)
    {
        $district = District::find($data['id']);
        if ($district) {
            $district->status = $district->status ? 0 : 1;
            $district->save();
        }
    }
}