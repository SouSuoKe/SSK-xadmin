<?php
if(!defined('IN_SSK_XADMIN')) {
    exit('Access Denied');
}
?>

<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>菜单管理</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <link href="./fonts/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="./fonts/fontawesome/css/brands.css" rel="stylesheet">
        <link href="./fonts/fontawesome/css/solid.css" rel="stylesheet">
        <script type="text/javascript" src="./js/jquery.min.js"></script>

<?php
if($http_encrypt){
print<<<END
        <script type="text/javascript" src="./js/crypto-js-4.1.1/crypto-js.js"></script>
        <script type="text/javascript" src="./js/crypto-js-4.1.1/enc-base64.js"></script>
        <script type="text/javascript" src="./js/crypto-js-4.1.1/pad-zeropadding.js"></script>
        <script type="text/javascript" src="./js/jsencrypt.min.js"></script>
        <script type="text/javascript" src="./js/ssk_encrypt.js"></script>

END;
}else{
    //
}
?>

        <script src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
            <script src="./js/html5.min.js"></script>
            <script src="./js/respond.min.js"></script>
        <![endif]-->
        <style>
            /*layui checkbox disabled 不变灰 开始*/
            .custome .layui-checkbox-disabled {
            }
            .custome .layui-checkbox-disabled > i {
              border-color: #d2d2d2 !important;
            }
            .custome .layui-form-checkbox.layui-checkbox-disabled > div {
              background-color: #fff !important;
            }
            .custome .layui-checkbox-disabled > div {
              color: #5f5f5f !important;
            }
            .custome
              .layui-form-checked.layui-checkbox-disabled[lay-skin='primary']
              > i {
              border-color: #16b777 !important;
              background-color: #16b777 !important;
            }
            /*layui checkbox disabled 不变灰 结束*/
          </style>
    </head>

    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
                <a href="">首页</a>
                <a><cite>菜单管理</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
            </a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
                            <table class="layui-hide" id="ID-treeTable-demo"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>


    <script type="text/html" id="TPL-treeTable-demo">
        <div class="layui-btn-container">
            <!--
            <button class="layui-btn layui-btn-sm" lay-event="getChecked">获取选中数据</button>
            -->
            <button class="layui-btn layui-btn-sm" lay-event="addTopmenu">添加主菜单</button>
            <a onclick="parent.xadmin.add_tab('用户组管理','?p=group',true)"><button class="layui-btn layui-btn-sm">用户组菜单授权</button></a>
        </div>
    </script>
    <script type="text/html" id="TPL-treeTable-demo-tools">
        <div class="layui-btn-container">
            <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="edit">编辑</a>
            {{# if(d.isParent===true){ }}
            <a class="layui-btn layui-btn-warm layui-btn-xs" lay-event="addChild">新增</a>
            {{# }else{ }}
            <a class="layui-btn layui-btn-warm layui-btn-xs layui-btn-disabled">新增</a>
            {{# } }}
            <a class="layui-btn layui-btn-xs" lay-event="more">更多 <i class="layui-icon layui-icon-down"></i></a>
        </div>
    </script>
    
    <script type="text/html" id="TPL-demo-title">
        <i class="fa-2x {{= d.iconfont }}"></i>
    </script>
    
    <script type="text/html" id="TPL-demo-refresh">
        <div class="layui-form custome" lay-event="refresh">
        {{# if(d.refresh==='0'){ }}
            <input type="checkbox" name="refresh" value="{{= d.id }}" lay-filter="demo-checkbox-filter">
        {{# }else{ }}
            <input type="checkbox" name="refresh" value="{{= d.id }}" lay-filter="demo-checkbox-filter" checked>
        {{# } }}
        </div>
    </script>
    
    
    <script>
        layui.use(function(){
            var treeTable = layui.treeTable;
            var layer = layui.layer;
            var dropdown = layui.dropdown;
            var form = layui.form;
            var tree = layui.tree;

            var inst = treeTable.render({
                elem: '#ID-treeTable-demo',
                id: 'test',
                url: 'action.php?a=menu&method=checkmenu',
                tree: {
                    view: {"expandAllDefault":true}
                },
                toolbar: '#TPL-treeTable-demo',
                cols: [[
                    //{type: 'checkbox',width: 80, align: "center", fixed: 'left'},
                    {field: 'id', title: 'ID',width: 80,hide:true},
                    {field: 'parentid', title: 'PID',width: 80,hide:true},
                    {field: 'displayorder', title: '显示顺序',width: 80,edit: 'text'},
                    {field: 'iconfont', title: '图标',width: 80, align: "center", templet: '#TPL-demo-title'},
                    {field: 'name', title: '菜单名'},
                    {field: 'refresh',title: '刷新',width: 80, align: "center", templet: '#TPL-demo-refresh'},
                    {field: 'href', title: '链接'},
                    {fixed: "right", title: "操作", width: 250, align: "center", toolbar: "#TPL-treeTable-demo-tools"} 
                ]],
                parseData: function (res) {
                    if (res.code === 0) {
                        return {
                            "code": res.code,
                            "msg": res.msg,
                            "count": res.count,
<?php
if($http_encrypt){
print<<<END
                            "data": JSON.parse(ssk_decrypt(res.data,res.time))
END;
}else{
print<<<END
                            "data": res.data
END;
}
?>

                        };
                    } else {
                        layer.msg(res.msg+"code："+res.code, {
                            icon: 5,
                            time: 3000,
                        });
                        res.msg = res.msg +"code："+ res.code;
                        return res;
                        return false;
                    }
                }
            });

            // 表头工具栏工具事件
            treeTable.on("toolbar(test)", function (obj) {
                var config = obj.config;
                var tableId = config.id;
                var status = treeTable.checkStatus(tableId);
                // 获取选中行
                if (obj.event === "getChecked") {
                    if(!status.data.length) return layer.msg('无选中数据');
                    console.log(status);
                    layer.alert("当前数据选中已经输出到控制台，<br>您可按 F12 从控制台中查看结果。");
                }else if (obj.event === "addTopmenu") {
                    var editlayer = layer.open({
                        type: 1,
                        content: `
                            <div class="layui-fluid">
                                <div class="layui-row">
                                    <form class="layui-form" lay-filter="form-editmenu">

                                        <div class="layui-form-item" style="display:none;">
                                            <label for="edit-id" class="layui-form-label">菜单ID</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="edit-id" name="id" value="" disabled class="layui-input">
                                            </div>
                                        </div>

                                        <input type="text" id="edit-parentid" name="parentid" value="0" disabled class="layui-input" style="display:none;">

                                        <div class="layui-form-item">
                                            <label for="edit-iconfont" class="layui-form-label">图标</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="edit-iconfont" name="iconfont" value="" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label for="edit-name" class="layui-form-label">菜单名</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="edit-name" name="name" value="" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label for="edit-refresh" class="layui-form-label">刷新</label>
                                            <div class="layui-input-inline">
                                                <input type="checkbox" id="edit-refresh" name="refresh">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label for="edit-href" class="layui-form-label">链接</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="edit-href" name="href" value="" class="layui-input">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        `, 
                        title: '添加主菜单',
                        btn: ['确认', '取消'],
                        btnAlign: 'c',
                        btn1: function(){
                            form.submit('form-editmenu', function(data){
                                var field = data.field;
                                console.log(field);
                                $.ajax({
                                    url: 'action.php?a=menu&method=update',
                                    type: 'post',
<?php
if($http_encrypt){
print<<<END
                                    data: "data="+ssk_encrypt(JSON.stringify(field)),
END;
}else{
print<<<END
                                    data: "data="+JSON.stringify(field),
END;
}
?>

                                    success: function(data) {
                                        console.log(data);
                                        if (data.code === 0) {
                                            treeTable.reloadData('test', {});
                                            layer.alert(data.msg, {time: 3000,icon: 6},function(index) {
                                                layer.close(index);
                                            });
                                            layer.close(editlayer);
                                        } else {
                                            layer.alert(data.msg+"code："+data.code);
                                        }
                                    },
                                    error: function(xhr, textStatus, errorThrown) {
                                        console.log("进入error---");
                                        console.log("状态码：" + xhr.status);
                                        console.log("状态:" + xhr.readyState);
                                        console.log("错误信息:" + xhr.statusText);
                                        console.log("返回响应信息：" + xhr.responseText);
                                        console.log("请求状态：" + textStatus);
                                        console.log(errorThrown);
                                        console.log("请求失败");
                                    }
                                });
                            });
                            return false;
                        },
                        btn2: function(){
                            //
                        },
                        success: function(){
                            form.render();
                            $("#edit-parentname").click(function(){
                                layer.open({
                                    type: 1,
                                    area: ['420px', '240px'], // 宽高
                                    content: '<div id="selectmenu" style="padding: 11px;"></div>',
                                    success: function(layero, index, that){
                                        console.log(layero);
                                        console.log(index);
                                        console.log(that);

                                        tree.render({
                                            elem: '#selectmenu',
                                            data: tbdata,
                                            onlyIconControl: true,
                                            customName: {
                                                id: 'id',
                                                title: 'name',
                                                children: 'children'
                                            },
                                            click: function(obj){
                                                console.log(obj);
                                                if(obj.data.isParent===true){
                                                    if(obj.data.id===$("#edit-id").val()){
                                                        layer.msg("不可选择当前菜单！");
                                                    }else{
                                                        if(isDescendant(tbdata, $("#edit-id").val(), obj.data.id)){
                                                            layer.msg("不可选择当前菜单的子菜单！");
                                                        }else{
                                                            $("#edit-parentid").val(obj.data.id);
                                                            if(obj.data.name==="【菜单】(点此为顶级菜单)"){
                                                                $("#edit-parentname").val("顶级菜单，无上级");
                                                            }else{
                                                                $("#edit-parentname").val(obj.data.name);
                                                            }
                                                            layer.close(index);
                                                        }
                                                    }
                                                }else{
                                                    layer.msg("不可选择三级菜单！");
                                                }
                                            }
                                        });
                                    }
                                });
                            });
                        
                            $("#edit-iconfont").click(function(){
                                layer.open({
                                    type: 2,
                                    area: ['720px', '580px'],
                                    title:'请选择图标',
                                    content: '?p=menuchoosefontawesome',
                                    fixed: false, // 不固定
                                    maxmin: true,
                                    shadeClose: true
                                });
                            });
                        }
                    });
                }
            });

            form.on('checkbox(demo-checkbox-filter)', function(data){
                var elem = data.elem;
                var checked = elem.checked;
                var value = elem.value;
                var othis = data.othis;
                
                var refreshdata='{"id":"'+value+'","refresh":"'+checked+'"}';
                $.ajax({
                    url: 'action.php?a=menu&method=refresh',
                    type: 'post',
<?php
if($http_encrypt){
print<<<END
                    data: 'data='+ssk_encrypt(refreshdata),
END;
}else{
print<<<END
                    data: 'data='+refreshdata,
END;
}
?>

                    success: function(data) {
                        if (data.code === 0) {
                            $("input[name='refresh'][value='"+value+"']").prop('checked', checked);
                            form.render('checkbox');
                            layer.msg(data.msg);
                        }else{
                            layer.alert(data.msg+"code："+data.code);
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.log("进入error---");
                        console.log("状态码：" + xhr.status);
                        console.log("状态:" + xhr.readyState); //当前状态,0-未初始化，1-正在载入，2-已经载入，3-数据进行交互，4-完成。
                        console.log("错误信息:" + xhr.statusText);
                        console.log("返回响应信息：" + xhr.responseText);
                        console.log("请求状态：" + textStatus);
                        console.log(errorThrown);
                        console.log("请求失败");
                    }
                });
            });

            // 单元格编辑事件
            treeTable.on('edit(test)', function(obj){
                var field = obj.field;
                var value = obj.value;
                var oldValue = obj.oldValue;
                var data = obj.data;
                var col = obj.getCol();
                console.log(obj);
            
                console.log(data.id);
                console.log(field);
                console.log(value);
                
                var displayorderdata='{"id":"'+data.id+'","displayorder":"'+value+'"}';
                $.ajax({
                    url: 'action.php?a=menu&method=displayorder',
                    type: 'post',
<?php
if($http_encrypt){
print<<<END
                    data: 'data='+ssk_encrypt(displayorderdata),
END;
}else{
print<<<END
                    data: 'data='+displayorderdata,
END;
}
?>

                    success: function(data) {
                        if (data.code === 0) {
                            layer.msg(data.msg);
                            treeTable.reloadData('test',{});
                        }else{
                            layer.alert(data.msg+"code："+data.code);
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.log("进入error---");
                        console.log("状态码：" + xhr.status);
                        console.log("状态:" + xhr.readyState); //当前状态,0-未初始化，1-正在载入，2-已经载入，3-数据进行交互，4-完成。
                        console.log("错误信息:" + xhr.statusText);
                        console.log("返回响应信息：" + xhr.responseText);
                        console.log("请求状态：" + textStatus);
                        console.log(errorThrown);
                        console.log("请求失败");
                    }
                });
            
                var update = {};
                update[field] = value;
                obj.update(update, true); // 参数 true 为 v2.7 新增功能，即同步更新其他包含自定义模板并可能存在关联的列视图
            });


            function findNameById(data, targetId) {
                if(targetId==='0'){
                    return '顶级菜单，无上级'
                }else{
                    for (const item of data) {
                        if (item.id === targetId) {
                            return item.name;
                        }
                        if (item.children && item.children.length > 0) {
                            const result = findNameById(item.children, targetId);
                            if (result) {
                                return result;
                            }
                        }
                    }
                }
            }

            // 单元格工具事件
            treeTable.on('tool(test)', function (obj) {
                var layEvent = obj.event;
                var trElem = obj.tr;
                var trData = obj.data;
                var tableId = obj.config.id;
                var editrefresh="";
                if (layEvent === "edit") {
                    console.log("edit: id:"+trData.id+" parentid:"+trData.parentid+" displayorder:"+trData.displayorder+" iconfont:"+trData.iconfont+" name:"+trData.name+" refresh:"+trData.refresh+" href:"+trData.href);
            
                    if(trData.refresh==='0'){
                        editrefresh='<input type="checkbox" id="edit-refresh" name="refresh">';
                    }else{
                        editrefresh='<input type="checkbox" id="edit-refresh" name="refresh" checked>';
                    }
            
                    var tbdata = [{"id":"0","name":"【菜单】(点此为顶级菜单)","isParent":true,"spread":true,"children":[]}];
                    tbdata[0].children=treeTable.getData('test');
                    console.log(tbdata);
                    console.log(JSON.stringify(tbdata));
                    var editlayer = layer.open({
                        type: 1,
                        content: `
                            <div class="layui-fluid">
                                <div class="layui-row">
                                    <form class="layui-form" lay-filter="form-editmenu">

                                        <div class="layui-form-item">
                                            <label for="edit-id" class="layui-form-label">菜单ID</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="edit-id" name="id" value="`+trData.id+`" disabled class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label for="edit-parentid" class="layui-form-label">上级菜单</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="edit-parentid" name="parentid" value="`+trData.parentid+`" disabled class="layui-input" style="display:none;">
                                                <input type="text" id="edit-parentname" name="parentname" value="`+findNameById(tbdata, trData.parentid)+`" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label for="edit-iconfont" class="layui-form-label">图标</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="edit-iconfont" name="iconfont" value="`+trData.iconfont+`" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label for="edit-name" class="layui-form-label">菜单名</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="edit-name" name="name" value="`+trData.name+`" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label for="edit-refresh" class="layui-form-label">刷新</label>
                                            <div class="layui-input-inline">
                                                `+editrefresh+`
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label for="edit-href" class="layui-form-label">链接</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="edit-href" name="href" value="`+trData.href+`" class="layui-input">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        `, 
                        title: '编辑菜单',
                        btn: ['确认', '取消'],
                        btnAlign: 'c',
                        btn1: function(){
                            form.submit('form-editmenu', function(data){
                                var field = data.field;
                                console.log(field);
                                $.ajax({
                                    url: 'action.php?a=menu&method=update',
                                    type: 'post',
<?php
if($http_encrypt){
print<<<END
                                    data: "data="+ssk_encrypt(JSON.stringify(field)),
END;
}else{
print<<<END
                                    data: "data="+JSON.stringify(field),
END;
}
?>

                                    success: function(data) {
                                        console.log(data);
                                        if (data.code === 0) {
                                            treeTable.reloadData('test', {});
                                            layer.alert(data.msg, {time: 3000,icon: 6},function(index) {
                                                layer.close(index);
                                            });
                                            layer.close(editlayer);
                                        } else {
                                            layer.alert(data.msg+"code："+data.code);
                                        }
                                    },
                                    error: function(xhr, textStatus, errorThrown) {
                                        console.log("进入error---");
                                        console.log("状态码：" + xhr.status);
                                        console.log("状态:" + xhr.readyState); //当前状态,0-未初始化，1-正在载入，2-已经载入，3-数据进行交互，4-完成。
                                        console.log("错误信息:" + xhr.statusText);
                                        console.log("返回响应信息：" + xhr.responseText);
                                        console.log("请求状态：" + textStatus);
                                        console.log(errorThrown);
                                        console.log("请求失败");
                                    }
                                });
                            });
                            return false;
                        },
                        btn2: function(){
                            //
                        },
                        success: function(){
                            form.render();
                            $("#edit-parentname").click(function(){
                                layer.open({
                                    type: 1,
                                    area: ['400px', '390px'],
                                    title:'请选择上级菜单',
                                    content: '<div id="selectmenu"></div>',
                                    success: function(layero, index, that){
                                        console.log(layero);
                                        console.log(index);
                                        console.log(that);
                                        tree.render({
                                            elem: '#selectmenu',
                                            data: tbdata,
                                            onlyIconControl: true,
                                            customName: {
                                                id: 'id',
                                                title: 'name',
                                                children: 'children'
                                            },
                                            click: function(obj){
                                                console.log(obj);
                                                if(obj.data.isParent===true){
                                                    if(obj.data.id===$("#edit-id").val()){
                                                        layer.msg("不可选择当前菜单！");
                                                    }else{
                                                        if(isDescendant(tbdata, $("#edit-id").val(), obj.data.id)){
                                                            layer.msg("不可选择当前菜单的子菜单！");
                                                        }else{
                                                            $("#edit-parentid").val(obj.data.id);
                                                            if(obj.data.name==="【菜单】(点此为顶级菜单)"){
                                                                $("#edit-parentname").val("顶级菜单，无上级");
                                                            }else{
                                                                $("#edit-parentname").val(obj.data.name);
                                                            }
                                                            layer.close(index);
                                                        }
                                                    }
                                                }else{
                                                    layer.msg("不可选择三级菜单！");
                                                }
                                            }
                                        });
                                    }
                                });
                            });
                            
                            $("#edit-iconfont").click(function(){
                                layer.open({
                                    type: 2,
                                    area: ['720px', '580px'],
                                    title:'请选择图标',
                                    content: '?p=menuchoosefontawesome',
                                    fixed: false,
                                    maxmin: true,
                                    shadeClose: true//,
                                  });
                            });
                        }
                    });

                    function isDescendant(data, parentId, childId) {
                        for (const item of data) {
                            if (item.id === parentId) {
                                return containsChild(item, childId);
                            }
                            if (item.children && item.children.length > 0) {
                                const result = isDescendant(item.children, parentId, childId);
                                if (result) {
                                    return result;
                                }
                            }
                        }
                        return false;
                    }

                    function containsChild(item, childId) {
                        if (item.id === childId) {
                            return true;
                        }
                        if (item.children && item.children.length > 0) {
                            for (const child of item.children) {
                                if (containsChild(child, childId)) {
                                    return true;
                                }
                            }
                        }
                        return false;
                    }

                } else if (layEvent === "addChild") {
                
                    console.log("addChild: id:"+trData.id+" parentid:"+trData.parentid+" displayorder:"+trData.displayorder+" iconfont:"+trData.iconfont+" name:"+trData.name+" refresh:"+trData.refresh);
                    tbdata=treeTable.getData('test');
                    var editlayer = layer.open({
                        type: 1,
                        content: `
                            <div class="layui-fluid">
                                <div class="layui-row">
                                    <form class="layui-form" lay-filter="form-editmenu">
                  
                                        <div class="layui-form-item" style="display:none;">
                                            <label for="edit-id" class="layui-form-label">菜单ID</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="edit-id" name="id" value="" disabled class="layui-input">
                                            </div>
                                        </div>
                  
                                        <div class="layui-form-item">
                                            <label for="edit-parentid" class="layui-form-label">上级菜单</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="edit-parentid" name="parentid" value="`+trData.id+`" disabled class="layui-input" style="display:none;">
                                                <input type="text" id="edit-parentname" name="parentname" value="`+findNameById(tbdata, trData.id)+`" disabled class="layui-input">
                                            </div>
                                        </div>
                
                                        <div class="layui-form-item">
                                            <label for="edit-iconfont" class="layui-form-label">图标</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="edit-iconfont" name="iconfont" value="" class="layui-input">
                                            </div>
                                        </div>
                  
                                        <div class="layui-form-item">
                                            <label for="edit-name" class="layui-form-label">菜单名</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="edit-name" name="name" value="" class="layui-input">
                                            </div>
                                        </div>
                  
                                        <div class="layui-form-item">
                                            <label for="edit-refresh" class="layui-form-label">刷新</label>
                                            <div class="layui-input-inline">
                                                <input type="checkbox" id="edit-refresh" name="refresh">
                                            </div>
                                        </div>
                  
                                        <div class="layui-form-item">
                                            <label for="edit-href" class="layui-form-label">链接</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="edit-href" name="href" value="" class="layui-input">
                                            </div>
                                        </div>
                  
                                    </form>
                                </div>
                            </div>
                        `, 
                        title: '添加子菜单',
                        btn: ['确认', '取消'],
                        btnAlign: 'c',
                        btn1: function(){
                            form.submit('form-editmenu', function(data){
                                var field = data.field;
                                console.log(field);
                                $.ajax({
                                    url: 'action.php?a=menu&method=update',
                                    type: 'post',
<?php
if($http_encrypt){
print<<<END
                                    data: "data="+ssk_encrypt(JSON.stringify(field)),
END;
}else{
print<<<END
                                    data: "data="+JSON.stringify(field),
END;
}
?>

                                    success: function(data) {
                                        console.log(data);
                                        if (data.code === 0) {
                                            treeTable.reloadData('test', {});
                                            layer.alert(data.msg, {time: 3000,icon: 6},function(index) {
                                                layer.close(index);
                                            });
                                            layer.close(editlayer);
                                        } else {
                                            layer.alert(data.msg+"code："+data.code);
                                        }
                                    },
                                    error: function(xhr, textStatus, errorThrown) {
                                        console.log("进入error---");
                                        console.log("状态码：" + xhr.status);
                                        console.log("状态:" + xhr.readyState); //当前状态,0-未初始化，1-正在载入，2-已经载入，3-数据进行交互，4-完成。
                                        console.log("错误信息:" + xhr.statusText);
                                        console.log("返回响应信息：" + xhr.responseText);
                                        console.log("请求状态：" + textStatus);
                                        console.log(errorThrown);
                                        console.log("请求失败");
                                    }
                                });
                            });
                            return false;
                        },
                        btn2: function(){
                            //
                        },
                        success: function(){
                            form.render();
                            $("#edit-parentname").click(function(){
                                layer.open({
                                    type: 1,
                                    area: ['420px', '240px'],
                                    title:'请选择上级菜单',
                                    content: '<div id="selectmenu" style="padding: 11px;"></div>',
                                    success: function(layero, index, that){
                                        console.log(layero);
                                        console.log(index);
                                        console.log(that);

                                        tree.render({
                                            elem: '#selectmenu',
                                            data: tbdata,
                                            onlyIconControl: true,
                                            customName: {
                                                id: 'id',
                                                title: 'name',
                                                children: 'children'
                                            },
                                            click: function(obj){
                                                console.log(obj);
                                                if(obj.data.isParent===true){
                                                    if(obj.data.id===$("#edit-id").val()){
                                                        layer.msg("不可选择当前菜单！");
                                                    }else{
                                                        if(isDescendant(tbdata, $("#edit-id").val(), obj.data.id)){
                                                            layer.msg("不可选择当前菜单的子菜单！");
                                                        }else{
                                                            $("#edit-parentid").val(obj.data.id);
                                                            if(obj.data.name==="【菜单】(点此为顶级菜单)"){
                                                                $("#edit-parentname").val("顶级菜单，无上级");
                                                            }else{
                                                                $("#edit-parentname").val(obj.data.name);
                                                            }
                                                            layer.close(index);
                                                        }
                                                    }
                                                }else{
                                                    layer.msg("不可选择三级菜单！");
                                                }
                                            }
                                        });
                                    }
                                });
                            });
                        
                            $("#edit-iconfont").click(function(){
                                layer.open({
                                    type: 2,
                                    area: ['720px', '580px'],
                                    title:'请选择图标',
                                    content: '?p=menuchoosefontawesome',
                                    fixed: false,
                                    maxmin: true,
                                    shadeClose: true
                                });
                            });
                        }
                    });

                } else if (layEvent === "more") {
                    dropdown.render({
                        elem: this,
                        show: true,
                        align: "right",
                        data: [
                            {
                                title: "删除",
                                id: "del"
                            }
                        ],
                        click: function (menudata) {
                            if (menudata.id === "del") {
                                console.log(obj);
                                layer.confirm(`
                                    <form class="layui-form" id="delmenu">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label" style="width: auto;">菜单名</label>
                                        <div class="layui-input-block" style="margin-left: 70px;">
                                            <input type="text" value="`+obj.data.name+`" class="layui-input" disabled>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label" style="width: auto;">链接</label>
                                        <div class="layui-input-block" style="margin-left: 70px;">
                                            <input type="text" value="`+obj.data.href+`" class="layui-input" disabled>
                                        </div>
                                    </div>
                                    </form>
                                    `,
                                    {
                                        title: '删除菜单',
                                        area: ['300px', 'auto'],
                                        btn: ['删除', '取消'],
                                        success: function(layero, index){
                                            form.render($('#delgroup'));
                                            // 获取第一个按钮并修改其样式
                                            var btnDelete = layero.find('.layui-layer-btn0');
                                            btnDelete.css({
                                                'background-color': '#FF5722', // 设置按钮背景颜色
                                                'color': 'white'              // 设置按钮文字颜色
                                            });
                                        }
                                    },
                                    function(index){
                                        if (obj.data.children && obj.data.children.length > 0) {
                                            layer.confirm("该菜单含有子菜单，是否确认删除？",
                                                {title: '删除菜单',
                                                 btn: ['删除', '取消'],
                                                    success: function(layero, index){
                                                        form.render($('#delgroup'));
                                                        var btnDelete = layero.find('.layui-layer-btn0');
                                                        btnDelete.css({
                                                            'background-color': '#FF5722', // 设置按钮背景颜色
                                                            'color': 'white'              // 设置按钮文字颜色
                                                        });
                                                    }
                                                },
                                                function (index) {
                                                    delnode(obj.data.id,index);
                                                }
                                            );
                                        }else{
                                            delnode(obj.data.id,index);
                                        }
                                    }
                                );
                                function delnode(nodeid,index){
                                    $.ajax({
                                        url: 'action.php?a=menu&method=del',
                                        type: 'post',
<?php
if($http_encrypt){
print<<<END
                                        data: 'id='+ssk_encrypt(JSON.stringify(nodeid)),
END;
}else{
print<<<END
                                        data: 'id='+JSON.stringify(nodeid),
END;
}
?>

                                        success: function(data) {
                                            if (data.code === 0) {
                                                layer.msg(data.msg);
                                                obj.del();
                                                treeTable.reloadData('test', {});
                                                layer.close(index);
                                            }else{
                                                layer.alert(data.msg+"code："+data.code);
                                            }
                                        },
                                        error: function(xhr, textStatus, errorThrown) {
                                            console.log("进入error---");
                                            console.log("状态码：" + xhr.status);
                                            console.log("状态:" + xhr.readyState); //当前状态,0-未初始化，1-正在载入，2-已经载入，3-数据进行交互，4-完成。
                                            console.log("错误信息:" + xhr.statusText);
                                            console.log("返回响应信息：" + xhr.responseText);
                                            console.log("请求状态：" + textStatus);
                                            console.log(errorThrown);
                                            console.log("请求失败");
                                        }
                                    });
                                }
                            } else {
                                //
                            }
                        }
                    });
                }else{
                    //
                }
            });
        });
    </script>
</html>