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
    $result=array(
        "code"=>1,
        "msg"=>"请重新登录！",
        "data"=>""
    );
}

if(array_key_exists("other", $result)){
    //
}else{
    $result["other"]=array();
}
returnresult($result["code"],$result["msg"],$result["data"],$result["other"]);
?>