<?php

namespace App\Http\Controllers\Admin;

use App\Models\Classify;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ClientController extends Controller
{
    //首页
    public function index(){
        $list = Client::paginate(20);
        foreach ($list as $v){
            $v->classify = Classify::find($v->classify_id)->name;
            $v->created_user = User::find($v->created_id)->name;
        }
        return view('client.index',compact('list',$list));
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
}
