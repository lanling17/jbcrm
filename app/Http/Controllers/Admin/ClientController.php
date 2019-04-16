<?php

namespace App\Http\Controllers\Admin;

use App\Models\Classify;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Excel;

class ClientController extends Controller
{
    //首页
    public function index(Request $request){
//        $classify = Classify::all();
        /*if ($request->all()){
            $data['classify_id'] = $request->classify_id;
            $data['name'] = $request->name;

            if ($request->classify_id != 0 && $request->name != null){
                $list = Client::where('classify_id',$request->classify_id)->where('name','LIKE','%'.$request->name.'%')->paginate(config('hint.a_num'));
                $list->setPath(env('APP_URL').'/client?classify_id='.$data['classify_id'].'&name='.$data['name']);
            }elseif($request->classify_id != 0 && $request->name == null){
                $list = Client::where('classify_id',$request->classify_id)->paginate(config('hint.a_num'));
                $list->setPath(env('APP_URL').'/client?classify_id='.$data['classify_id']);
            }else{
                $list = Client::where('name','LIKE','%'.$request->name.'%')->paginate(config('hint.a_num'));
                $list->setPath(env('APP_URL').'/client?name='.$data['name']);
            }

        }else{
            $data['classify_id'] = 0;
            $data['name'] = null;
            $data['page'] = 1;
            $list = Client::paginate(config('hint.a_num'));
        }*/
        $data['page'] = $request->page ? $request->page : 1;
        $list = Client::paginate(20);
        return view('client.index',compact('list','data'));
    }

    //展示(单条)
    public function show(Client $client){
        return view('client.show',compact('client'));
    }

    //添加
    public function create(){
        $classifies = Classify::all();
        return view('client.create',compact('classifies'));
    }

    //执行添加
    public function store(Request $request){
        $verif = ['classify_id'=>'required',
            'name' => 'required',
            'contacts' => 'required',
            'sex' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'company' => 'required',
            'position' => 'required',
            'out_lable' => 'required',
            'in_lable' => 'required',
            'nature' => 'required',
            'wx_char' => 'required',
            'important_grade' => 'required',
            'remarks' => 'required',
            'cooperationing' => 'required',
            'cooperationed' => 'required',
            'scale' => 'required'];
        $credentials = $this->validate($request,$verif);
        $credentials['created_id'] = Auth::id();
        $credentials['updated_id'] = Auth::id();
        if (Client::create($credentials)){
            return redirect('client')->with('success', config('hint.add_success'));
        }else{
            return back()->with('hint',config('hint.add_failure'));
        }
    }

    //修改
    public function edit($id){
        $classifies = Classify::all();
        $info = Client::find($id)->toArray();
        return view('client.edit',compact('classifies','info'));
    }

    //执行修改
    public function update(Request $request,$id){
        $verif = ['classify_id'=>'required',
            'name' => 'required',
            'contacts' => 'required',
            'sex' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'company' => 'required',
            'position' => 'required',
            'out_lable' => 'required',
            'in_lable' => 'required',
            'nature' => 'required',
            'wx_char' => 'required',
            'important_grade' => 'required',
            'remarks' => 'required',
            'cooperationing' => 'required',
            'cooperationed' => 'required',
            'scale' => 'required'];
        $credentials = $this->validate($request,$verif);
        $credentials['updated_id'] = Auth::id();
        if(Client::find($id)->update($credentials)){
            return redirect('client')->with('success', config('hint.mod_success'));
        }else{
            return back()->with('hint',config('hint.mod_failure'));
        }
    }

    //删除
    public function destroy($id){
        if (Client::destroy($id)){
            return back() -> with('success',config('hint.del_success'));
        }else{
            return back() -> with('hint',config('hint.del_failure'));
        }
    }

    //导入
    public function import(Request $request){
        $path = $request->file('excel')->store('excel');
        $filePath = 'storage/app/'.$path;
        Excel::load($filePath, function($reader) {
            $results = $reader->getSheet(0)->toArray();
            $num = 0;
            if ($results){
                unset($results[0]);//去除表头
                foreach ($results as $v){
                    $data = [];
                    $data['classify_id'] = $v[0] == null ? '1':floor(trim($v[0]));
                    $data['name'] = $v[3] == null ? '':trim($v[1]);
                    $data['sex'] = floor(trim($v[2]));
                    $data['email'] = $v[3] == null ? '空值':trim($v[3]);
                    $data['phone'] = $v[4] == null ? '空值':floor(trim($v[4]));
                    $data['age'] = $v[5] == floor(trim($v[5]));
                    $data['nature'] = $v[6] == null ? '空值':trim($v[6]);
                    $data['wx_char'] = $v[7] == null ? '空值':trim($v[7]);
                    $data['company'] = $v[8] == null ? '空值':trim($v[8]);
                    $data['position'] = $v[9] == null ? '空值':trim($v[9]);
                    $data['contacts'] = $v[10] == null ? '空值':trim($v[10]);
                    $data['important_grade'] = floor(trim($v[11]));
                    $data['out_lable'] = $v[12] == null ? '空值':trim($v[12]);
                    $data['in_lable'] = $v[13] == null ? '空值':trim($v[13]);
                    $data['cooperationing'] = $v[14] == null ? '空值':trim($v[14]);
                    $data['cooperationed'] = $v[15] == null ? '空值':trim($v[15]);
                    $data['scale'] = $v[16] == null ? '空值':trim($v[16]);
                    $data['remarks'] = $v[17] == null ? '空值':trim($v[17]);
                    $data['created_id'] = Auth::id();
                    $data['updated_id'] = Auth::id();
                    if(Client::create($data)){
                        $num++;
                        echo '导入'.$num.'条信息成功！<br>';
                    }
                }
                echo '<a href="'.url('client').'">返回列表</a>';
            }

        });

    }

    //导出
    public function export(Request $request){
        $ify = $request->classify_id;
        $name = $request->name;
        $page = $request->page;
//        dd($ify,$name,$page);
        $start = $page * config('hint.a_num');
        if ($ify != 0 && $name != null){
            $list = Client::where('classify_id',$ify)->where('name','LIKE','%'.$name.'%')->limit($start,config('hint.a_num'))->get();
        }elseif($ify != 0 && $name == null){
            $list = Client::where('classify_id',$ify)->limit($start,config('hint.a_num'))->get();
        }elseif($ify == 0 && $name == null){
            $list = Client::where('name','LIKE','%'.$name.'%')->limit($start,config('hint.a_num'))->get();
        }else{
            $list = Client::limit($start,config('hint.a_num'))->get();
        }
        if ($list){
            $listArray = $list->toArray();
            ini_set('memory_limit','500M');    // 设置内存溢出大小
            set_time_limit(0);                           // 设置超时限制为0分钟
            Excel::create('clients',function ($execl) use ($listArray){
                $execl->sheet('score',function ($sheet) use ($listArray){
                    $sheet->rows($listArray);
                });
            })->export('xls');
        }
    }
}
