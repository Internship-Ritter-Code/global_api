<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;

class GlobalApiController extends Controller
{
    public function getProvince()
    {
        $province = Province::all();
        $message = 'Success';
        $status = 200;
        return response()->json(['message' => $message, 'status' => $status, 'data' => $province]);
    }

    public function getRegency(Request $request)
    {
        $province_id = $request->province_id;
        if ($province_id) {
            $regency = Regency::where('province_id', $province_id)->get();
        } else {
            $regency = Regency::all();
        }
        $message = 'Success';
        $status = 200;
        return response()->json(['message' => $message, 'status' => $status, 'data' => $regency]);
    }

    public function getDistrict(Request $request)
    {
        $regency_id = $request->regency_id;
        if ($regency_id) {
            $district = District::where('regency_id', $regency_id)->get();
        } else {
            $district = District::all();
        }
        $message = 'Success';
        $status = 200;
        return response()->json(['message' => $message, 'status' => $status, 'data' => $district]);
    }

    public function getDistrictWithProvince(Request $request)
    {
        $district_id = $request->district_id;
        if ($district_id) {
            $district = District::with('regency.regency.province')->where('id', $district_id)->first();
        } else {
            $district = District::with('regency.regency.province')->get();
        }
        $message = 'Success';
        $status = 200;
        return response()->json(['message' => $message, 'status' => $status, 'data' => $district]);
    }
}
