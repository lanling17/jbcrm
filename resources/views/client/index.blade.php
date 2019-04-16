@extends('layouts.admin')
@section('title','客户列表')
@section('content')
<style type="text/css">
    .juzhong{text-align: right;}
    .dinwei{margin-top: 10px;}
</style>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>客户列表</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="{{url('client/create')}}">新增</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#excel_import">导入</a></li>
                                <li><a href="#" id='excel_export'>导出</a></li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                      <form action="">
                          <div class="form-group">
                              <div class="col-sm-1 juzhong"><label class="dinwei">类別：</label></div>
                              <div class="col-sm-2">
                                  <select class="form-control" name="classify_id">
                                      <option value="0">请选择分类</option>

                                      <option value="" ></option>

                                  </select>
                              </div>
                              <div class="col-sm-1 juzhong"><label class="dinwei">姓名：</label></div>
                              <div class="col-sm-2">
                                  <input class="form-control" type="text" name="name" value="">
                              </div>
                              <button class="btn btn-primary" type="submit">搜索</button>
                          </div>
                      </form>
                        @include('layouts.admin_hint')
                         <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>姓名</th>
                                    <th>性别</th>
                                    <th>出生日期</th>
                                    <th>公司</th>
                                    <th>职位</th>
                                    <th>邮箱</th>
                                    <th>电话</th>
                                    <th>微信</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($list as $v)
                                <tr class="gradeC">
                                    <td>{{$v->name}}</td>
                                    <td>{{$v->sex ? '男' : '女'}}</td>
                                    <td>{{$v->birthday}}</td>
                                     <td>{{$v->compony}}</td>
                                    <td>{{$v->position}}</td>
                                    @if(Auth::id() == 1 || Auth::id() == $v->created_id)
                                    <td>{{$v->email}}</td>
                                    <td>{{$v->telephone}}</td>
                                    <td>{{$v->wx_char}}</td>
                                    @else
                                    <td>****</td>
                                    <td>****</td>
                                    <td>****</td>
                                    @endif
                                    <td class="center">
                                        <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">操作 <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                @if(Auth::id() == 1 || Auth::id() == $v->created_id)
                                                <li><a href="{{url('client/'.$v->id)}}">详情</a></li>
                                                @else
                                                <li><a href="javascript:;">详情</a></li>
                                                @endif
                                                <li><a href="{{url('client/'.$v->id.'/edit')}}" class="font-bold">修改</a></li>
                                                <!-- <li><a href="javascript:;" class="demo4">禁用</a></li> -->
                                                <li class="divider"></li>
                                                <li><a href="javascript:;" id="{{$v->id}}" class="delete" url="{{url('client/'.$v->id)}}">删除</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <?php echo $list->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 弹框(导入) -->
    <div class="modal inmodal" id="excel_import" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="{{route('client/import')}}" class="form-horizontal m-t" enctype="multipart/form-data">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span>
                    </button>
                    <!-- <i class="fa fa-laptop modal-icon"></i> -->
                    <h5 class="modal-title">导入</h5>
                    <!-- <small class="font-bold">这里可以显示副标题。 -->
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">选择文件：</label>
                        <div class="col-sm-8">
                            <input  name="excel" class="form-control" type="file" aria-required="true" aria-invalid="true" class="error">
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
    <form id="excel_export_form" action="{{route('client/export')}}" method="post">
      <input type="text" name="classify_id" value="">
      <input type="text" name="name" value="">
      <input type="text" name="page" value="">
      {{ csrf_field() }}
    </form>
    @include('layouts.admin_delete')
    <script type="text/javascript">
      $('#excel_export').click(function(){
        $('#excel_export_form').submit();
      })
    </script>
@stop
