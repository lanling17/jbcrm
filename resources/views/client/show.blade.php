@extends('layouts.admin')
@section('title','添加客户')
@section('content')
<style media="screen">
.pic_div{
  float: left;
}
.pic{
  height:300px;
  margin-left: 10px;
}
.visiting_card{
  width: 300px;
}
</style>
<div class="row">
    <div class="col-sm-12">
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
                                <dt>出生日期：</dt><dd>{{$client->birthday}}</dd>
                                <dt>电话：</dt><dd>{{$client->telephone}}</dd>
                                <dt>邮箱：</dt><dd>{{$client->email}}</dd>
                                <dt>微信：</dt><dd>{{$client->wx_char}}</dd>
                                <dt>关系：</dt><dd>{{$client->relation}}</dd>
                                <dt>备注：</dt><dd>{{$client->remark}}</dd>
                                <dt>创建人:</dt><dd>{{$client->createUser->name}}</dd>
                                <dt>创建时间:</dt><dd>{{$client->created_at}}</dd>
                            </dl>
                        </div>
                        <div class="col-sm-7" id="cluster_info">
                            <dl class="dl-horizontal">
                                <dt>公司：</dt><dd><a href="#" class="text-navy">{{$client->company}}</a></dd>
                                <dt>职位：</dt><dd><a href="#" class="text-navy">{{$client->position}}</a></dd>
                                <dt>地区：</dt><dd>{{$client->area}}</dd>
                                <dt>联系地址：</dt><dd >{{$client->address}}</dd>
                                <dt>所在行业：</dt><dd>{{$client->industry}}</dd>
                                <dt>合作中的项目：</dt><dd>{{$client->cooperationing}}</dd>
                                <dt>合作过的项目：</dt><dd>{{$client->cooperationed}}</dd>
                                <dt>更新人：</dt><dd >{{$client->updateUser->name}}</dd>
                                <dt>更新时间：</dt><dd >{{$client->updated_at}}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-7" id="cluster_info">
                          <dl class="dl-horizontal">
                              <dt>名片：</dt>
                              <dd><img src="{{isset($files['visiting_card']) ? asset(str_replace('public','storage',$files['visiting_card']->url)) : ''}}" alt="" class="visiting_card"></dd>
                          </dl>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <dl class="dl-horizontal">
                                <dt>相册：</dt>
                                <dd style="width:100%">
                                @foreach($files['pic'] as $pic)
                                <div class="pic_div">
                                  <img src="{{asset(str_replace('public','storage',$pic->url)) }}" alt="" class="pic">
                                </div>
                                @endforeach
                                </dd>
                            </dl>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
