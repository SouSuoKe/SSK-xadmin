<?php
include_once "../connect.php";
$menu=array(
    "code"=>-1,
    "msg"=>"状态异常！",
    "data"=>""
);
$other_results=array();

if ($_SESSION["userid"]) {
    $userid = $_SESSION["userid"];
    $usermeta=$db->get_results("SELECT * FROM `user` WHERE `id` = '{$userid}' AND `groupid` <> '2'");
    if($usermeta){
        $groupid = $usermeta[0]->groupid;
        $extgroupids = $usermeta[0]->extgroupids;
        $groupres = $db->get_results("SELECT * FROM `group` WHERE gid={$groupid}");
        $menuid = $groupres[0]->menuid;
        $menu_tree = array();
        if ($menuid === "0") {
            $menu_tree[] = array(
                "cite" => "暂无菜单",
                "href" => "javascript:;",
                "iconfont" => "fa-solid fa-face-dizzy fa-2x fa-bounce",
                "refresh" => "0",
                "submenu" => ""
            );
        } else {
            $menuidsqlstr = ""; //全显示
            if ($menuid === "all") {
                $menuidsqlstr = ""; //全显示
            } elseif($menuid === "") {
                $menuidsqlstr = "1=0 and ";
            } else {
                if ($extgroupids) {
                    $extgroupidsarr = explode("|", $extgroupids);
                    $extmenuidarr = array();
                    for ($i = 0; $i < count($extgroupidsarr); $i++) {
                        $explode = array();
                        $explode = explode("|", $db->get_var("SELECT menuid FROM `group` WHERE gid={$extgroupidsarr[$i]}"));
                        for ($ei = 0; $ei < count($explode); $ei++) {
                            $extmenuidarr[] = $explode[$ei];
                        }
                    }
                    if (in_array("all", $extmenuidarr)) {
                        $menuidsqlstr = ""; //全显示
                    } else {
                        $extmenuidarr = delByValue($extmenuidarr, "0"); //删除0
                        $extmenuidarr = delByValue($extmenuidarr, ""); //删除空值
                        $menuidarr = explode("|", $menuid);
                        $merged_array = array_merge($extmenuidarr, $menuidarr);
                        $menuidarr = array_unique($merged_array);
                        $menuidsqlstr = "id in (" . implode(",", $menuidarr) . ") and ";
                    }
                } else {
                    $menuidarr = explode("|", $menuid);
                    $menuidsqlstr = "id in (" . implode(",", $menuidarr) . ") and ";
                }
            }
            $menus = $db->get_results("select * from `menu` where " . $menuidsqlstr . "`parentid` >=0 order by `parentid`, `displayorder` asc");
            if($menus){
                foreach ($menus as $menu) {
                    // 如果是一级菜单
                    if($menu->href===""){
                        $href = "javascript:;";
                    }else{
                        $href = $menu->href;
                    }
                    if ($menu->parentid === '0') {
                        $menu_tree[$menu->id] = array(
                            'id' => $menu->id,
                            "cite" => $menu->name,
                            "href" => $href,
                            "iconfont" => $menu->iconfont,
                            "refresh" => $menu->refresh,
                            "submenu" => array()
                        );
                    } else {
                        // 如果是二级菜单
                        if ($menu->parentid !== '0' && isset($menu_tree[$menu->parentid])) {
                            $menu_tree[$menu->parentid]['submenu'][] = array(
                                'id' => $menu->id,
                                "cite" => $menu->name,
                                "href" => $href,
                                "iconfont" => $menu->iconfont,
                                "refresh" => $menu->refresh,
                                "submenu" => array()
                            );
                        } else {
                            // 如果是三级菜单
                            foreach ($menu_tree as &$parent_menu) {
                                foreach ($parent_menu['submenu'] as &$child_menu) {
                                    if ($child_menu['id'] === $menu->parentid) {
                                        $child_menu['submenu'][] = array(
                                            'id' => $menu->id,
                                            "cite" => $menu->name,
                                            "href" => $href,
                                            "iconfont" => $menu->iconfont,
                                            "refresh" => $menu->refresh
                                        );
                                    }
                                }
                            }
                        }
                    }
                }
                $menu_tree=array_values($menu_tree);//将1层数组key $menu->id 重置为默认0123。。。
            }else{
                $menu_tree[] = array(
                    "cite" => "暂无菜单",
                    "href" => "javascript:;",
                    "iconfont" => "fa-solid fa-face-dizzy fa-2x fa-bounce",
                    "refresh" => "0",
                    "submenu" => ""
                );
            }
        }
        $menu=array(
            "code"=>0,
            "msg"=>"成功！",
            "data"=>$menu_tree
        );
    }else{
        @session_destroy();
        $menu=array(
            "code"=>-3,
            "msg"=>"无权限！",
            "data"=>""
        );
    }
} else {
    @session_destroy();
    $menu=array(
        "code"=>-2,
        "msg"=>"无权限！",
        "data"=>""
    );
}
returnresult($menu["code"],$menu["msg"],$menu["data"],$other_results);