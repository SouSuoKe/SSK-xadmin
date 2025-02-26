<?php
if(!defined('IN_SSK_XADMIN')) {
    exit('Access Denied');
}

if(isset($_POST["data"]) && $_POST["data"]!==""){
    $data=json_decode(httpdecrypt($_POST["data"]),true);
    $newpass=$db->escape($data["newpass"]);
    $repass=$db->escape($data["repass"]);
    if($newpass===$repass && $newpass!=="" && $repass!==""){
        if($pwd_encrypt===true){
            $newpass=password_hash($newpass, PASSWORD_DEFAULT);
        }else{
            $newpass=$newpass;
        }

        $updatepwd=$db->query("UPDATE `user` SET `password` = '{$newpass}' WHERE `id` = {$userid}");
        //$db->debug();

        if($updatepwd === false){
            //echo "error";
            $result=array(
                "code"=>3,
                "msg"=>"修改失败！",
                "data"=>""
            );
        }else{
            if ($db->rows_affected > 0) {
                //echo "success";
                $result=array(
                    "code"=>0,
                    "msg"=>"修改成功！",
                    "data"=>""
                );
            } else {
                //echo "新密码与原密码相同，未进行更新";
                $result=array(
                    "code"=>0,
                    "msg"=>"修改成功！",
                    "data"=>""
                );
            }
        }
    }else{
        $result=array(
            "code"=>5,
            "msg"=>"参数异常！",
            "data"=>""
        );
    }
}else{
    $result=array(
        "code"=>4,
        "msg"=>"参数异常！",
        "data"=>""
    );
}

?>