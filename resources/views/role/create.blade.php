@extends('layouts.admin')
@section('title','添加角色')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>添加角色</h5>
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
                        <form action={{url('role')}} class="form-horizontal m-t" id="signupForm" method="POST" enctype="multipart/form-data">
                          @csrf
                            <!-- 名称： -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">名称：</label>
                                <div class="col-sm-8">
                                    <input  name="name" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" value="{{old('name')}}">
                                </div>
                            </div>
                            <!-- 标识： -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">标识：</label>
                                <div class="col-sm-8">
                                    <input name="slug" class="form-control" type="text" value="{{old('slug')}}">
                                    <!-- <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点提示的内容</span> -->
                                </div>
                            </div>
                            <!-- 权限： -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">权限：</label>
                                <div class="col-sm-8">
                                  @foreach($jurisdiction as $juri)
                                  <div class="checkbox checkbox-success checkbox-inline">
                                     <input type="checkbox" id="inlineCheckbox{{$juri->id}}" value="{{$juri->id}}" name="juri_ids[]">
                                     <label for="inlineCheckbox{{$juri->id}}"> {{$juri->name}} </label>
                                 </div>
                                 @endforeach
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 勾选需要给予的权限</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
                                    <button class="btn btn-primary" type="submit">提交</button>
                                    <a class="btn btn-outline btn-default" href={{url("role")}} >返回</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
