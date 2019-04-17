<?php
return [
    //后台列表展示条数
    'a_num'                 => 20,
    //设置提示信息
    'account_null'          => '账号不存在！',
    'password_error'        => '密码错误！',
    'error'                 => '账号密码不匹配！',
    'welcome'               => '欢迎回来！',
    'back'                  => '欢迎再来！',
    'noLogin'               => '尚未登录！',

    //上传限制 10M
    'images_size_big'       => 10000*1024,
    'images_type_error'     => '上传图片类型错误',
    'images_size_error'     => '上传图片大小超出允许范围',
    'images_null'           => '没有文件上传',
    'upload_failure'        => '上传失败',

    //增删改提示
    'add_success'           => '添加成功！',
    'add_failure'           => '添加失败！',
    'mod_success'           => '修改成功！',
    'mod_failure'           => '修改失败！',
    'del_success'           => '删除成功！',
    'del_failure'           => '删除失败！',
    'del_failure_exist'     => '删除失败,该层级下存在子级，请先删除子级后再试！',
    'password_error'        => '密码错误！',
    'password_two'          => '密码两次输入不一致！',
    'detail_null'           => '暂无详情，请在操作中添加！',
    'detail_exist'          => '详情已经存在，无需再添加！',
    'data_exist'            => '数据不存在！',

    'del_other'             => '暂不提供删除功能！',

    'video_exist'           => '视频位置地址不能为空',
    'href_exist'            => '其他位置跳转地址不能为空',
    'is_set'                => '该条已经设置',
    'set_suss'              => '设置成功！',
    'set_fail'              => '设置失败！',
    'cancel_suss'           => '取消成功！',
    'cancel_fail'           => '取消失败！',

    'HTTP'                  => ['ANY','GET','POST','PUT','DELETE','PATCH','HEAD','OPTIONS'],
    'important_grade'       => [1 => '普通',2 => '重要',3 => '非常重要'],
    'important_grade_color' => [1 => 'primary',2 => 'warning',3 => 'danger'],
    'position'              => ['创始人','董事长','执行董事','总裁','CEO','总经理','股东'],
    'industry'              => ['政府机关','金融','互联网','生产制造','教育','医疗','服务','农林牧副渔','能源'],
    'relation'              => ['客户','校友','供应商','股东','导师','员工','媒介','用户'],
  ];
