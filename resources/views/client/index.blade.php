@extends('layouts.admin')
@section('title','客户列表')
@section('content')
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
                                <li><a href="#">导入</a></li>
                                <li><a href="#">导出</a></li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        @include('layouts.admin_hint')
                         <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th >类别</th>
                                    <th>姓名</th>
                                    <th>联系人</th>
                                    <th>性别</th>
                                    <th>邮箱</th>
                                    <th>联系电话</th>
                                    <th>微信</th>
                                    <th>公司外部标签</th>
                                    <th>公司内部标签</th>
                                    <th>重要等级</th>
                                    <th>所属</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($list as $v)
                                <tr class="gradeC">
                                    <td>{{$v->classify}}</td>
                                    <td>{{$v->name}}</td>
                                    <td>{{$v->contacts}}</td>
                                    <td>{{$v->sex ? '男' : '女'}}</td>
                                    <td>{{$v->email}}</td>
                                    <td>{{$v->phone}}</td>
                                    <td>{{$v->wx_char}}</td>
                                    <td>{{$v->out_lable}}</td>
                                    <td>{{$v->in_lable}}</td>
                                    <td>{{config('hint.important_grade')[$v->important_grade]}}</td>
                                    <td>{{$v->created_user}}</td>
                                    <!-- <td class="center">
                                        @if($v->status == 1)
                                            <span class="label label-info">正常</span>
                                        @else
                                            <span class="label label-danger">禁用</span>
                                        @endif
                                    </td> -->
                                    <td class="center">
                                        <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">操作 <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="javascript:;">详情</a></li>
                                                <li><a href={{url("client/$v->id/edit")}} class="font-bold">修改</a></li>
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
    @include('layouts.admin_delete')
@stop
