<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/28 0028
 * Time: 23:29
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Jurisdiction;
use App\Models\Role;
use App\Models\RoleJurisdiction;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //列表
    public function index(){
        $list = Role::paginate(config('hint.a_num'));
        foreach ($list as $v){
            $v->jurisdictions = RoleJurisdiction::getRoleJurisdictionName($v->id);
        }
        return view('role.index',compact('list'));
    }

    public function create(){
        $jurisdiction = Jurisdiction::all();
        return view('role.create',compact('jurisdiction'));
    }

    public function store(Request $request){
        $verif = array('name'=>'required|unique:roles','slug'=>'required|unique:roles');
        $credentials = $this->validate($request,$verif);
        $result = Role::create($credentials);
        if ($result){
            //添加角色与权限关系表关系
            foreach ($request->juri_ids as $juri_id){
                RoleJurisdiction::create(['role_id'=>$result->id,'jurisdiction_id'=>$juri_id]);
            }
            return redirect('role')->with('success',config('hint.add_success'));
        }else{
            return back()->with('hint',config('hint.add_failure'));
        }
    }

    //修改
    public function edit($id){
        $info = Role::find($id)->toArray();
        $jurisdiction = Jurisdiction::all();
        $info['jurisdiction'] = RoleJurisdiction::getRoleJurisdictionId($id);
        return view('role.edit',compact('info','jurisdiction'));
    }

    //执行修改
    public function update(Request $request,$id){
        $verif = array('name'=>'required|unique:roles,name,'.$id,'slug'=>'required|unique:roles,slug,'.$id);
        $credentials = $this->validate($request,$verif);
        if (Role::find($id)->update($credentials)){
            $oldIds = RoleJurisdiction::getRoleJurisdictionId($id);
            //计算原数组与新数组的交集
            $jiao = array_intersect($oldIds,$request->juri_ids);
            //原数组去掉交集部分，剩下的删除
            $oldRemain = array_diff($oldIds,$jiao);
            if ($oldRemain){
                foreach ($oldRemain as $oid){
                    RoleJurisdiction::where('role_id',$id)->where('jurisdiction_id',$oid)->delete();
                }
            }
            //新数组同样去掉交集部分，剩下的增加
            $newRemain = array_diff($request->juri_ids,$jiao);
            if ($newRemain){
                foreach ($newRemain as $nid){
                    RoleJurisdiction::create(['role_id'=>$id,'jurisdiction_id'=>$nid]);
                }
            }
            return redirect('role')->with('success', config('hint.mod_success'));
        }else{
            return back()->with('hint',config('hint.mod_failure'));
        }

    }

    //删除
    public function destroy($id){
        if (Role::destroy($id)){
            //查出角色与角色权限关系表关联数据并删除
            $roleJurisdiction = RoleJurisdiction::where('role_id',$id)->get();
            foreach ($roleJurisdiction as $rj){
                RoleJurisdiction::destroy($rj->id);
            }
            return back() -> with('success',config('hint.del_success'));
        }else{
            return back() -> with('hint',config('hint.del_failure'));
        }
    }
}