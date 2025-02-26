<?php
$body = file_get_contents('php://input');
$msg=array();

if($_SERVER['REQUEST_METHOD']==='POST'){
    $body = file_get_contents('php://input');
    if($body==="logout"){
        $_SESSION = array();
        setcookie("PHPSESSID", "", time() - 3600, "/");
    
        if(isset($_SESSION["userid"]) && isset($_COOKIE["PHPSESSID"])){
            $msg=array(
                "code"=>3,
                "msg"=>"退出失败！",
                "data"=>""
            );
        }else{
            @session_destroy();
            $msg=array(
                "code"=>0,
                "msg"=>"退出成功！",
                "data"=>""
            );
        }
    }else{
        $msg=array(
            "code"=>2,
            "msg"=>"参数异常！",
            "data"=>""
        );
    }
}else{
    $msg=array(
        "code"=>1,
        "msg"=>"参数异常！",
        "data"=>""
    );
}
header('Content-type: application/json');
echo json_encode($msg);
?>