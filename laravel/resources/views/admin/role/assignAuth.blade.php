<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="Bookmark" href="/favicon.ico">
    <link rel="Shortcut Icon" href="/favicon.ico"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{asset('style/admin/lib')}}/html5shiv.js"></script>
    <script type="text/javascript" src="{{asset('style/admin/lib')}}/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{asset('style/admin/static')}}/h-ui/css/H-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('style/admin/static')}}/h-ui.admin/css/H-ui.admin.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('style/admin/lib')}}/Hui-iconfont/1.0.8/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('style/admin/static')}}/h-ui.admin/skin/default/skin.css"
          id="skin"/>
    <link rel="stylesheet" type="text/css" href="{{asset('style/admin/static')}}/h-ui.admin/css/style.css"/>
    <!--[if IE 6]>
    <script type="text/javascript" src="{{asset('style/admin/lib')}}/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <!--/meta 作为公共模版分离出去-->

    <title>新建网站角色 - 管理员管理 - H-ui.admin v3.1</title>
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
    <form action="" method="post" class="form form-horizontal" id="form-admin-role-add">
        {{csrf_field()}}
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">权限分配：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <dl class="permission-list">
                    <dt>
                        <label>
                            <input type="checkbox" value="" name="user-Character-0" id="user-Character-0">
                            全部权限</label>
                    </dt>
                    <dd>
                        @foreach($topAuths as $topAuth)
                            <dl class="cl permission-list2">
                                <dt>
                                    <label class="">
                                        <input type="checkbox" value="" name="auth[]"
                                               id="user-Character-0-0" {{in_array($topAuth->id,$authids)?'checked':''}}>
                                        {{$topAuth->auth_name}}</label>
                                </dt>
                                <dd>
                                    @foreach($sonAuths as $sonAuth)
                                        @if($topAuth->id==$sonAuth->pid)
                                            <label class="">
                                                <input type="checkbox" name="auth[]" id="user-Character-0-0-0"
                                                       value="{{$sonAuth->id}}" {{in_array($sonAuth->id,$authids)?'checked':''}}>
                                                {{$sonAuth->auth_name}}</label>
                                        @endif
                                    @endforeach
                                </dd>
                            </dl>
                        @endforeach
                    </dd>
                </dl>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <button type="submit" class="btn btn-success radius" id="admin-role-save" name="admin-role-save"><i
                            class="icon-ok"></i> 确定
                </button>
            </div>
        </div>
    </form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('style/admin/lib')}}/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('style/admin/lib')}}/layer/2.4/layer.js"></script>
<script type="text/javascript" src="{{asset('style/admin/static')}}/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="{{asset('style/admin/static')}}/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('style/admin/lib')}}/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="{{asset('style/admin/lib')}}/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="{{asset('style/admin/lib')}}/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
    $(function () {
        $(".permission-list dt input:checkbox").click(function () {
            $(this).closest("dl").find("dd input:checkbox").prop("checked", $(this).prop("checked"));
        });
        $(".permission-list2 dd input:checkbox").click(function () {
            var l = $(this).parent().parent().find("input:checked").length;
            var l2 = $(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
            if ($(this).prop("checked")) {
                $(this).closest("dl").find("dt input:checkbox").prop("checked", true);
                $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked", true);
            }
            else {
                if (l == 0) {
                    $(this).closest("dl").find("dt input:checkbox").prop("checked", false);
                }
                if (l2 == 0) {
                    $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked", false);
                }
            }
        });

        $("#form-admin-role-add").validate({
            //设置验证规则
            rules: {},
            //键盘按下是否验证：true-是，false-否
            onkeyup: false,
            //验证失败去提示获取焦点：true-是，false-否
            focusCleanup: true,
            success: "valid",
            //验证通过后的动作
            submitHandler: function (form) {
                //发送异步请求
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "{{url('admin/role/assignAuth',[request()->route('roleid')])}}",
                    success: function (data) {
                        //请求成功处理
                        //提示
                        if (data == 'success') {
                            layer.msg('添加成功!', {icon: 1, time: 1000});
                        } else {
                            layer.msg('添加失败!', {icon: 2, time: 1000});
                        }
                        //刷新
                        setTimeout(function () {
                            parent.window.location.href = "{{ url('admin/role/index') }}";
                        }, 1100);
                        //关闭弹框
                        //var index = parent.layer.getFrameIndex(window.name);
                        //parent.$('.btn-refresh').click();
                        //parent.layer.close(index);
                    },
                    error: function (XmlHttpRequest, textStatus, errorThrown) {
                        //请求失败处理
                        layer.msg('error2222!', {icon: 2, time: 1000});
                    }
                });
            }
        });
    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>