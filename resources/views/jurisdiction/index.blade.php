@extends('layouts.admin')
@section('title','权限列表')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>权限列表</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">选项 01</a>
                                </li>
                                <li><a href="#">选项 02</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="">
                            <button class="btn btn-primary J_menuItem" data-toggle="modal" data-target="#myModalAdd">新增</button>
                            <button style="display: none;" data-toggle="modal" data-target="#myModalMod" id="operation">操作</button>
                        </div>
                        @include('layouts.admin_hint')
                        <div id="treeview6" class="test"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 弹框(添加) -->
       <div class="modal inmodal" id="myModalAdd" tabindex="-1" role="dialog" aria-hidden="true">
           <div class="modal-dialog">
               <form id="navAdd" method="post" action={{url('jurisdiction')}} class="form-horizontal m-t">
               <div class="modal-content animated bounceInRight">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span>
                       </button>
                       <!-- <i class="fa fa-laptop modal-icon"></i> -->
                       <h5 class="modal-title">添加权限</h5>
                       <!-- <small class="font-bold">这里可以显示副标题。 -->
                   </div>
                   <div class="modal-body">
                       <div class="form-group">
                           <label class="col-sm-3 control-label">权限名称：</label>
                           <div class="col-sm-8">
                               <input  name="name" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-sm-3 control-label">权限标识：</label>
                           <div class="col-sm-8">
                               <input  name="slug" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-sm-3 control-label">请求方式：</label>
                           <div class="col-sm-8">
                             <select class="form-control" name="http_method">
                               @foreach(config('hint.HTTP') as $v)
                                <option value={{$v}}>{{$v}}</option>
                                @endforeach
                             </select>
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-sm-3 control-label">请求路径：</label>
                           <div class="col-sm-8">
                               <input  name="http_path" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-sm-3 control-label">权限父级：</label>
                           <div class="col-sm-4">
                               <select class="form-control" name="parent">
                                   <option value="0" >无</option>
                                   @foreach($list['arr'] as $v)
                                       <option value={{$v['id']}}><?php echo str_repeat('|--', $v['level']) ?>{{$v['name']}}</option>
                                   @endforeach
                               </select>
                           </div>
                       </div>
                   </div>
                   <div class="modal-footer">
                       {{ csrf_field() }}
                       <button type="button" class="btn btn-white" data-dismiss="modal">取消</button>
                       <button type="submit" class="btn btn-primary" >保存</button>
                   </div>
               </div>
               </form>
           </div>
       </div>

    <!-- 弹框(修改) -->
   <div class="modal inmodal" id="myModalMod" tabindex="-1" role="dialog" aria-hidden="true">
       <div class="modal-dialog">
           <form id="navMod" method="post" class="form-horizontal m-t">
           <div class="modal-content animated bounceInRight">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span>
                   </button>
                   <!-- <i class="fa fa-laptop modal-icon"></i> -->
                   <h5 class="modal-title">权限详情</h5>
                   <!-- <small class="font-bold">这里可以显示副标题。 -->
               </div>
               <div class="modal-body">
                   <div class="form-group">
                       <label class="col-sm-3 control-label">权限名称：</label>
                       <div class="col-sm-8">
                           <input  name="name" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" id="mod_name">
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-sm-3 control-label">权限标识：</label>
                       <div class="col-sm-8">
                           <input  name="slug" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" id="mod_slug">
                           <!-- <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 值越大，排序越靠前，值相同按创建时间排序</span> -->
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-sm-3 control-label">请求方式：</label>
                       <div class="col-sm-8">
                           <select class="form-control" name="http_method">
                             @foreach(config('hint.HTTP') as $v)
                              <option class="http_method" value={{$v}}>{{$v}}</option>
                              @endforeach
                           </select>
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-sm-3 control-label">请求路径：</label>
                       <div class="col-sm-8">
                           <input  name="http_path" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" id="mod_http_path">
                           <!-- <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 值越大，排序越靠前，值相同按创建时间排序</span> -->
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-sm-3 control-label">权限父级：</label>
                       <div class="col-sm-6">
                           <select class="form-control" name="parent">
                               <option value="0" >无</option>
                               @foreach($list['arr'] as $v)
                                   <option value={{$v['id']}} class="xuanze"><?php echo str_repeat('|--', $v['level']) ?>  {{$v['name']}}</option>
                               @endforeach
                           </select>
                           <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 注意：修改父级，子级也会跟随改变</span>
                       </div>
                   </div>
               </div>
               <div class="modal-footer">
                   {{ csrf_field() }}
                   {{ method_field('PUT') }}
                   <button type="button" class="btn btn-white" data-dismiss="modal">取消</button>
                   <button type="button" class="btn btn-danger" id="deleteNav">删除</button>
                   <button type="submit" class="btn btn-primary" >修改</button>
               </div>
           </div>
           </form>
       </div>
   </div>

    @include('layouts.admin_delete')
    <textarea id="list" style="display: none;">{{$list['json']}}</textarea>
    <script src="{{asset('hplus/js/plugins/footable/footable.all.min.js')}}"></script>
    <script src="{{asset('hplus/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('hplus/js/plugins/treeview/bootstrap-treeview.js')}}"></script>
    <script type="text/javascript">
        $(function() {
            var o = $('#list').val();
            $("#treeview6").treeview({
                color: "#428bca",
                expandIcon: "glyphicon glyphicon-chevron-right",
                collapseIcon: "glyphicon glyphicon-chevron-down",
                nodeIcon: "glyphicon glyphicon-bookmark",
                levels:1,
                showTags: !0,
                data: o,
                onNodeSelected: function(e, o) {
                    var optObj = $('.xuanze');
                    var len = optObj.length;
                    var href = o.href;
                    for(var i=0;i<len;i++){
                        if (optObj.eq(i).val() == o.parent) {
                            optObj.eq(i).attr('selected',true)
                        }
                    }
                    var methodObj = $('.http_method');
                    for (var i = 0; i < methodObj.length; i++) {
                      if (methodObj.eq(i).val() == o.http_method) {
                          methodObj.eq(i).attr('selected',true)
                      }
                    }
                    // console.log(o.parent);
                    $("#mod_name").val(o.text);
                    $("#mod_slug").val(o.slug);
                    $("#mod_http_path").val(o.http_path);
                    $("#navMod").attr('action',o.href);
                    $("#deleteNav").attr('onclick',"cancel('"+href+"')");
                    $('#operation').trigger('click');

                }
            })
        });
    </script>
@stop
