@extends('layouts.admin')
@section('title','添加权限')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>添加权限</h5>
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
                        <form action={{url('jurisdiction')}} class="form-horizontal m-t" method="POST" enctype="multipart/form-data">
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
                            <!-- HTTP方法： -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">请求方式：</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="http_method">
                                      @foreach(config('hint.HTTP') as $v)
                                       <option value={{$v}}>{{$v}}</option>
                                       @endforeach
                                    </select>
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点提示的内容</span>
                                </div>
                            </div>
                            <!-- HTTP方法： -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">请求地址：</label>
                                <div class="col-sm-8">
                                     <textarea style="width: 100%;height: 100px;resize: none;" name="http_path">{{old('http_path')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
                                    <button class="btn btn-primary" type="submit">提交</button>
                                    <a class="btn btn-outline btn-default" href={{url("jurisdiction")}} >返回</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
