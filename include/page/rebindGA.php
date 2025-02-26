<?php
if(!defined('IN_SSK_XADMIN')) {
    exit('Access Denied');
}else{
    if($usermeta){
        $username=$usermeta[0]->username;
        $datetime=date("Y-m-d H:i:s",time());
        
        require_once 'googleauth/GoogleAuthenticator.php';
        $ga = new PHPGangsta_GoogleAuthenticator();
        
        if(isset($_POST["ggsecret"]) && $_POST["ggsecret"]!=""){
            $secret = httpdecrypt($_POST["ggsecret"]);
        }else{
            $secret = $ga->createSecret();
        }

        $sitename=urlencode($username."@".$website_name);
        
        if($http_encrypt){
            $qrdata=httpencrypt("otpauth://totp/".$sitename."?secret=".$secret)["data"];
        }else{
            $qrdata="otpauth://totp/".$sitename."?secret=".$secret;
        }
        
    }else{
        //
    }
}


?>

<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>绑定动态口令</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <script type="text/javascript" src="./js/jquery.min.js"></script>
        <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
        <script type="text/javascript" src="./js/jquery.qrcode.min.js"></script>
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

        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
          <script src="./js/html5.min.js"></script>
          <script src="./js/respond.min.js"></script>
        <![endif]--></head>
    
    <body class="layui-bg-gray">
        <div style="padding: 16px;">
            <div class="layui-card">
                <div class="layui-card-body">
                    <div class="layui-row" id="qrcode" style="width: 210px;height: 220px; margin: auto auto 0;"></div>
                    <div class="layui-row" style="width: 438px; margin: auto auto 0;">
                        <form class="layui-form" method="post">
                            <input id="ggsecret" name="ggsecret" value="<?php echo $secret; ?>" type="hidden">
                            <div class="layui-form-item">
                                <label for="ggauth" class="layui-form-label" style="padding-left: 30px;">动态密码</label>
                                <div class="layui-input-inline">
                                    <input type="text" id="ggauth" name="ggauth" placeholder="请输入新的动态密码" class="layui-input">
                                </div>
                                <button class="layui-btn" lay-filter="updateggauth" lay-submit="">确认</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
    layui.use(['form', 'layer'],function() {
        $ = layui.jquery;
        var form = layui.form,
        layer = layui.layer;

        form.on('submit(savepwd)',
        function(data) {
            console.log(data);
            layer.alert("密码修改成功", {icon: 6},function(index) {
                layer.close(index);
            });
            return false;
        });

        form.on('submit(saveggtolerance)',
        function(data) {
            console.log(data);
            layer.alert("有效时长修改成功", {icon: 6},function(index) {
                layer.close(index);
            });
            return false;
        });

        form.on('submit(updateggauth)',
        function(data) {
            $.ajax({
                url: 'action.php?a=rebindGA',
                type: 'post',
<?php
if($http_encrypt){
print<<<END
                data: "data="+ssk_encrypt(JSON.stringify(data.field)),
END;
}else{
print<<<END
                data: "data="+JSON.stringify(data.field),
END;
}
?>

                success: function(data){
                    if(data.code===0){
                        layer.msg(data.msg, function(){
                            var index = parent.layer.getFrameIndex(window.name);
                            parent.layer.close(index);
                        }); 
                    }else{
                        layer.alert(data.msg+"code:"+data.code, {icon: 6},function(index) {
                            layer.close(index);
                        });
                    }
                    return false;
                },
                error: function(xhr, textStatus, errorThrown){
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
        $(function(){
            $('#qrcode').qrcode({
                render: "canvas",
                width: 210,
                height: 210,
<?php
if($http_encrypt){
    $aesgentime=$_SESSION["aesgentime"];
print<<<END
                text: ssk_decrypt("{$qrdata}", "{$aesgentime}")
END;
}else{
    $qrdata=json_encode($qrdata);
print<<<END
                text: "{$qrdata}"
END;
}
?>

            });
        });
    });
    </script>
</html>