console.log("传输过程已加密");
var pubencrypt = new JSEncrypt();
var RSApubkey,key,iv="";
var aesgentime=0;
var aesrefreshtime=5;//AES秘钥更新时间：5秒

function gen_aes_key(){
    aesgentime=Date.parse(new Date());
    localStorage.setItem('aesgentime', aesgentime);
    var newkey=randomString(32,32);//16、24、32位，AES-128-CBC=16、AES-192-CBC=24、AES-256-CBC=32，需同时修改config.php中的加密算法
    var newiv=randomString(16,16);//IV只能16位

    $.ajax({
        url: 'key.php',
        type: 'post',
        async:false,//将获取到的RSApubkey变为全局变量
        data: "method=getrsapubkey",
        success: function(data) {
            if(data.code===0){
                RSApubkey=CryptoJS.enc.Base64.parse(data.data).toString(CryptoJS.enc.Utf8);
                pubencrypt.setPublicKey(RSApubkey);
                var jsonString = '{"key":"'+newkey+'","iv":"'+newiv+'","gentime":"'+aesgentime+'"}';
                var encryptjsondata = pubencrypt.encrypt(jsonString);

                $.ajax({
                    url: 'key.php',
                    type: 'post',
                    async:false,//将获取到的RSApubkey变为全局变量
                    data: "method=sendaeskey&data="+encodeURIComponent(encryptjsondata),
                    success: function(data) {
                        if(data.code===0){
                            iv=newiv;
                            key=newkey;
                        }else{
                            alert(data.msg+", code:"+data.code);
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
            }else{
                $(".login").html("<p style='font-size: 26px;color: red;font-weight: bold;'>"+data.msg+"</p><p style='font-size: 26px;color: red;font-weight: bold;margin-top: 20px;'>code:"+data.code+"</p>");
                localStorage.setItem('aesgentime', "0");//使aesgentime过期，一直重新执行gen_aes_key()，不然过期时间内刷新就不报错直接显示登录框了
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

key=localStorage.getItem('aeskey');
iv=localStorage.getItem('aesiv');
aesgentime=localStorage.getItem('aesgentime');

if(key==="" || iv==="" || Date.parse(new Date())-aesgentime>aesrefreshtime*1000){
    gen_aes_key();
    localStorage.setItem('aeskey', key);
    localStorage.setItem('aesiv', iv);
    localStorage.setItem(aesgentime+'aeskey', key);
    localStorage.setItem(aesgentime+'aesiv', iv);
}else{
//
}

function randomString(upper,lower) {
    upper = upper || 32;
    lower = lower || 32;
    len = Math.floor(Math.random() * (upper - lower+1)) + lower;
    var $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
    var maxPos = $chars.length;
    var pwd = '';
    for (i = 0; i < len; i++) {
        pwd += $chars.charAt(Math.floor(Math.random() * maxPos));
    }
    return pwd;
}

function ssk_encrypt(data){
    data=CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse(data));
    var key=localStorage.getItem('aeskey');
    var iv=localStorage.getItem('aesiv');
    key = CryptoJS.enc.Utf8.parse(key);
    iv = CryptoJS.enc.Utf8.parse(iv);
    var encryptData = CryptoJS.AES.encrypt(data, key, {
        mode: CryptoJS.mode.CBC,
        iv: iv,
        padding: CryptoJS.pad.ZeroPadding
    });
    return window.encodeURIComponent(encryptData.toString());
}

function ssk_decrypt(data,time){
    //console.log("原加密数据:"+data);
    var re=/([A-Za-z0-9+/]{4})*([A-Za-z0-9+/]{2}==|[A-Za-z0-9+/]{3}=)?/gm;
    var de_data="";
    var key=localStorage.getItem(time+'aeskey');
    var iv=localStorage.getItem(time+'aesiv');
    key=CryptoJS.enc.Utf8.parse(key);
    iv=CryptoJS.enc.Utf8.parse(iv);
    var decryptData = CryptoJS.AES.decrypt(data, key, {
        mode: CryptoJS.mode.CBC,
        iv: iv,
        padding: CryptoJS.pad.ZeroPadding
    });
    //console.log("解密数据："+CryptoJS.enc.Base64.parse(decryptData.toString(CryptoJS.enc.Utf8).match(re)[0]).toString(CryptoJS.enc.Utf8));
    de_data=CryptoJS.enc.Base64.parse(decryptData.toString(CryptoJS.enc.Utf8).match(re)[0]).toString(CryptoJS.enc.Utf8);
    return de_data;
}