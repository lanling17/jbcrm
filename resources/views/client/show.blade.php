@extends('layouts.admin')
@section('title','添加客户')
@section('content')
<div class="row">
    <div class="col-sm-9">
        <div class="wrapper wrapper-content animated fadeInUp">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="m-b-md">
                                <a href="{{url('client/'.$client->id.'/edit')}}" class="btn btn-info btn-xs pull-right">编辑信息</a>
                                <a href="{{url('client')}}" class="btn btn-white btn-xs pull-right">返回列表</a>
                                <h2>{{$client->name}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <dl class="dl-horizontal">
                                <dt>性别：</dt><dd>{{$client->sex == 1 ? '男' : '女'}}</dd>
                                <dt>年龄：</dt><dd>{{$client->age}}</dd>
                                <dt>电话：</dt><dd>{{$client->phone}}</dd>
                                <dt>邮箱：</dt><dd>{{$client->email}}</dd>
                                <dt>微信：</dt><dd>{{$client->wx_char}}</dd>
                            </dl>
                        </div>
                        <div class="col-sm-7" id="cluster_info">
                            <dl class="dl-horizontal">
                                <dt>公司：</dt><dd><a href="#" class="text-navy">{{$client->company}}</a></dd>
                                <dt>职位：</dt><dd><a href="#" class="text-navy">{{$client->position}}</a></dd>
                                <dt>性质：</dt><dd>{{$client->nature}}</dd>
                                <dt>规模：</dt><dd >{{$client->scale}}</dd>
                                <dt>联系人：</dt><dd>{{$client->contacts}}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <dl class="dl-horizontal">
                                <dt>类别：</dt><dd><a href="#" class="text-navy">{{$client->classify->name}}</a></dd>
                                <dt>公司外部标签：</dt><dd>{{$client->out_lable}}</dd>
                                <dt>合作中的项目：</dt><dd>{{$client->cooperationing}}</dd>
                                <dt>创建人:</dt><dd>{{$client->createUser->name}}</dd>
                                <dt>创建时间:</dt><dd>{{$client->created_at}}</dd>
                            </dl>
                        </div>
                        <div class="col-sm-7" id="cluster_info">
                            <dl class="dl-horizontal">
                                <dt>重要等级：</dt>
                                <dd>
                                    <span class="label label-{{config('hint.important_grade_color')[$client->important_grade]}}">{{config('hint.important_grade')[$client->important_grade]}}</span>
                                </dd>
                                <dt>公司内部标签：</dt><dd>{{$client->in_lable}}</dd>
                                <dt>合作过的项目：</dt><dd>{{$client->cooperationed}}</dd>
                                <dt>更新人：</dt><dd >{{$client->updateUser->name}}</dd>
                                <dt>更新时间：</dt><dd >{{$client->updated_at}}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <dl class="dl-horizontal">
                                <dt>备注</dt>
                                <dd>{{$client->remarks}}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop