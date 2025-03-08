<?php

namespace App\Repositories;

use App\Models\Upazilla;
use App\Traits\Uploadable;
use App\Repositories\Interface\UpazillaInterface;

class UpazillaRepositories implements UpazillaInterface
{
    use Uploadable;
    public function all()
    {
        return Upazilla::Orderby('name', 'desc')->get();
    }
    public function store(array $data)
    {
        $upazilla = new Upazilla();
        $status = 1;
        if (array_key_exists('status', $data)) {
            if ($data['status'] === null) {
                $status = 0;
            }
        } else {
            $status = 0;
        }
        $upazilla->name = $data['name'];
        //$upazilla->priority=$data['priority'];
        $upazilla->division_id = $data['division_id'];
        $upazilla->district_id = $data['district_id'];
        $upazilla->status = $status;
        $upazilla->save();
    }
    public function get($id)
    {
        return Upazilla::find($id);
    }
    public function update(array $data, $id)
    {
        $upazilla = Upazilla::find($id);
        $status = 1;
        if (array_key_exists('status', $data)) {
            if ($data['status'] === null) {
                $status = 0;
            }
        } else {
            $status = 0;
        }
        $upazilla->name = $data['name'];
        //$upazilla->priority=$data['priority'];
        $upazilla->division_id = $data['division_id'];
        $upazilla->district_id = $data['district_id'];
        $upazilla->status = $status;
        $upazilla->save();
    }
    public function delete($id)
    {
        $upazilla = Upazilla::find($id);
        if (!empty($upazilla)) {
            $upazilla->delete();
        }
    }
    public function statusChange(array $data)
    {
        $upazilla = Upazilla::find($data['id']);
        if ($upazilla) {
            $upazilla->status = $upazilla->status ? 0 : 1;
            $upazilla->save();
        }
    }
}