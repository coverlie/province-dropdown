<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\Amphoe;
use App\District;
class ProvinceController extends Controller
{
    public function index(){
        $provinces = Province::all();

        return view('welcome')->with('provinces', $provinces);
    }

    public function fetchAmphoe(Request $request){
        $amphoes = Amphoe::where('province_id', $request->province_id)->get();
        if($request->province_id != 0){
            $result = "<option value='0'>กรุณาเลือกอำเภอ</option>";
            foreach ($amphoes as $amphoe) {
                $result.="<option value='$amphoe->id'>$amphoe->name_th</option>";
            }
            echo $result;
        }
        else{
            echo "<option value='0'>กรุณาเลือกจังหวัดก่อน</option>";
        }
    }

    public function fetchDistrict(Request $request)
    {
        $districts = District::where('amphoe_id', $request->amphoe_id)->get();
        if ($request->amphoe_id != 0) {
            $result = "<option>กรุณาเลือกตำบล</option>";
            foreach ($districts as $district) {
                $result .= "<option>$district->name_th</option>";
            }
            echo $result;
        } else {
            echo "<option>กรุณาเลือกอำเภอก่อน</option>";
        }
    }
}
