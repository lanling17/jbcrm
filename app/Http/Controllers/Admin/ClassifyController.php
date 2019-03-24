<?php

namespace App\Http\Controllers\Admin;

use App\Models\Classify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassifyController extends Controller
{
    //首页
    public function index(){
        $list = Classify::paginate(20);
        return view('client.classify',compact('list',$list));
    }

    //展示(单条)
    public function show(){
        return view('client.classify');
    }

    //添加
    public function create(){
        return view('client.classify');
    }

    //执行添加
    public function store(Request $request){
        $verif = array('name'=>'required|unique:classifies');
        $credentials = $this->validate($request,$verif);
        if (Classify::create($credentials)){
            return redirect('classify')->with('success', config('hint.add_success'));
        }else{
            return back()->with('hint',config('hint.add_failure'));
        }
    }

    //修改
    public function edit(){
        return view('client.classify');
    }

    //执行修改
    public function update(Request $request,$id){
        $verif = array('name'=>'required|unique:classifies,name,'.$id);
        $credentials = $this->validate($request,$verif);
        if(Classify::find($id)->update($credentials)){
            return redirect('classify')->with('success', config('hint.mod_success'));
        }else{
            return back()->with('hint',config('hint.mod_failure'));
        }
    }

    //删除
    public function destroy($id){
        if (Classify::destroy($id)){
            return back() -> with('success',config('hint.del_success'));
        }else{
            return back() -> with('hint',config('hint.del_failure'));
        }
    }
}
