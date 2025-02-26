<?php
if(!defined('IN_SSK_XADMIN')) {
    exit('Access Denied');
}

require_once 'googleauth/GoogleAuthenticator.php';
$ga = new PHPGangsta_GoogleAuthenticator();

if(isset($_POST["ggsecret"]) && $_POST["ggsecret"]!=""){
    $secret = httpdecrypt($_POST["ggsecret"]);
}else{
    $secret = $ga->createSecret();
}
$ggtolerance=$usermeta[0]->ggtolerance;

$sitename=urlencode($username."@".$website_name);
if($http_encrypt){
    $qrdata=httpencrypt("otpauth://totp/".$sitename."?secret=".$secret)["data"];
}else{
    $qrdata="otpauth://totp/".$sitename."?secret=".$secret;
}

if(isset($_POST["data"]) && $_POST["data"]!=""){
    $data=json_decode(httpdecrypt($_POST["data"]),true);
    $secret=$data["ggsecret"];
    $code=$data["ggauth"];

    $result=array();

    $checkResult = $ga->verifyCode($secret, $code, $ggtolerance);    // 2 = 2*30sec clock tolerance
    if ($checkResult) {
        //验证成功
        if($db->query("UPDATE `user` SET `ggsecret` = '{$secret}' WHERE `id` ={$userid}")===false){
            //绑定失败
            $result=array(
                "code"=>5,
                "msg"=>"绑定失败！",
                "data"=>""
            );
        }else{
            //绑定成功
            $result=array(
                "code"=>0,
                "msg"=>"绑定成功！",
                "data"=>""
            );
        }
    } else {
        //验证失败
            $result=array(
                "code"=>4,
                "msg"=>"验证失败，请重新输入新的动态密码！",
                "data"=>""
            );
    }
}else{
    $result=array(
        "code"=>3,
        "msg"=>"参数异常！",
        "data"=>""
    );
}
?>