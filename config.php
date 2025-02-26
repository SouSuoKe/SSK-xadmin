<?php

$website_name="测试";//网站名称

$otpandroid_downurl="https://github.com/google/google-authenticator-android/releases/download/v5.00/authenticator.apk";
/*
 *    https://github.com/google/google-authenticator-android/releases/download/v5.00/authenticator.apk
 *    安卓版OTP软件，在【修改密码】页面需要使用，
 *    由于众所周知的原因，
 *    需将本软件下载后 放至本地或CDN 并在此处填写完整url用户即可顺利下载！
 *
 */

//db相关
$db_host="127.0.0.1:3306";
$db_user="root";
$db_passwd="";
$db_name="ssk-xadmin";

$pubpage=array("index","welcome","password","rebindGA");//公共页面，如果新增页面需要全员可见，可将入口放入此处，访问地址如：index.php?p=password(密码修改)

$pwd_default="111111";//新用户默认密码

//$pwd_encrypt=true;// true false 是否开启数据库中密码加密储存功能
$pwd_encrypt=false;// true false 是否开启数据库中密码加密储存功能

$http_encrypt=true;// true false 是否开启http加密传输
//$http_encrypt=false;// true false 是否开启http加密传输

$debug=true; // true false
//$debug=false; // true false

$is_remember=true; // true false 是否开启刷新记忆tab功能
//$is_remember=false; // true false 是否开启刷新记忆tab功能

$encrypt_method="AES-256-CBC";//根据 ssk_encrypt.js newkey长度选择加密算法，16=AES-128-CBC、24=AES-192-CBC、32=AES-256-CBC

define('IN_SSK_XADMIN', true);
define('SSK_XADMIN_ROOT', dirname(__FILE__));

date_default_timezone_set("Asia/Shanghai");
session_start();

?>