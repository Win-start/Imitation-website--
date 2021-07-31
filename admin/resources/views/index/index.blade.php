<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>盘子女人坊</title>
    <link rel="stylesheet" href="{{asset('layui/css/layui.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('layui/layui.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">盘子女人坊</div>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="//tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" class="layui-nav-img">
                    {{--{{$admin->user_name}}--}}admin
                </a>
            </li>
            <li class="layui-nav-item"><a href="{{url('/admin/exit')}}">退出</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">主题管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="{{url('/admin/theme/list')}}">主题列表</a></dd>
                        <dd><a href="{{url('/admin/category')}}">主题分类</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">订单管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="{{url('/admin/order/list')}}">订单详情</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">用户管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">用户详情</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">分店管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="{{url('/admin/store/list')}}">分店列表</a></dd>
                    </dl>
                </li>
            </ul>

        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div class="layui-container" style="padding-top: 15px;">
            <div class="layui-row">
                <div class="layui-col-12">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>

    <div class="layui-footer">

    </div>
</div>


<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
</body>
</html>