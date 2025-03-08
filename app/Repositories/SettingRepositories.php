<?php

namespace App\Repositories;

use App\Models\Setting;
use App\Traits\Uploadable;
use Illuminate\Support\Str;
use App\Repositories\Interface\SettingInterface;

class SettingRepositories implements SettingInterface
{
    use Uploadable;
    public function all()
    {
        return Setting::Orderby('id', 'asc')->get();
    }
    public function store(array $data)
    {
        if (isset($data['type'])) {
            foreach ($data['type'] as $type) {
                if (isset($data[$type])) {
                    $value = $data[$type];
                    $newSetting = new Setting();
                    $newSetting->name = $type;
                    $newSetting->value = $value;
                    $newSetting->save();
                }
            }
        }
        if (array_key_exists('header_logo', $data)) {
            $header_logo = $this->uploadOne($data['header_logo'], 70, 80, 'backend/images/setting/', true);
            $setting = Setting::where('name', 'header_logo')->first();
            if ($setting) {
                $setting->value = $header_logo;
                $setting->save();
            }
        }
        if (array_key_exists('footer_logo', $data)) {
            $footer_logo = $this->uploadOne($data['footer_logo'], 700, 800, 'backend/images/setting/', true);
            $setting = Setting::where('name', 'footer_logo')->first();
            if ($setting) {
                $setting->value = $footer_logo;
                $setting->save();
            }
        }
        if (array_key_exists('fav_icon', $data)) {
            $fav_icon = $this->uploadOne($data['fav_icon'], 70, 80, 'backend/images/setting/', true);
            $setting = Setting::where('name', 'fav_icon')->first();
            if ($setting) {
                $setting->value = $fav_icon;
                $setting->save();
            }
        }
    }
    public function get($id)
    {
        return Setting::find($id);
    }
    public function first()
    {
        return Setting::latest()->first();
    }
    public function update(array $data, $id)
    {
        if (isset($data['type'])) {
            foreach ($data['type'] as $type) {
                if (isset($data[$type])) {
                    $value = $data[$type];
                    $existingSetting = Setting::where('name', $type)->first();
                    if (!$existingSetting) {
                        $newSetting = new Setting();
                        $newSetting->name = $type;
                        $newSetting->value = $value;
                        $newSetting->save();
                    } else {
                        $existingSetting->value = $value;
                        $existingSetting->save();
                    }
                }
            }
        }
        if (array_key_exists('header_logo', $data)) {
            $header_logo = $this->uploadOne($data['header_logo'], 70, 80, 'backend/images/setting/', true);
            $existingSetting = Setting::where('name', 'header_logo')->first();
            if ($existingSetting) {
                $this->deleteOne($existingSetting->value);
                $existingSetting->value = $header_logo;
                $existingSetting->save();
            }
        } else {
            $setting = Setting::where('name', 'header_logo')->first();
            if ($setting) {
                $setting->value = $setting->value;
                $setting->save();
            }
        }
        if (array_key_exists('footer_logo', $data)) {
            $footer_logo = $this->uploadOne($data['footer_logo'],70, 80, 'backend/images/setting/', true);
            $existingSetting = Setting::where('name', 'footer_logo')->first();
            if ($existingSetting) {
                //$this->deleteOne($existingSetting->value);
                $existingSetting->value = $footer_logo;
                $existingSetting->save();
            }
        } else {
            $setting = Setting::where('name', 'footer_logo')->first();
            if ($setting) {
                $setting->value = $setting->value;
                $setting->save();
            }
        }
        if (array_key_exists('fav_icon', $data)) {
            $fav_icon = $this->uploadOne($data['fav_icon'], 70, 80, 'backend/images/setting/', true);
            $existingSetting = Setting::where('name', 'fav_icon')->first();
            if ($existingSetting) {
               // $this->deleteOne($existingSetting->value);
                $existingSetting->value = $fav_icon;
                $existingSetting->save();
            }
        } else {
            $setting = Setting::where('name', 'fav_icon')->first();
            if ($setting) {
                $setting->value = $setting->value;
                $setting->save();
            }
        }

    }
    public function delete($id)
    {

    }
}