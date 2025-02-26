<?php
include_once "connect.php";

$result=array(
    "code"=>-1,
    "msg"=>"运行异常！",
    "data"=>""
);

if(function_exists('openssl_encrypt')){
    //echo "OpenSSL 函数已启用。";

    if(isset($_POST["method"])){
        if($_POST["method"]==="getrsapubkey"){
            /************** RSA 开始 *****************/
            $config = array(
                'digest_alg'=> 'sm3',//可以用openssl_get_md_methods() 查看支持的加密方法 sm3
                'private_key_bits'=> 4096,
                'private_key_type'=> OPENSSL_KEYTYPE_RSA,
            );
            $res = openssl_pkey_new($config);
            openssl_pkey_export($res, $private_key_pem,null,$config);
            $details = openssl_pkey_get_details($res);
            $public_key_pem = $details['key'];
            $_SESSION["private_key"]=base64_encode($private_key_pem);
            $_SESSION["public_key"]=base64_encode($public_key_pem);
            $result=array(
                "code"=>0,
                "msg"=>"成功！",
                "data"=>base64_encode($public_key_pem)
            );
        }elseif($_POST["method"]==="sendaeskey"){
            $encryptjsondata=$_POST["data"];
            $rsa_private_key=base64_decode($_SESSION["private_key"]);
            openssl_private_decrypt(base64_decode($encryptjsondata),$rsa_decrypted_jsondata,$rsa_private_key);
            $encryptdata=json_decode($rsa_decrypted_jsondata,true);
            $aeskey = $encryptdata["key"];
            $aesiv = $encryptdata["iv"];
            $aesgentime=$encryptdata["gentime"];
            $_SESSION["aes_key"]=$aeskey;
            $_SESSION["aes_iv"]=$aesiv;
            $_SESSION["aesgentime"]=$aesgentime;
            $_SESSION["private_key"]="";//接收到aes秘钥就删除rsa秘钥
            $_SESSION["public_key"]="";//接收到aes秘钥就删除rsa秘钥
    
            $result=array(
                "code"=>0,
                "msg"=>"成功！",
                "data"=>""
                //,"rsa_private_key"=>$rsa_private_key,
                //"rsa_encrypted_aeskey"=>$rsa_encrypted_aeskey,
                //"rsa_encrypted_aesiv"=>$rsa_encrypted_aesiv,
                //"rsa_decrypted_aeskey"=>$aeskey,
                //"rsa_decrypted_aesiv"=>$aesiv
            );
        }else{
            //
        }
    }else{
        //
    }
}else{
    $result=array(
        "code"=>-2,
        "msg"=>"php OpenSSL 函数未启用！",
        "data"=>""
    );
}
header("Content-type: application/json");
echo json_encode($result);
?>