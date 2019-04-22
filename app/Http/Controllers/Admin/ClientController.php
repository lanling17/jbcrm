<?php

namespace App\Http\Controllers\Admin;

use App\Models\Classify;
use App\Models\Client;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Excel;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    //首页
    public function index(Request $request){
        $data['field'] = $request->field;
        $data['value'] = $request->value;
        $data['page'] = $request->page ? $request->page : 1;
        if ($data['field'] != null){
            $list = Client::where($data['field'],'LIKE','%'.$data['value'].'%')->OrderBy('created_at','desc')->paginate(config('hint.a_num'));
            $list->setPath(env('APP_URL').'/client?field='.$data['field'].'&value='.$data['value']);
        }else{
            $list = Client::Orderby('created_at','desc')->paginate(config('hint.a_num'));
        }
        return view('client.index',compact('list','data'));
    }

    //展示(单条)
    public function show(Client $client){
        $files['pic'] = File::where('type',1)->where('user_id',$client->id)->get();
        $files['visiting_card'] = File::where('type',2)->where('user_id',$client->id)->first();
        return view('client.show',compact('client','files'));
    }

    //添加
    public function create(){
        $classifies = Classify::all();
        return view('client.create',compact('classifies'));
    }

    //执行添加
    public function store(Request $request){
        $verif = [
            'name' => 'required',
            'sex' => 'required',
            'birthday' => 'required',
            'company_full' => 'required',
            'company_short' => 'required',
            'email' => 'required',
            'telephone' => 'required|max:11',
            'wx_char' => 'required',
            'address' => 'required',
        ];
        $message = [
            'name.required' => '姓名 不能为空',
            'birthday.required' => '生日 不能为空',
            'company_full.required' => '公司全称 不能为空',
            'company_short.required' => '公司简称 不能为空',
            'telephone.required' => '联系电话 不能为空',
            'wx_char.required' => '微信 不能为空',
        ];
        $credentials = $this->validate($request,$verif,$message);
        //公司
        $credentials['company'] = $credentials['company_full'].','.$credentials['company_short'];
        unset($credentials['company_full']);
        unset($credentials['company_short']);
        //职位
        if ($request->position && $request->position_qt){
            $credentials['position'] = implode(',',$request->position).','.$request->position_qt;
        }elseif($request->position && !$request->position_qt){
            $credentials['position'] = implode(',',$request->position);
        }elseif(!$request->position && $request->position_qt){
            $credentials['position'] = $request->position_qt;
        }else{
            return back()->with('hint','请选择职位或者填写');
        }
        //行业
        if ($request->industry && $request->industry_qt){
            $credentials['industry'] = implode(',',$request->industry).','.$request->position_qt;
        }elseif($request->industry && !$request->industry_qt){
            $credentials['industry'] = implode(',',$request->industry);
        }elseif(!$request->industry && $request->industry_qt){
            $credentials['industry'] = $request->industry_qt;
        }else{
            return back()->with('hint','请选择行业或者填写');
        }
        //关系
        if ($request->relation && $request->relation_qt){
            $credentials['relation'] = implode(',',$request->relation).','.$request->relation_qt;
        }elseif($request->relation && !$request->relation_qt){
            $credentials['relation'] = implode(',',$request->relation);
        }elseif(!$request->relation && $request->relation_qt){
            $credentials['relation'] = $request->relation_qt;
        }else{
            return back()->with('hint','请选择关系或者填写');
        }
        //地区
        if ($request->area_qt){
            $credentials['area'] = $request->area_qt;
        }else{
            $credentials['area'] = $request->province.'-'.$request->city.'-'.$request->district;
        }
        //可为空的字段 合作过中的项目，合作过的项目,备注
        if ($request->cooperationing){
            $credentials['cooperationing'] = $request->cooperationing;
        }
        if ($request->cooperationed){
            $credentials['cooperationed'] = $request->cooperationed;
        }
        if ($request->remark){
            $credentials['remark'] = $request->remark;
        }
        $credentials['created_id'] = Auth::id();
        $credentials['updated_id'] = Auth::id();
//        dd($credentials);
        if ($result = Client::create($credentials)){
            //照片上传
            if ($request->picture){
                $pictture['type'] = 1;
                $pictture['user_id'] = $result->id;
                foreach ($request->picture as $pic){
                    $pictture['url'] = $pic->store('public/picture/'.$result->id);
                    File::create($pictture);
                }

            }
            //名片上传
            if ($request->visiting_card){
                $visiting_card['type'] = 2;
                $visiting_card['user_id'] = $result->id;
                $visiting_card['url'] = $request->visiting_card->store('public/visiting_card/'.$result->id);
                File::create($visiting_card);
            }

            return redirect('client')->with('success', config('hint.add_success'));
        }else{
            return back()->with('hint',config('hint.add_failure'));
        }
    }

    //修改
    public function edit($id){
        $classifies = Classify::all();
        $info = Client::find($id)->toArray();
        $company = explode(',',$info['company']);
        $info['company_full'] = $company[0];
        $info['company_short'] = $company[1];

        $position = explode(',',$info['position']);
        $info['pjiao'] = array_intersect($position,config('hint.position'));
        $info['position_qt'] = implode(',',array_diff($position,$info['pjiao']));

        $industry = explode(',',$info['industry']);
        $info['ijiao'] = array_intersect($industry,config('hint.industry'));
        $info['industry_qt'] = implode(',',array_diff($industry,$info['ijiao']));

        $relation = explode(',',$info['relation']);
        $info['rjiao'] = array_intersect($relation,config('hint.relation'));
        $info['relation_qt'] = implode(',',array_diff($relation,$info['rjiao']));

        $info['picture'] = File::where('type',1)->where('user_id',$id)->get();
        $info['visiting_card'] = File::where('type',2)->where('user_id',$id)->first();
        return view('client.edit',compact('classifies','info'));
    }

    //执行修改
    public function update(Request $request,$id){
        $verif = [
            'name' => 'required',
            'sex' => 'required',
            'birthday' => 'required',
            'company_full' => 'required',
            'company_short' => 'required',
            'email' => 'required',
            'telephone' => 'required|max:11',
            'wx_char' => 'required',
            'address' => 'required',
        ];
        $message = [
            'name.required' => '姓名 不能为空',
            'birthday.required' => '生日 不能为空',
            'company_full.required' => '公司全称 不能为空',
            'company_short.required' => '公司简称 不能为空',
            'telephone.required' => '联系电话 不能为空',
            'wx_char.required' => '微信 不能为空',
        ];
        $credentials = $this->validate($request,$verif,$message);
        $credentials = $this->validate($request,$verif,$message);
        //公司
        $credentials['company'] = $credentials['company_full'].','.$credentials['company_short'];
        unset($credentials['company_full']);
        unset($credentials['company_short']);
        //职位
        if ($request->position && $request->position_qt){
            $credentials['position'] = implode(',',$request->position).','.$request->position_qt;
        }elseif($request->position && !$request->position_qt){
            $credentials['position'] = implode(',',$request->position);
        }elseif(!$request->position && $request->position_qt){
            $credentials['position'] = $request->position_qt;
        }else{
            return back()->with('hint','请选择职位或者填写');
        }
        //行业
        if ($request->industry && $request->industry_qt){
            $credentials['industry'] = implode(',',$request->industry).','.$request->position_qt;
        }elseif($request->industry && !$request->industry_qt){
            $credentials['industry'] = implode(',',$request->industry);
        }elseif(!$request->industry && $request->industry_qt){
            $credentials['industry'] = $request->industry_qt;
        }else{
            return back()->with('hint','请选择行业或者填写');
        }
        //关系
        if ($request->relation && $request->relation_qt){
            $credentials['relation'] = implode(',',$request->relation).','.$request->relation_qt;
        }elseif($request->relation && !$request->relation_qt){
            $credentials['relation'] = implode(',',$request->relation);
        }elseif(!$request->relation && $request->relation_qt){
            $credentials['relation'] = $request->relation_qt;
        }else{
            return back()->with('hint','请选择关系或者填写');
        }
        //地区
        if ($request->area_qt){
            $credentials['area'] = $request->area_qt;
        }else{
            $credentials['area'] = $request->province.'-'.$request->city.'-'.$request->district;
        }
        //可为空的字段 合作过中的项目，合作过的项目,备注
        if ($request->cooperationing){
            $credentials['cooperationing'] = $request->cooperationing;
        }
        if ($request->cooperationed){
            $credentials['cooperationed'] = $request->cooperationed;
        }
        if ($request->remark){
            $credentials['remark'] = $request->remark;
        }
        $credentials['updated_id'] = Auth::id();
        if(Client::find($id)->update($credentials)){
            //照片上传
            if ($request->picture){
                $pictture['type'] = 1;
                $pictture['user_id'] = $id;
                foreach ($request->picture as $pic){
                    $pictture['url'] = $pic->store('public/picture/'.$id);
                    File::create($pictture);
                }

            }
            //名片上传
            if ($request->visiting_card){
                $visiting_card['url'] = $request->visiting_card->store('public/visiting_card/'.$id);
                if ($request->fid){
                    $file = File::find($request->fid);
                    Storage::delete($file->url);
                    $file->update($visiting_card);
                }else{
                    $visiting_card['type'] = 2;
                    $visiting_card['user_id'] = $id;
                    File::create($visiting_card);
                }

            }
            return redirect('client')->with('success', config('hint.mod_success'));
        }else{
            return back()->with('hint',config('hint.mod_failure'));
        }
    }

    //删除
    public function destroy($id){
        $files = File::where('user_id',$id)->get()->toArray();
        if ($files){
            foreach($files as $file){
                $fids[] = $file['id'];
                Storage::delete($file['url']);
            }
            File::destroy($fids);
        }
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
                    $data['name'] = $v[0] == null ? '':trim($v[0]);
                    $data['sex'] = floor(trim($v[1]));
                    $birthday = explode('/',$v[2]);
                    $data['birthday'] = $birthday[2].'-'.$birthday[0].'-'.$birthday[1];
                    $data['company'] = $v[3] == null ? '空值':trim($v[3]);
                    $data['position'] = $v[4] == null ? '空值':trim($v[4]);
                    $data['email'] = $v[5] == null ? '空值':trim($v[5]);
                    $data['telephone'] = floor(trim($v[6]));
                    $data['wx_char'] = $v[7] == null ? '空值':trim($v[7]);
                    $data['area'] = $v[8] == null ? '空值':trim($v[8]);
                    $data['address'] = $v[9] == null ? '空值':trim($v[9]);
                    $data['industry'] = $v[10] == null ? '空值':trim($v[10]);
                    $data['relation'] = $v[11] == null ? '空值':trim($v[11]);
                    $data['cooperationing'] = $v[12] == null ? '空值':trim($v[12]);
                    $data['cooperationed'] = $v[13] == null ? '空值':trim($v[13]);
                    $data['remark'] = $v[14] == null ? '空值':trim($v[14]);
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
        $field = $request->field;
        $value = $request->value;
        $page = $request->page;
//        dd($ify,$name,$page);
        $start = $page * config('hint.a_num');
        if ($field != null){
            $list = Client::where($field,'LIKE','%'.$value.'%')->OrderBy('created_at','desc')->limit($start,config('hint.a_num'))->get();
        }else{
            $list = Client::Orderby('created_at','desc')->limit($start,config('hint.a_num'))->get();
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

    //删除图片
    public function delPicture(Request $request){
        $file = File::find($request->fid);
        if (!$file){
            return response(['code'=>'001','msg'=>'该文件不存在']);
        }

        if (File::destroy($request->fid)){
            Storage::delete($file->url);
            return response(['code'=>'002','msg'=>'删除成功！']);
        }else{
            return response(['code'=>'003','msg'=>'删除失败，请稍后再试']);
        }
    }
}
