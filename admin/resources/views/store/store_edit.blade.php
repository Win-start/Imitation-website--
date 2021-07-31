@extends('index.index')

@section('content')

    <form class="layui-form" action="" id="form-category-add" enctype="multipart/form-data" method="get">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        {{csrf_field()}}
    <div class="layui-form-item">
        <label class="layui-form-label">店名</label>
        <div class="layui-input-block">
            <input type="text" name="name" id="name" required  lay-verify="required" value="{{$store->lo_name}}" autocomplete="off" class="layui-input">
        </div>
    </div>
        <div class="layui-form-item">
            <label class="layui-form-label">号码</label>
            <div class="layui-input-block">
                <input type="text" name="phone" id="phone" required  lay-verify="required" value="{{$store->lo_phone}}" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">地址</label>
            <div class="layui-input-block">
                <input type="text" name="address" id="address" required  lay-verify="required" value="{{$store->lo_address}}" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图片</label>
            <div class="layui-input-block">
                <img class="layui-upload-img" width="100" height="100" id="demo1" src="{{$store->image}}">
                <input type="hidden" lay-verify="required" value="" id="file" name="image">
                <button type="button" class="btn  btn-info btn-sm " id="test1">上传商品分类图片</button>
            </div>
        </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" id="id" name="id" value="{{$store->lo_id}}">
            <button class="layui-btn" lay-submit lay-filter="formSave">立即提交</button>
        </div>
    </div>
</form>
<script>
    layui.use('upload', function () {
        var $ = layui.jquery
            , upload = layui.upload;
        var tag_token = $("#token").val();
//普通图片上传
        var uploadInst = upload.render({
            elem: '#test1'
            , url: "{{url('/admin/theme/img')}}"
            , data: {'_token': tag_token}
            , multiple: false
            , done: function (res) {
                //如果上传失败
                if (res.code != 200) {
                    return layer.msg('上传失败');
                }
                $('#file').attr('value', res.data.value);
                $('#demo1').attr('src', res.data.src);
                //上传成功
            }
        });
    })
</script>
    <script type="text/javascript">
        layui.use(['form', 'layer'],
            function () {
                $ = layui.jquery;
                var form = layui.form,
                    layer = layui.layer;

                //监听提交
                form.on('submit(formSave)', function(data){
                    //var data={"name":$("#name").val(),"image":$("#file").val(),"#token":$("#token").val()};
                    //发异步，把数据提交给php
                    $.ajax({
                        type: "get",
                        url: '{{url('/admin/store/edit')}}',
                        data: {
                            'id':$('input[name=id]').val(),
                            'name': $('input[name=name]').val(),
                            'phone':$('input[name=phone]').val(),
                            'address':$('input[name=address]').val(),
                            'image':$("input[name=image]").val(),
                            '_token': $("#token").val()
                        },
                    });
                    layer.alert("添加成功", {
                        icon: 6,
                    },function () {
                        window.location.href = "{{url('/admin/store')}}";
                    });
                    // return false;
                });
            });
    </script>
    @endsection