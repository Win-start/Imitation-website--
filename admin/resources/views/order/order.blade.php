@extends('index.index')

@section('content')
    <div class="layui-container">
        <table class="layui-table">
            <tr>
                <th>主题名</th>
                <th>定金</th>
                <th>金额</th>
                <th>状态</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            @foreach($order as $t)
                <tr>
                    <td>{{$t->name}}</td>
                    <td>{{$t->deposit}}</td>
                    <td>{{$t->price}}</td>
                    @if($t->state == '1')
                        <td>已预约</td>
                    @elseif($t->state == '2')
                        <td>订单已完成，待评价</td>
                    @else
                        <td>订单已被评价</td>
                    @endif
                    <td>{{$t->create_time}}</td>
                    <td><a href="{{url('admin/order_edit')}}">编辑</a>
                        <a href="#">删除</a>
                    </td></tr>
            @endforeach
        </table>
        <div id="pageNav" class="view-page col-md-12 col-md-offset-5">
            {!!$order->render()!!}
        </div>
    </div>
@endsection