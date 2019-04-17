@extends('layouts.admin')
@section('title','添加客户')
@section('content')
<style media="screen">
  .pic{
    width: 100px;
    margin-left: 10px;
  }
</style>

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
                                  <input class="laydate-icon form-control layer-date" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})" name="birthday" value="{{old('birthday ')}}">
                                </div>
                            </div>
                             <!-- 公司(全称) -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">公司(全称)：</label>
                                <div class="col-sm-8">
                                    <input name="company_full" class="form-control" type="text" value="{{old('company_full')}}">
                                </div>
                            </div>
                            <!-- 公司(简称) -->
                           <div class="form-group">
                               <label class="col-sm-3 control-label">公司(简称)：</label>
                               <div class="col-sm-8">
                                   <input name="company_short" class="form-control" type="text" value="{{old('company_short')}}">
                               </div>
                           </div>
                            <!-- 职位 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">职位：</label>
                                <div class="col-sm-8">
                                  <select data-placeholder="选择职位" class="chosen-select" multiple style="width:100%;" tabindex="4" name="position[]">
                                    @foreach(config('hint.position') as $position)
                                      <option value="{{$position}}" hassubinfo="true">{{$position}}</option>
                                    @endforeach
                                  </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                  <label>其他(选项中没有填写)：</label>
                                  <input name="position_qt" class="form-control" type="text" value="{{old('position_qt')}}">
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
                                    <input name="telephone" class="form-control" type="text" value="{{old('telephone')}}">
                                </div>
                            </div>
                            <!-- 微信 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">微信：</label>
                                <div class="col-sm-8">
                                    <input name="wx_char" class="form-control" type="text" value="{{old('wx_char')}}">
                                </div>
                            </div>

                            <!-- 地区 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">地区：</label>
                                <div class="col-sm-8">
                                  <div id="distpicker1">
                                    <div class="col-sm-3">
                                      <label class="sr-only" for="province4">Province</label>
                                      <select class="form-control" id="province4" name="province"></select>
                                    </div>
                                    <div class="col-sm-3">
                                      <label class="sr-only" for="city4">City</label>
                                      <select class="form-control" id="city4" name="city"></select>
                                    </div>
                                    <div class="col-sm-3">
                                      <label class="sr-only" for="district4">District</label>
                                      <select class="form-control" id="district4" name="district"></select>
                                    </div>
                                  </div>
                                </div>

                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label"></label>
                              <div class="col-sm-8">
                                <label>其他(国外地区填写格式：省-市-区/县)：</label>
                                <input name="area_qt" class="form-control" type="text" value="{{old('area_qt')}}">
                              </div>
                            </div>
                            <!-- 联系地址 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">联系地址：</label>
                                <div class="col-sm-8">
                                    <input name="address" class="form-control" type="text" value="{{old('address')}}">
                                </div>
                            </div>
                            <!-- 所在行业 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">所在行业：</label>
                                <div class="col-sm-8">
                                    <select data-placeholder="选择行业" class="chosen-select" multiple style="width:100%;" tabindex="4" name="industry[]">
                                      @foreach(config('hint.industry') as $industry)
                                        <option value="{{$industry}}" hassubinfo="true">{{$industry}}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                  <label>其他(选项中没有填写)：</label>
                                  <input name="industry_qt" class="form-control" type="text" value="{{old('industry_qt')}}">
                                </div>
                            </div>
                            <!-- 关系 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">关系：</label>
                                <div class="col-sm-8">
                                  <select data-placeholder="选择关系" class="chosen-select" multiple style="width:100%;" tabindex="4" name="relation[]">
                                    @foreach(config('hint.relation') as $relation)
                                      <option value="{{$relation}}" hassubinfo="true">{{$relation}}</option>
                                    @endforeach
                                  </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                  <label>其他(选项中没有填写)：</label>
                                  <input name="relation_qt" class="form-control" type="text" value="{{old('relation_qt')}}">
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
                                     <textarea style="width: 100%;height: 100px;resize: none;" name="remark">{{old('remark')}}</textarea>
                                </div>
                            </div>
                            <!-- 照片（多张） -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">照片（多张）：</label>
                                <div class="col-sm-8">
                                     <input type="file" name="picture[]" id="picture" multiple>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-8" id="picture_yl">

                                </div>
                            </div>
                            <!-- 名片 -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">名片：</label>
                                <div class="col-sm-8">
                                     <input type="file" name="visiting_card" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                     <img src="" alt="" id="visiting" class="pic">
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
    <script src="{{asset('js/distpicker.data.js')}}"></script>
	  <script src="{{asset('js/distpicker.js')}}"></script>
	  <!-- <script src="{{asset('js/main.js')}}"></script> -->

    <script type="text/javascript">
      //select下拉多选
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

      //三级联动
      $('#distpicker1').distpicker();

      //图片预览
       function getObjectURL(file){
           var url = null;
           if (window.createObjectURL!=undefined) {
             url = window.createObjectURL(file) ;
            } else if (window.URL!=undefined) { // mozilla(firefox)
             url = window.URL.createObjectURL(file) ;
            } else if (window.webkitURL!=undefined) { // webkit or chrome
             url = window.webkitURL.createObjectURL(file) ;
            }
            return url ;
       }
       //照片
       $('#picture').change(function(){
         var html = '';
         for (var i = 0; i < this.files.length; i++) {
            html += '<img src="'+getObjectURL(this.files[i])+'" class="pic">';
         }

         $('#picture_yl').html(html);
       })
       //名片图像
       $('[name=visiting_card]').change(function(){
         var imgurl = getObjectURL(this.files[0]);
         $('#visiting').attr('src',imgurl);
       })

    </script>
@stop
