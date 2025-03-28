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
     * >0 登录成功！
     * 
     * >1 参数非法！$data="" 未提交内容
     * >2 参数非法！提交的json数据无法decode成array
     * >3 参数非法！非 用户名 or 工牌号
     * >4 账户状态异常，请联系管理员！用户名、工牌号查到用户信息，但是用户组为 2 无权限用户
     * 
     * >11 用户名或密码错误！无此用户
     * >12 用户名或密码错误！登录提交的tfa方式与数据库中的不一致
     * >13 用户名或密码错误！tfa方式一致，但是不在1234中
     * >14 用户名或密码错误！仅验证密码，用户名对，密码错误
     * >15 用户名或密码错误！仅验证动态密码，用户名对，但是动态密码错误或过期
     * >16 用户名或密码错误！任选验证，用户名对，密码错误
     * >17 用户名或密码错误！任选验证，用户名对，动态密码错误
     * >18 用户名或密码错误！任选验证，用户名对，但是非密码或动态密码
     * >19 用户名或密码错误！两步验证，用户名对，密码错，动态密码未验证
     * >20 用户名或密码错误！两步验证，用户名对，密码对，动态密码错
     * 
     * 
     * 
     * 
     * 
     * 
     */

     
function check_password($db_userinfo,$input_password){
    global $pwd_default;
    global $pwd_encrypt;

    $pwdverifystatus=false;

    if($pwd_encrypt===true){
        if($db_userinfo[0]->password===""){
            $pwdindb=password_hash($pwd_default, PASSWORD_DEFAULT);
        }else{
            $pwdindb=$db_userinfo[0]->password;
        }

        if (password_verify($input_password, $pwdindb)) {
            //echo "密码验证成功，登录成功！"."<br>";
            $pwdverifystatus=true;
        } else {
            //echo "密码错误，登录失败。"."<br>";
            $pwdverifystatus=false;
        }
    }else{
        if($db_userinfo[0]->password===""){
            $pwdindb=$pwd_default;
        }else{
            $pwdindb=$db_userinfo[0]->password;
        }
        if($input_password===$pwdindb){
            //echo "密码验证成功，登录成功！"."<br>";
            $pwdverifystatus=true;
        }else{
            //echo "密码错误，登录失败。"."<br>";
            $pwdverifystatus=false;
        }
    }

    return $pwdverifystatus;
}

function check_ggauth($db_userinfo,$oneCode){
    require_once 'googleauth/GoogleAuthenticator.php';
    $secret=$db_userinfo[0]->ggsecret;
    $tolerance=$db_userinfo[0]->ggtolerance;
    $ga = new PHPGangsta_GoogleAuthenticator();
    $checkResult = $ga->verifyCode($secret, $oneCode, $tolerance);    // 2 = 2*30sec clock tolerance
    return $checkResult;
}


    if($data!=""){
        $data=json_decode($data,true);
        if(is_array($data)){
            if(array_key_exists("username",$data)){
                $login_input1["key"]="username";
            }elseif(array_key_exists("gph",$data)){
                $login_input1["key"]="gph";
            }else{
                //参数非法！非 用户名 or 工牌号
                $msg=array(
                    "code"=>3,
                    "msg"=>"参数非法！",
                    "data"=>""
                );
                header('Content-type: application/json');
                exit(json_encode($msg));
            }
            $login_input1["value"]=$db->escape($data[$login_input1["key"]]);
        
            $result_input1=$db->get_results("SELECT * FROM `user` WHERE `".$login_input1["key"]."`='".$login_input1["value"]."'");

            if($result_input1){
                $tfa=$result_input1[0]->tfa;
                if($result_input1[0]->groupid===2){
                    //账户状态异常，请联系管理员！用户名、工牌号查到用户信息，但是用户组为 2 无权限用户
                    $msg=array(
                        "code"=>4,
                        "msg"=>"账户状态异常，请联系管理员！",
                        "data"=>""
                    );
                    header('Content-type: application/json');
                    exit(json_encode($msg));
                }elseif($tfa===$data["checktfa"]){
                    if($tfa==="1"){
                        //仅密码
                        if(@check_password($result_input1,$data["password"])){
                            $msg=array(
                                "code"=>0,
                                "msg"=>"登录成功！",
                                "data"=>""
                            );
                        }else{
                            //用户名或密码错误！仅验证密码，用户名对，密码错误
                            $msg=array(
                                "code"=>14,
                                "msg"=>"用户名或密码错误！",
                                "data"=>""
                            );
                            header('Content-type: application/json');
                            exit(json_encode($msg));
                        }
                    }elseif($tfa==="2"){
                        //仅动态密码
                        if(@check_ggauth($result_input1,$data["ggauth"])){
                            $msg=array(
                                "code"=>0,
                                "msg"=>"登录成功！",
                                "data"=>""
                            );
                        }else{
                            //用户名或密码错误！仅验证动态密码，用户名对，但是动态密码错误或过期
                            $msg=array(
                                "code"=>15,
                                "msg"=>"用户名或密码错误！",
                                "data"=>""
                            );
                            header('Content-type: application/json');
                            exit(json_encode($msg));
                        }
                    }elseif($tfa==="3"){
                        //密码或动态密码 只验证其中一种
                        if(array_key_exists("password",$data)){
                            if(check_password($result_input1,$data["password"])){
                                $msg=array(
                                    "code"=>0,
                                    "msg"=>"登录成功！",
                                    "data"=>""
                                );
                            }else{
                                //用户名或密码错误！任选验证，用户名对，密码错误
                                $msg=array(
                                    "code"=>16,
                                    "msg"=>"用户名或密码错误！",
                                    "data"=>""
                                );
                                header('Content-type: application/json');
                                exit(json_encode($msg));
                            }
                        }elseif(array_key_exists("ggauth",$data)){
                            if(check_ggauth($result_input1,$data["ggauth"])){
                                $msg=array(
                                    "code"=>0,
                                    "msg"=>"登录成功！",
                                    "data"=>""
                                );
                            }else{
                                //用户名或密码错误！任选验证，用户名对，动态密码错误
                                $msg=array(
                                    "code"=>17,
                                    "msg"=>"用户名或密码错误！",
                                    "data"=>""
                                );
                                header('Content-type: application/json');
                                exit(json_encode($msg));
                            }
                        }else{
                            //用户名或密码错误！任选验证，用户名对，但是非密码或动态密码
                            $msg=array(
                                "code"=>18,
                                "msg"=>"用户名或密码错误！",
                                "data"=>""
                            );
                            header('Content-type: application/json');
                            exit(json_encode($msg));
                        }
                    }elseif($tfa==="4"){
                        //TFA双因素 两种都需要验证
                        if(check_password($result_input1,$data["password"])){
                            if(check_ggauth($result_input1,$data["ggauth"])){
                                $msg=array(
                                    "code"=>0,
                                    "msg"=>"登录成功！",
                                    "data"=>""
                                );
                            }else{
                                //用户名或密码错误！两步验证，用户名对，密码对，动态密码错
                                $msg=array(
                                    "code"=>20,
                                    "msg"=>"用户名或密码错误！",
                                    "data"=>""
                                );
                                header('Content-type: application/json');
                                exit(json_encode($msg));
                            }
                        }else{
                            //用户名或密码错误！两步验证，用户名对，密码错，动态密码未验证
                            $msg=array(
                                "code"=>19,
                                "msg"=>"用户名或密码错误！",
                                "data"=>""
                            );
                            header('Content-type: application/json');
                            exit(json_encode($msg));
                        }
                    }else{
                        //用户名或密码错误！tfa方式一致，但是不在1234中
                        $msg=array(
                            "code"=>13,
                            "msg"=>"用户名或密码错误！",
                            "data"=>""
                        );
                        header('Content-type: application/json');
                        exit(json_encode($msg));
                    }
                }else{
                    //用户名或密码错误！登录提交的tfa方式与数据库中的不一致
                    $msg=array(
                        "code"=>12,
                        "msg"=>"用户名或密码错误！",
                        "data"=>""
                    );
                    header('Content-type: application/json');
                    exit(json_encode($msg));
                }
            }else{
                //用户名或密码错误！无此用户
                $msg=array(
                    "code"=>11,
                    "msg"=>"用户名或密码错误！",
                    "data"=>""
                );
                header('Content-type: application/json');
                exit(json_encode($msg));
            }
        }else{
            //参数非法！提交的json数据无法decode成array
            $msg=array(
                "code"=>2,
                "msg"=>"参数非法！",
                "data"=>""
            );
            header('Content-type: application/json');
            exit(json_encode($msg));
        }
    
    }else{
        //参数非法！$data="" 未提交内容
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
                <input id="input-checktfa" name="checktfa" type="text" disabled style="display:none;">
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
                    console.log(data.field);
                    console.log(data.field.checktfa);
                    console.log(data.field['ggauth']);
                    
                    if(data.field.checktfa==='4' && typeof(data.field['ggauth'])==='undefined'){
                        if(data.field.hasOwnProperty("gph")){
                            var loginfield=`<input value="`+data.field.gph+`" id="input-gph" name="gph" type="text" disabled style="display:none;">`;
                        }else{
                            var loginfield=`<input value="`+data.field.username+`" id="input-username" name="username" type="text" disabled style="display:none;">`;
                        }
                        
                        layer.open({
                            type: 1, // page 层类型
                            area: ['500px', '250px'],
                            title: '您已开启2FA，请输入动态密码！',
                            shade: 0.6, // 遮罩透明度
                            shadeClose: true, // 点击遮罩区域，关闭弹层
                            anim: 0, // 0-6 的动画形式，-1 不开启
                            content: `
                            <div class="login" style="margin-top:0px;min-height:unset;padding-bottom:unset;">
                                <form method="post" class="layui-form layui-form-pane">
                                    `+loginfield+`
                                    <input value="`+data.field.password+`" id="input-password" name="password" type="password" disabled style="display:none;">
                                    <input value="`+data.field.checktfa+`" id="input-checktfa" name="checktfa" type="text" disabled style="display:none;">
                                    <div class="layui-form-item">
                                        <label id="inputtfa" class="layui-form-label" style="height: 50px; line-height: 34px; width: 25%;">动态密码</label>
                                        <div class="layui-input-inline">
                                            <input id="input-inputtfa" name="ggauth" placeholder="动态密码" type="text" lay-verify="ggauth" class="layui-input" style="width: 255px;">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
                                    </div>
                                </form>
                            </div>
                            `
                        });
                    }else{
                        console.log("已输入动态密码："+JSON.stringify(data.field));
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
                                    layer.alert(data.msg+"<p>action：login<br>code："+data.code+"</p>",{icon: 2}, function(index){
                                        layer.close(index);
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
                    }
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

                $('#input-password').focus(function(){
                    if($('#input-username').val()!==''){
                        console.log("check");
                        var checkkey=$('#input-username').attr("name");
                        var checkdata='{"'+checkkey+'":"'+$('#input-username').val()+'"}';
                        $.ajax({
                            url: 'action.php?a=check',
                            type: 'post',

END;
if($http_encrypt){
print<<<END
                            data: 'data='+ssk_encrypt(checkdata),
END;
}else{
print<<<END
                            data: 'data='+checkdata,
END;
}
print<<<END

                            success: function(data) {
                                console.log(data);
                                if (data.code === 0) {

END;
if($http_encrypt){
print<<<END
                                    var check=JSON.parse(ssk_decrypt(data.data,data.time));
END;
}else{
print<<<END
                                    var check=data.data;
END;
}
print<<<END

                                    if(check==="1" || check==="4"){
                                        $('#label-password').text("密码");
                                        $('#input-password').attr("placeholder", "密码");
                                        $('#input-password').attr("name", "password");
                                        input_password_val = "密码";
                                    }else if(check==="2"){
                                        $('#label-password').text("动态密码");
                                        $('#input-password').attr("placeholder", "动态密码");
                                        $('#input-password').attr("name", "ggauth");
                                        input_password_val = "动态密码";
                                    }else if(check==="3"){
                                        //任选一种，不可设置
                                    }else{
                                        $('#label-password').text("密码");
                                        $('#input-password').attr("placeholder", "密码");
                                        $('#input-password').attr("name", "password");
                                        input_password_val = "密码";
                                    }
                                    $("#input-checktfa").val(check);
                                } else {
                                    layer.alert(data.msg+"<p>action：logincheck<br>code："+data.code+"</p>",{icon: 2}, function(index){
                                        layer.close(index);
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
                    }else{
                        //
                    }
                });

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
                    },
                    ggauth: function(value, item) {
                        if (!value) {
                            return '请填写动态密码！';
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