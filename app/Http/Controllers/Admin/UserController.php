<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Services\Upload;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $list = User::paginate(config('hint.a_num'));
        foreach ($list as $v){
            $v->roles = UserRole::getUserRoleName($v->id);
        }
        return view('user.index',compact('list'));
    }

    public function create(){
        $roles = Role::all();
        return view('user.create',compact('roles'));
    }

    //执行添加
    public function store(Request $request){
        $verif = array('username'=>'required|unique:users',
            'password'=>'required',
            'password_confirmation'=>'required',
            'mobile'=>'required|numeric|unique:users',
            'email'=>'required|unique:users',
            'name'=>'required',
            'head_pic'=>'required');
        $credentials = $this->validate($request,$verif);
        unset($credentials['password_confirmation']);
        $credentials['password'] = bcrypt($credentials['password']);
        //上传头像
        $head_pic = Upload::baseUpload($credentials['head_pic'],'uploads/User');
        if ($head_pic){
            $credentials['head_pic'] = $head_pic;
        }else{
            return back() -> with('hint',config('hint.upload_failure'));
        }
        $result = User::create($credentials);
        if ($result){
            //添加角色
            foreach ($request->role_ids as $rid){
                UserRole::create(['user_id'=>$result->id,'role_id'=>$rid]);
            }
            return redirect('user')->with('success', config('hint.add_success'));
        }else{
            return back()->with('hint',config('hint.add_failure'));
        }

    }

    //修改
    public function edit($id){
        $info = User::find($id)->toArray();
        $info['role_ids'] = UserRole::getUserRoleId($id);
        $roles = Role::all();
        return view('user.edit',compact('info','roles'));
    }

    //执行修改
    public function update(Request $request,$id){
        $verif = array('username'=>'required|unique:users,username,'.$id,
            'mobile'=>'required|numeric|unique:users,mobile,'.$id,
            'email'=>'required|unique:users,email,'.$id,
            'name'=>'required');
        $credentials = $this->validate($request,$verif);
        //密码验证
        if ($request->get('newpwd')){
            if ($request->get('newpwd') == $request->get('newpwd_confirmation')){
                $credentials['password'] = bcrypt($request->get('newpwd'));
            }else{
                return back() -> with('hint',config('hint.password_two'));
            }
        }
        //图像上传
        if ($request->head_pic){
            $head_pic = Upload::baseUpload($request->head_pic,'uploads/User');
            if ($head_pic){
                $credentials['head_pic'] = $head_pic;
                if (is_file(public_path($request->admin_old_pic))){
                    unlink(public_path($request->admin_old_pic));
                }
            }else{
                return back() -> with('hint',config('hint.upload_failure'));
            }
        }else{
            $credentials['head_pic'] = $request->get('admin_old_pic');
        }
        if(User::find($id)->update($credentials)){
            $oldIds = UserRole::getUserRoleId($id);
            //计算原数组与新数组的交集
            $jiao = array_intersect($oldIds,$request->role_ids);
            //原数组去掉交集部分，剩下的删除
            $oldRemain = array_diff($oldIds,$jiao);
            if ($oldRemain){
                foreach ($oldRemain as $oid){
                    UserRole::where('user_id',$id)->where('role_id',$oid)->delete();
                }
            }
            //新数组同样去掉交集部分，剩下的增加
            $newRemain = array_diff($request->role_ids,$jiao);
            if ($newRemain){
                foreach ($newRemain as $nid){
                    UserRole::create(['user_id'=>$id,'role_id'=>$nid]);
                }
            }
            return redirect('user')->with('success', config('hint.mod_success'));
        }else{
            return back()->with('hint',config('hint.mod_failure'));
        }
    }

    //删除
    public function destroy($id){
        $Obj = User::find($id);
        if (!$Obj){
            return back() -> with('hint',config('hint.data_exist'));
        }
        if (User::destroy($id)){
            //删除静态资源图片
            if (is_file(public_path($Obj->head_pic))){
                unlink(public_path($Obj->head_pic));
            }
            //查出用户与用户角色关系表关联数据并删除
            $userRole = UserRole::where('user_id',$id)->get();
            foreach ($userRole as $ur){
                UserRole::destroy($ur->id);
            }
            return back() -> with('success',config('hint.del_success'));
        }else{
            return back() -> with('hint',config('hint.del_failure'));
        }
    }
}