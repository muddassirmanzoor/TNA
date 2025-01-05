<?php

namespace App\Services;


use App\Models\District;
use App\Models\Tehsil;
use App\Models\User;

class LocationService
{
    public static function getDistricts()
    {
        return User::select('d_name')->distinct('d_name')->where('d_name', '!=', null)->orderBy('d_name')->get();
    }
    public static function getTeacherTypes()
    {
        return User::select('std_name')->distinct('std_name')->get();
    }

    public static function getTeacherQualification()
    {
        return User::select('std_level')->where('std_level', '!=', null)->distinct('std_level')->get();
    }

    public static function getTehsilsByDistrict($districtId)
    {
        return Tehsil::where('district_id', $districtId)->get();
    }
}

