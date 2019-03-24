@extends('layouts.admin')
@section('title','客户修改')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-10">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>客户修改</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="form_basic.html#">选项1</a>
                                </li>
                                <li><a href="form_basic.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    @include('layouts.admin_hint')
                    <div class="ibox-content">
                        <form action={{url('client/'.$info['id'])}} class="form-horizontal m-t" method="POST" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="_method" value="put"/>
                            <!-- 分类ID -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">分类：</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="classify_id">
                                        @foreach($classifies as $classify)
                                        <option value={{$classify->id}} {{$classify->id == $info['classify_id'] ? 'selected' : ''}}>{{$classify->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- 姓名 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">姓名：</label>
                                <div class="col-sm-8">
                                    <input  name="name" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" value="{{$info['name']}}">
                                </div>
                            </div>
                            <!-- 联系人 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">联系人：</label>
                                <div class="col-sm-8">
                                    <input name="contacts" class="form-control" type="text" value="{{$info['contacts']}}">
                                </div>
                            </div>
                            <!-- 性别 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">性别：</label>
                                <div class="col-sm-8">
                                  <div class="radio radio-info radio-inline">
                                      <input type="radio" id="inlineRadio1" value="1" name="sex" {{$info['sex'] == 1 ? 'checked' : ''}}>
                                      <label for="inlineRadio1"> 男</label>
                                  </div>
                                  <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio0" value="0" name="sex" {{$info['sex'] == 0 ? 'checked' : ''}}>
                                        <label for="inlineRadio0"> 女 </label>
                                    </div>
                                </div>
                            </div>
                            <!-- 邮箱 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">邮箱：</label>
                                <div class="col-sm-8">
                                    <input name="email" class="form-control" type="email" value="{{$info['email']}}">
                                </div>
                            </div>
                            <!-- 联系电话 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">联系电话：</label>
                                <div class="col-sm-8">
                                    <input name="phone" class="form-control" type="text" value="{{$info['phone']}}">
                                </div>
                            </div>
                            <!-- 年龄 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">年龄：</label>
                                <div class="col-sm-8">
                                    <input name="age" class="form-control" type="number" value="{{$info['age']}}">
                                </div>
                            </div>
                            <!-- 公司外部标签 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">公司外部标签：</label>
                                <div class="col-sm-8">
                                    <input name="out_lable" class="form-control" type="text" value="{{$info['out_lable']}}">
                                </div>
                            </div>
                            <!-- 公司内部标签 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">公司内部标签：</label>
                                <div class="col-sm-8">
                                    <input name="in_lable" class="form-control" type="text" value="{{$info['in_lable']}}">
                                </div>
                            </div>
                            <!-- 性质 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">性质：</label>
                                <div class="col-sm-8">
                                    <input name="nature" class="form-control" type="text" value="{{$info['nature']}}">
                                </div>
                            </div>
                            <!-- 微信 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">微信：</label>
                                <div class="col-sm-8">
                                    <input name="wx_char" class="form-control" type="text" value="{{$info['wx_char']}}">
                                </div>
                            </div>
                            <!-- 重要等级 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">重要等级：</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="important_grade">
                                        @foreach(config('hint.important_grade') as $k=>$important_grade)
                                        <option value={{$k}} {{$info['important_grade'] == $k ? 'selected' : ''}}>{{$important_grade}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- 合作过的项目 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">合作过的项目：</label>
                                <div class="col-sm-8">
                                    <input name="cooperationed" class="form-control" type="text" value="{{$info['cooperationed']}}">
                                </div>
                            </div>
                            <!-- 合作中的项目 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">合作中的项目：</label>
                                <div class="col-sm-8">
                                    <input name="cooperationing" class="form-control" type="text" value="{{$info['cooperationing']}}">
                                </div>
                            </div>
                            <!-- 规模 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">规模：</label>
                                <div class="col-sm-8">
                                    <input name="scale" class="form-control" type="text" value="{{$info['scale']}}">
                                </div>
                            </div>
                            <!-- HTTP方法： -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">备注：</label>
                                <div class="col-sm-8">
                                     <textarea style="width: 100%;height: 100px;resize: none;" name="remarks">{{$info['remarks']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
                                    <button class="btn btn-primary" type="submit">提交</button>
                                    <a class="btn btn-outline btn-default" href={{url("client")}} >返回</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
