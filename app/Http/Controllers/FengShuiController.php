<?php

namespace App\Http\Controllers;

use App\Models\HouseDirection;
use App\Models\KitchenDirection;
use Illuminate\Http\Request;

class FengShuiController extends Controller
{
    function CallAPI($method, $url, $data = false)
    {
        $curl = curl_init();

        switch ($method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        // Optional Authentication:
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "username:password");

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }

    public function houseDirection(Request $request){
        if($request->method() == 'POST'){
            $data = [
                'year_birth' => $request->year_birth ?? '',
                'gioitinh' => $request->gender ?? '',
                'huongnha' => $request->huongnha ?? ''
            ];
            $detail = $this->CallAPI('POST',"https://www.blogphongthuy.com/dataphongthuy/huongnha.php",$data);
            return view('fengshui.house',compact('detail'));
        }
        return view('fengshui.house');
    }

    public function kitchenDirection(Request $request){
        if($request->method() == 'POST'){
            $data = [
                'dateOfBirth' => date("d-m-Y", strtotime($request->born ?? '')),
                'gioitinh' => $request->gender ?? '',
            ];

            $detail = $this->CallAPI('POST',"https://lichngaytot.com/Ajax/XemHuongNhaAjax",$data);

            return view('fengshui.kitchen',compact('detail'));
        }
        return view('fengshui.kitchen');
    }

    public function color(Request $request){
        if($request->method() == 'POST'){
            $data = [
                'dateOfBirth' => date("d-m-Y", strtotime($request->born ?? '')),
                'gioitinh' => $request->gender ?? '',
            ];

            $detail = $this->CallAPI('POST',"https://lichngaytot.com/Ajax/MauSacTheoPhongThuyAjax",$data);
            return view('fengshui.color',compact('detail'));
        }
        return view('fengshui.color');
    }

    public function yearBuild(Request $request){
        if($request->method() == 'POST'){
            $data = [
                'year_birth' => $request->year_birth ?? '',
                'year_build' => $request->year_build ?? '',
            ];
            $detail = $this->CallAPI('POST',"https://www.blogphongthuy.com/dataphongthuy/tuoixaynha.php",$data);
            return view('fengshui.year-build',compact('detail'));
        }
        return view('fengshui.year-build');
    }

    public function ruler(Request $request){
//        $detail = KitchenDirection::where([
//            ['year','=',$request->year_birth ?? ''],
//            ['gender','=',$request->gender ?? '']
//        ])->first();
        return view('fengshui.ruler');
    }
}
