<?php
if(!defined('IN_SSK_XADMIN')) {
    exit('Access Denied');
}

if($usermeta[0]->groupid==="1"){
    //管理员
    if(isset($_GET["method"])){
        $method=$_GET["method"];
        if($method==="getuserinfo"){
            // 获取页码和每页显示的记录数
            $where ="where 1=1";
            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
            $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;

            if(isset($_GET['gph']) && $_GET['gph']!==""){
                $gph=$db->escape($_GET['gph']);
                if(isset($_GET['like']) && $_GET['like']==="on"){
                    $where.=" and `gph` like '{$gph}'";
                }else{
                    $where.=" and `gph`='{$gph}'";
                }
            }else{
                
            }
            if(isset($_GET['username']) && $_GET['username']!==""){
                $username_get=$db->escape($_GET['username']);
                if(isset($_GET['like']) && $_GET['like']==="on"){
                    $where.=" and `username` like '{$username_get}'";
                }else{
                    $where.=" and `username`='{$username_get}'";
                }
            }else{
                
            }
            
            // 计算偏移量
            $offset = ($page - 1) * $limit;
            $userlist=$db->get_results("SELECT `id`,`gph`,`username`,`groupid`,`extgroupids`,`ggtolerance` FROM `user` {$where} order by id asc LIMIT {$offset},{$limit}",ARRAY_A);
            //dbdebug();
            
            //$userlist=$db->get_results("SELECT * FROM `user` order by id asc",ARRAY_A);
            $totalRows=$db->get_var("SELECT count(*) FROM `user` {$where}");
            // 计算总页数
            //$totalPages = ceil($totalRows / $limit);

            //pre($userlist);
            $result=array(
                "code"=>0,
                "msg"=>"成功！",
                "data"=>$userlist,
                "other"=>array(
                    "count"=>$totalRows
                )
            );
        }elseif($method==="getgroupinfo"){
            $groups=array();
            $groups_res=$db->get_results("SELECT `gid`,`groupname` FROM `group`");
            if($groups_res){
                foreach($groups_res as $group){
                    $groups[$group->gid]=$group->groupname;
                }
                $groups[""]="";//防止未设置用户组用户显示undefined
                $result=array(
                    "code"=>0,
                    "msg"=>"成功！",
                    "data"=>$groups
                );
            }else{
                $result=array(
                    "code"=>18,
                    "msg"=>"未获取到用户组信息！",
                    "data"=>""
                );
            }
        }elseif($method==="update"){
            if(isset($_POST["data"]) && $_POST["data"]!==""){
                //$data=json_decode($_POST["data"],true);
                $data=json_decode(httpdecrypt($_POST["data"]),true);
            
                $id=(int)$data["id"];
                $gph=$db->escape($data["gph"]);
                $username=$db->escape($data["username"]);
                $groupid=(int)$data["groupid"];
                $extgroupids=$data["extgroupids"];
                $ggt=(int)$data["ggt"];
                $extgroupids_str=implode("|", $extgroupids);
            
                $updateuserinfo=$db->query("UPDATE `user` SET `gph`='$gph',`username`='$username',`groupid`='$groupid',`extgroupids`='$extgroupids_str',`ggtolerance`='$ggt' WHERE `id`='$id'");
                if($updateuserinfo===false){
                    $selectuserinfo=$db->query("SELECT * FROM `user` WHERE `id`='$id' AND `gph`='$gph' AND `username`='$username' AND `groupid`='$groupid' AND `extgroupids`='$extgroupids_str' AND `ggtolerance`='$ggt'");
                    if($selectuserinfo===false){
                        $result=array(
                            "code"=>7,
                            "msg"=>"用户信息更新失败！",
                            "data"=>""
                        );
                    }else{
                        $result=array(
                            "code"=>0,
                            "msg"=>"未修改！",
                            "data"=>""
                        );
                    }
                }else{
                    $result=array(
                        "code"=>0,
                        "msg"=>"修改成功！",
                        "data"=>""
                    );
                }
            }else{
                $result=array(
                    "code"=>6,
                    "msg"=>"参数异常！",
                    "data"=>""
                );
            }
        }elseif($method==="restpwd"){
            if(isset($_POST["data"]) && $_POST["data"]!==""){
                $id=(int)json_decode(httpdecrypt($_POST["data"]),true);
                if($db->query("UPDATE `user` SET `password`='' WHERE id=$id")===false){
                    if($db->query("SELECT * FROM `user` WHERE id=$id AND `password`=''")===false){
                        $result=array(
                            "code"=>9,
                            "msg"=>"密码重置失败！",
                            "data"=>""
                        );
                    }else{
                        $result=array(
                            "code"=>0,
                            "msg"=>"密码已重置！",
                            "data"=>""
                        );
                    }
                }else{
                    $result=array(
                        "code"=>0,
                        "msg"=>"密码已重置！",
                        "data"=>""
                    );
                }
            }else{
                $result=array(
                    "code"=>8,
                    "msg"=>"参数异常！",
                    "data"=>""
                );
            }
        }elseif($method==="restga"){
            if(isset($_POST["data"]) && $_POST["data"]!==""){
                $id=(int)json_decode(httpdecrypt($_POST["data"]),true);
                if($db->query("UPDATE `user` SET `ggsecret`='',`ggtolerance`=1 WHERE id=$id")===false){
                    if($db->query("SELECT * FROM `user` WHERE id='$id' AND `ggsecret`=''")===false){
                        $result=array(
                            "code"=>16,
                            "msg"=>"动态口令重置失败！",
                            "data"=>""
                        );
                    }else{
                        $result=array(
                            "code"=>0,
                            "msg"=>"动态口令已重置！",
                            "data"=>""
                        );
                    }
                }else{
                    $result=array(
                        "code"=>0,
                        "msg"=>"动态口令已重置！",
                        "data"=>""
                    );
                }
            }else{
                $result=array(
                    "code"=>15,
                    "msg"=>"参数异常！",
                    "data"=>""
                );
            }
        }elseif($method==="deluser"){
            if(isset($_POST["data"]) && $_POST["data"]!==""){
                $id=(int)json_decode(httpdecrypt($_POST["data"]),true);
                if($db->query("DELETE FROM `user` WHERE `id` = $id")===false){
                    $result=array(
                        "code"=>11,
                        "msg"=>"用户删除失败！",
                        "data"=>""
                    );
                }else{
                    $result=array(
                        "code"=>0,
                        "msg"=>"用户已删除！",
                        "data"=>""
                    );
                }
            }else{
                $result=array(
                    "code"=>10,
                    "msg"=>"参数异常！",
                    "data"=>""
                );
            }
        }elseif($method==="adduser"){
            if(isset($_POST["data"]) && $_POST["data"]!=""){
                //$data=json_decode($_POST["data"],true);
                $data=json_decode(httpdecrypt($_POST["data"]),true);
                $gph=$db->escape($data["gph"]);
                $username=$db->escape($data["username"]);
                if(isset($data["groupid"]) && $data["groupid"]!==""){
                    $groupid=(int)$data["groupid"];
                }else{
                    $groupid=2;
                }
                
                $extgroupids=$data["extgroupids"];
                $extgroupids_str=implode("|", $extgroupids);
                
                if($gph==="" || $username===""){
                    $result=array(
                        "code"=>17,
                        "msg"=>"请填写工牌号和用户名！",
                        "data"=>""
                    );
                }elseif($db->query("SELECT * FROM `user` WHERE `gph`='$gph'")){
                    $result=array(
                        "code"=>14,
                        "msg"=>"添加失败！工牌号重复！",
                        "data"=>""
                    );
                }else{
                    if(@$db->query("INSERT INTO `user` (`gph`, `username`, `groupid`, `extgroupids`) VALUES ('$gph', '$username', '$groupid', '$extgroupids_str')")===false){
                        if($db->last_error==="Duplicate entry '".$username."' for key 'user.idx_username'"){
                            $result=array(
                                "code"=>19,
                                "msg"=>"添加失败！用户名重复！",
                                "data"=>""
                            );
                        }else{
                            $result=array(
                                "code"=>13,
                                "msg"=>"添加失败！",
                                "data"=>""
                            );
                        }
                    }else{
                        $result=array(
                            "code"=>0,
                            "msg"=>"成功！",
                            "data"=>""
                        );
                    }
                }
            }else{
                $result=array(
                    "code"=>12,
                    "msg"=>"参数异常！",
                    "data"=>""
                );
            }
        }else{
            $result=array(
                "code"=>5,
                "msg"=>"参数异常",
                "data"=>""
            );
        }
    }else{
        $result=array(
            "code"=>4,
            "msg"=>"参数异常",
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