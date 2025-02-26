<?php
if(!defined('IN_SSK_XADMIN')) {
    exit('Access Denied');
}

$username=$usermeta[0]->username;
$datetime=date("Y-m-d H:i:s",time());
$ggt=$usermeta[0]->ggtolerance;
?>

<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>修改密码</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
          <script src="./js/html5.min.js"></script>
          <script src="./js/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body class="layui-bg-gray">
        <div style="padding: 16px;">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md6">
                    <div class="layui-card">
                        <div class="layui-card-header">密码</div>
                        <div class="layui-card-body">
                            <div class="layui-fluid">
                                <div class="layui-row">
                                    <form class="layui-form">
                                        <div class="layui-form-item">
                                            <label for="username" class="layui-form-label">用户名</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="username" name="username" disabled value="<?php echo $username; ?>" class="layui-input">
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label for="newpass" class="layui-form-label"><span class="x-red">*</span>新密码</label>
                                            <div class="layui-input-inline">
                                                <input type="password" id="newpass" name="newpass" required="" lay-verify="password" autocomplete="off" class="layui-input">
                                            </div>
                                            <div class="layui-form-mid layui-word-aux">6到16个字符</div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label for="repass" class="layui-form-label">
                                                <span class="x-red">*</span>确认密码</label>
                                            <div class="layui-input-inline">
                                                <input type="password" id="repass" name="repass" required="" lay-verify="password" autocomplete="off" class="layui-input">
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label"></label>
                                            <button class="layui-btn" lay-filter="savepwd" lay-submit="">确认</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md6">
                    <div class="layui-card">
                        <div class="layui-card-header">动态密码</div>
                        <div class="layui-card-body">
                            <blockquote class="layui-elem-quote" style="margin-bottom:20px;">使用动态密码可有效防止密码泄露！</blockquote>
                            <form class="layui-form">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">*</label>
                                    <button class="layui-btn" lay-filter="getotp" lay-submit="">点此扫码安装动态密码软件</button>
                                </div>
                            </form>
                            
                            <form class="layui-form">
                                <div class="layui-form-item">
                                    <label for="ggt" class="layui-form-label">有效时长</label>
                                    <div class="layui-input-inline" style="width:70px;">
                                        <select name="ggt" id="ggt" lay-verify="">
                                            <option value="1">30</option>
                                            <option value="2">60</option>
                                            <option value="3">90</option>
                                            <option value="4">120</option>
                                        </select>
                                    </div>
                                    <div class="layui-form-mid layui-word-aux">秒</div>
                                    <button class="layui-btn" lay-filter="saveggt" lay-submit="">确认</button>
                                </div>
                            </form>
                            
                            <form class="layui-form">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">*</label>
                                    <button class="layui-btn" lay-filter="rebindGA" lay-submit="">绑定 / 重置 动态密码</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
        <script type="text/javascript" src="./js/jquery.qrcode.min.js"></script>
        <script>
        $('#ggt').val('<?php echo $ggt; ?>');

        layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer,
                jQuery = layui.jquery;

                form.verify({
                    password: function (value, elem) {
                        if ($("#newpass").val() === "" && $("#repass").val() === "") {
                            layer.alert("请输入密码！", { icon: 2, closeBtn: 0 }, function (index) {
                                layer.close(index);
                            });
                            return true;
                        } else if ($("#newpass").val() !== $("#repass").val()) {
                            layer.alert("两次输入的密码不同！", { icon: 2, closeBtn: 0 }, function (index) {
                                layer.close(index);
                            });
                            return true;
                        } else {
                            //
                        }
                    }
                });

                //修改密码
                form.on('submit(savepwd)',
                function(data) {
                    console.log(data);
                    var pwddata='{"newpass":"'+$("#newpass").val()+'","repass":"'+$("#repass").val()+'"}';
                    $.ajax({
                        url: 'action.php?a=password',
                        type: 'post',
<?php
if($http_encrypt){
print<<<END
                        data: 'data='+ssk_encrypt(pwddata),
END;
}else{
print<<<END
                        data: 'data='+pwddata,
END;
}
?>

                        success: function(data) {
                            console.log(data);
                            if (data.code === 0) {
                                layer.alert(data.msg, {icon: 6},function(index) {
                                    layer.close(index);
                                    $("#newpass").val("");
                                    $("#repass").val("");
                                });
                            } else {
                                layer.alert(data.msg+"code："+data.code);
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

                //下载OTP软件
                form.on('submit(getotp)',
                function(data){
                    console.log(data);
                    layer.tab({
                        area: ['350px', '316px'],
                        tab: [{
                            title: '<i class="layui-icon layui-icon-ios" style="padding-right:5px;"></i>iPhone', 
                            content: '<div id="otpapple" style="padding: 16px;text-align:center;"></div>'
                        }, {
                            title: '<i class="layui-icon layui-icon-android" style="padding-right:5px;"></i>Android', 
                            content: '<div id="otpandroid" style="padding: 16px;text-align:center;"></div>'
                        }],
                        shadeClose: true
                    });
                    $(function(){
                        $('#otpapple').qrcode({
                            render: "canvas",
                            width: 225,
                            height: 225,
                            text: "https://apps.apple.com/app/google-authenticator/id388497605"
                        });
                        $('#otpandroid').qrcode({
                            render: "canvas",
                            width: 225,
                            height: 225,
                            text: "<?php echo $otpandroid_downurl; ?>"
                        });
                    });
                    return false;
                });

                //修改有效时长
                form.on('submit(saveggt)',
                function(data) {
                    console.log("data.field.ggt="+data.field.ggt);
                    var ggtdata='{"ggt":"'+data.field.ggt+'"}';
                    $.ajax({
                        url: 'action.php?a=saveggt',
                        type: 'post',
<?php
if($http_encrypt){
print<<<END
                        data: 'data='+ssk_encrypt(ggtdata),
END;
}else{
print<<<END
                        data: 'data='+ggtdata,
END;
}
?>

                        success: function(data) {
                            console.log(data);
                            if (data.code === 0) {
                                layer.alert("有效时长修改成功！", {icon: 6},function(index) {
                                    layer.close(index);
                                });
                            } else {
                                layer.alert(data.msg+"code："+data.code);
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

                //绑定 / 重置动态密码
                form.on('submit(rebindGA)',
                function(data) {
                    console.log(data);
                    layer.confirm('是否 绑定 / 重置 动态密码？', {icon: 3, title:'提示'}, function(index){
                        layer.open({
                            type: 2,
                            title: '请扫码',
                            shadeClose: true,
                            maxmin: false,
                            area: ['500px', '385px'],
                            content: '?p=rebindGA'
                        });
                        layer.close(index);
                    });
                    return false;
                });
            });
        </script>
    </body>
</html>