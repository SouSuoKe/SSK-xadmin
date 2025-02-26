<?php
include_once "config.php";
include_once "ezsql/ez_sql_core.php";
include_once "ezsql/ez_sql_mysqli.php";
include_once "function.php";
$db = new ezSQL_mysqli($db_user,$db_passwd,$db_name,$db_host,"utf8mb4");

if($http_encrypt){
    if(array_key_exists("aes_key",$_SESSION)){
        //
    }else{
        $_SESSION["aes_key"]="";
    }
    
    if(array_key_exists("aes_iv",$_SESSION)){
        //
    }else{
        $_SESSION["aes_iv"]="";
    }
    
    if(array_key_exists("aesgentime",$_SESSION)){
        //
    }else{
        $_SESSION["aesgentime"]="";
    }
}else{
    //
}

?>