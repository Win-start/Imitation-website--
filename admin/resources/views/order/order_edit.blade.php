@extends('index.index')

@section('content')
    <form class="layui-form" action="" id="form-product-add">
        <div class="layui-form-item">
            <label class="layui-form-label">主题名</label>
            <div class="layui-input-block">
                <input type="text" name="name" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">定金</label>
            <div class="layui-input-block">
                <input type="text" name="deposit" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">价格</label>
            <div class="layui-input-block">
                <input type="text" name="price" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
    <script>
    //Demo
    layui.use('form', function(){
        var form = layui.form;

        //监听提交
        form.on('submit(formDemo)', function(data){
            // layer.msg(JSON.stringify(data.field));
            $.ajax({
                type: 'POST', // 提交方式 get/post
                url: '{{url('/admin/theme/save')}}', // 需要提交的 url
                //dataType: 'json',
                data: {
                    name: $('input[name=name]').val(),
                    category_id: $('#category_id').val(),
                    deposit: $('input[name=deposit]').val(),
                    price: $('input[name=price]').val(),
                    _token: "{{csrf_token()}}"
                },
                success: function(data) {
                    layer.msg("提交成功")
                    window.location.href = '{{url('/admin/theme/theme')}}';
                }
            });
            return false;
        });
    });
</script>
@endsection