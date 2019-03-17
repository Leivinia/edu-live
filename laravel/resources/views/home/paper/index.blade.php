<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{asset('style/home/css')}}/globs.css">
    <link rel="stylesheet" type="text/css" href="{{asset('style/home/css')}}/exam.css">
    <script type="text/javascript" src="{{asset('style/home/js')}}/jquery.min.js"></script>
    <!-- 页面样式 -->
    <link rel="stylesheet" href="{{asset('style/home/css')}}/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('style/home/css')}}/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{asset('style/home/css')}}/mylogin.css">
    <link rel="stylesheet" href="{{asset('style/home/css')}}/componet.css">
    <link rel="stylesheet" href="{{asset('style/home/css')}}/index.css">
    <link rel="stylesheet" href="{{asset('style/home/css')}}/header.css">
    <link rel="stylesheet" href="{{asset('style/home/css')}}/footer.css">
    <link rel="stylesheet" href="{{asset('style/home/css')}}/iconfont.css">
    <link rel="stylesheet" href="{{asset('style/home/css')}}/kaoshi.css">
    <link rel="stylesheet" type="text/css" href="{{asset('style/home/css')}}/tk-cb-2.css">
</head>
<body>
<header>
    <div class="header_body">
        <div class="header_left"><a href="http://www.boxuegu.com/index.html"><img
                        src="{{asset('style/home/img')}}/logo.png" alt=""></a>
            <div class="path"><a href="http://www.boxuegu.com/index.html" class="select">云课堂</a><a
                        href="http://www.boxuegu.com/web/html/ansAndQus.html">问答精灵</a></div>
        </div>
        <div class="header_right"><a href="javascript:;" class="studentCenterBox">学习中心</a>
            <div class="loginGroup">
                <div class="login" style="display: block;">
                    <div class="dropdown" id="myDropdown">
                        <div class="userPic"
                             style="background: url(&quot;{{asset('style/home/img')}}/18.png&quot;) 0% 0% / 100% 100% no-repeat;"></div>
                        <div id="dLabel" data-target="#" role="button" aria-haspopup="true"><span class="name"
                                                                                                  title="suxiaolin">suxiaolin</span><span
                                    class="caret"></span></div>
                        <ul class="dropdownmenu" aria-labelledby="dLabel">
                            <div class="pointer"></div>
                            <li><a data-id="mynews"><i class="iconfont icon-ziyuan myNews" style="font-size:12px"></i>我的消息</a>
                            </li>
                            <li><a data-id="mydata"><i class="iconfont icon-xueyuan"></i>我的资料</a></li>
                            <li><a data-id="idea"><i class="iconfont icon-yijianfankui"></i>意见反馈</a></li>
                            <li><a data-exit="exit"><i class="iconfont icon-tuichu"></i>安全退出</a></li>
                        </ul>
                    </div>
                </div>
                <div class="logout" style="display:none;"><a class="btn-login btn-link" data-toggle="modal"
                                                             data-target="#login" data-backdrop="static">登录</a> <a
                            class="btn-register btn-link"
                            href="http://www.boxuegu.com/web/html/login.html?ways=register">注册</a></div>
            </div>
        </div>
    </div>
    <div class="modal" id="login" data-backdrop="static" style="display: none;">
        <div class="modal-dialog login-module" role="document">
            <div class="cymylogin">
                <div class="cymylogin-top clearfix">
                    <div class="cymyloginclose" data-dismiss="modal" aria-label="Close" data-backdrop="static"></div>
                    <div class="cymyloginlogo">欢迎登录&nbsp;&nbsp;博学谷云课堂</div>
                    <div class="cymyloginhint cymlogin" style="top: 221px; display: block;">请输入6-18位密码</div>
                </div>
                <div class="cymylogin-bottom form-login"><input type="text" class="cyinput1 form-control" maxlength="30"
                                                                placeholder="请输入手机号或邮箱" autocomplete="off">
                    <div class="cymyloginclose1"></div>
                    <input type="password" class="cyinput2 form-control" maxlength="18" placeholder="请输入6-18位密码"
                           autocomplete="off" style="border: 1px solid rgb(255, 64, 18);">
                    <div class="cymyloginclose2"></div>
                    <button class="cymyloginbutton">登<em></em>录</button>
                    <div class="cymyloginpassword"><a class="atOnceRegister"
                                                      href="http://www.boxuegu.com/web/html/login.html?ways=register">立即注册</a><a
                                class="atOnceResetPassword" href="http://www.boxuegu.com/web/html/resetPassword.html">忘记密码?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="consult_center">咨询中心</div>
    <div class="online_consult"><a
                href="http://crm2.qq.com/page/portalpage/wpa.php?uin=800146955&amp;aty=2&amp;a=2&amp;curl=&amp;ty=1"
                target="_blank"><img src="{{asset('style/home/img')}}/zixun.gif" alt=""><span>在线咨询</span></a></div>
    <div class="phone_consult">
        <div class="phone_consult_box"><img src="{{asset('style/home/img')}}/tel.gif" alt=""><span class="dianhuazixun">电话咨询</span>
        </div>
        <span class="phone_number">400-618-4000</span></div>
    <div class="sideWeixinBox">
        <div class="sideWeixin"><img src="{{asset('style/home/img')}}/sideWeixinErma.png">
            <p>关注微信</p></div>
    </div>
    <a class="sideWeiboBox" href="http://weibo.com/u/5999622644?refer_flag=1001030102_&amp;is_hot=1" target="_blank">
        <div class="sideWeibo"><img src="{{asset('style/home/img')}}/sideWeiboErma.png">
            <p>关注微博</p></div>
    </a>
    <div class="sideWeixinErma"><img src="{{asset('style/home/img')}}/sideWeixin.png">
        <div class="sideSanjiao"><img src="{{asset('style/home/img')}}/float_sanjiao.png"></div>
    </div>
    <div class="sideWeiboErma"><img src="{{asset('style/home/img')}}/sideWeibopng.png">
        <div class="sideSanjiao1"><img src="{{asset('style/home/img')}}/float_sanjiao.png"></div>
    </div>
    <div class="h_top" onclick="pageScroll();" style="display: none;"><span class="wrap"><img
                    src="{{asset('style/home/img')}}/top.png" alt=""><span class="h_top_s">top</span></span></div>
</header>
<div class="container-footer">
    <div class="end-div mt20" style="background:#FFF">
        <div class="end-div-left fl">
            <h1 class="pt30 ml20">试卷A</h1>
        </div>
        <div class="pinfen fr" style="display:none;">
            <span>0分/100分</span>
        </div>
    </div>
</div>
<!-- 内容区 -->
<form method="post" action="考试结果.html">
    <div class="container" style="background:#FFF">
        <h3 class="datika mt20">题目列表</h3>
        <div class="end-dn">
            <div class="content">
                @foreach ($questions as $question)
                    @if ($question->type == 1)
                        <div class="col">
                            <h4>{{$question->question}}</h4>
                            @php
                                $optionsArr = explode(',', $question->options);
                            @endphp
                            @foreach ($optionsArr  as  $k=>$option)
                                <div class="opt">
                                    <input class="magic-radio" type="radio"
                                           name="answer[{{$question->id}}]"
                                           id="r{{$question->id}}{{$k}}"
                                           value="option1"
                                    />
                                    <label for="r{{$question->id}}{{$k}}">{{$option}}</label>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
                <br/>
                <hr/>

                @foreach ($questions as $question)
                    @if ($question->type == 2)
                        <div class="col">
                            <h4>{{$question->question}}</h4>
                            @php
                                $optionsArr = explode(',', $question->options);
                            @endphp
                            @foreach ($optionsArr as $k=>$option)
                                <div class="opt">
                                    <input class="magic-checkbox" type="checkbox" name="answer[{{$question->id}}]"
                                           id="c{{$question->id}}{{$k}}">
                                    <label for="c{{$question->id}}{{$k}}">{{$option}}</label>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
        <div class="daan-detail mt20">
            <h3 class="datika"><input type="submit" name="提交" id="submit"></h3>
        </div>
    </div>
</form>
<div class="hg20"></div>
<script type="text/javascript"></script>
<div class="footerDT">
    <footer>
        <div class="content">
            <div class="content-item footer-bodys">
                <div class="content-item content-footer-link about-us">
                    <ul class="gate">
                        <li data-id="first">关于我们<span>|</span></li>
                        <li data-id="two" data-url="../html/aboutUs.html">人才招聘<span>|</span></li>
                        <li data-id="three" data-url="../html/aboutUs.html">联系我们<span>|</span></li>
                        <li data-id="four" data-url="../html/aboutUs.html" class="noline">常见问题</li>
                    </ul>
                </div>
                <div class="trademark">京ICP备08001421号 京公网安备110108007702 Copyright @ 2016 博学谷 All Rights Reserved<span
                            style="margin-right:5px;"></span><span id="cnzz_stat_icon_1260713417"></span></div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>