<?php
function dbdebug(){
    global $debug;
    global $db;
    if($debug){
        $db->debug();
    }else{
        $db->hide_errors();
    }
}

function pre($array){
    global $debug;
    if($debug){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
        echo "<p>\$count=".count($array)."</p>";
    }else{
        //
    }
}

function fecho($var){
    global $debug;
    if($debug){
        echo "<p>".$var."</p>";
    }else{
        //
    }
}

//使用array_keys搜索指定的值再循环unset）
function delByValue($arr, $value){
    $keys = array_keys($arr, $value);
    if(!empty($keys)){
        foreach ($keys as $key) {
            unset($arr[$key]);
        }
    }else{
        //
    }
    return $arr;
}

//http加密传输
function httpencrypt($mingwen){
    global $http_encrypt;
    global $encrypt_method;
    if($http_encrypt){
        $aeskey=$_SESSION["aes_key"];
        $aesiv=$_SESSION["aes_iv"];
        $time=$_SESSION["aesgentime"];
        $endata = openssl_encrypt(base64_encode($mingwen), $encrypt_method, $aeskey,0,$aesiv);
        $data=array(
            "time"=>$time,
            "data"=>$endata
        );
    }else{
        $data = $mingwen;
    }
    return $data;
}

function httpdecrypt($miwen){
    global $http_encrypt;
    global $encrypt_method;
    if($http_encrypt){
        $aeskey=$_SESSION["aes_key"];
        $aesiv=$_SESSION["aes_iv"];
        $data = base64_decode(trim(openssl_decrypt($miwen,$encrypt_method,$aeskey,OPENSSL_ZERO_PADDING,$aesiv)));
    }else{
        $data = $miwen;
    }
    return $data;
}

/**
 * @param string $code 状态码
 * @param string $msg 返回信息
 * @param string $data 返回数据
 * @param array $others 其他需要加入$result中的数据，如count等，
 * $others=array(
 *     array(
 *         "key1",
 *         "value1"
 *     ),
 *     array(
 *         "key2",
 *         "value2"
 *     )
 * );
 */
function returnresult($code,$msg,$data,$others){
    global $http_encrypt;
    if($http_encrypt){
        $data=httpencrypt(json_encode($data));
        $result=array(
            "code"=>$code,
            "msg"=>$msg,
            "time"=>$data["time"],
            "data"=>$data["data"]
        );
    }else{
        $result=array(
            "code"=>$code,
            "msg"=>$msg,
            "data"=>$data
        );
    }
    if($others){
        for($i=0;$i<count($others);$i++){
            $result[$others[$i][0]]=$others[$i][1];
        }
    }else{
        //
    }
    header('Content-type: application/json');
    echo json_encode($result);
}
?>