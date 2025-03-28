<?php
if(!defined('IN_SSK_XADMIN')) {
    exit('Access Denied');
}
?>

<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>用户管理</title>
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
                <a><cite>用户管理</cite></a>
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
                            <form class="layui-form layui-col-space5">
                                <div class="layui-inline layui-show-xs-block" id="mhss">
                                    <input type="checkbox" name="like" lay-skin="tag" title="模糊搜索">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <input type="text" name="gph" id="searchgph" placeholder="请输入工牌号" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <input type="text" name="username" id="searchname" placeholder="请输入用户名" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <button class="layui-btn" lay-submit="" lay-filter="search">
                                        <i class="layui-icon">&#xe615;</i>
                                    </button>
                                    <button type="reset" class="layui-btn layui-btn-primary">清空</button>
                                </div>
                            </form>
                        </div>
                        <div class="layui-card-body">
                            <div class="layui-table" id="userTable" lay-filter="userTable"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/html" id="toolbarDemo">
        <div class="layui-btn-container"> 
            <button class="layui-btn layui-btn-sm" lay-event="adduser">添加用户</button>
        </div>
    </script>
    <script type="text/html" id="operateBar">
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-xs" lay-event="more">更多<i class="layui-icon layui-icon-down"></i></a>
    </script>
    <script>
        var groups=[];
        $.ajax({
            url: 'action.php?a=member&method=getgroupinfo',
            type: "get",
            dataType: "json",
            success: function(data) {
                if(data.code===0){
<?php
if($http_encrypt){
print<<<END
                    groups=JSON.parse(ssk_decrypt(data.data,data.time));
END;
}else{
print<<<END
                    groups=data.data;
END;
}
?>

                }else{
                    layer.alert(data.msg+"<p>action：member<br>code："+data.code+"</p>",{icon: 2});
                }
            }
        });
    </script>
    <script type="text/html" id="groupidtoname">
        {{#
            return groups[d.groupid];
        }}
    </script>
    <script type="text/html" id="extgroupidstoname">
        {{#
            if (d.extgroupids.includes("|")) {
                var extgroupids_arr=d.extgroupids.split("|");
                var extgroupidsname="";
                for(var i=0; i<extgroupids_arr.length; i++){
                    if(i==extgroupids_arr.length-1){
                        extgroupidsname+=groups[extgroupids_arr[i]];
                    }else{
                        extgroupidsname+=groups[extgroupids_arr[i]]+"，";
                    }
                }
                return extgroupidsname;
            }else{
                return groups[d.extgroupids];
            }
        }}
    </script>
    <script>
        layui.use(function() {
            var table = layui.table;
            var form = layui.form;
            var dropdown = layui.dropdown;
            var layer = layui.layer;
            var tipIndex;
            var tipShown = false;
            form.render();

            $('#mhss').mouseenter(function(){
                // 如果提示框已显示，则直接返回
                if (tipShown) return;
                // 显示提示框，并保存索引
                tipIndex = layer.tips('模糊搜索使用SQL语法，通配符：%，如：开始%，%结束，%包含%', '#mhss',{tips:3,time: 60000});
                tipShown = true; // 设置提示框已显示
            });

            $('#mhss').mouseleave(function(){
                // 如果提示框已显示，则关闭它
                if (tipShown) {
                    layer.close(tipIndex);
                    tipShown = false; // 设置提示框已关闭
                }
            });

            table.render({
                elem: "#userTable",
                even: true,
                url: 'action.php?a=member&method=getuserinfo',
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
                    field: 'gph',
                    type: 'asc'
                },
                cols: [
                    [
                        {type: 'checkbox',width: 80, align: "center", fixed: 'left'},
                        //{field: 'id', title: 'ID', sort: true},
                        {field: 'gph', title: '工牌号', sort: true},
                        {field: 'username', title: '用户名'},
                        {field: 'groupid', title: '组',templet: '#groupidtoname'},
                        {field: 'extgroupids', title: '扩展组',templet: '#extgroupidstoname'},
                        {field: 'ggtolerance', title: '动态口令过期时间(秒)',templet: function(d){return d.ggtolerance*30}},
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
                        res.msg = res.msg +"<p>action：member<br>code："+res.code+"</p>";
                        layer.msg(res.msg, {
                            icon: 2,
                            time: 3000,
                        });
                        
                        return res;
                        return false;
                    }
                }
            });
            // 监听工具栏按钮点击事件
            table.on('toolbar(userTable)', function(obj){
                var checkStatus = table.checkStatus(obj.config.id);
                switch(obj.event){
                    case 'adduser':

                    var groupinfo="";
                    var extgroupsinfo="";
                    for (var index in groups){
                        if(index==="" || groups[index]===""){
                            //
                        }else{
                            groupinfo += '    <div class="layui-input-inline"><input type="radio" name="groupid" id="groupid" value="'+index+'" title="'+groups[index]+'"></div>';
                            extgroupsinfo+='    <div class="layui-input-inline"><input type="checkbox" name="extgroupids[]" id="extgroupids" value="'+index+'" title="'+groups[index]+'"></div>';
                        }
                    }

                    var adduserlayer=layer.open({
                        type: 1,
                        content: `
                            <div class="layui-fluid">
                                <div class="layui-row">
                                    <form class="layui-form" lay-filter="form-adduser">
                                        <div class="layui-form-item">
                                            <label for="gph" class="layui-form-label">工牌号</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="gph" name="gph" value="" class="layui-input">
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label for="username" class="layui-form-label">用户名</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="username" name="username" value="" class="layui-input">
                                            </div>
                                        </div>
                                          <div class="layui-form-item">
                                              <label for="username" class="layui-form-label">用户组</label>
                                              <div class="layui-input-inline">
                                              <div style="height:140px;overflow-x: hidden;overflow-y: auto;" id="groupinfo">
                                                  `+groupinfo+`
                                              </div>
                                              </div>
                                          </div>
                                          <div class="layui-form-item">
                                              <label for="username" class="layui-form-label">扩展组</label>
                                              <div class="layui-input-inline">
                                              <div style="height:112px;overflow-x: hidden;overflow-y: auto;" id="extgroupsinfo">
                                                  `+extgroupsinfo+`
                                              </div>
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
                            form.submit('form-adduser', function(data){
                                var field = data.field;
                                var selectedValues = [];
                                $("input[name='extgroupids[]']:checked").each(function(){
                                    selectedValues.push($(this).val());
                                });
                                console.log(selectedValues);
                                field.extgroupids=selectedValues;
                                console.log(field);
                                $.ajax({
                                    url: 'action.php?a=member&method=adduser',
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
                                            $("#searchgph").val(field.gph);
                                            table.reloadData('userTable', {
                                                where: {
                                                    page:'1',
                                                    gph:field.gph
                                                }
                                            });
                                            layer.alert(data.msg, {time: 3000,icon: 6},function(index) {
                                                layer.close(index);
                                            });
                                            layer.close(adduserlayer);
                                        } else {
                                            layer.alert(data.msg+"<p>action：member<br>code："+data.code+"</p>",{icon: 2});
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
                        }
                    });
                    break;
                };
            });

            table.on('tool(userTable)', function(obj){
                var data = obj.data;
                if(obj.event === 'edit'){
                    var groupinfo="";
                    var extgroupsinfo="";
                    for (var index in groups){
                        if(index==="" || groups[index]===""){
                            groupinfo +="";
                        }else{
                            //组
                            if(index===data.groupid){
                                var radiochecked=" checked";
                            }else{
                                var radiochecked="";
                            }
                            groupinfo += '    <div class="layui-input-inline"><input type="radio" name="groupid" id="groupid" value="'+index+'" title="'+groups[index]+'"'+radiochecked+'></div>';

                            if (data.extgroupids.includes("|")) {
                                var extgroupids_arr=data.extgroupids.split("|");
                                if(extgroupids_arr.indexOf(index) !== -1){
                                    var checkboxchecked=" checked";
                                }else{
                                    var checkboxchecked="";
                                }
                            }else{
                                if(data.extgroupids===index){
                                    var checkboxchecked=" checked";
                                }else{
                                    var checkboxchecked="";
                                }
                            }
                            if(index==0 || index==1){
                                extgroupsinfo+='';
                            }else{
                                extgroupsinfo+='    <div class="layui-input-inline"><input type="checkbox" name="extgroupids[]" id="extgroupids" value="'+index+'" title="'+groups[index]+'"'+checkboxchecked+'></div>';
                            }
                        }
                    }

                    layer.alert(`
                        <div class="layui-fluid">
                            <div class="layui-row">
                                <form class="layui-form" lay-filter="form-usermsg">
                                  <input type="text" id="id" name="id" value="`+data.id+`" disabled style="display:none;">
                                    <div class="layui-form-item">
                                        <label for="gph" class="layui-form-label">工牌号</label>
                                        <div class="layui-input-inline">
                                            <input type="text" id="gph" name="gph" value="`+data.gph+`" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label for="username" class="layui-form-label">用户名</label>
                                        <div class="layui-input-inline">
                                            <input type="text" id="username" name="username" value="`+data.username+`" class="layui-input">
                                        </div>
                                    </div>
                                      <div class="layui-form-item">
                                          <label for="username" class="layui-form-label">用户组</label>
                                          <div class="layui-input-inline">
                                          <div style="height:140px;overflow-x: hidden;overflow-y: auto;">
                                              `+groupinfo+`
                                          </div>
                                          </div>
                                      </div>
                                      <div class="layui-form-item">
                                          <label for="username" class="layui-form-label">扩展组</label>
                                          <div class="layui-input-inline">
                                          <div style="height:112px;overflow-x: hidden;overflow-y: auto;">
                                              `+extgroupsinfo+`
                                          </div>
                                          </div>
                                      </div>
                                    <div class="layui-form-item">
                                        <label for="username" class="layui-form-label" style="padding-top: 0px;">动态口令<br>有效时长</label>
                                        <div class="layui-input-inline">
                                            <select name="ggt" id="ggt" lay-verify="">
                                                <option value="1">30</option>
                                                <option value="2">60</option>
                                                <option value="3">90</option>
                                                <option value="4">120</option>
                                            </select>
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">秒</div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    `,
                    {
                        title: '编辑',
                        btn: ['确认', '取消'],
                        btnAlign: 'c',
                        btn1: function(){
                            form.submit('form-usermsg', function(data){
                                var field = data.field;
                                var selectedValues = [];
                                $("input[name='extgroupids[]']:checked").each(function(){
                                    selectedValues.push($(this).val());
                                });
                                console.log(selectedValues);
                                field.extgroupids=selectedValues;
                                console.log(field);
                                $.ajax({
                                    url: 'action.php?a=member&method=update',
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
                                            table.reloadData('userTable', {
                                            });
                                            layer.alert(data.msg, {time: 3000,icon: 6},function(index) {
                                                layer.close(index);
                                            });
                                        } else {
                                            layer.alert(data.msg+"<p>action：member<br>code："+data.code+"</p>",{icon: 2});
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
                            $('#ggt').val(data.ggtolerance);
                            form.render();
                        }
                    });
                } else if(obj.event === 'more'){
                    dropdown.render({
                        elem: this,
                        show: true,
                        data: [{
                            title: '重置密码',
                            id: 'resetpwd'
                        },{
                            title: '重置动态口令',
                            id: 'resetga'
                        },{
                            title: '重置验证方式',
                            id: 'resettfa'
                        },{
                            title: '删除用户',
                            id: 'del'
                        }],
                        click: function(menudata){
                            if(menudata.id === 'resetpwd'){
                                layer.confirm(`
                                    <form class="layui-form" id="delgroup">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label" style="width: auto;">工牌号</label>
                                        <div class="layui-input-block" style="margin-left:66px;">
                                            <input type="text" value="`+data.gph+`" class="layui-input" disabled>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label" style="width: auto;">用户名</label>
                                        <div class="layui-input-block" style="margin-left:66px;">
                                            <input type="text" value="`+data.username+`" class="layui-input" disabled>
                                        </div>
                                    </div>
                                    </form>
                                `,
                                {
                                    title: '重置密码',
                                    btn: ['重置', '取消'],
                                    success: function(layero, index){
                                        var btnrestpwd = layero.find('.layui-layer-btn0');
                                        btnrestpwd.css({
                                            'background-color': '#FF5722', // 设置按钮背景颜色
                                            'color': 'white'              // 设置按钮文字颜色
                                        });
                                    }
                                }, function(index){
                                    $.ajax({
                                        url: 'action.php?a=member&method=restpwd',
                                        type: 'post',
<?php
if($http_encrypt){
print<<<END
                                        data: "data="+ssk_encrypt(data.id),
END;
}else{
print<<<END
                                        data: "data="+data.id,
END;
}
?>

                                        success: function(data) {
                                            if (data.code === 0) {
                                                layer.alert(data.msg, {time: 3000,icon: 6},function(index) {
                                                    layer.close(index);
                                                });
                                            } else {
                                                layer.alert(data.msg+"<p>action：member<br>code："+data.code+"</p>",{icon: 2});
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
                            } else if(menudata.id === 'resetga'){
                                layer.confirm(`
                                    <form class="layui-form" id="delgroup">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label" style="width: auto;">工牌号</label>
                                        <div class="layui-input-block" style="margin-left:66px;">
                                            <input type="text" value="`+data.gph+`" class="layui-input" disabled>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label" style="width: auto;">用户名</label>
                                        <div class="layui-input-block" style="margin-left:66px;">
                                            <input type="text" value="`+data.username+`" class="layui-input" disabled>
                                        </div>
                                    </div>
                                    </form>
                                `,
                                {
                                    title: '重置动态口令',
                                    btn: ['重置', '取消'],
                                    success: function(layero, index){
                                        var btnrestga = layero.find('.layui-layer-btn0');
                                        btnrestga.css({
                                            'background-color': '#FF5722', // 设置按钮背景颜色
                                            'color': 'white'              // 设置按钮文字颜色
                                        });
                                    }
                                }, function(index){
                                    $.ajax({
                                        url: 'action.php?a=member&method=restga',
                                        type: 'post',
<?php
if($http_encrypt){
print<<<END
                                        data: "data="+ssk_encrypt(data.id),
END;
}else{
print<<<END
                                        data: "data="+data.id,
END;
}
?>

                                        success: function(data) {
                                            if (data.code === 0) {
                                                layer.alert(data.msg, {time: 3000,icon: 6},function(index) {
                                                    layer.close(index);
                                                });
                                            } else {
                                                layer.alert(data.msg+"<p>action：member<br>code："+data.code+"</p>",{icon: 2});
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
                            } else if(menudata.id === 'resettfa'){
                                layer.confirm(`
                                    <form class="layui-form" id="delgroup">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label" style="width: auto;">工牌号</label>
                                        <div class="layui-input-block" style="margin-left:66px;">
                                            <input type="text" value="`+data.gph+`" class="layui-input" disabled>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label" style="width: auto;">用户名</label>
                                        <div class="layui-input-block" style="margin-left:66px;">
                                            <input type="text" value="`+data.username+`" class="layui-input" disabled>
                                        </div>
                                    </div>
                                    </form>
                                `,
                                {
                                    title: '重置验证方式：仅验证密码',
                                    btn: ['重置', '取消'],
                                    success: function(layero, index){
                                        var btnrestga = layero.find('.layui-layer-btn0');
                                        btnrestga.css({
                                            'background-color': '#FF5722', // 设置按钮背景颜色
                                            'color': 'white'              // 设置按钮文字颜色
                                        });
                                    }
                                }, function(index){
                                    $.ajax({
                                        url: 'action.php?a=member&method=resttfa',
                                        type: 'post',
<?php
if($http_encrypt){
print<<<END
                                        data: "data="+ssk_encrypt(data.id),
END;
}else{
print<<<END
                                        data: "data="+data.id,
END;
}
?>

                                        success: function(data) {
                                            if (data.code === 0) {
                                                layer.alert(data.msg, {time: 3000,icon: 6},function(index) {
                                                    layer.close(index);
                                                });
                                            } else {
                                                layer.alert(data.msg+"<p>action：member<br>code："+data.code+"</p>",{icon: 2});
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
                            } else if(menudata.id === 'del'){
                                console.log(data);
                                layer.confirm(`
                                    <form class="layui-form" id="delgroup">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label" style="width: auto;">工牌号</label>
                                        <div class="layui-input-block" style="margin-left:66px;">
                                            <input type="text" value="`+data.gph+`" class="layui-input" disabled>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label" style="width: auto;">用户名</label>
                                        <div class="layui-input-block" style="margin-left:66px;">
                                            <input type="text" value="`+data.username+`" class="layui-input" disabled>
                                        </div>
                                    </div>
                                    </form>
                                `,
                                {
                                    title: '删除用户',
                                    btn: ['删除', '取消'],
                                    success: function(layero, index){
                                        var btnDelete = layero.find('.layui-layer-btn0');
                                        btnDelete.css({
                                            'background-color': '#FF5722', // 设置按钮背景颜色
                                            'color': 'white'              // 设置按钮文字颜色
                                        });
                                    }
                                }, function(index){
                                    $.ajax({
                                        url: 'action.php?a=member&method=deluser',
                                        type: 'post',
<?php
if($http_encrypt){
print<<<END
                                        data: "data="+ssk_encrypt(data.id),
END;
}else{
print<<<END
                                        data: "data="+data.id,
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
                                                var thisOptions = table.getOptions('userTable');
                                                var currentPage = thisOptions.page.curr; // 获取当前页码
                                                var pageSize = thisOptions.page.limit; // 每页数据量
                                                var dataCount = thisOptions.page.count; // 数据总量

                                                if((dataCount - 1) % pageSize === 0 && currentPage > 1){
                                                    table.reload('userTable', {
                                                        page: {
                                                            layout: ['prev', 'page', 'next', 'skip', 'count', 'limit','refresh'],
                                                            curr: currentPage - 1,
                                                            limit: pageSize, // 每页显示的数量
                                                            limits:[1,2,3,4,5,10,20,30,40,50,60,70,80,90,100],
                                                            groups: 3, //只显示 1 个连续页码
                                                        }
                                                    });
                                                } else {
                                                    table.reload('userTable'); // 重新加载表格
                                                }
                                                // 检查是否需要跳转到上一页 结束
                                            } else {
                                                layer.alert(data.msg+"<p>action：member<br>code："+data.code+"</p>",{icon: 2});
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
                        style: 'box-shadow: 1px 1px 10px rgb(0 0 0 / 12%);' // 设置额外样式
                    })
                }
            });

            // 单元格编辑事件
            table.on('edit(userTable)', function(obj){
                //需要在 cols 添加 【, edit: 'text'】
                var field = obj.field;
                var value = obj.value;
                var data = obj.data;
            });

            form.on('submit(search)', function(data){
                var field = data.field;
                field.page='1';
                table.reloadData('userTable', {
                    where: field
                });
                return false;
            });
        });
    </script>
</html>