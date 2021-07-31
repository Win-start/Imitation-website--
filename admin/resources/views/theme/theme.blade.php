@extends('index.index')

@section('content')
    <div class="layui-container">
        <a href="{{url('admin/theme_add')}}" class="layui-btn">添加主题</a>
        <table class="layui-table">
            <colgroup>
                <col width="150">
                <col width="200">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th>主题名</th>
                <th>图片</th>
                <th>分类</th>
                <th>定金</th>
                <th>金额</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($theme as $t)
                <tr>
                    <td>{{$t->name}}</td>
                    <td><img src="{{$t->image}}" ></td>
                    <td>{{$t->category_name}}</td>
                    <td>{{$t->deposit}}</td>
                    <td>{{$t->price}}</td>
                    <td>{{$t->create_time}}</td>
                    <td><div class="btn-group">
                            <a class="btn btn-default" href="{{url('/admin/theme_edit?id=').$t->id}}">编辑</a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default" href="#" onclick='theme_del("{{$t->name}}", "{{$t->id}}")'>删除</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div id="pageNav" class="view-page col-md-12 col-md-offset-5">
            {!!$theme->render()!!}
        </div>
    </div>
    <script>
        layui.use('layer', function(){
            var layer = layui.layer;
        });
        function theme_del(name, id) {
            var $ = layui.jquery;
            layer.confirm('确认要删除【' + name + '】吗？', function(index){
                //此处请求后台程序，下方是成功后的前台处理……
                $.ajax({
                    type: 'post', // 提交方式 get/post
                    url: '{{url('/admin/theme/del')}}', // 需要提交的 url
                    dataType: 'json',
                    data: {
                        id: id,
                        _token: "{{csrf_token()}}"
                    },
                });
                layer.alert("删除成功", {
                    icon: 6,
                },function () {
                    window.location.href = "{{url('/admin/theme/list')}}";
                });
            });
        }
    </script>
@endsection
