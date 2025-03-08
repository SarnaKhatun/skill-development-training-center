<?php

use App\Models\Setting;
use App\Models\District;
use App\Models\Division;
use App\Models\Upazilla;


if (!function_exists('get_divisions')) {
    function get_divisions()
    {
        return Division::all();
    }
}
if (!function_exists('get_districts')) {
    function get_districts($id)
    {
        return District::all();
    }
}
if (!function_exists('get_upazillas')) {
    function get_upazillas($id)
    {
        return Upazilla::all();
    }
}
if (!function_exists('get_district_by_division_id')) {
    function get_district_by_division_id($id)
    {
        return District::where('division_id', $id)->get();
    }
}
if (!function_exists('get_upazilla_by_district_id')) {
    function get_upazilla_by_district_id($id)
    {
        return Upazilla::where('district_id', $id)->get();
    }
}

if (!function_exists('generateYearList')) {
    function generateYearList()
    {
        $years = range(1995, 2035);
        rsort($years);
        return $years;
    }
    if (!function_exists('get_setting')) {
        function get_setting($name)
        {
            return Setting::where('name', $name)->first();
        }
    }
}


