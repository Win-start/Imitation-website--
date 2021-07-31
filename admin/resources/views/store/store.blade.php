@extends('index.index')

@section('content')
    <div class="layui-container">
        <a href="{{url('admin/store_add')}}" class="layui-btn">添加分店</a>
        <table class="layui-table">
            <tr>
                <th>分店所在地</th>
                <th>分店地址</th>
                <th>分店电话</th>
                <th>操作</th>
            </tr>
            @foreach($store as $t)
                <tr>
                    <td>{{$t->lo_name}}</td>
                    <td>{{$t->lo_address}}</td>
                    <td>{{$t->lo_phone}}</td>
                    <td><div class="btn-group">
                            <a class="btn btn-default" href="{{url('/admin/store_edit?id=').$t->lo_id}}">编辑</a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default" href="#" onclick='store_del("{{$t->lo_name}}", "{{$t->lo_id}}")'>删除</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        <div id="pageNav" class="view-page col-md-12 col-md-offset-5">
            {!!$store->render()!!}
        </div>
    </div>
@endsection
