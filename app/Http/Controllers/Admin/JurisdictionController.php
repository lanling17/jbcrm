<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/28 0028
 * Time: 23:32
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Jurisdiction;
use Illuminate\Http\Request;

class JurisdictionController extends Controller
{
    public function index(){
        $list = Jurisdiction::paginate(config('hint.a_num'));
        return view('jurisdiction.index',compact('list'));
    }

    public function create(){
        return view('jurisdiction.create');
    }

    public function store(Request $request){
        $verif = array('name'=>'required|unique:jurisdictions',
            'slug'=>'required|unique:jurisdictions',
            'http_method'=>'required',
            'http_path'=>'required');
        $credentials = $this->validate($request,$verif);
        if (Jurisdiction::create($credentials)){
            return redirect('jurisdiction')->with('success', config('hint.add_success'));
        }else{
            return back()->with('hint',config('hint.add_failure'));
        }
    }

    //修改
    public function edit($id){
        $info = Jurisdiction::find($id)->toArray();
        return view('jurisdiction.edit',compact('info'));
    }

    //执行修改
    public function update(Request $request,$id){
        $verif = array('name'=>'required|unique:jurisdictions,name,'.$id,
            'slug'=>'required|unique:jurisdictions,slug,'.$id,
            'http_method'=>'required',
            'http_path'=>'required');
        $credentials = $this->validate($request,$verif);
        if (Jurisdiction::find($id)->update($credentials)){
            return redirect('jurisdiction')->with('success', config('hint.mod_success'));
        }else{
            return back()->with('hint',config('hint.mod_failure'));
        }
    }

    //删除
    public function destroy($id){
        if (Jurisdiction::destroy($id)){
            return back() -> with('success',config('hint.del_success'));
        }else{
            return back() -> with('hint',config('hint.del_failure'));
        }
    }
}