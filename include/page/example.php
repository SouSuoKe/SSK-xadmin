<?php
if(!defined('IN_SSK_XADMIN')) {
    exit('Access Denied');
}
?>
<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>【重要】使用示例【必看】</title>
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <link href="./lib/layui/css/layui.css" rel="stylesheet">
        <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
        <style>
            .layui-card-header {
                font-weight: bold;
                font-size: 20px;
            }
        </style>
    </head>
    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
                <a href="">首页</a>
                <a><cite>【重要】使用示例【必看】</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
            </a>
        </div>
        <div style="padding: 16px;">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header" id="1">防止绕过主程序直接访问或调用（PHP）</div>
                        <div class="layui-card-body">
                            <blockquote class="layui-elem-quote">
                                放入 /include/page/、/include/action/ 中的页面，需要通过 index.php?p=***、action.php?a=*** 访问或调用，必须将以下代码加入页头，防止页面绕过主程序，通过路径（如：http://domain/include/page/***.php、http://domain/include/action/***.php）直接访问或调用，同时推荐 page 与 action 使用相同文件名互相对应
                            </blockquote>
<pre class="layui-code code-demo" lay-options="{theme: 'dark'}" style="margin-top:10px;">
&lt;?php
if(!defined('IN_SSK_XADMIN')) {
    exit('Access Denied');
}
?&gt;
</pre>
                        </div>
                    </div>
                </div>
<!---->
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header" id="7">完整的AJAX请求</div>
                        <div class="layui-card-body">
                            <blockquote class="layui-elem-quote">
                            <span style="font-weight: bold; font-size: 15px;">GET</span>
                            </blockquote>
<pre class="layui-code code-demo" lay-options="{theme: 'dark'}" style="margin-top:10px;">
                                $.ajax({
                                    url: "action.php?a=member",    //此处为你放入 /include/action/ 中的自定义接口文件，action.php?a=member 对应 /include/action/member.php
                                    type: "get",
                                    dataType: "json",
                                    success: function(data) {
                                        if(data.code===0){
                                            //GET成功，后端返回成功（code=0），继续下一步操作
&lt;?php
if($http_encrypt){                          //判断 config.php $http_encrypt 是否开启加密传输
print&lt;&lt;&lt;END
                                            groups=JSON.parse(ssk_decrypt(data.data,data.time));    //已开启加密传输，解密返回数据后再使用
END;
}else{
print&lt;&lt;&lt;END
                                            groups=data.data;    //未开启加密传输，直接使用返回数据
END;
}
?&gt;

                                        }else{
                                            //GET成功，后端返回失败（code!=0），弹窗显示 后端报错信息 及 对应接口：
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
</pre>
                            <blockquote class="layui-elem-quote" style="margin-top:10px;">
                            <span style="font-weight: bold; font-size: 15px;">POST</span>
                            </blockquote>
<pre class="layui-code code-demo" lay-options="{theme: 'dark'}" style="margin-top:10px;">
                                $.ajax({
                                    url: "action.php?a=member&method=adduser",
                                    type: "post",
                                    dataType: "json",
&lt;?php
if($http_encrypt){
print&lt;&lt;&lt;END
                                    data: "data="+ssk_encrypt(JSON.stringify(field)),    // 加密待传输数据，field 来自 Layui form 提交事件，详见：https://layui.dev/docs/2/form/#submit
END;
}else{
print&lt;&lt;&lt;END
                                    data: "data="+JSON.stringify(field),    // 未加密待传输数据
END;
}
?&gt;

                                    success: function(data) {
                                        console.log(data);
                                        if (data.code === 0) {
                                            //POST成功，后端返回成功（code=0），继续下一步操作
                                        } else {
                                            //POST成功，后端返回失败（code!=0），弹窗显示 后端报错信息 及 对应接口：
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
</pre>
                        </div>
                    </div>
                </div>
<!---->
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header" id="2">返回数据（PHP）</div>
                        <div class="layui-card-body">
                            <blockquote class="layui-elem-quote">
                                当 /include/action/ 中的接口需要返回数据时，直接通过如下代码框中的 “返回数据格式” 返回即可，code=0 为成功，code!=0 为失败，-1、1、2 三个错误码已被 action.php 占用，建议 /include/action/ 中的自定义接口错误码从 3 开始，每个页面使用唯一的错误码，方便定位问题，系统自带页面从3开始，每个报错点+1，前端ajax请求报错时推荐提示报错接口（如图action：member，code：14，则直接到 /include/action/member.php 查看 "code"=>14, 即可快速定位异常位置）
                            </blockquote>
                            <blockquote class="layui-elem-quote" style="border-left: 5px solid #ff0000;">
                                请勿在接口中使用 HTTP 状态码作为接口的code返回码，如：使用200代表成功等，也不要通过 HTTP STATUS CODE=200 来判断本次ajax是否成功，访问成功不代表业务成功！
                            </blockquote>
                            <div style="text-align:center; margin-bottom:10px;">
                                <img src="images/PixPin_20250306082929.png">
                                <img src="images/PixPin_20250306081927.png">
                                <img src="images/PixPin_20250306085359.png">
                            </div>
<pre class="layui-code code-demo" lay-options="{theme: 'dark'}" style="margin-top:10px;">
返回数据格式：

成功：
$result=array(
    "code"=>0,  //code=0为成功
    "msg"=>"更新成功！",
    "data"=>$data
);

失败：
$result=array(
    "code"=>14,  //非0为失败
    "msg"=>"添加失败！工牌号重复！",
    "data"=>""
);
</pre>
                            <blockquote class="layui-elem-quote" style="margin-top:10px;">
                                如果需要在返回结果中添加其他不可加密的字段及数据，如 layui 数据表格需要的 count（总条数）等其他数据，需接在 $result 添加一个键名为 other 的数组，该数组的 key 和 value 即为需要添加的字段及数据
                            </blockquote>
<pre class="layui-code code-demo" lay-options="{theme: 'dark'}" style="margin-top:10px;">
$result=array(
    "code"=>0,
    "msg"=>"更新成功！",
    "data"=>$data,
    "other"=>array(  //其他不可加密的待返回字段
        "count"=>$totalRows,
        "key1"=>"value1",
        "key2"=>"value2",
        。。。。。。。。。
    )
);
</pre>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header" id="3">加密函数（PHP）：httpencrypt($mingwen)</div>
                        <div class="layui-card-body">
                            <blockquote class="layui-elem-quote">
                                在接口返回数据时，可将data字段放入该函数中，当 config.php 中 $http_encrypt=true; 时返回加密数据，当 $http_encrypt=false; 时直接返回不加密的原始数据
                            </blockquote>
<pre class="layui-code code-demo" lay-options="{theme: 'dark'}" style="margin-top:10px;">
$before_encrypt="加密前原始数据";
$enc_arr=httpencrypt($before_encrypt);
echo "<p>加密后数据：".$enc_arr["data"]."</p>";
echo "<p>加密时间戳：".$enc_arr["time"]."</p>";
</pre>

<pre class="layui-code code-demo" lay-options="{theme: 'dark'}" style="margin-top:10px;">
//如：/include/page/rebindGA.php

$enc_data=httpencrypt("otpauth://totp/".$sitename."?secret=".$secret);
$qrdata=$enc_data["data"];
if($http_encrypt){
    $aesgentime=$enc_data["time"];  //前端解密需要加密密钥对应的时间戳
}else{
    
}
</pre>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header" id="4">解密函数（PHP）：httpdecrypt($miwen)</div>
                        <div class="layui-card-body">
<pre class="layui-code code-demo" lay-options="{theme: 'dark'}" style="margin-top:10px;">
$before_encrypt="加密前原始数据";
$after_encrypt=httpencrypt($before_encrypt);
echo "<p>加密后数据：".$after_encrypt."</p>";
echo "<p>解密后数据：".httpdecrypt($after_encrypt)."</p>";
</pre>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header" id="5">处理返回数据函数（PHP）：returnresult($code,$msg,$data,$other_results)</div>
                        <div class="layui-card-body">
                            <blockquote class="layui-elem-quote">
                                该函数为处理返回数据函数，会将 $code、$msg、$data、$other_results 组装成一维数组并转换为json输出，同时当 $http_encrypt=true; 时加密 $data 字段，该函数仅在 action.php 最后使用，基本不需要修改，只需要在自定义接口 /include/aciton/***.php 中按<a href="#2" style="color: -webkit-link;cursor: pointer;text-decoration: underline;">【返回数据】</a>中的要求定义 $result 即可
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header" id="6">前端加密解密（HTML）：加密解密相关JS</div>
                        <div class="layui-card-body">
                            <blockquote class="layui-elem-quote">
                                请在需要加密的前端页面先判断加密开关状态再在 JQuery 后面引入加密解密相关JS
                            </blockquote>
<pre class="layui-code code-demo" lay-options="{theme: 'dark'}" style="margin-top:10px;">
                            &lt;script type="text/javascript" src="./js/jquery.min.js">&lt;/script>
&lt;?php
if($http_encrypt){
print&lt;&lt;&lt;END
                            &lt;script type="text/javascript" src="./js/crypto-js-4.1.1/crypto-js.js">&lt;/script>
                            &lt;script type="text/javascript" src="./js/crypto-js-4.1.1/enc-base64.js">&lt;/script>
                            &lt;script type="text/javascript" src="./js/crypto-js-4.1.1/pad-zeropadding.js">&lt;/script>
                            &lt;script type="text/javascript" src="./js/jsencrypt.min.js">&lt;/script>
                            &lt;script type="text/javascript" src="./js/ssk_encrypt.js">&lt;/script>
END;
}else{
    //
}
?&gt;
</pre>
                            <blockquote class="layui-elem-quote" style="margin-top:20px;">
                                <span style="font-weight: bold; font-size: 15px;">加密相关</span>
                            </blockquote>
<pre class="layui-code code-demo" lay-options="{theme: 'dark'}" style="margin-top:10px;">
                            ~~~ ajax 向服务器 post 数据 ~~~
                        form.submit('form-adduser', function(data){
                            var field = data.field; // Layui 获取表单全部字段值
if($http_encrypt){
print&lt;&lt;&lt;END
                            data: 'data='+ssk_encrypt(JSON.stringify(field)),     //加密数据
END;
}else{
print&lt;&lt;&lt;END
                            data: 'data='+JSON.stringify(field),      //不加密数据
END;
}
</pre>
                            <blockquote class="layui-elem-quote" style="margin-top:10px;">
                                向后端传输数据时，推荐先拼接成json，再按需求明文或加密传输
                            </blockquote>
<pre class="layui-code code-demo" lay-options="{theme: 'dark'}" style="margin-top:10px;">

                    var pwddata='{"newpass":"'+$("#newpass").val()+'","repass":"'+$("#repass").val()+'"}';     //待传输数据

                    $.ajax({
                        url: 'action.php?a=password',
                        type: 'post',
&lt;?php
if($http_encrypt){
print&lt;&lt;&lt;END
                        data: 'data='+ssk_encrypt(pwddata),     //加密待传输数据
END;
}else{
print&lt;&lt;&lt;END
                        data: 'data='+pwddata,     //不加密待传输数据
END;
}
?&gt;

                        success: function(data) {
                            blablabla...
                        }
                    });
</pre>
<pre class="layui-code code-demo" lay-options="{theme: 'dark'}" style="margin-top:10px;">
&lt;?php
    $data=json_decode(httpdecrypt($_POST["data"]),true);    //后端接收数据
    $newpass=$db->escape($data["newpass"]);     //提取数据并格式化字符串
    $repass=$db->escape($data["repass"]);       //提取数据并格式化字符串
?&gt;
</pre>

                            <blockquote class="layui-elem-quote" style="margin-top:20px;">
                                <span style="font-weight: bold; font-size: 15px;">解密相关</span>
                            </blockquote>
<pre class="layui-code code-demo" lay-options="{theme: 'dark'}" style="margin-top:10px;">
                    ~~~ ajax 请求 取得返回数据 res ~~~
                if (res.code === 0) {
                    return {
                        "code": res.code,
                        "msg": res.msg,
                        "count": res.count,
&lt;?php
if($http_encrypt){
print&lt;&lt;&lt;END
                        "data": JSON.parse(ssk_decrypt(res.data,res.time))      //前端解密 后端返回的 加密数据res.data，需要密文和时间戳两个参数
END;
}else{
print&lt;&lt;&lt;END
                        "data": res.data     //服务器返回明文数据
END;
}
?&gt;

                    };
                }

</pre>


                        </div>
                    </div>
                </div>
<!---- >
<!---- >
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header" id="">header</div>
                        <div class="layui-card-body">
                            <blockquote class="layui-elem-quote" style="margin-top:10px;">
                                <span style="font-weight: bold; font-size: 15px;"></span>
                            </blockquote>
<pre class="layui-code code-demo" lay-options="{theme: 'dark'}" style="margin-top:10px;">
</pre>
                        </div>
                    </div>
                </div>
<!---->
<!---->
                
            </div>
        </div>
    </body>
    <script>
        // Usage
        layui.use(function(){
            //var layer = layui.layer;
            // Welcome
            //layer.msg('Hello World', {icon: 6});

            layui.code({
                elem: '.code-demo'
            });
        });
    </script>
</html>