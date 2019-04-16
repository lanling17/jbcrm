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
use App\Services\Helper;
use Illuminate\Http\Request;

class JurisdictionController extends Controller
{
    public function index(){
        $all = Jurisdiction::orderBy('created_at')->get()->toArray();
        $list['arr'] = Helper::_tree($all);
        $list['json'] = json_encode(Helper::_tree_json($all));
//        dd($list);
        return view('jurisdiction.index',compact('list'));
    }

    public function create(){
        return view('jurisdiction.create');
    }

    public function store(Request $request){
        $verif =[
            'name'=>'required|unique:jurisdictions',
            'slug'=>'required|unique:jurisdictions',
            'http_method'=>'required',
            'http_path'=>'required',
            'parent'=>'required'
        ];
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
        $verif = [
            'name'=>'required|unique:jurisdictions,name,'.$id,
            'slug'=>'required|unique:jurisdictions,slug,'.$id,
            'http_method'=>'required',
            'http_path'=>'required',
            'parent'=>'required'
        ];
        $credentials = $this->validate($request,$verif);
        if (Jurisdiction::find($id)->update($credentials)){
            return redirect('jurisdiction')->with('success', config('hint.mod_success'));
        }else{
            return back()->with('hint',config('hint.mod_failure'));
        }
    }

    //删除
    public function destroy($id){
        $juri_son = Jurisdiction::where('parent',$id)->get()->toArray();
        if ($juri_son){
            return back() -> with('hint',config('hint.del_failure_exist'));
        }else{
            if (Jurisdiction::destroy($id)){
                return back() -> with('success',config('hint.del_success'));
            }else{
                return back() -> with('hint',config('hint.del_failure'));
            }
        }

    }
}