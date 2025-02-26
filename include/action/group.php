<?php
if(!defined('IN_SSK_XADMIN')) {
    exit('Access Denied');
}
if($usermeta[0]->groupid==="1"){
    //管理员
    if(isset($_GET["method"])){
        $method=$_GET["method"];
        if($method==="getgroupinfo"){
            // 获取页码和每页显示的记录数
            $where ="where 1=1";
            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
            $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;
            // 计算偏移量
            $offset = ($page - 1) * $limit;
            $groups=$db->get_results("SELECT * FROM `group` {$where} order by gid asc LIMIT {$offset},{$limit}",ARRAY_A);
            $totalRows=$db->get_var("SELECT count(*) FROM `group` {$where}");
            //pre($groups);
            if($groups && $totalRows){
                $result=array(
                    "code"=>0,
                    "msg"=>"成功！",
                    "count"=>$totalRows,
                    "data"=>$groups
                );
            }else{
                $result=array(
                    "code"=>7,
                    "msg"=>"读取数据异常！",
                    "count"=>"",
                    "data"=>""
                );
            }
        }elseif($method==="update"){
            $data=json_decode(httpdecrypt($_POST["data"]),true);
            $gid=(int)$data["gid"];
            $groupname=$db->escape($data["groupname"]);
            $menu=$db->escape($data["menu"]);
            $comment=$db->escape($data["comment"]);
            
            if($db->query("UPDATE `group` SET `groupname`='$groupname',`menuid`='$menu',`comment`='$comment' WHERE `gid`=$gid")===false){
                if($db->query("SELECT * FROM `group` WHERE `gid`=$gid AND `groupname`='$groupname' AND `menuid`='$menu' AND `comment`='$comment'")===false){
                    $result=array(
                        "code"=>6,
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
            }else{
                $result=array(
                    "code"=>0,
                    "msg"=>"更新成功！",
                    "data"=>""
                );
                
            }
        }elseif($method==="addgroup"){
            $data=json_decode(httpdecrypt($_POST["data"]),true);
            $groupname=$db->escape($data["groupname"]);
            $menu=$db->escape($data["menu"]);
            $comment=$db->escape($data["comment"]);

            if($db->query("INSERT INTO `group` (`groupname`, `menuid`, `comment`) VALUES ('$groupname','$menu','$comment')")===false){
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
        }elseif($method==="del"){
            $gid=(int)httpdecrypt($_POST["data"]);
            if($gid===1 || $gid===2){
                $result=array(
                    "code"=>9,
                    "msg"=>"删除失败！内置组无法删除！",
                    "data"=>""
                );
            }else{
                if($db->query("DELETE FROM `group` WHERE `gid` = $gid")===false){
                    $result=array(
                        "code"=>10,
                        "msg"=>"删除失败！",
                        "data"=>""
                    );
                }else{
                    $result=array(
                        "code"=>0,
                        "msg"=>"删除成功！",
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
}else{
    //非管理员
    $result=array(
        "code"=>3,
        "msg"=>"无权限！",
        "data"=>""
    );
}

?>