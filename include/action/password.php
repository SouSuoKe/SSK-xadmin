<?php
if(!defined('IN_SSK_XADMIN')) {
    exit('Access Denied');
}

if(isset($_POST["data"]) && $_POST["data"]!==""){
    if(isset($_GET["method"])){
        $method=$_GET["method"];
        if($method==="setpwd"){
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
                        "code"=>7,
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
                    "code"=>6,
                    "msg"=>"参数异常！",
                    "data"=>""
                );
            }
        }elseif($method==="saveggt"){
            $data=json_decode(httpdecrypt($_POST["data"]),true);
            $ggt=(int)$data["ggt"];
            if($ggt===1){
                $ggt=1;
            }elseif($ggt===2){
                $ggt=2;
            }elseif($ggt===3){
                $ggt=3;
            }elseif($ggt===4){
                $ggt=4;
            }else{
                $ggt=1;
            }
            if($db->query("UPDATE `user` SET `ggtolerance` = {$ggt} WHERE `id` = {$userid}") === false){
                $result=array(
                    "code"=>8,
                    "msg"=>"更新失败！",
                    "data"=>""
                );
            }else{
                $result=array(
                    "code"=>0,
                    "msg"=>"更新成功！",
                    "data"=>""
                );
            }
        }elseif($method==="savelogintfa"){
            $data=json_decode(httpdecrypt($_POST["data"]),true);
            $logintfa=(int)$data["logintfa"];
            if($logintfa===1){
                $logintfa=1;
            }elseif($logintfa===2){
                $logintfa=2;
            }elseif($logintfa===3){
                $logintfa=3;
            }elseif($logintfa===4){
                $logintfa=4;
            }else{
                $logintfa=1;
            }

            $logintfa_check=false;
            if($logintfa===2 || $logintfa===3 || $logintfa===4){
                $ggsecret=$db->get_var("SELECT `ggsecret` FROM `user` WHERE `id` = {$userid}");
                //var_dump(strlen($ggsecret));
                //var_dump($ggsecret);
                if($ggsecret===NULL){
                    $result=array(
                        "code"=>10,
                        "msg"=>"请先绑定动态密码！",
                        "data"=>""
                    );
                    $logintfa_check=false;
                }else{
                    $logintfa_check=true;
                }
            }else{
                $logintfa_check=true;
            }

            if($logintfa_check===true){
                if($db->query("UPDATE `user` SET `tfa` = {$logintfa} WHERE `id` = {$userid}") === false){
                    $result=array(
                        "code"=>9,
                        "msg"=>"更新失败！",
                        "data"=>""
                    );
                }else{
                    //dbdebug();
                    $result=array(
                        "code"=>0,
                        "msg"=>"更新成功！",
                        "data"=>""
                    );
                }
            }else{
                //
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
}else{
    $result=array(
        "code"=>3,
        "msg"=>"参数异常！",
        "data"=>""
    );
}

?>