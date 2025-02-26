<?php
if(!defined('IN_SSK_XADMIN')) {
    exit('Access Denied');
}

if($usermeta[0]->groupid==="1"){
    //管理员

    if(isset($_GET["method"]) && $_GET["method"]!==""){
        $method=$_GET["method"];
        if($method==="checkmenu"){
            $menus = $db->get_results("select * from `menu` where `parentid` >=0 order by `parentid`, `displayorder` asc");
            if($menus){
                foreach ($menus as $menu) {
                    // 如果是一级菜单
                    if($menu->href===""){
                        $href = "";
                    }else{
                        $href = $menu->href;
                    }
                    if ($menu->parentid === "0") {
                        $menu_tree[$menu->id] = array(
                            'id' => $menu->id,
                            'parentid' => $menu->parentid,
                            'displayorder' => $menu->displayorder,
                            "name" => $menu->name,
                            "href" => $href,
                            "iconfont" => $menu->iconfont,
                            "refresh" => $menu->refresh,
                            "isParent"=> true,
                            "children" => array()
                        );
                    } else {
                        // 如果是二级菜单
                        if ($menu->parentid !== "0" && isset($menu_tree[$menu->parentid])) {
                            $menu_tree[$menu->parentid]['children'][] = array(
                                'id' => $menu->id,
                                'parentid' => $menu->parentid,
                                'displayorder' => $menu->displayorder,
                                "name" => $menu->name,
                                "href" => $href,
                                "iconfont" => $menu->iconfont,
                                "refresh" => $menu->refresh,
                                "isParent"=> true,
                                "children" => array()
                            );
                        } else {
                            // 如果是三级菜单
                            foreach ($menu_tree as &$parent_menu) {
                                foreach ($parent_menu['children'] as &$child_menu) {
                                    if ($child_menu['id'] === $menu->parentid) {
                                        //$child_menu["isParent"]="true";
                                        $child_menu['children'][] = array(
                                            'id' => $menu->id,
                                            'parentid' => $menu->parentid,
                                            'displayorder' => $menu->displayorder,
                                            "name" => $menu->name,
                                            "href" => $href,
                                            "iconfont" => $menu->iconfont,
                                            "refresh" => $menu->refresh,
                                            "isParent"=> false
                                        );
                                    }
                                }
                            }
                        }
                    }
                }
            }else{
                $menu_tree[] = array(
                    "name" => "暂无菜单",
                    'parentid' => "",
                    'displayorder' => "",
                    "href" => "",
                    "iconfont" => "&#xe6a4;",
                    "refresh" => "0",
                    "isParent"=> false
                );
            }

            $menu_tree=array_values($menu_tree);

            $result=array(
                "code"=>0,
                "msg"=>"成功！",
                "data"=>$menu_tree
            );

        }elseif($method==="del"){
            $delid_arr=array();
            //$id=$_POST["id"];
            $id=(int)json_decode(httpdecrypt($_POST["id"]),true);
            $delid_arr[]=$id;

            $id2arr=$db->get_results("SELECT id FROM `menu` WHERE `parentid` = $id");
            if($id2arr){
                foreach($id2arr as $id2){
                    $delid_arr[]=$id2->id;
                    $id3arr=$db->get_results("SELECT id FROM `menu` WHERE `parentid` = $id2->id");
                    if($id3arr){
                        foreach($id3arr as $id3){
                            $delid_arr[]=$id3->id;
                        }
                    }else{
                        //
                    }
                }
            }else{
                //
            }
            $idstr=implode(", ", $delid_arr);
            //echo $idstr;
            if($db->query("DELETE FROM `menu` WHERE `id` in ($idstr)")===false){
                $result=array(
                    "code"=>6,
                    "msg"=>"菜单删除失败！",
                    "data"=>""
                );
            }else{
                $result=array(
                    "code"=>0,
                    "msg"=>"菜单已删除！",
                    "data"=>""
                );
            }
        }elseif($method==="refresh"){
            //$id=$_POST["id"];
            //$refresh=$_POST["refresh"];
            $data=json_decode(httpdecrypt($_POST["data"]),true);
            $id=(int)$data["id"];
            $refresh=$db->escape($data["refresh"]);
            if($refresh==="true"){
                $refresh=1;
            }else{
                $refresh=0;
            }

            if($db->query("UPDATE `menu` SET `refresh` = $refresh WHERE `id` = $id")===false){
                $result=array(
                    "code"=>7,
                    "msg"=>"修改失败！",
                    "data"=>""
                );
            }else{
                $result=array(
                    "code"=>0,
                    "msg"=>"修改成功！",
                    "data"=>""
                );
            }
        }elseif($method==="displayorder"){
            //$id=$_POST["id"];
            //$displayorder=$_POST["displayorder"];
            $data=json_decode(httpdecrypt($_POST["data"]),true);
            $id=(int)$data["id"];
            $displayorder=(int)$data["displayorder"];
            if($db->query("UPDATE `menu` SET `displayorder` = $displayorder WHERE `id` = $id")===false){
                $result=array(
                    "code"=>8,
                    "msg"=>"修改失败！",
                    "data"=>""
                );
            }else{
                $result=array(
                    "code"=>0,
                    "msg"=>"修改成功！",
                    "data"=>""
                );
            }
        }elseif($method==="update"){
            if(isset($_POST["data"]) && $_POST["data"]!==""){
                $data=json_decode(httpdecrypt($_POST["data"]),true);
                $parentid=(int)$data["parentid"];
                $iconfont=$db->escape($data["iconfont"]);
                $name=$db->escape($data["name"]);
                //$refresh=$data["refresh"];
                if(array_key_exists("id",$data)){
                    $id=(int)$data["id"];
                }else{
                    $id="";
                }

                if(array_key_exists("refresh",$data)){
                    $refresh=1;
                }else{
                    $refresh=0;
                }
                $href=$db->escape($data["href"]);

                if($id===0){
                    //无id，insert
                    if($db->query("INSERT INTO `menu` (`parentid`,`iconfont`, `name`, `refresh`, `href`) VALUES ($parentid, '$iconfont','$name', $refresh, '$href')")===false){
                        $result=array(
                            "code"=>11,
                            "msg"=>"修改失败！",
                            "data"=>""
                        );
                    }else{
                        $result=array(
                            "code"=>0,
                            "msg"=>"修改成功！",
                            "data"=>""
                        );
                    }
                }else{
                    //有id，update
                    if($db->query("UPDATE `menu` SET `parentid` = $parentid,`iconfont`='$iconfont',`name`='$name',`refresh`=$refresh,`href`='$href' WHERE `id` = $id")===false){
                        $result=array(
                            "code"=>10,
                            "msg"=>"修改失败！",
                            "data"=>""
                        );
                    }else{
                        $result=array(
                            "code"=>0,
                            "msg"=>"修改成功！",
                            "data"=>""
                        );
                    }
                }

            }else{
                $result=array(
                    "code"=>9,
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