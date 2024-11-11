<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\JneDestination;
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
        $regency_id = $request->regency_id;
        if ($regency_id) {
            $regency = Regency::find($regency_id);
        } else {
            $regency = Regency::all();
        }
        $message = 'Success';
        $status = 200;
        return response()->json(['message' => $message, 'status' => $status, 'data' => $regency]);
    }

    public function getDistrict(Request $request)
    {
        $district_id = $request->district_id;
        if ($district_id) {
            $district = District::find($district_id);
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
            $district = District::with('regency.province')->where('id', $district_id)->first();
        } else {
            $district = District::with('regency.province')->get();
        }
        $message = 'Success';
        $status = 200;
        return response()->json(['message' => $message, 'status' => $status, 'data' => $district]);
    }

    public function getJneDestination(Request $request)
    {
        $str = $request->q;
        if ($str) {
            $jneDestination = JneDestination::where('name', 'like', '%' . $str . '%')->get();
        } else {
            $jneDestination = JneDestination::all();
        }
        return response()->json(['message' => 'Success', 'status' => 200, 'data' => $jneDestination]);
    }
}
