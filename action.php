<?php
$result=array(
    "code"=>-1,
    "msg"=>"异常！",
    "data"=>""
);

include_once "connect.php";
if(isset($_SESSION["userid"]) && $_SESSION["userid"]!=""){
    $userid=$_SESSION["userid"];
    $usermeta=$db->get_results("SELECT * FROM `user` WHERE `id` = '{$userid}' AND `groupid` <> '2'");
    if($usermeta){
        $username=$usermeta[0]->username;
        $password=$usermeta[0]->password;

        if(isset($_GET["a"]) && $_GET["a"]!==""){
            $action=$_GET["a"];
        }else{
            $action="404";
        }

        $file=SSK_XADMIN_ROOT.'/include/action/'.$action.'.php';
        if (file_exists($file)) {
            require_once $file;
        } else {
            require_once SSK_XADMIN_ROOT.'/include/page/404.html';
        }
    }else{
        $result=array(
            "code"=>2,
            "msg"=>"请重新登录！",
            "data"=>""
        );
    }
}else{

    if(isset($_GET["a"]) && $_GET["a"]==="check"){
        if(isset($_POST["data"]) && $_POST["data"]!==""){
            $data=json_decode(httpdecrypt($_POST["data"]),true);
            if(array_keys($data)[0]==="gph"){
                $gph=(int)$data["gph"];
                $check_res=$db->get_results("SELECT `tfa` FROM `user` WHERE `gph`='".$gph."'");
                if(!empty($check_res)){
                    $result=array(
                        "code"=>0,
                        "msg"=>"成功！",
                        "data"=>$check_res[0]->tfa
                    );
                }else{
                    $result=array(
                        "code"=>0,
                        "msg"=>"成功！",
                        "data"=>""
                    );
                }
            }elseif(array_keys($data)[0]==="username"){
                $username=$db->escape($data["username"]);
                $check_res=$db->get_results("SELECT `tfa` FROM `user` WHERE `username`='".$username."'");
                if(!empty($check_res)){
                    $result=array(
                        "code"=>0,
                        "msg"=>"成功！",
                        "data"=>$check_res[0]->tfa
                    );
                }else{
                    $result=array(
                        "code"=>0,
                        "msg"=>"成功！",
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
    }else{
        $result=array(
            "code"=>1,
            "msg"=>"请重新登录！",
            "data"=>""
        );
    }

}

if(array_key_exists("other", $result)){
    //
}else{
    $result["other"]=array();
}
returnresult($result["code"],$result["msg"],$result["data"],$result["other"]);
?>