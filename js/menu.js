$.ajax({
    type: "get",
    url: "./js/menu.php",
    datatype: "json",
    success: function (data) {
        if(data.code===0){
            if(isExitsFunction("ssk_encrypt")){
                var data=JSON.parse(ssk_decrypt(data.data,data.time));
            }else{
                var data=data.data;
            }
            //添加左侧菜单开始
            var m1 = "";
            var menu1 = "";
            var menu2 = "";
            var menu3 = "";
            var menu4 = "";
            var submenu1 = "";
            var submenu2 = "";
            var openmenu=JSON.parse(localStorage.getItem("cate"));
            if(openmenu===null){
                //
            }else{
                if(typeof(openmenu.f1)==="undefined"){
                    openmenu.f1=null;
                }
                if(typeof(openmenu.f2)==="undefined"){
                    openmenu.f2=null;
                }
                if(typeof(openmenu.f3)==="undefined"){
                    openmenu.f3=null;
                }
            }
            var datakey=Object.keys(data);
            for (var a = 0; a < datakey.length; a++) {
                menu1 = data[datakey[a]];
                menu2 = menu1["submenu"];
                if (menu2.length === 0) {
                    //一级菜单，无子菜单
                    if(menu1['refresh']==="0"){
                        var refresh="";
                    }else{
                        var refresh=",true";
                    }
                    if(menu1['iconfont']===""){
                        var icon1="";
                    }else{
                        var icon1="<i class=\"" + menu1['iconfont'] + "\"></i>";
                    }
                    m1 += "<li>" +
                        "<a onclick=\"xadmin.add_tab('"+menu1['cite']+"','"+ menu1['href'] +"'"+refresh+")\">" +
                        icon1 +
                        "<cite>" + menu1['cite'] + "</cite>" +
                        "</a>" +
                        "</li>";
                } else {
                    //一级菜单，有子菜单
                    for (var b = 0; b < menu2.length; b++) {
                        if (menu2[b]["submenu"].length === 0) {
                            //二级菜单，无子菜单
                            if(menu2[b]['refresh']==="0"){
                                var refresh="";
                            }else{
                                var refresh=",true";
                            }
                            if(menu2[b]["iconfont"]===""){
                                var icon2="";
                            }else{
                                var icon2="<i class=\"" + menu2[b]["iconfont"] + "\"></i>";
                            }
                            submenu1 += "<ul class=\"sub-menu\"><li>" +
                                "<a onclick=\"xadmin.add_tab('"+menu2[b]['cite']+"','"+ menu2[b]['href'] +"'"+refresh+")\">" +
                                icon2 +
                                "<cite>" + menu2[b]["cite"] + "</cite>" +
                                "</a></li>" +
                                "</ul>";
                        } else {
                            //二级菜单，有子菜单
                            menu3 = menu2[b];
                            menu4 = menu2[b]["submenu"];
                            for (var d = 0; d < menu4.length; d++) {
                                if(menu4[d]['refresh']==="0"){
                                    var refresh="";
                                }else{
                                    var refresh=",true";
                                }
                                if(menu4[d]["iconfont"]===""){
                                    var icon3="";
                                }else{
                                    var icon3="<i class=\"" + menu4[d]["iconfont"] + "\"></i>";
                                }
                                submenu2 += "<ul class=\"sub-menu\"><li>" +
                                    "<a onclick=\"xadmin.add_tab('"+menu4[d]['cite']+"','"+ menu4[d]['href'] +"'"+refresh+")\">" +
                                    icon3 +
                                    "<cite>" + menu4[d]["cite"] + "</cite>" +
                                    "</a>" +
                                    "</li>" +
                                    "</ul>";
                            }
                            
                            if(menu2[b]["iconfont"]===""){
                                var icon2="";
                            }else{
                                var icon2="<i class=\"" + menu2[b]["iconfont"] + "\"></i>";
                            }
                            submenu1 += "<ul class=\"sub-menu\"><li>" +
                                "<a href=\"javascript:;\">"+
                                icon2 +
                                "<cite>" + menu2[b]["cite"] + "</cite>" +
                                "<i class=\"iconfont nav_right\">&#xe697;</i>" +
                                "</a>" +
                                submenu2 +
                                "</li>" +
                                "</ul>";
                        }
                        submenu2 = "";
                    }
                    if(menu1['refresh']==="0"){
                        var refresh="";
                    }else{
                        var refresh=",true";
                    }
                    if(menu1['iconfont']===""){
                        var icon1="";
                    }else{
                        var icon1="<i class=\"" + menu1['iconfont'] + "\"></i>";
                    }
                    m1 += "<li>" +
                        "<a href=\"javascript:;\">"+
                        icon1 +
                        "<cite>" + menu1['cite'] + "</cite>" +
                        "<i class=\"iconfont nav_right\">&#xe697;</i>" +
                        "</a>" +
                        submenu1 +
                        "</li>";
                    submenu1 = "";
                }
            }
            $("#nav").html(m1);
            //添加左侧菜单结束
            for(var i in openmenu){//刷新自动展开菜单
                if(openmenu[i]!=null){
                    $('.left-nav #nav li').eq(openmenu[i]).click();
                }
            }
        }else{
            layer.alert(data.msg+"code："+data.code);
        }
        
    }
});


function isExitsFunction(funcName){
    try{
        if(typeof(eval(funcName))==="function"){
            return true;
        }
    }catch(e){}
    return false;
}