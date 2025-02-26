<?php
include_once "connect.php";

if(isset($_SESSION["userid"]) && $_SESSION["userid"]!=""){
    $userid=$_SESSION["userid"];
    $usermeta=$db->get_results("SELECT * FROM `user` WHERE `id` = '{$userid}' AND `groupid` <> '2'");
    if($usermeta){
        $username=$usermeta[0]->username;
        $password=$usermeta[0]->password;
        $groupid=$usermeta[0]->groupid;
        $extgroupids=$usermeta[0]->extgroupids;

        if(isset($_GET["p"]) && $_GET["p"]!==""){
            $page=$_GET["p"];
        }else{
            $page="index";
        }

        if(!in_array($page,$pubpage)){//$pubpage在config.php中配置
            if($groupid==="1"){
                //参数不变，显示页面
            }elseif($groupid==="2"){
                $page="404";
            }else{
                //组id >= 3
                $pagestr="?p=".$page;
                $menuid_res=$db->get_results("SELECT id FROM `menu` WHERE `href`='$pagestr'");
                if($menuid_res){
                    //如果菜单中配置过，并且可能配置过多次
                    $menuid_arr=array();
                    foreach($menuid_res as $value){
                        $menuid_arr[]=$value->id;
                    }
                    $grpids=$groupid."|".$extgroupids;
                    $grpids_arr=explode("|", $grpids);
                    $grpmenuids=array();
                    for($i=0;$i<count($grpids_arr);$i++){
                        if($grpids_arr[$i]===""){
                            //
                        }else{
                            $menuidbygid=$db->get_var("SELECT `menuid` FROM `group` WHERE `gid`=$grpids_arr[$i]");
                            $menuidarray=explode("|", $menuidbygid);
                            foreach($menuidarray as $val){
                                $grpmenuids[]=$val;
                            }
                        }
                    }
                    $page="404";
                    for($i=0;$i<count($menuid_arr);$i++){
                        if(in_array($menuid_arr[$i],$grpmenuids)){
                            $page=$_GET["p"];
                        }else{
                            //
                        }
                    }
                    
                }else{
                    //如果菜单中没配置过
                    $page="404";
                }
            }
        }else{
            //
        }

        $file=SSK_XADMIN_ROOT.'/include/page/'.$page.'.php';
        if (file_exists($file)) {
            require_once $file;
        } else {
            require_once SSK_XADMIN_ROOT.'/include/page/404.html';
        }
        

    }else{
        @session_destroy();
        header("location: login.php");
    }
}else{
    @session_destroy();
    header("location: login.php");
}
?>