
<!DOCTYPE html>
<html>
<!-- Mirrored from www.zi-han.net/theme/hplus/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:16:41 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>H+ 后台主题UI框架 - 主页</title>

    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="{{asset('hplus/favicon.ico')}}">
    <link href="{{asset('hplus/css/bootstrap.min14ed.css?v=3.3.6')}}" rel="stylesheet">
    <link href="{{asset('hplus/css/font-awesome.min93e3.css?v=4.4.0')}}" rel="stylesheet">
    <link href="{{asset('hplus/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('hplus/css/style.min862f.css?v=4.1.0')}}" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span><img alt="image" class="img-circle" src="hplus/img/profile_small.jpg" /></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="hplus/#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold">Beaut-zihan</strong></span>
                                <span class="text-muted text-xs block">超级管理员<b class="caret"></b></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="J_menuItem" href="hplus/form_avatar.html">修改头像</a>
                                </li>
                                <li><a class="J_menuItem" href="hplus/profile.html">个人资料</a>
                                </li>
                                <li><a class="J_menuItem" href="hplus/contacts.html">联系我们</a>
                                </li>
                                <li><a class="J_menuItem" href="hplus/mailbox.html">信箱</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">安全退出</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">H+
                        </div>
                    </li>
                    <li>
                        <a href="hplus/#">
                            <i class="fa fa-home"></i>
                            <span class="nav-label">主页</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="hplus/index_v1.html" data-index="0">主页示例一</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="hplus/index_v2.html">主页示例二</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="hplus/index_v3.html">主页示例三</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="hplus/index_v4.html">主页示例四</a>
                            </li>
                            <li>
                                <a href="hplus/index_v5.html" target="_blank">主页示例五</a>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a class="J_menuItem" href="hplus/layouts.html"><i class="fa fa-columns"></i> <span class="nav-label">布局</span></a>
                    </li>
                    <li>
                        <a href="hplus/#">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="nav-label">统计图表</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="hplus/graph_echarts.html">百度ECharts</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="hplus/graph_flot.html">Flot</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="hplus/graph_morris.html">Morris.js</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="hplus/graph_rickshaw.html">Rickshaw</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="hplus/graph_peity.html">Peity</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="hplus/graph_sparkline.html">Sparkline</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="hplus/graph_metrics.html">图表组合</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="hplus/mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">信箱 </span><span class="label label-warning pull-right">16</span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="hplus/mailbox.html">收件箱</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/mail_detail.html">查看邮件</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/mail_compose.html">写信</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="hplus/#"><i class="fa fa-edit"></i> <span class="nav-label">表单</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="hplus/form_basic.html">基本表单</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/form_validate.html">表单验证</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/form_advanced.html">高级插件</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/form_wizard.html">表单向导</a>
                            </li>
                            <li>
                                <a href="hplus/#">文件上传 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a class="J_menuItem" href="hplus/form_webuploader.html">百度WebUploader</a>
                                    </li>
                                    <li><a class="J_menuItem" href="hplus/form_file_upload.html">DropzoneJS</a>
                                    </li>
                                    <li><a class="J_menuItem" href="hplus/form_avatar.html">头像裁剪上传</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="hplus/#">编辑器 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a class="J_menuItem" href="hplus/form_editors.html">富文本编辑器</a>
                                    </li>
                                    <li><a class="J_menuItem" href="hplus/form_simditor.html">simditor</a>
                                    </li>
                                    <li><a class="J_menuItem" href="hplus/form_markdown.html">MarkDown编辑器</a>
                                    </li>
                                    <li><a class="J_menuItem" href="hplus/code_editor.html">代码编辑器</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="J_menuItem" href="hplus/suggest.html">搜索自动补全</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/layerdate.html">日期选择器layerDate</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="hplus/#"><i class="fa fa-desktop"></i> <span class="nav-label">页面</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="hplus/contacts.html">联系人</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/profile.html">个人资料</a>
                            </li>
                            <li>
                                <a href="hplus/#">项目管理 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a class="J_menuItem" href="hplus/projects.html">项目</a>
                                    </li>
                                    <li><a class="J_menuItem" href="hplus/project_detail.html">项目详情</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="J_menuItem" href="hplus/teams_board.html">团队管理</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/social_feed.html">信息流</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/clients.html">客户管理</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/file_manager.html">文件管理器</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/calendar.html">日历</a>
                            </li>
                            <li>
                                <a href="hplus/#">博客 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a class="J_menuItem" href="hplus/blog.html">文章列表</a>
                                    </li>
                                    <li><a class="J_menuItem" href="hplus/article.html">文章详情</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="J_menuItem" href="hplus/faq.html">FAQ</a>
                            </li>
                            <li>
                                <a href="hplus/#">时间轴 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a class="J_menuItem" href="hplus/timeline.html">时间轴</a>
                                    </li>
                                    <li><a class="J_menuItem" href="hplus/timeline_v2.html">时间轴v2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="J_menuItem" href="hplus/pin_board.html">标签墙</a>
                            </li>
                            <li>
                                <a href="hplus/#">单据 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a class="J_menuItem" href="hplus/invoice.html">单据</a>
                                    </li>
                                    <li><a class="J_menuItem" href="hplus/invoice_print.html">单据打印</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="J_menuItem" href="hplus/search_results.html">搜索结果</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/forum_main.html">论坛</a>
                            </li>
                            <li>
                                <a href="hplus/#">即时通讯 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a class="J_menuItem" href="hplus/chat_view.html">聊天窗口</a>
                                    </li>
                                    <li><a class="J_menuItem" href="hplus/webim.html">layIM</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="hplus/#">登录注册相关 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="hplus/login.html" target="_blank">登录页面</a>
                                    </li>
                                    <li><a href="hplus/login_v2.html" target="_blank">登录页面v2</a>
                                    </li>
                                    <li><a href="hplus/register.html" target="_blank">注册页面</a>
                                    </li>
                                    <li><a href="hplus/lockscreen.html" target="_blank">登录超时</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="J_menuItem" href="hplus/404.html">404页面</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/500.html">500页面</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/empty_page.html">空白页</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="hplus/#"><i class="fa fa-flask"></i> <span class="nav-label">UI元素</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="hplus/typography.html">排版</a>
                            </li>
                            <li>
                                <a href="hplus/#">字体图标 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a class="J_menuItem" href="hplus/fontawesome.html">Font Awesome</a>
                                    </li>
                                    <li>
                                        <a class="J_menuItem" href="hplus/glyphicons.html">Glyphicon</a>
                                    </li>
                                    <li>
                                        <a class="J_menuItem" href="hplus/iconfont.html">阿里巴巴矢量图标库</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="hplus/#">拖动排序 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a class="J_menuItem" href="hplus/draggable_panels.html">拖动面板</a>
                                    </li>
                                    <li><a class="J_menuItem" href="hplus/agile_board.html">任务清单</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="J_menuItem" href="hplus/buttons.html">按钮</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/tabs_panels.html">选项卡 &amp; 面板</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/notifications.html">通知 &amp; 提示</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/badges_labels.html">徽章，标签，进度条</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="hplus/grid_options.html">栅格</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/plyr.html">视频、音频</a>
                            </li>
                            <li>
                                <a href="hplus/#">弹框插件 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a class="J_menuItem" href="hplus/layer.html">Web弹层组件layer</a>
                                    </li>
                                    <li><a class="J_menuItem" href="hplus/modal_window.html">模态窗口</a>
                                    </li>
                                    <li><a class="J_menuItem" href="hplus/sweetalert.html">SweetAlert</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="hplus/#">树形视图 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a class="J_menuItem" href="hplus/jstree.html">jsTree</a>
                                    </li>
                                    <li><a class="J_menuItem" href="hplus/tree_view.html">Bootstrap Tree View</a>
                                    </li>
                                    <li><a class="J_menuItem" href="hplus/nestable_list.html">nestable</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="J_menuItem" href="hplus/toastr_notifications.html">Toastr通知</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/diff.html">文本对比</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/spinners.html">加载动画</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/widgets.html">小部件</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="hplus/#"><i class="fa fa-table"></i> <span class="nav-label">表格</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="hplus/table_basic.html">基本表格</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/table_data_tables.html">DataTables</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/table_jqgrid.html">jqGrid</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/table_foo_table.html">Foo Tables</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/table_bootstrap.html">Bootstrap Table
                                <span class="label label-danger pull-right">推荐</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="hplus/#"><i class="fa fa-picture-o"></i> <span class="nav-label">相册</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="hplus/basic_gallery.html">基本图库</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/carousel.html">图片切换</a>
                            </li>
                            <li><a class="J_menuItem" href="hplus/blueimp.html">Blueimp相册</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="J_menuItem" href="hplus/css_animation.html"><i class="fa fa-magic"></i> <span class="nav-label">CSS动画</span></a>
                    </li>
                    <li>
                        <a href="hplus/#"><i class="fa fa-cutlery"></i> <span class="nav-label">工具 </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="hplus/form_builder.html">表单构建器</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="hplus/#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" method="post" action="http://www.zi-han.net/theme/hplus/search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown hidden-xs">
                            <a class="right-sidebar-toggle" aria-expanded="false">
                                <i class="fa fa-tasks"></i> 主题
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row content-tabs">
                <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
                </button>
                <nav class="page-tabs J_menuTabs">
                    <div class="page-tabs-content">
                        <a href="hplus/javascript:;" class="active J_menuTab" data-id="index_v1.html">首页</a>
                    </div>
                </nav>
                <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
                </button>
                <div class="btn-group roll-nav roll-right">
                    <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>

                    </button>
                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                        <li class="J_tabShowActive"><a>定位当前选项卡</a>
                        </li>
                        <li class="divider"></li>
                        <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                        </li>
                        <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                        </li>
                    </ul>
                </div>
                <a class="roll-nav roll-right J_tabExit" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fa fa fa-sign-out"></i> 退出
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            <div class="row J_mainContent" id="content-main">
                <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="{{route('welcome')}}" frameborder="0" data-id="index_v1.html" seamless></iframe>
            </div>
            <div class="footer">
                <div class="pull-right">&copy; 2014-2015 <a href="http://www.wcs21.top/" target="_blank">wcs</a>
                </div>
            </div>
        </div>
        <!--右侧部分结束-->
        <!--右侧边栏开始-->
        <div id="right-sidebar">
            <div class="sidebar-container">

                <ul class="nav nav-tabs navs-3">

                    <li class="active">
                        <a data-toggle="tab" href="#tab-1">
                            <i class="fa fa-gear"></i> 主题
                        </a>
                    </li>
                    <li class=""><a data-toggle="tab" href="#tab-2">
                        通知
                    </a>
                    </li>
                    <li><a data-toggle="tab" href="#tab-3">
                        项目进度
                    </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="sidebar-title">
                            <h3> <i class="fa fa-comments-o"></i> 主题设置</h3>
                            <small><i class="fa fa-tim"></i> 你可以从这里选择和预览主题的布局和样式，这些设置会被保存在本地，下次打开的时候会直接应用这些设置。</small>
                        </div>
                        <div class="skin-setttings">
                            <div class="title">主题设置</div>
                            <div class="setings-item">
                                <span>收起左侧菜单</span>
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="collapsemenu">
                                        <label class="onoffswitch-label" for="collapsemenu">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                                <span>固定顶部</span>

                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
                                        <label class="onoffswitch-label" for="fixednavbar">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                                <span>固定宽度</span>

                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
                                        <label class="onoffswitch-label" for="boxedlayout">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="title">皮肤选择</div>
                            <div class="setings-item default-skin nb">
                                <span class="skin-name "><a href="hplus/#" class="s-skin-0">默认皮肤</a></span>
                            </div>
                            <div class="setings-item blue-skin nb">
                                <span class="skin-name "><a href="hplus/#" class="s-skin-1">蓝色主题</a></span>
                            </div>
                            <div class="setings-item yellow-skin nb">
                                <span class="skin-name "><a href="hplus/#" class="s-skin-3">黄色/紫色主题</a></span>
                            </div>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane">
                        <div class="sidebar-title">
                            <h3> <i class="fa fa-comments-o"></i> 最新通知</h3>
                            <small><i class="fa fa-tim"></i> 暂无</small>
                        </div>

                        <ul class="sidebar-list">
                           
                        </ul>
                    </div>
                    <div id="tab-3" class="tab-pane">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-cube"></i> 最新任务</h3>
                            <small><i class="fa fa-tim"></i> 暂无</small>
                        </div>

                        <ul class="sidebar-list">
                           
                        </ul>

                    </div>
                </div>

            </div>
        </div>
        <!--右侧边栏结束-->
        <!--mini聊天窗口开始-->
       
       
    </div>
    <script src="{{asset('hplus/js/jquery.min.js?v=2.1.4')}}"></script>
    <script src="{{asset('hplus/js/bootstrap.min.js?v=3.3.6')}}"></script>
    <script src="{{asset('hplus/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('hplus/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('hplus/js/plugins/layer/layer.min.js')}}"></script>
    <script src="{{asset('hplus/js/hplus.min.js?v=4.1.0')}}"></script>
    <script type="text/javascript" src="{{asset('hplus/js/contabs.min.js')}}"></script>
    <script src="{{asset('hplus/js/plugins/pace/pace.min.js')}}"></script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:17:11 GMT -->
</html>
