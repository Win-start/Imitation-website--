@extends('index.main-login')
@section('title','后台登录')
@section('content')
    <div style="width: 25%;margin: 0 auto;padding-top: 120px">
        <h3 style="text-align: center;margin-bottom: 40px;font-weight: bold;">盘子女人坊后台</h3>
        <div>
            <div class="form-group">
                <input type="text" name='user_name' class="form-control" placeholder="用户名">
            </div>
            <div class="form-group">
                <input type="password"  name='password' class="form-control" placeholder="密码">
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit"  onclick="onLogin()"  class="btn btn-primary btn-block btn-flat">登录</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        layui.use('layer', function(){
            var layer = layui.layer;
        });
        function onLogin() {
            var $ = layui.jquery;
            var username = $('input[name=user_name]').val();
            var password = $('input[name=password]').val();
            $.ajax({
                    type: 'post', // 提交方式 get/post
                    url: "{{url('/admin/service/login')}}", // 需要提交的 url
                    dataType: 'json',
                    data: {
                        user_name: username,
                        password: password,
                        _token: "{{csrf_token()}}"
                    },
                    success: function (data) {
                        if (data == null) {
                            alert('服务端错误');
                            return;
                        }
                        if (data.status != 0) {
                            alert(data.message);
                            return;
                        }
                        location.href = "{{url('/admin/theme/list')}}";
                    },
                    error: function (xhr, status, error) {
                        alert('ajax error');
                    },
                    beforeSend: function (xhr) {
                    }
                }
            );
        }
    </script>
@endsection