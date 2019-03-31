<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;

class ExcelController extends Controller
{
    //导入
    public function import(Request $request){
//        $res = file_get_contents('storage/app/xls/hL9ZVGV6nNVHVRf5uhUKlykIqeestvgDI5cqdjP8.xls');
//        dd($res);
        $path = $request->file('excel')->store('excel');
//        dd($path);
//        $file = explode('/',$path);
//        $fileName = explode('.',$file[1]);

//        $file = $_FILES;
//        $excel_file_path = $file['excel']['tmp_name'];
//        dd($path);
//        $filePath = 'storage/exports/'.iconv('GBK', 'UTF-8', 'nVKoEsbqJ8dyTI26jlLxiLtQT5XAXbMXWdc7Mqm3').'.xls';
//        dd($filePath);
        $filePath = 'storage/app/'.$path;
//        dd($filePath);
        Excel::load($filePath, function($reader) {
            $data = $reader->all();
            dd($data);

        });

//        for($i = 1;$i<count($res);$i++) {
//            $check = Device::where('name', $res[$i][0])->where('title', $res[$i][4])->count();
//            if ($check) {
//                continue;
//            }
//        }

    }

    //导出
    public function export(){
        ini_set('memory_limit','500M');    // 设置内存溢出大小
        set_time_limit(0);                           // 设置超时限制为0分钟
        $users = User::all()->toArray();
//        dd($users);
//        for($i=0;$i<count($users);$i++){
//            $cellData[$i] = array_values($cellData[$i]);
//            $cellData[$i][0] = str_replace('=',' '.'=',$cellData[$i][0]);
//        }
        Excel::create('users',function ($execl) use ($users){
            $execl->sheet('score',function ($sheet) use ($users){
                $sheet->rows($users);
            });
        })->store('xls')->export('xls');
    }
}
