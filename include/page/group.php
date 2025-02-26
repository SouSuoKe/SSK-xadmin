<?php
if(!defined('IN_SSK_XADMIN')) {
    exit('Access Denied');
}
?>

<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>用户组管理</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <script src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
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

        <!--[if lt IE 9]>
          <script src="./js/html5.min.js"></script>
          <script src="./js/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
                <a href="">首页</a>
                <a><cite>用户组管理</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
            </a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body">
                            <div class="layui-table" id="groupTable" lay-filter="groupTable"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/html" id="toolbarDemo">
        <div class="layui-btn-container"> 
            <button class="layui-btn layui-btn-sm" lay-event="addgroup">添加用户组</button>
        </div>
    </script>
    <script type="text/html" id="operateBar">
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-xs" lay-event="more">更多<i class="layui-icon layui-icon-down"></i></a>
    </script>
    <script>
    layui.use(function() {
        var table = layui.table;
        var form = layui.form;
        var dropdown = layui.dropdown;
        var layer = layui.layer;
        var tree = layui.tree;
        var tipIndex;
        var tipShown = false;
        form.render();
        
        table.render({
            elem: "#groupTable",
            even: true,
            url: 'action.php?a=group&method=getgroupinfo',
            toolbar: "#toolbarDemo",
            editTrigger: 'dblclick',
            page: {
                layout: ['prev', 'page', 'next', 'skip', 'count', 'limit','refresh'],
                curr: 1,
                limit: 10,
                limits:[1,2,3,4,5,10,20,30,40,50,60,70,80,90,100],
                groups: 3
            },
            initSort: {
                field: 'gid',
                type: 'asc'
            },
            cols: [
                [
                    {type: 'checkbox',width: 80, align: "center", fixed: 'left'},
                    {field: 'gid', title: '组ID', sort: true},
                    {field: 'groupname', title: '组名', sort: true},
                    {field: 'menuid', title: '可见菜单', sort: true,hide:true},
                    {field: 'comment', title: '说明', sort: true},
                    {title: '操作', toolbar: '#operateBar',fixed:'right'}
                ]
            ],
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
        // 监听工具栏按钮点击事件
        table.on('toolbar(groupTable)', function(obj){
            var checkStatus = table.checkStatus(obj.config.id);
            switch(obj.event){
                case 'addgroup':
                    var addgrouplayer=layer.open({
                        type: 1,
                        content:`
                            <div class="layui-fluid">
                                <div class="layui-row">
                                    <form class="layui-form" lay-filter="form-usermsg">
                                        <div class="layui-form-item">
                                            <label for="groupname" class="layui-form-label">组名</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="groupname" name="groupname" value="" class="layui-input">
                                            </div>
                                        </div>
                        
                                        <div class="layui-form-item">
                                            <label for="menu" class="layui-form-label">可见菜单</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="menu" name="menu" value="" class="layui-input">
                                            </div>
                                        </div>
                        
                                        <div class="layui-form-item">
                                            <label for="comment" class="layui-form-label">说明</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="comment" name="comment" value="" class="layui-input">
                                            </div>
                                        </div>
                        
                                    </form>
                                </div>
                            </div>
                        `,
                        title: '添加',
                        btn: ['确认', '取消'],
                        btnAlign: 'c',
                        btn1: function(){
                            form.submit('form-usermsg', function(formdata){
                                var field = formdata.field;
                                $.ajax({
                                    url: 'action.php?a=group&method=addgroup',
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

                                    success: function(formredata) {
                                        console.log(formredata);
                                        if (formredata.code === 0) {
                                            table.reloadData('groupTable', {
                                            });
                                            layer.alert(formredata.msg, {time: 3000,icon: 6},function(index) {
                                                layer.close(index);
                                            });
                                            layer.close(addgrouplayer);
                                        } else {
                                            layer.alert(formredata.msg+"code："+formredata.code);
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
                            $("#menu").click(function(){
                                var menudata;
                                var checkedAll;
                                var checkedNone;
                                $.ajax({
                                    url: 'action.php?a=menu&method=checkmenu',
                                    type: 'get',
                                    success: function(menureturndata) {
                                        var menudata = [{"id":"","name":"【以下全部菜单】","isParent":"true","spread":true,"children":[]}];
<?php
if($http_encrypt){
print<<<END
                                        menudata[0].children=menureturndata.data=JSON.parse(ssk_decrypt(menureturndata.data,menureturndata.time));
END;
}else{
print<<<END
                                        menudata[0].children=menureturndata.data;
END;
}
?>

                                        console.log(menudata);
                                        var selectmenu=layer.open({
                                            type: 1,
                                            area: ['400px', '390px'],
                                            title:'请选择菜单',
                                            btn: ['确认', '取消'],
                                            btnAlign: 'c',
                                            content: `
                                                <div class="layui-form" id="none" style="margin: 10px 0 0 10px;">
                                                    <input type="checkbox" id="ckbnone" name="none" value="none" title="禁止查看全部菜单" lay-filter="none-checkbox-filter">
                                                </div>
                                                <div class="layui-form" id="all" style="margin: 10px 0 0 10px;">
                                                    <input type="checkbox" id="ckball" name="all" value="all" title="全部（包含未来添加的）菜单" lay-filter="all-checkbox-filter">
                                                </div>
                                                <div id="selectmenu1"></div>
                                            `,
                                            btn1: function(){
                                                console.log(checkedAll);
                                                console.log(checkedNone);
                                                if(checkedNone===true){
                                                    $("#menu").val("");
                                                }else if(checkedAll===true){
                                                    $("#menu").val("all");
                                                }else{
                                                    var checkData = tree.getChecked('selectmenu1');
                                                    console.log(checkData);
                                                    if(checkData.length!==0){
                                                        console.log("已勾选 GetVisiMenuIds1");
                                                        var visimenu=GetVisiMenuIds(checkData[0]);
                                                        $("#menu").val(visimenu.join('|'));
                                                    }else{
                                                        console.log("未勾选");
                                                        $("#menu").val("");
                                                    }
                                                }
                                                layer.close(selectmenu);
                                            },
                                            btn2: function(){
                                                //
                                            },
                                            success: function(layero, index, that){
                                                console.log(layero);
                                                console.log(index);
                                                console.log(that);
                                                form.render();
                                                form.on('checkbox(none-checkbox-filter)', function(data){
                                                    var elem = data.elem;
                                                    checkedNone = elem.checked;
                                                    var value = elem.value;
                                                    var othis = data.othis;
                                                
                                                    console.log(value + ": " + checkedNone);
                                                    if(checkedNone===true){
                                                        $("#selectmenu1").hide();
                                                        $("#all").hide();
                                                    }else if(checkedNone===false){
                                                        $("#selectmenu1").show();
                                                        $("#all").show();
                                                    }else{
                                                        $("#selectmenu1").show();
                                                        $("#all").show();
                                                    }
                                                });
                                                form.on('checkbox(all-checkbox-filter)', function(data){
                                                    var elem = data.elem;
                                                    checkedAll = elem.checked;
                                                    var value = elem.value;
                                                    var othis = data.othis;
                                                
                                                    console.log(value + ": " + checkedAll);
                                                    if(checkedAll===true){
                                                        $("#selectmenu1").hide();
                                                        $("#none").hide();
                                                    }else if(checkedAll===false){
                                                        $("#selectmenu1").show();
                                                        $("#none").show();
                                                    }else{
                                                        $("#selectmenu1").show();
                                                        $("#none").show();
                                                    }
                                                });
                                                tree.render({
                                                    elem: '#selectmenu1',
                                                    id: 'selectmenu1',
                                                    data: menudata,
                                                    onlyIconControl: false,
                                                    showCheckbox: true,
                                                    customName: {
                                                        id: 'id',
                                                        title: 'name',
                                                        children: 'children'
                                                    },
                                                    click: function(obj){
                                                        //
                                                    }
                                                });
                                                var checkedmenu=$("#menu").val();
                                                if(checkedmenu!=""){
                                                    console.log("menudata:");
                                                    console.log(menureturndata.data);
                                                    var nochildmenu=[];
                                                    for(var nochild_i=0; nochild_i<menureturndata.data.length;nochild_i++){
                                                        if(menureturndata.data[nochild_i].children.length===0){
                                                            nochildmenu.push(menureturndata.data[nochild_i].id);
                                                        }else{
                                                            for(var nochild_j=0; nochild_j<menureturndata.data[nochild_i].children.length;nochild_j++){
                                                                if(menureturndata.data[nochild_i].children[nochild_j].children.length===0){
                                                                    nochildmenu.push(menureturndata.data[nochild_i].children[nochild_j].id);
                                                                }else{
                                                                    for(var nochild_k=0; nochild_k<menureturndata.data[nochild_i].children[nochild_j].children.length;nochild_k++){
                                                                        nochildmenu.push(menureturndata.data[nochild_i].children[nochild_j].children[nochild_k].id);
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                    console.log(nochildmenu);
                                                    var checkedmenuarr=[];
                                                    for(var a_i=0;a_i<checkedmenu.split("|").length;a_i++){
                                                        if(nochildmenu.includes(checkedmenu.split("|")[a_i])){
                                                            checkedmenuarr.push(checkedmenu.split("|")[a_i]);
                                                        }else{
                                                            //
                                                        }
                                                    }
                                                    console.log(checkedmenuarr);
                                                    tree.setChecked('selectmenu1', checkedmenuarr);
                                                }
                                            }
                                        });
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
                            form.render();
                        }
                    });
                break;
            };
        });

        table.on('tool(groupTable)', function(obj){
            var data = obj.data;

            if(obj.event === 'edit'){
                console.log(data);
                var editlayer=layer.open({
                    type: 1,
                    content: `
                        <div class="layui-fluid">
                            <div class="layui-row">
                                <form class="layui-form" lay-filter="form-usermsg">
                                    <div class="layui-form-item">
                                        <label for="gid" class="layui-form-label">组ID</label>
                                        <div class="layui-input-inline">
                                            <input type="text" id="gid" name="gid" value="`+data.gid+`" disabled class="layui-input">
                                        </div>
                                    </div>

                                    <div class="layui-form-item">
                                        <label for="groupname" class="layui-form-label">组名</label>
                                        <div class="layui-input-inline">
                                            <input type="text" id="groupname" name="groupname" value="`+data.groupname+`" class="layui-input">
                                        </div>
                                    </div>

                                    <div class="layui-form-item">
                                        <label for="menu" class="layui-form-label">可见菜单</label>
                                        <div class="layui-input-inline">
                                            <input type="text" id="menu" name="menu" value="`+data.menuid+`" class="layui-input">
                                        </div>
                                    </div>

                                    <div class="layui-form-item">
                                        <label for="comment" class="layui-form-label">说明</label>
                                        <div class="layui-input-inline">
                                            <input type="text" id="comment" name="comment" value="`+data.comment+`" class="layui-input">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    `,
                    title: '编辑',
                    btn: ['确认', '取消'],
                    btnAlign: 'c',
                    btn1: function(){
                        form.submit('form-usermsg', function(formdata){
                            var field = formdata.field;
                            console.log(field);
                            $.ajax({
                                url: 'action.php?a=group&method=update',
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

                                success: function(formredata) {
                                    console.log(formredata);
                                    if (formredata.code === 0) {
                                        table.reloadData('groupTable', {
                                        });
                                        layer.alert(formredata.msg, {time: 3000,icon: 6},function(index) {
                                            layer.close(index);
                                        });
                                        layer.close(editlayer);
                                    } else {
                                        layer.alert(formredata.msg+"code："+formredata.code);
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
                        $("#menu").click(function(){
                            var menudata;
                            var checkedAll;
                            var checkedNone;
                            if(data.menuid===""){
                                checkedNone=true;
                            }else{
                                checkedNone=false;
                            }
                            if(data.menuid==="all"){
                                checkedAll=true;
                            }else{
                                checkedAll=false;
                            }
                            $.ajax({
                                url: 'action.php?a=menu&method=checkmenu',
                                type: 'get',
                                success: function(menureturndata) {
                                    var menudata = [{"id":"","name":"【以下全部菜单】","isParent":"true","spread":true,"children":[]}];
<?php
if($http_encrypt){
print<<<END
                                    menudata[0].children=JSON.parse(ssk_decrypt(menureturndata.data,menureturndata.time));
END;
}else{
print<<<END
                                    menudata[0].children=menureturndata.data;
END;
}
?>

                                    console.log(menudata);

                                    var selectmenu=layer.open({
                                        type: 1,
                                        area: ['400px', '390px'],
                                        title:'请选择菜单',
                                        btn: ['确认', '取消'],
                                        btnAlign: 'c',
                                        content: `
                                            <div class="layui-form" id="none" style="margin: 10px 0 0 10px;">
                                                <input type="checkbox" id="ckbnone" name="none" value="none" title="禁止查看全部菜单" lay-filter="none-checkbox-filter">
                                            </div>
                                            <div class="layui-form" id="all" style="margin: 10px 0 0 10px;">
                                                <input type="checkbox" id="ckball" name="all" value="all" title="全部（包含未来添加的）菜单" lay-filter="all-checkbox-filter">
                                            </div>
                                            <div id="selectmenu1"></div>
                                        `,
                                        btn1: function(){
                                            console.log(checkedAll);
                                            console.log(checkedNone);
                                            if(checkedNone===true){
                                                $("#menu").val("");
                                            }else if(checkedAll===true){
                                                $("#menu").val("all");
                                            }else{
                                                var visimenu=[];
                                                var checkData = tree.getChecked('selectmenu1');
                                                console.log("GetVisiMenuIds2");
                                                visimenu=GetVisiMenuIds(checkData[0]);
                                                $("#menu").val(visimenu.join('|'));
                                            }
                                            layer.close(selectmenu);
                                        },

                                        btn2: function(){
                                            //
                                        },

                                        success: function(layero, index, that){
                                            console.log(layero);
                                            console.log(index);
                                            console.log(that);
                                            if($("#menu").val()==="all"){
                                                $("#ckball").prop("checked",true);
                                                $("#selectmenu1").hide();
                                                $("#none").hide();
                                            }else if($("#menu").val()===""){
                                                $("#ckball").prop("checked",false);
                                                $("#ckbnone").prop("checked",true);
                                                $("#selectmenu1").hide();
                                                $("#all").hide();
                                            }else{
                                                $("#ckball").prop("checked",false);
                                                $("#selectmenu1").show();
                                                $("#none").show();
                                            }
                                            form.render();
                                            form.on('checkbox(none-checkbox-filter)', function(data){
                                                var elem = data.elem;
                                                checkedNone = elem.checked;
                                                var value = elem.value;
                                                var othis = data.othis;
                                                console.log(value + ": " + checkedNone);
                                                if(checkedNone===true){
                                                    $("#selectmenu1").hide();
                                                    $("#all").hide();
                                                }else if(checkedNone===false){
                                                    $("#selectmenu1").show();
                                                    $("#all").show();
                                                }else{
                                                    $("#selectmenu1").show();
                                                    $("#all").show();
                                                }
                                            });
                                            form.on('checkbox(all-checkbox-filter)', function(data){
                                                var elem = data.elem;
                                                checkedAll = elem.checked;
                                                var value = elem.value;
                                                var othis = data.othis;
                                                console.log(value + ": " + checkedAll);
                                                if(checkedAll===true){
                                                    $("#selectmenu1").hide();
                                                    $("#none").hide();
                                                }else if(checkedAll===false){
                                                    $("#selectmenu1").show();
                                                    $("#none").show();
                                                }else{
                                                    $("#selectmenu1").show();
                                                    $("#none").show();
                                                }
                                            });
                                            tree.render({
                                                elem: '#selectmenu1',
                                                id: 'selectmenu1',
                                                data: menudata,
                                                onlyIconControl: false,
                                                showCheckbox: true,
                                                customName: {
                                                    id: 'id',
                                                    title: 'name',
                                                    children: 'children'
                                                },
                                                click: function(obj){
                                                    //
                                                }
                                            });
                                            var checkedmenu=$("#menu").val();
                                            if(checkedmenu!=""){
<?php
if($http_encrypt){
print<<<END
                                                var nochildmenu=GetChildIds(JSON.parse(ssk_decrypt(menureturndata.data,menureturndata.time)));
END;
}else{
print<<<END
                                                var nochildmenu=GetChildIds(menureturndata.data);
END;
}
?>

                                                var checkedmenuarr=[];
                                                for(var a_i=0;a_i<checkedmenu.split("|").length;a_i++){
                                                    if(nochildmenu.includes(checkedmenu.split("|")[a_i])){
                                                        checkedmenuarr.push(checkedmenu.split("|")[a_i]);
                                                    }else{
                                                        //
                                                    }
                                                }
                                                console.log(checkedmenuarr);
                                                tree.setChecked('selectmenu1', checkedmenuarr);
                                            }
                                        }
                                    });
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
                        form.render();
                    }
                });
            } else if(obj.event === 'more'){
                dropdown.render({
                    elem: this,
                    show: true,
                    data: [{
                        title: '删除',
                        id: 'del'
                    }],
                    click: function(menudata){
                        if(menudata.id === 'del'){
                            console.log(data);
                            layer.confirm(`
                                <form class="layui-form" id="delgroup">
                                <div class="layui-form-item">
                                    <label class="layui-form-label" style="width: auto;">组ID</label>
                                    <div class="layui-input-block" style="margin-left:55px;">
                                        <input type="text" value="`+data.gid+`" class="layui-input" disabled>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label" style="width: auto;">组名</label>
                                    <div class="layui-input-block" style="margin-left:55px;">
                                        <input type="text" value="`+data.groupname+`" class="layui-input" disabled>
                                    </div>
                                </div>
                                </form>
                            `,
                            {
                                title: '删除用户组',
                                btn: ['删除', '取消'],
                                success: function(layero, index){
                                    form.render($('#delgroup'));
                                    var btnDelete = layero.find('.layui-layer-btn0');
                                    btnDelete.css({
                                        'background-color': '#FF5722',
                                        'color': 'white'
                                    });
                                }
                            }, function(index){
                                $.ajax({
                                    url: 'action.php?a=group&method=del',
                                    type: 'post',
<?php
if($http_encrypt){
print<<<END
                                    data: "data="+ssk_encrypt(data.gid),
END;
}else{
print<<<END
                                    data: "data="+data.gid,
END;
}
?>

                                    success: function(data) {
                                        if (data.code === 0) {
                                            obj.del();
                                            layer.alert(data.msg, {time: 3000,icon: 6},function(index) {
                                                layer.close(index);
                                            });

                                            // 检查是否需要跳转到上一页 开始
                                            var thisOptions = table.getOptions('groupTable');
                                            var currentPage = thisOptions.page.curr; // 获取当前页码
                                            var pageSize = thisOptions.page.limit; // 每页数据量
                                            var dataCount = thisOptions.page.count; // 数据总量
                                            
                                            if((dataCount - 1) % pageSize === 0 && currentPage > 1){
                                                table.reload('groupTable', {
                                                    page: {
                                                        layout: ['prev', 'page', 'next', 'skip', 'count', 'limit','refresh'], //自定义分页布局
                                                        curr: currentPage - 1,
                                                        limit: pageSize, // 每页显示的数量
                                                        limits:[1,2,3,4,5,10,20,30,40,50,60,70,80,90,100],
                                                        groups: 3, //只显示 1 个连续页码
                                                    }
                                                });
                                            } else {
                                                table.reload('groupTable'); // 重新加载表格
                                            }
                                            // 检查是否需要跳转到上一页 结束
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
                        }else{
                            //
                        }
                    },
                    align: 'right',
                    style: 'box-shadow: 1px 1px 10px rgb(0 0 0 / 12%);'
                })
            }
        });

        // 单元格编辑事件
        table.on('edit(groupTable)', function(obj){
            //需要在 cols 添加 【, edit: 'text'】
            var field = obj.field;
            var value = obj.value;
            var data = obj.data;
        });

        form.on('submit(search)', function(data){
            var field = data.field;
            table.reloadData('groupTable', {
                where: field
            });
            return false;
        });
    });

    function GetChildIds(data) {
        //获取所有菜单的子菜单，tree.setChecked 进入菜单列表时自动勾选已授权的菜单用
        var ids = [];

        function traverse(node) {
            if (node.children && node.children.length > 0) {
                node.children.forEach(traverse);
            } else {
                ids.push(node.id);
            }
        }

        data.forEach(traverse);

        return ids;
    }

    function GetVisiMenuIds(data) {
        //获取可见菜单，包含子菜单的上级菜单，上级菜单不显示则无法显示子菜单
        console.log(data);
        //console.log(data.id);
        var ids = [];
        if(typeof data === 'undefined'){
            return ids;
        }else{
            if (data.id && data.id.trim() !== "") {
                ids.push(data.id);
            }
            if (data.children && data.children.length > 0) {
                data.children.forEach(child => {
                    ids = ids.concat(GetVisiMenuIds(child));
                });
            }
            return ids;
        }
    }
    </script>
</html>