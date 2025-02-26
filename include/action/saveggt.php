<?php
if(!defined('IN_SSK_XADMIN')) {
    exit('Access Denied');
}

if(isset($_POST["data"]) && $_POST["data"]!==""){
    $data=json_decode(httpdecrypt($_POST["data"]),true);
    $ggt=(int)$data["ggt"];
    if($db->query("UPDATE `user` SET `ggtolerance` = '{$ggt}' WHERE `id` = {$userid}")){
        $result=array(
            "code"=>0,
            "msg"=>"更新成功！",
            "data"=>""
        );
    }else{
        $ggtindb=(int)$db->get_var("SELECT `ggtolerance` FROM `user` WHERE `id` = {$userid}");
        if($ggt===$ggtindb){
            $result=array(
                "code"=>0,
                "msg"=>"更新成功！",
                "data"=>""
            );
        }else{
            $result=array(
                "code"=>4,
                "msg"=>"更新失败！",
                "data"=>""
            );
        }
    }
}else{
    $result=array(
        "code"=>3,
        "msg"=>"参数异常！",
        "data"=>""
    );
}
?>