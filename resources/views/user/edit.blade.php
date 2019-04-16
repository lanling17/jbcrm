@extends('layouts.admin')
@section('title','用户修改')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-10">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>修改用户信息</h5>
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
                        <form action={{url('user/'.$info['id'])}} class="form-horizontal m-t" id="signupForm" method="POST" enctype="multipart/form-data">

                            <!-- 用户名： -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">用户名：</label>
                                <div class="col-sm-8">
                                    <input  name="username" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" value="{{$info['username']}}">
                                </div>
                            </div>
                            <!-- 密码： -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">密码：</label>
                                <div class="col-sm-8">
                                    <input name="newpwd" class="form-control" type="password">
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 不填默认不修改</span>
                                </div>
                            </div>
                            <!-- 确认密码： -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">确认密码：</label>
                                <div class="col-sm-8">
                                    <input name="newpwd_confirmation" class="form-control" type="password">
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 请再次输入您的密码</span>
                                </div>
                            </div>
                            <!-- 电话： -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">电话：</label>
                                <div class="col-sm-8">
                                    <input name="mobile" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" value="{{$info['mobile']}}">
                                </div>
                            </div>
                            <!-- E-mail： -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">E-mail：</label>
                                <div class="col-sm-8">
                                    <input id="email" name="email" class="form-control" type="email" value="{{$info['email']}}">
                                </div>
                            </div>
                            <!-- 昵称： -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">昵称：</label>
                                <div class="col-sm-8">
                                    <input id="firstname" name="name" class="form-control" type="text" value="{{$info['name']}}">
                                    <!-- <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点提示的内容</span> -->
                                </div>
                            </div>
                            <!-- 头像： -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">头像：</label>
                                <div class="col-sm-8">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> 选择图片</button>
                                </div>
                            </div>
                            <!-- 头像： -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <img width="100px;" src={{asset($info['head_pic'])}} id="head_pic">
                                </div>
                            </div>
                            <!-- 角色： -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">角色：</label>
                                <div class="col-sm-8">
                                 @foreach($jurisdictions as $jurisdiction)
                                 @if($jurisdiction['level'] ==1)
                                 <br>
                                 @endif
                                 <div class="checkbox checkbox-success checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox{{$jurisdiction['id']}}" value="{{$jurisdiction['id']}}" name="jurisdiction_ids[]" {{in_array($jurisdiction['id'],$info['jurisdiction_ids']) ? 'checked' : ''}}>
                                    <label for="inlineCheckbox{{$jurisdiction['id']}}"> {{$jurisdiction['name']}} </label>
                                </div>
                                @endforeach
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 勾选需要给予的角色定位，他将获取该角色所拥有的所有权限</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <input type="hidden" name="_method" value="put"/>
                                    <input type="hidden" name="admin_old_pic" value={{$info['head_pic']}}>
                                    <input type="hidden" name="admin_old_pic_url" value={{asset($info['head_pic'])}}>
                                    <input type="hidden" name="head_pic" >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
                                    <button class="btn btn-primary" type="submit">提交</button>
                                    <a class="btn btn-outline btn-default" href={{url('user')}} >返回</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.admin_picpro')

    <script>
    //document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
    var clipArea = new bjj.PhotoClip("#clipArea", {
        size: [260, 260],
        outputSize: [640, 640],
        file: "#file",
        view: "#view",
        ok: "#clipBtn",
        loadStart: function() {
            console.log("照片读取中");
        },
        loadComplete: function() {
            console.log("照片读取完成");
        },
        clipFinish: function(dataURL) {
            // console.log(dataURL);
            $('#head_pic').attr('src',dataURL);
            $('[name=head_pic]').attr('value',dataURL);
        }
    });

    var apic = $('[name=admin_old_pic_url]').val();
    $('.quxiao').click(function(){
        $('#head_pic').attr('src',apic)
    })
    //clipArea.destroy();
    </script>
@stop
