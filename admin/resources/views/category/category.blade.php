@extends('index.index')

@section('content')

    <div class="layui-container">
        <a href="{{url('admin/category_add')}}" class="layui-btn">添加分类</a>
        <table class="layui-table">
            <colgroup>
                <col width="150">
                <col width="200">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th>类名</th>
                <th>图片</th>
                <th>加入时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($category as $c)
            <tr>
                <td>{{$c->category_name}}</td>
                <td><img src="{{$c->image}}"> </td>
                <td>{{$c->update_time}}</td>
                <td>
                    <div class="btn-group">
                    <a class="btn btn-default" href="{{url('/admin/category_edit?category_id=').$c->category_id}}">编辑</a>
                    </div>
                    <div class="btn-group">
                    <a class="btn btn-default" href="#" onclick='category_del("{{$c->category_name}}", "{{$c->category_id}}")'>删除</a>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        layui.use('layer', function(){
            var layer = layui.layer;
        });
        function category_del(name, id) {
            var $ = layui.jquery;
            layer.confirm('确认要删除【' + name + '】吗？', function(index){
                //此处请求后台程序，下方是成功后的前台处理……
                $.ajax({
                    type: 'post', // 提交方式 get/post
                    url: '{{url('/admin/category/del')}}', // 需要提交的 url
                    dataType: 'json',
                    data: {
                        id: id,
                        _token: "{{csrf_token()}}"
                    },
                });
                layer.alert("删除成功", {
                    icon: 6,
                },function () {
                    window.location.href = "{{url('/admin/category')}}";
                });
            });
        }
    </script>
@endsection
