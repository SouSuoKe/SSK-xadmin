<?php
include_once "connect.php";

if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST["data"]) && $_POST["data"]!==""){
    $msg=array();
    $login_key_arr=array();
    $login_input1=array();
    $login_input2=array();
    $data = httpdecrypt($_POST["data"]);
    
    /* 
     * 登录错误码(code)：
     * 
     * 0 登录成功！
     * 
     * 1 参数非法！$data="" 未提交内容
     * 2 参数非法！提交的json数据无法decode成array
     * 3 参数非法！非 用户名 or 工牌号
     * 4 参数非法！非 密码 or 动态密码
     * 
     * 11 用户名或密码错误！无此用户
     * 12 用户名或密码错误！用户名对，但是密码验证方式 非 密码 or 动态密码（同4，基本用不到，到4就拦住了）
     * 13 用户名或密码错误！用户名对，但是密码错误
     * 14 用户名或密码错误！用户名对，但是动态密码错误或过期
     * 
     * 15 账户状态异常，请联系管理员！用户名、密码都对，但是用户组为 0 无权限用户
     */
    
    if($data!=""){
        $data=json_decode($data,true);
        if(is_array($data)){
            $login_key_arr=array_keys($data);

            if($login_key_arr[0]==="username"){
                $login_input1["key"]="username";
            }elseif($login_key_arr[0]==="gph"){
                $login_input1["key"]="gph";
            }else{
                $msg=array(
                    "code"=>3,
                    "msg"=>"参数非法！",
                    "data"=>""
                );
                header('Content-type: application/json');
                exit(json_encode($msg));
            }
            $login_input1["value"]=$data[$login_input1["key"]];
        
            if($login_key_arr[1]==="password"){
                $login_input2["key"]="password";
            }elseif($login_key_arr[1]==="ggauth"){
                $login_input2["key"]="ggauth";
            }else{
                $msg=array(
                    "code"=>4,
                    "msg"=>"参数非法！",
                    "data"=>""
                );
                header('Content-type: application/json');
                exit(json_encode($msg));
            }
            $login_input2["value"]=$data[$login_input2["key"]];
            $result_input1=$db->get_results("SELECT * FROM `user` WHERE `".$login_input1["key"]."`='".$login_input1["value"]."' ");
            if($result_input1){
                if($login_input2["key"]==="password"){
                    //密码
                    $inputpwd=$login_input2["value"];
                    $pwdverifystatus="error";//success error
                    if($pwd_encrypt===true){
                        if($result_input1[0]->password===""){
                            $pwdindb=password_hash($pwd_default, PASSWORD_DEFAULT);
                        }else{
                            $pwdindb=$result_input1[0]->password;
                        }

                        if (password_verify($inputpwd, $pwdindb)) {
                            //echo "密码验证成功，登录成功！"."<br>";
                            $pwdverifystatus="success";
                        } else {
                            //echo "密码错误，登录失败。"."<br>";
                            $pwdverifystatus="error";
                        }
                    }else{
                        if($result_input1[0]->password===""){
                            $pwdindb=$pwd_default;
                        }else{
                            $pwdindb=$result_input1[0]->password;
                        }
                        if($inputpwd===$pwdindb){
                            //echo "密码验证成功，登录成功！"."<br>";
                            $pwdverifystatus="success";
                        }else{
                            //echo "密码错误，登录失败。"."<br>";
                            $pwdverifystatus="error";
                        }
                    }
                    
                    if($pwdverifystatus==="success"){
                        if($result_input1[0]->groupid===2){
                            $msg=array(
                                "code"=>15,
                                "msg"=>"账户状态异常，请联系管理员！",
                                "data"=>""
                            );
                            header('Content-type: application/json');
                            exit(json_encode($msg));
                        }else{
                            $msg=array(
                                "code"=>0,
                                "msg"=>"登录成功！",
                                "data"=>""
                            );
                        }
                    }else{
                        $msg=array(
                            "code"=>13,
                            "msg"=>"用户名或密码错误！",
                            "data"=>""
                        );
                        header('Content-type: application/json');
                        exit(json_encode($msg));
                    }
                }elseif($login_input2["key"]==="ggauth"){
                    //动态密码
                    require_once 'googleauth/GoogleAuthenticator.php';
                    $oneCode=$login_input2["value"];
                    $secret=$result_input1[0]->ggsecret;
                    $tolerance=$result_input1[0]->ggtolerance;
                    $ga = new PHPGangsta_GoogleAuthenticator();
                    $checkResult = $ga->verifyCode($secret, $oneCode, $tolerance);    // 2 = 2*30sec clock tolerance
                    if($checkResult){
                        if($result_input1[0]->groupid===2){
                            $msg=array(
                                "code"=>15,
                                "msg"=>"账户状态异常，请联系管理员！",
                                "data"=>""
                            );
                            header('Content-type: application/json');
                            exit(json_encode($msg));
                        }else{
                            $msg=array(
                                "code"=>0,
                                "msg"=>"登录成功！",
                                "data"=>""
                            );
                        }
                    }else{
                        $msg=array(
                            "code"=>14,
                            "msg"=>"用户名或密码错误！",
                            "data"=>""
                        );
                        header('Content-type: application/json');
                        exit(json_encode($msg));
                    }
                }else{
                    $msg=array(
                        "code"=>12,
                        "msg"=>"用户名或密码错误！",
                        "data"=>""
                    );
                    header('Content-type: application/json');
                    exit(json_encode($msg));
                }
            }else{
                $msg=array(
                    "code"=>11,
                    "msg"=>"用户名或密码错误！",
                    "data"=>""
                );
                header('Content-type: application/json');
                exit(json_encode($msg));
            }
        }else{
            $msg=array(
                "code"=>2,
                "msg"=>"参数非法！",
                "data"=>""
            );
            header('Content-type: application/json');
            exit(json_encode($msg));
        }
    
    }else{
        $msg=array(
            "code"=>1,
            "msg"=>"参数非法！",
            "data"=>""
        );
        header('Content-type: application/json');
        exit(json_encode($msg));
    }
    
    if($msg["code"]===0){
        $_SESSION["userid"]=$result_input1[0]->id;
    }else{
        //
    }
    header('Content-type: application/json');
    echo json_encode($msg);
}else{
    print<<<END
<!doctype html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>{$website_name}</title>
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/login.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <script>
            if(window.location != window.parent.location){
                window.parent.location = window.location;
            }else{
                //
            }
        </script>
    </head>
    <body class="login-bg">
        <div class="login layui-anim layui-anim-up">
            <div class="message">{$website_name}-管理登录</div>
            <div id="darkbannerwrap"></div>
            <form method="post" class="layui-form layui-form-pane">
                <div class="layui-form-item">
                    <label id="label-username" class="layui-form-label" style="height: 50px; line-height: 34px; width: 25%;">用户名</label>
                    <div class="layui-input-inline">
                        <input id="input-username" name="username" placeholder="用户名" type="text" lay-verify="username" class="layui-input" style="width: 255px;">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label id="label-password" class="layui-form-label" style="height: 50px; line-height: 34px; width: 25%;">密码</label>
                    <div class="layui-input-inline">
                        <input id="input-password" name="password" placeholder="密码" type="password" lay-verify="password" class="layui-input" style="width: 255px;">
                    </div>
                </div>
                <div class="layui-form-item">
                    <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
                </div>
            </form>
        </div>
    </body>

    <script type="text/javascript" src="./js/jquery.min.js"></script>
END;

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

print<<<END
    <script type="text/javascript" src="./js/jquery.cookie.js"></script>
    <script src="./lib/layui/layui.js" charset="utf-8"></script>
    <!--[if lt IE 9]>
          <script src="./js/html5.min.js"></script>
          <script src="./js/respond.min.js"></script>
    <![endif]-->

    <script>
    $(document).ready(function () {
        $(function() {
            layui.use(function() {
                var form = layui.form,
                    dropdown = layui.dropdown,
                    input_username_val = $('#label-username').text(),
                    input_password_val = $('#label-password').text();

                $('.login').one('animationend webkitAnimationEnd', function() {
                    layer.tips('点此切换', '#label-username', {tips: 4,tipsMore: true});
                    layer.tips('点此切换', '#label-password', {tips: 4,tipsMore: true});
                });

                form.on('submit(login)', function(data) {
                    console.log(JSON.stringify(data.field));
                    $.ajax({
                        url: 'login.php',
                        type: 'post',

END;
if($http_encrypt){
print<<<END
                        data: 'data='+ssk_encrypt(JSON.stringify(data.field)),
END;
}else{
print<<<END
                        data: 'data='+JSON.stringify(data.field),
END;
}
print<<<END

                        success: function(data) {
                            console.log(data);
                            if (data.code === 0) {
                                $(window).attr('location', 'index.php');
                            } else {
                                layer.alert(data.msg+"code："+data.code, function(index){
                                    layer.close(index);
                                    layer.tips('点此切换', '#label-username', {tipsMore: true});
                                    layer.tips('点此切换', '#label-password', {tipsMore: true});
                                });
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

                dropdown.render({
                    elem: '#label-username',
                    data: [{
                        title: '工牌号',
                        id: 'gph'
                    }, {
                        title: '用户名',
                        id: 'username'
                    }],
                    click: function(obj) {
                        $('#label-username').text(obj.title);
                        $('#input-username').attr("placeholder", obj.title);
                        $('#input-username').attr("name", obj.id);
                        input_username_val = obj.title;
                        $.cookie('input_username_val', obj.id, {
                            expires: 365
                        });
                    }
                });

                dropdown.render({
                    elem: '#label-password',
                    data: [{
                        title: '动态密码',
                        id: 'ggauth'
                    }, {
                        title: '密码',
                        id: 'password'
                    }],
                    click: function(obj) {
                        $('#label-password').text(obj.title);
                        $('#input-password').attr("placeholder", obj.title);
                        $('#input-password').attr("name", obj.id);
                        input_password_val = obj.title;
                        $.cookie('input_password_val', obj.id, {
                            expires: 365
                        });
                    }
                });

                if ($.cookie('input_username_val')) {
                    if ($.cookie('input_username_val') === 'gph') {
                        $('#label-username').text("工牌号");
                        $('#input-username').attr("placeholder", "工牌号");
                        $('#input-username').attr("name", "gph");
                        input_username_val = "工牌号";
                    } else if ($.cookie('input_username_val') === 'username') {
                        $('#label-username').text("用户名");
                        $('#input-username').attr("placeholder", "用户名");
                        $('#input-username').attr("name", "username");
                        input_username_val = "用户名";
                    } else {
                        //
                    }
                } else {
                    //
                }

                if ($.cookie('input_password_val')) {
                    if ($.cookie('input_password_val') === 'ggauth') {
                        $('#label-password').text("动态密码");
                        $('#input-password').attr("placeholder", "动态密码");
                        $('#input-password').attr("name", "ggauth");
                        input_password_val = "动态密码";
                    } else if ($.cookie('input_password_val') === 'password') {
                        $('#label-password').text("密码");
                        $('#input-password').attr("placeholder", "密码");
                        $('#input-password').attr("name", "password");
                        input_password_val = "密码";
                    } else {
                        //
                    }
                } else {
                    //
                }

                form.verify({
                    username: function(value, item) {
                        if (!value) {
                            return '请填写' + input_username_val + '！';
                        }
                    },
                    password: function(value, item) {
                        if (!value) {
                            return '请填写' + input_password_val + '！';
                        }
                    }
                });
            });

            //$("#input-username").val("测试");
            //$("#input-password").val("1");
        });
    });
    </script>
</html>
END;
}
?>