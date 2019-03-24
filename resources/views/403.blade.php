@extends('layouts.admin')
@section('title','403')
@section('content')
    {{--<link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">--}}
    {{--<link href="css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">--}}

    {{--<link href="css/animate.min.css" rel="stylesheet">--}}
    {{--<link href="css/style.min862f.css?v=4.1.0" rel="stylesheet">--}}




<div class="middle-box text-center animated fadeInDown">
    <h1>403</h1>
    <h3 class="font-bold">没有权限访问！</h3>

    <div class="error-desc">
        您没有权限访问该页面...
        <br/>请联系管理员
        <br/><a href="javascript:history.go(-1);" class="btn btn-primary m-t">返回</a>
    </div>
</div>
@stop
