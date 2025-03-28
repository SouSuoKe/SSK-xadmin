<?php
if(!defined('IN_SSK_XADMIN')) {
    exit('Access Denied');
}
?>

<!doctype html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $website_name; ?></title>
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <link rel="stylesheet" href="./fonts/fontawesome/css/fontawesome.css">
        <link rel="stylesheet" href="./fonts/fontawesome/css/brands.css">
        <link rel="stylesheet" href="./fonts/fontawesome/css/solid.css">
        <!-- <link rel="stylesheet" href="./css/theme5.css"> -->
        <script type="text/javascript" src="./js/jquery.min.js"></script>
<?php
if($http_encrypt){
print<<<END
        <script type="text/javascript" src="./js/crypto-js-4.1.1/crypto-js.js"></script>
        <script type="text/javascript" src="./js/crypto-js-4.1.1/enc-base64.js"></script>
        <script type="text/javascript" src="./js/crypto-js-4.1.1/pad-zeropadding.js"></script>
        <script type="text/javascript" src="./js/jsencrypt.min.js"></script>
        <script type="text/javascript" src="./js/ssk_encrypt.js"></script>
END;
}else{
    //
}
?>

        <script type="text/javascript" src="./js/jquery.cookie.js"></script>
        <script type="text/javascript" src="./lib/layui/layui.js"></script>
        <script type="text/javascript" src="./js/menu.js"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
        
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
          <script src="./js/html5.min.js"></script>
          <script src="./js/respond.min.js"></script>
        <![endif]-->
<?php
if($is_remember){
    //开启刷新记忆tab功能
}else{
    //不开启刷新记忆tab功能
print<<<END
        <script>
            var is_remember = false;
        </script>
END;
}
?>
    </head>
    <body class="index">

<?php
if($password===""){
print<<<END
<script>
layui.use(function() {
    var table = layui.table;
    var form = layui.form;
    var dropdown = layui.dropdown;
    var layer = layui.layer;
    newusersetpassword();

    function newusersetpassword(){
        layer.alert(''
            +'<form class="layui-form" lay-filter="form-setpasswd">'
            +'<div class="layui-form-item">'
            +'    <label for="username" class="layui-form-label">用户名</label>'
            +'    <div class="layui-input-inline">'
            +'        <input type="text" id="username" name="username" disabled value="{$username}" class="layui-input">'
            +'    </div>'
            +'</div>'
            +'<div class="layui-form-item">'
            +'    <label for="newpass" class="layui-form-label"><span class="x-red">*</span>新密码</label>'
            +'    <div class="layui-input-inline">'
            +'        <input type="password" id="newpass" name="newpass" required="" lay-verify="password" autocomplete="off" class="layui-input">'
            +'    </div>'
            +'    <div class="layui-form-mid layui-word-aux">6到16个字符</div>'
            +'</div>'
            +'<div class="layui-form-item">'
            +'    <label for="repass" class="layui-form-label">'
            +'        <span class="x-red">*</span>确认密码</label>'
            +'    <div class="layui-input-inline">'
            +'        <input type="password" id="repass" name="repass" required="" lay-verify="password" autocomplete="off" class="layui-input">'
            +'    </div>'
            +'</div>'
            +'</form>'
            , {
                title: '请修改初始密码！',
                closeBtn: 0,
                btn: ['确认'],
                btnAlign: 'c',
                btn1: function(){
                    form.submit('form-setpasswd', function(data){
                        var field = data.field; // 获取表单全部字段值
                        console.log(JSON.stringify(field));
                        var pwddata='{"newpass":"'+$("#newpass").val()+'","repass":"'+$("#repass").val()+'"}';
                        $.ajax({
                            url: 'action.php?a=password&method=setpwd',
                            type: 'post',

END;

if($http_encrypt){
print<<<END
                            data: 'data='+ssk_encrypt(pwddata),
END;
}else{
print<<<END
                            data: 'data='+pwddata,
END;
}
print<<<END

                            success: function(data) {
                                console.log(data);
                                if (data.code === 0) {
                                    layer.alert(data.msg+"<p>请使用新密码重新登录！</p>", {icon: 6},function(index) {
                                        $.ajax({
                                            url: 'logout.php',
                                            type: 'post',
                                            data: 'logout',
                                            success: function(data) {
                                                console.log(data);
                                                if (data.code === 0) {
                                                    xadmin.add_tab('修改密码', '?p=password', true);
                                                    $(window).attr('location', 'login.php');
                                                } else {
                                                    layer.alert(data.msg+"<p>action：logout<br>code："+data.code+"</p>",{icon: 2});
                                                }
                                            },
                                            error: function(xhr, textStatus, errorThrown) {
                                                console.log("进入error---");
                                                console.log("状态码：" + xhr.status);
                                                console.log("状态:" + xhr.readyState); //当前状态,0-未初始化，1-正在载入，2-已经载入，3-数据进行交互，4-完成。
                                                console.log("错误信息:" + xhr.statusText);
                                                console.log("返回响应信息：" + xhr.responseText);
                                                console.log("请求状态：" + textStatus);
                                                console.log(errorThrown);
                                                console.log("请求失败");
                                            }
                                        });
                                    });
                                } else {
                                    layer.alert(data.msg+"<p>action：password<br>code："+data.code+"</p>",{icon: 2});
                                }
                            },
                            error: function(xhr, textStatus, errorThrown) {
                                console.log("进入error---");
                                console.log("状态码：" + xhr.status);
                                console.log("状态:" + xhr.readyState); //当前状态,0-未初始化，1-正在载入，2-已经载入，3-数据进行交互，4-完成。
                                console.log("错误信息:" + xhr.statusText);
                                console.log("返回响应信息：" + xhr.responseText);
                                console.log("请求状态：" + textStatus);
                                console.log(errorThrown);
                                console.log("请求失败");
                            }
                        });
                        return false;
                    });
                    return false;
                },
                success: function(){
                    form.render();
                    form.verify({
                        password: function (value, elem) {
                            if ($("#newpass").val() === "" && $("#repass").val() === "") {
                                layer.alert("请输入密码！", { icon: 2, closeBtn: 0 }, function (index) {
                                    layer.close(index);
                                    newusersetpassword();
                                });
                                return true;
                            } else if ($("#newpass").val() !== $("#repass").val()) {
                                layer.alert("两次输入的密码不同！", { icon: 2, closeBtn: 0 }, function (index) {
                                    layer.close(index);
                                    newusersetpassword();
                                });
                                return true;
                            } else {
                                //
                            }
                        }
                    });
                }
            }
        );
    }
});
</script>

END;
}else{
    //
}
?>
        <!-- 顶部开始 -->
        <div class="container">
            <div class="logo">
                <a href="./index.php"><?php echo $website_name; ?></a>
            </div>
            <div class="left_open">
                <a><i title="展开左侧栏" class="iconfont">&#xe699;</i></a>
            </div>
            <!---- >
            <ul class="layui-nav left fast-add" lay-filter="">
                <li class="layui-nav-item">
                    <a href="javascript:;">+新增</a>
                    <dl class="layui-nav-child">
                        <!-- 二级菜单 -- >
                        <dd>
                            <a onclick="xadmin.open('最大化','http://127.0.0.1/','','',true)">
                                <i class="iconfont">&#xe6a2;</i>弹出最大化
                            </a>
                        </dd>
                        <dd>
                            <a onclick="xadmin.open('弹出自动宽高','http://127.0.0.1/')">
                                <i class="iconfont">&#xe6a8;</i>弹出自动宽高
                            </a>
                        </dd>
                        <dd>
                            <a onclick="xadmin.open('弹出指定宽高','http://127.0.0.1/',500,300)">
                                <i class="iconfont">&#xe6a8;</i>弹出指定宽高
                            </a>
                        </dd>
                        <dd>
                            <a onclick="xadmin.add_tab('在tab打开','member-list.html')">
                                <i class="iconfont">&#xe6b8;</i>在tab打开
                            </a>
                        </dd>
                        <dd>
                            <a onclick="xadmin.add_tab('在tab打开刷新','member-del.html',true)">
                                <i class="iconfont">&#xe6b8;</i>在tab打开刷新
                            </a>
                        </dd>
                        <dd>
                            <a onclick="xadmin.add_tab('图标对应字体','unicode.html')">
                                图标字体 > 图标对应字体
                            </a>
                        </dd>
                    </dl>
                </li>
            </ul>
            <!---->
            <ul class="layui-nav right" lay-filter="">
                <li class="layui-nav-item" style="margin-right:20px;">
                    <a href="javascript:;"><?php echo $username; ?></a>
                    <dl class="layui-nav-child">
                        <!-- 二级菜单 -->
                        <!--<dd><a onclick="xadmin.open('个人信息','http://127.0.0.1/')">个人信息</a></dd>-->
                        <dd><a onclick="xadmin.add_tab('修改密码','?p=password',true)">修改密码</a></dd>
                        <dd><a href="javascript:;" id="logout">退出</a></dd>
                    </dl>
                </li>
                <!--
                <li class="layui-nav-item to-index">
                    <a href="/">前台首页</a>
                </li>
                -->
            </ul>
        </div>
        <!-- 顶部结束 -->
        <!-- 中部开始 -->
        <!-- 左侧菜单开始 -->
        <div class="left-nav">
            <div id="side-nav">
                <ul id="nav">
                <!-- <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="会员管理">&#xe6b8;</i>
                            <cite>会员管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('统计页面','welcome1.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>统计页面</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('会员列表(静态表格)','member-list.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>会员列表(静态表格)</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('会员列表(动态表格)','member-list1.html',true)">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>会员列表(动态表格)</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('会员删除','member-del.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>会员删除</cite>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="iconfont">&#xe70b;</i>
                                    <cite>会员管理</cite>
                                    <i class="iconfont nav_right">&#xe697;</i>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a onclick="xadmin.add_tab('会员删除','member-del.html')">
                                            <i class="iconfont">&#xe6a7;</i>
                                            <cite>会员删除</cite>
                                        </a>
                                    </li>
                                    <li>
                                        <a onclick="xadmin.add_tab('等级管理','member-list1.html')">
                                            <i class="iconfont">&#xe6a7;</i>
                                            <cite>等级管理</cite>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="订单管理">&#xe723;</i>
                            <cite>订单管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('订单列表','order-list.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>订单列表</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('订单列表1','order-list1.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>订单列表1</cite>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="分类管理">&#xe723;</i>
                            <cite>分类管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('多级分类','cate.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>多级分类</cite>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="城市联动">&#xe723;</i>
                            <cite>城市联动</cite>
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('三级地区联动','city.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>三级地区联动</cite>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="管理员管理">&#xe726;</i>
                            <cite>管理员管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('管理员列表','admin-list.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>管理员列表</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('角色管理','admin-role.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>角色管理</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('权限分类','admin-cate.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>权限分类</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('权限管理','admin-rule.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>权限管理</cite>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="系统统计">&#xe6ce;</i>
                            <cite>系统统计</cite>
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('拆线图','echarts1.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>拆线图</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('拆线图','echarts2.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>拆线图</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('地图','echarts3.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>地图</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('饼图','echarts4.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>饼图</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('雷达图','echarts5.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>雷达图</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('k线图','echarts6.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>k线图</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('热力图','echarts7.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>热力图</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('仪表图','echarts8.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>仪表图</cite>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="图标字体">&#xe6b4;</i>
                            <cite>图标字体</cite>
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('图标对应字体','unicode.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>图标对应字体</cite>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="其它页面">&#xe6b4;</i>
                            <cite>其它页面</cite>
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="login.php" target="_blank">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>登录页面</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('错误页面','error.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>错误页面</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('示例页面','demo.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>示例页面</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('更新日志','log.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>更新日志</cite>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="第三方组件">&#xe6b4;</i>
                            <cite>layui第三方组件</cite>
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('滑块验证','https://www.bejson.com/doc/layui/extend/sliderVerify/index.html')" target="">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>滑块验证</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('富文本编辑器','https://www.bejson.com/doc/layui/extend/layedit/index.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>富文本编辑器</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('eleTree 树组件','https://www.bejson.com/doc/layui/extend/eleTree/index.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>eleTree 树组件</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('图片截取','https://www.bejson.com/doc/layui/extend/croppers/index.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>图片截取</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('formSelects 4.x 多选框','https://www.bejson.com/doc/layui/extend/formSelects/index.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>formSelects 4.x 多选框</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('Magnifier 放大镜','https://www.bejson.com/doc/layui/extend/Magnifier/index.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>Magnifier 放大镜</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('notice 通知控件','https://www.bejson.com/doc/layui/extend/notice/index.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>notice 通知控件</cite>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
        </div>
        <!-- <div class="x-slide_left"></div> -->
        <!-- 左侧菜单结束 -->
        <!-- 右侧主体开始 -->
        <div class="page-content">
            <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
                <ul class="layui-tab-title">
                    <li class="home">
                        <i class="layui-icon">&#xe68e;</i>我的桌面
                    </li>
                </ul>
                <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
                    <dl>
                        <dd data-type="this">关闭当前</dd>
                        <dd data-type="other">关闭其它</dd>
                        <dd data-type="all">关闭全部</dd>
                    </dl>
                </div>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <iframe src='?p=welcome' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
                    </div>
                </div>
                <div id="tab_show"></div>
            </div>
        </div>
        <div class="page-content-bg"></div>
        <style id="theme_style"></style>
        <!-- 右侧主体结束 -->
        <!-- 中部结束 -->
    </body>
    <script>
        $(document).ready(function(){
            $("#logout").click(function(){
                $.ajax({
                    url: 'logout.php',
                    type: 'post',
                    data: 'logout',
                    success: function(data) {
                        console.log(data);
                        if (data.code === 0) {
                            layer.msg(data.msg, {
                                icon: 1,
                                time: 1000
                            }, function(){
                                localStorage.removeItem("cate");
                                localStorage.removeItem("tab_list");
                                localStorage.clear();
                                $(window).attr('location', 'login.php');
                            });
                        } else {
                            layer.alert(data.msg+"<p>action：logout<br>code："+data.code+"</p>",{icon: 2});
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.log("进入error---");
                        console.log("状态码：" + xhr.status);
                        console.log("状态:" + xhr.readyState); //当前状态,0-未初始化，1-正在载入，2-已经载入，3-数据进行交互，4-完成。
                        console.log("错误信息:" + xhr.statusText);
                        console.log("返回响应信息：" + xhr.responseText);
                        console.log("请求状态：" + textStatus);
                        console.log(errorThrown);
                        console.log("请求失败");
                    }
                });
            });
        });
    </script>
</html>