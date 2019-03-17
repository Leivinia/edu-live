<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ asset('style/admin/lib') }}/html5shiv.js"></script>
    <script type="text/javascript" src="{{ asset('style/admin/lib') }}/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{ asset('style/admin/static') }}/h-ui/css/H-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('style/admin/static') }}/h-ui.admin/css/H-ui.admin.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('style/admin/lib') }}/Hui-iconfont/1.0.8/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('style/admin/static') }}/h-ui.admin/skin/default/skin.css"
          id="skin"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('style/admin/static') }}/h-ui.admin/css/style.css"/>
    <!--[if IE 6]>
    <script type="text/javascript" src="{{ asset('style/admin/lib') }}/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>添加管理员 - 管理员管理 - H-ui.admin v3.1</title>
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">所属直播流：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
		<select class="select" name="stream_id" size="1">
			@foreach($streams as $stream)
                <option value="{{$stream->id}}">{{$stream->stream_name}}</option>
            @endforeach
		</select>
		</span></div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>直播课程名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" name="live_name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>封面：</label>
            <div class="formControls col-xs-8 col-sm-9">
                {{--<input type="file" name="img">--}}
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>封面</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <!-- <input type="file" class="input-text"  name="img"> -->
                        <!--dom结构部分-->
                        <div id="uploader-demo">
                            <!--用来存放item-->
                            <div id="fileList" class="uploader-list"></div>
                            <div id="filePicker">选择图片</div>

                            <input type="text" name="img" id="hiddenImgVal" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>直播日期：</label>
            <div class="formControls col-xs-8 col-sm-9">

                <input class="input-text Wdate" name="start_time" style="width: 200px" type="text" id="d233"
                       onclick="WdatePicker({startDate:'%y-%M-01 00:00:00',dateFmt:'yyyy-MM-dd HH:mm:ss',alwaysUseStartDate:true})"/>
                -
                <input class="input-text Wdate" name="end_time" style="width: 200px" type="text" id="d233"
                       onclick="WdatePicker({startDate:'%y-%M-01 00:00:00',dateFmt:'yyyy-MM-dd HH:mm:ss',alwaysUseStartDate:true})"/>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{ asset('style/admin/lib') }}/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('style/admin/lib') }}/layer/2.4/layer.js"></script>
<script type="text/javascript" src="{{ asset('style/admin/static') }}/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="{{ asset('style/admin/static') }}/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{ asset('style/admin/lib') }}/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript"
        src="{{ asset('style/admin/lib') }}/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript"
        src="{{ asset('style/admin/lib') }}/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="{{ asset('style/admin/lib') }}/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
    $(function () {
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        //jquery.validate.js   表单验证插件
        //给form表单增加id选择器后 调用 validate（对象）
        //表单提交时触发
        $("#form-admin-add").validate({
            //声明验证规则
            rules: {
                live_name: {
                    required: true,
                    minlength: 4,
                    maxlength: 16
                }
            },
            //当键盘松开验证
            onkeyup: true,
            //获取焦点自动清除
            focusCleanup: true,
            success: "valid",
            //验证通过触发
            submitHandler: function (form) {
                //整个表单发送请求
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "{{ url('admin/live/add') }}",
                    success: function (data) {
                        layer.msg('添加成功!', {icon: 1, time: 1000});

                        setTimeout(function () {
                            parent.window.location.href = "{{url('admin/live/index')}}"
                        }, 2000)
                    },
                    error: function (XmlHttpRequest, textStatus, errorThrown) {
                        layer.msg('error!', {icon: 2, time: 1000});
                    }
                });
                // //关闭弹框
                // var index = parent.layer.getFrameIndex(window.name);
                // parent.$('.btn-refresh').click();
                // parent.layer.close(index);
            }
        });
    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>