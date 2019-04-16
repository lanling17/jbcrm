@extends('layouts.admin')
@section('title','添加客户')
@section('content')


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-10">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>添加客户</h5>
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
                        <form action="{{url('client')}}" class="form-horizontal m-t" method="POST" enctype="multipart/form-data">
                          @csrf
                            <!-- 姓名 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">姓名：</label>
                                <div class="col-sm-8">
                                    <input  name="name" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" value="{{old('name')}}">
                                </div>
                            </div>

                            <!-- 性别 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">性别：</label>
                                <div class="col-sm-8">
                                  <div class="radio radio-info radio-inline">
                                      <input type="radio" id="inlineRadio1" value="1" name="sex" checked>
                                      <label for="inlineRadio1"> 男</label>
                                  </div>
                                  <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio0" value="0" name="sex">
                                        <label for="inlineRadio0"> 女 </label>
                                    </div>
                                </div>
                            </div>
                             <!-- 出生日期 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">出生日期：</label>
                                <div class="col-sm-6">
                                  <input class="laydate-icon form-control layer-date" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})">
                                </div>
                            </div>
                             <!-- 公司(全称) -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">公司(全称)：</label>
                                <div class="col-sm-8">
                                    <input name="company_full" class="form-control" type="text" value="{{old('company')}}">
                                </div>
                            </div>
                            <!-- 公司(简称) -->
                           <div class="form-group">
                               <label class="col-sm-3 control-label">公司(简称)：</label>
                               <div class="col-sm-8">
                                   <input name="company_short" class="form-control" type="text" value="{{old('company')}}">
                               </div>
                           </div>
                            <!-- 职位 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">职位：</label>
                                <div class="col-sm-8">
                                    <input name="position" class="form-control" type="text" value="{{old('position')}}">
                                </div>
                            </div>
                            <!-- 邮箱 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">邮箱：</label>
                                <div class="col-sm-8">
                                    <input name="email" class="form-control" type="email" value="{{old('email')}}">
                                </div>
                            </div>
                            <!-- 电话 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">电话：</label>
                                <div class="col-sm-8">
                                    <input name="contacts" class="form-control" type="text" value="{{old('contacts')}}">
                                </div>
                            </div>
                            <!-- 微信 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">微信：</label>
                                <div class="col-sm-8">
                                    <input name="phone" class="form-control" type="text" value="{{old('phone')}}">
                                </div>
                            </div>

                            <!-- 地区 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">地区：</label>
                                <div class="col-sm-8">
                                    <input name="out_lable" class="form-control" type="text" value="{{old('out_lable')}}">
                                </div>
                            </div>
                            <!-- 联系地址 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">联系地址：</label>
                                <div class="col-sm-8">
                                    <input name="in_lable" class="form-control" type="text" value="{{old('in_lable')}}">
                                </div>
                            </div>
                            <!-- 所在行业 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">所在行业：</label>
                                <div class="col-sm-8">
                                    <!-- <input name="nature" class="form-control" type="text" value="{{old('nature')}}"> -->
                                    <div class="input-group">
                                        <select data-placeholder="选择行业" class="chosen-select" multiple style="width:350px;" tabindex="4">
                                            <option value="">请选择行业</option>
                                            <option value="110000" hassubinfo="true">北京</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- 关系 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">关系：</label>
                                <div class="col-sm-8">
                                    <input name="wx_char" class="form-control" type="text" value="{{old('wx_char')}}">
                                </div>
                            </div>
                            <!-- 合作过的项目 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">合作过的项目：</label>
                                <div class="col-sm-8">
                                    <input name="cooperationed" class="form-control" type="text" value="{{old('cooperationed')}}">
                                </div>
                            </div>
                            <!-- 合作中的项目 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">合作中的项目：</label>
                                <div class="col-sm-8">
                                    <input name="cooperationing" class="form-control" type="text" value="{{old('cooperationing')}}">
                                </div>
                            </div>
                            <!-- 备注 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">备注：</label>
                                <div class="col-sm-8">
                                     <textarea style="width: 100%;height: 100px;resize: none;" name="remarks">{{old('remarks')}}</textarea>
                                </div>
                            </div>
                            <!-- 照片（多张） -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">照片（多张）：</label>
                                <div class="col-sm-8">
                                     <textarea style="width: 100%;height: 100px;resize: none;" name="remarks">{{old('remarks')}}</textarea>
                                </div>
                            </div>
                            <!-- 名片 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">名片：</label>
                                <div class="col-sm-8">
                                     <textarea style="width: 100%;height: 100px;resize: none;" name="remarks">{{old('remarks')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
                                    <button class="btn btn-primary" type="submit">提交</button>
                                    <a class="btn btn-outline btn-default" href="javascript:history.go(-1)" >返回</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('hplus/js/plugins/layer/laydate/laydate.js')}}"></script>
    <script src="{{asset('hplus/js/plugins/chosen/chosen.jquery.js')}}"></script>
    <!-- <script src="{{asset('hplus/js/demo/form-advanced-demo.min.js')}}"></script> -->
    <script type="text/javascript">
      var config = {
        ".chosen-select": {},
        ".chosen-select-deselect": {
          allow_single_deselect: !0
        },
        ".chosen-select-no-single": {
          disable_search_threshold: 10
        },
        ".chosen-select-no-results": {
          no_results_text: "Oops, nothing found!"
        },
        ".chosen-select-width": {
          width: "95%"
        }
      };
      for (var selector in config) $(selector).chosen(config[selector]);
    </script>
@stop
