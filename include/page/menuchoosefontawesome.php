<?php
print<<<END
<!DOCTYPE html>
<html class="x-admin-sm">
<head>
    <meta charset="utf-8"/>
    <title>IconFont</title>
    <link rel="stylesheet" href="./css/xadmin.css">

    <style type="text/css">

        *{margin: 0;padding: 0;list-style: none;}
            /*
            KISSY CSS Reset
            理念：1. reset 的目的不是清除浏览器的默认样式，这仅是部分工作。清除和重置是紧密不可分的。
            2. reset 的目的不是让默认样式在所有浏览器下一致，而是减少默认样式有可能带来的问题。
            3. reset 期望提供一套普适通用的基础样式。但没有银弹，推荐根据具体需求，裁剪和修改后再使用。
            特色：1. 适应中文；2. 基于最新主流浏览器。
            维护：玉伯<lifesinger@gmail.com>, 正淳<ragecarrier@gmail.com>
             */

            /** 清除内外边距 **/
            body, h1, h2, h3, h4, h5, h6, hr, p, blockquote, /* structural elements 结构元素 */
            dl, dt, dd, ul, ol, li, /* list elements 列表元素 */
            pre, /* text formatting elements 文本格式元素 */
            form, fieldset, legend, button, input, textarea, /* form elements 表单元素 */
            th, td /* table elements 表格元素 */ {
              margin: 0;
              padding: 0;
            }

            /** 设置默认字体 **/
            body,
            button, input, select, textarea /* for ie */ {
              font: 12px/1.5 tahoma, arial, \5b8b\4f53, sans-serif;
            }
            h1, h2, h3, h4, h5, h6 { font-size: 100%; }
            address, cite, dfn, em, var { font-style: normal; } /* 将斜体扶正 */
            code, kbd, pre, samp { font-family: courier new, courier, monospace; } /* 统一等宽字体 */
            small { font-size: 12px; } /* 小于 12px 的中文很难阅读，让 small 正常化 */

            /** 重置列表元素 **/
            ul, ol { list-style: none; }

            /** 重置文本格式元素 **/
            a { text-decoration: none; }
            a:hover { text-decoration: underline; }


            /** 重置表单元素 **/
            legend { color: #000; } /* for ie6 */
            fieldset, img { border: 0; } /* img 搭车：让链接里的 img 无边框 */
            button, input, select, textarea { font-size: 100%; } /* 使得表单元素在 ie 下能继承字体大小 */
            /* 注：optgroup 无法扶正 */

            /** 重置表格元素 **/
            table { border-collapse: collapse; border-spacing: 0; }

            /* 清除浮动 */
            .ks-clear:after, .clear:after {
              content: '\20';
              display: block;
              height: 0;
              clear: both;
            }
            .ks-clear, .clear {
              *zoom: 1;
            }

            .main {
              padding: 10px 10px;
                margin: 0 auto;
            }
            .main h1{font-size:36px; color:#333; text-align:left;margin-bottom:30px; border-bottom: 1px solid #eee;}

            .helps{margin-top:40px;}
            .helps pre{
              padding:20px;
              margin:10px 0;
              border:solid 1px #e7e1cd;
              background-color: #fffdef;
              overflow: auto;
            }

            .icon_lists{
              width: 100% !important;

            }

            .icon_lists li{
              float:left;
              width: 110px;
              height:110px;
              text-align: center;
              list-style: none !important;
            }
            .icon_lists .icon{
              font-size: 42px;
              line-height: 100px;
              margin: 10px 0;
              color:#333;
              -webkit-transition: font-size 0.25s ease-out 0s;
              -moz-transition: font-size 0.25s ease-out 0s;
              transition: font-size 0.25s ease-out 0s;

            }
            .icon_lists .icon:hover{
              font-size: 100px;
            }



            .markdown {
              color: #666;
              font-size: 14px;
              line-height: 1.8;
            }

            .highlight {
              line-height: 1.5;
            }

            .markdown img {
              vertical-align: middle;
              max-width: 100%;
            }

            .markdown h1 {
              color: #404040;
              font-weight: 500;
              line-height: 40px;
              margin-bottom: 24px;
            }

            .markdown h2,
            .markdown h3,
            .markdown h4,
            .markdown h5,
            .markdown h6 {
              color: #404040;
              margin: 1.6em 0 0.6em 0;
              font-weight: 500;
              clear: both;
            }

            .markdown h1 {
              font-size: 28px;
            }

            .markdown h2 {
              font-size: 22px;
            }

            .markdown h3 {
              font-size: 16px;
            }

            .markdown h4 {
              font-size: 14px;
            }

            .markdown h5 {
              font-size: 12px;
            }

            .markdown h6 {
              font-size: 12px;
            }

            .markdown hr {
              height: 1px;
              border: 0;
              background: #e9e9e9;
              margin: 16px 0;
              clear: both;
            }

            .markdown p,
            .markdown pre {
              margin: 1em 0;
            }

            .markdown > p,
            .markdown > blockquote,
            .markdown > .highlight,
            .markdown > ol,
            .markdown > ul {
              width: 80%;
            }

            .markdown ul > li {
              list-style: circle;
            }

            .markdown > ul li,
            .markdown blockquote ul > li {
              margin-left: 20px;
              padding-left: 4px;
            }

            .markdown > ul li p,
            .markdown > ol li p {
              margin: 0.6em 0;
            }

            .markdown ol > li {
              list-style: decimal;
            }

            .markdown > ol li,
            .markdown blockquote ol > li {
              margin-left: 20px;
              padding-left: 4px;
            }

            .markdown code {
              margin: 0 3px;
              padding: 0 5px;
              background: #eee;
              border-radius: 3px;
            }

            .markdown pre {
              border-radius: 6px;
              background: #f7f7f7;
              padding: 20px;
            }

            .markdown pre code {
              border: none;
              background: #f7f7f7;
              margin: 0;
            }

            .markdown strong,
            .markdown b {
              font-weight: 600;
            }

            .markdown > table {
              border-collapse: collapse;
              border-spacing: 0px;
              empty-cells: show;
              border: 1px solid #e9e9e9;
              width: 95%;
              margin-bottom: 24px;
            }

            .markdown > table th {
              white-space: nowrap;
              color: #333;
              font-weight: 600;

            }

            .markdown > table th,
            .markdown > table td {
              border: 1px solid #e9e9e9;
              padding: 8px 16px;
              text-align: left;
            }

            .markdown > table th {
              background: #F7F7F7;
            }

            .markdown blockquote {
              font-size: 90%;
              color: #999;
              border-left: 4px solid #e9e9e9;
              padding-left: 0.8em;
              margin: 1em 0;
              font-style: italic;
            }

            .markdown blockquote p {
              margin: 0;
            }

            .markdown .anchor {
              opacity: 0;
              transition: opacity 0.3s ease;
              margin-left: 8px;
            }

            .markdown .waiting {
              color: #ccc;
            }

            .markdown h1:hover .anchor,
            .markdown h2:hover .anchor,
            .markdown h3:hover .anchor,
            .markdown h4:hover .anchor,
            .markdown h5:hover .anchor,
            .markdown h6:hover .anchor {
              opacity: 1;
              display: inline-block;
            }

            .markdown > br,
            .markdown > p > br {
              clear: both;
            }


            .hljs {
              display: block;
              background: white;
              padding: 0.5em;
              color: #333333;
              overflow-x: auto;
            }

            .hljs-comment,
            .hljs-meta {
              color: #969896;
            }

            .hljs-string,
            .hljs-variable,
            .hljs-template-variable,
            .hljs-strong,
            .hljs-emphasis,
            .hljs-quote {
              color: #df5000;
            }

            .hljs-keyword,
            .hljs-selector-tag,
            .hljs-type {
              color: #a71d5d;
            }

            .hljs-literal,
            .hljs-symbol,
            .hljs-bullet,
            .hljs-attribute {
              color: #0086b3;
            }

            .hljs-section,
            .hljs-name {
              color: #63a35c;
            }

            .hljs-tag {
              color: #333333;
            }

            .hljs-title,
            .hljs-attr,
            .hljs-selector-id,
            .hljs-selector-class,
            .hljs-selector-attr,
            .hljs-selector-pseudo {
              color: #795da3;
            }

            .hljs-addition {
              color: #55a532;
              background-color: #eaffea;
            }

            .hljs-deletion {
              color: #bd2c00;
              background-color: #ffecec;
            }

            .hljs-link {
              text-decoration: underline;
            }

            pre{
              background: #fff;
            }

            /*
            li > div{
                border-width: 1px;
                border-style: solid;
                border-color: #000;
            }
            
            */
            .icon_lists > li > div > .code{
                font-size: 10px;
            }

            .icon_lists > li {
                cursor: pointer;
            }


        .iconfont {
          font-family:"iconfont" !important;
          font-size:16px;
          font-style:normal;
          -webkit-font-smoothing: antialiased;
          -webkit-text-stroke-width: 0.2px;
          -moz-osx-font-smoothing: grayscale;
        }

    </style>
</head>
<body>
    <div class="main markdown">
        <h2>特效使用方法：<a href="https://docs.fontawesome.com/web/style/styling" target="_blank">https://docs.fontawesome.com/web/style/styling</a></h2>
        <a href="#brands">brands</a>
        <a href="#regular">regular</a>
        <a href="#solid">solid</a>

        <h2><a href="#brands" id="brands">brands</a></h2>
        <ul class="icon_lists clear">
            <li><div>
                <i class="fa-brands fa-42-group fa-5x"></i>
                <div class="code">fa-brands fa-42-group</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-500px fa-5x"></i>
                <div class="code">fa-brands fa-500px</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-accessible-icon fa-5x"></i>
                <div class="code">fa-brands fa-accessible-icon</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-accusoft fa-5x"></i>
                <div class="code">fa-brands fa-accusoft</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-adn fa-5x"></i>
                <div class="code">fa-brands fa-adn</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-adversal fa-5x"></i>
                <div class="code">fa-brands fa-adversal</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-affiliatetheme fa-5x"></i>
                <div class="code">fa-brands fa-affiliatetheme</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-airbnb fa-5x"></i>
                <div class="code">fa-brands fa-airbnb</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-algolia fa-5x"></i>
                <div class="code">fa-brands fa-algolia</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-alipay fa-5x"></i>
                <div class="code">fa-brands fa-alipay</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-amazon fa-5x"></i>
                <div class="code">fa-brands fa-amazon</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-amazon-pay fa-5x"></i>
                <div class="code">fa-brands fa-amazon-pay</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-amilia fa-5x"></i>
                <div class="code">fa-brands fa-amilia</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-android fa-5x"></i>
                <div class="code">fa-brands fa-android</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-angellist fa-5x"></i>
                <div class="code">fa-brands fa-angellist</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-angrycreative fa-5x"></i>
                <div class="code">fa-brands fa-angrycreative</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-angular fa-5x"></i>
                <div class="code">fa-brands fa-angular</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-apper fa-5x"></i>
                <div class="code">fa-brands fa-apper</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-apple fa-5x"></i>
                <div class="code">fa-brands fa-apple</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-apple-pay fa-5x"></i>
                <div class="code">fa-brands fa-apple-pay</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-app-store fa-5x"></i>
                <div class="code">fa-brands fa-app-store</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-app-store-ios fa-5x"></i>
                <div class="code">fa-brands fa-app-store-ios</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-artstation fa-5x"></i>
                <div class="code">fa-brands fa-artstation</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-asymmetrik fa-5x"></i>
                <div class="code">fa-brands fa-asymmetrik</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-atlassian fa-5x"></i>
                <div class="code">fa-brands fa-atlassian</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-audible fa-5x"></i>
                <div class="code">fa-brands fa-audible</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-autoprefixer fa-5x"></i>
                <div class="code">fa-brands fa-autoprefixer</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-avianex fa-5x"></i>
                <div class="code">fa-brands fa-avianex</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-aviato fa-5x"></i>
                <div class="code">fa-brands fa-aviato</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-aws fa-5x"></i>
                <div class="code">fa-brands fa-aws</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-bandcamp fa-5x"></i>
                <div class="code">fa-brands fa-bandcamp</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-battle-net fa-5x"></i>
                <div class="code">fa-brands fa-battle-net</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-behance fa-5x"></i>
                <div class="code">fa-brands fa-behance</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-bilibili fa-5x"></i>
                <div class="code">fa-brands fa-bilibili</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-bimobject fa-5x"></i>
                <div class="code">fa-brands fa-bimobject</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-bitbucket fa-5x"></i>
                <div class="code">fa-brands fa-bitbucket</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-bitcoin fa-5x"></i>
                <div class="code">fa-brands fa-bitcoin</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-bity fa-5x"></i>
                <div class="code">fa-brands fa-bity</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-blackberry fa-5x"></i>
                <div class="code">fa-brands fa-blackberry</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-black-tie fa-5x"></i>
                <div class="code">fa-brands fa-black-tie</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-blogger fa-5x"></i>
                <div class="code">fa-brands fa-blogger</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-blogger-b fa-5x"></i>
                <div class="code">fa-brands fa-blogger-b</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-bluetooth fa-5x"></i>
                <div class="code">fa-brands fa-bluetooth</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-bluetooth-b fa-5x"></i>
                <div class="code">fa-brands fa-bluetooth-b</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-bootstrap fa-5x"></i>
                <div class="code">fa-brands fa-bootstrap</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-bots fa-5x"></i>
                <div class="code">fa-brands fa-bots</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-btc fa-5x"></i>
                <div class="code">fa-brands fa-btc</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-buffer fa-5x"></i>
                <div class="code">fa-brands fa-buffer</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-buromobelexperte fa-5x"></i>
                <div class="code">fa-brands fa-buromobelexperte</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-buy-n-large fa-5x"></i>
                <div class="code">fa-brands fa-buy-n-large</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-buysellads fa-5x"></i>
                <div class="code">fa-brands fa-buysellads</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-canadian-maple-leaf fa-5x"></i>
                <div class="code">fa-brands fa-canadian-maple-leaf</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-cc-amazon-pay fa-5x"></i>
                <div class="code">fa-brands fa-cc-amazon-pay</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-cc-amex fa-5x"></i>
                <div class="code">fa-brands fa-cc-amex</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-cc-apple-pay fa-5x"></i>
                <div class="code">fa-brands fa-cc-apple-pay</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-cc-diners-club fa-5x"></i>
                <div class="code">fa-brands fa-cc-diners-club</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-cc-discover fa-5x"></i>
                <div class="code">fa-brands fa-cc-discover</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-cc-jcb fa-5x"></i>
                <div class="code">fa-brands fa-cc-jcb</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-cc-mastercard fa-5x"></i>
                <div class="code">fa-brands fa-cc-mastercard</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-cc-paypal fa-5x"></i>
                <div class="code">fa-brands fa-cc-paypal</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-cc-stripe fa-5x"></i>
                <div class="code">fa-brands fa-cc-stripe</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-cc-visa fa-5x"></i>
                <div class="code">fa-brands fa-cc-visa</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-centercode fa-5x"></i>
                <div class="code">fa-brands fa-centercode</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-centos fa-5x"></i>
                <div class="code">fa-brands fa-centos</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-chrome fa-5x"></i>
                <div class="code">fa-brands fa-chrome</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-chromecast fa-5x"></i>
                <div class="code">fa-brands fa-chromecast</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-cloudflare fa-5x"></i>
                <div class="code">fa-brands fa-cloudflare</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-cloudscale fa-5x"></i>
                <div class="code">fa-brands fa-cloudscale</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-cloudsmith fa-5x"></i>
                <div class="code">fa-brands fa-cloudsmith</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-cloudversify fa-5x"></i>
                <div class="code">fa-brands fa-cloudversify</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-cmplid fa-5x"></i>
                <div class="code">fa-brands fa-cmplid</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-codepen fa-5x"></i>
                <div class="code">fa-brands fa-codepen</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-codiepie fa-5x"></i>
                <div class="code">fa-brands fa-codiepie</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-confluence fa-5x"></i>
                <div class="code">fa-brands fa-confluence</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-connectdevelop fa-5x"></i>
                <div class="code">fa-brands fa-connectdevelop</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-contao fa-5x"></i>
                <div class="code">fa-brands fa-contao</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-cotton-bureau fa-5x"></i>
                <div class="code">fa-brands fa-cotton-bureau</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-cpanel fa-5x"></i>
                <div class="code">fa-brands fa-cpanel</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-creative-commons fa-5x"></i>
                <div class="code">fa-brands fa-creative-commons</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-creative-commons-by fa-5x"></i>
                <div class="code">fa-brands fa-creative-commons-by</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-creative-commons-nc fa-5x"></i>
                <div class="code">fa-brands fa-creative-commons-nc</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-creative-commons-nc-eu fa-5x"></i>
                <div class="code">fa-brands fa-creative-commons-nc-eu</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-creative-commons-nc-jp fa-5x"></i>
                <div class="code">fa-brands fa-creative-commons-nc-jp</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-creative-commons-nd fa-5x"></i>
                <div class="code">fa-brands fa-creative-commons-nd</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-creative-commons-pd fa-5x"></i>
                <div class="code">fa-brands fa-creative-commons-pd</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-creative-commons-pd-alt fa-5x"></i>
                <div class="code">fa-brands fa-creative-commons-pd-alt</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-creative-commons-remix fa-5x"></i>
                <div class="code">fa-brands fa-creative-commons-remix</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-creative-commons-sa fa-5x"></i>
                <div class="code">fa-brands fa-creative-commons-sa</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-creative-commons-sampling fa-5x"></i>
                <div class="code">fa-brands fa-creative-commons-sampling</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-creative-commons-sampling-plus fa-5x"></i>
                <div class="code">fa-brands fa-creative-commons-sampling-plus</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-creative-commons-share fa-5x"></i>
                <div class="code">fa-brands fa-creative-commons-share</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-creative-commons-zero fa-5x"></i>
                <div class="code">fa-brands fa-creative-commons-zero</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-critical-role fa-5x"></i>
                <div class="code">fa-brands fa-critical-role</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-css3 fa-5x"></i>
                <div class="code">fa-brands fa-css3</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-css3-alt fa-5x"></i>
                <div class="code">fa-brands fa-css3-alt</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-cuttlefish fa-5x"></i>
                <div class="code">fa-brands fa-cuttlefish</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-dailymotion fa-5x"></i>
                <div class="code">fa-brands fa-dailymotion</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-d-and-d fa-5x"></i>
                <div class="code">fa-brands fa-d-and-d</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-d-and-d-beyond fa-5x"></i>
                <div class="code">fa-brands fa-d-and-d-beyond</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-dashcube fa-5x"></i>
                <div class="code">fa-brands fa-dashcube</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-debian fa-5x"></i>
                <div class="code">fa-brands fa-debian</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-deezer fa-5x"></i>
                <div class="code">fa-brands fa-deezer</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-delicious fa-5x"></i>
                <div class="code">fa-brands fa-delicious</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-deploydog fa-5x"></i>
                <div class="code">fa-brands fa-deploydog</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-deskpro fa-5x"></i>
                <div class="code">fa-brands fa-deskpro</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-dev fa-5x"></i>
                <div class="code">fa-brands fa-dev</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-deviantart fa-5x"></i>
                <div class="code">fa-brands fa-deviantart</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-dhl fa-5x"></i>
                <div class="code">fa-brands fa-dhl</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-diaspora fa-5x"></i>
                <div class="code">fa-brands fa-diaspora</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-digg fa-5x"></i>
                <div class="code">fa-brands fa-digg</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-digital-ocean fa-5x"></i>
                <div class="code">fa-brands fa-digital-ocean</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-discord fa-5x"></i>
                <div class="code">fa-brands fa-discord</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-discourse fa-5x"></i>
                <div class="code">fa-brands fa-discourse</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-dochub fa-5x"></i>
                <div class="code">fa-brands fa-dochub</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-docker fa-5x"></i>
                <div class="code">fa-brands fa-docker</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-draft2digital fa-5x"></i>
                <div class="code">fa-brands fa-draft2digital</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-dribbble fa-5x"></i>
                <div class="code">fa-brands fa-dribbble</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-dropbox fa-5x"></i>
                <div class="code">fa-brands fa-dropbox</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-drupal fa-5x"></i>
                <div class="code">fa-brands fa-drupal</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-dyalog fa-5x"></i>
                <div class="code">fa-brands fa-dyalog</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-earlybirds fa-5x"></i>
                <div class="code">fa-brands fa-earlybirds</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-ebay fa-5x"></i>
                <div class="code">fa-brands fa-ebay</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-edge fa-5x"></i>
                <div class="code">fa-brands fa-edge</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-edge-legacy fa-5x"></i>
                <div class="code">fa-brands fa-edge-legacy</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-elementor fa-5x"></i>
                <div class="code">fa-brands fa-elementor</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-ello fa-5x"></i>
                <div class="code">fa-brands fa-ello</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-ember fa-5x"></i>
                <div class="code">fa-brands fa-ember</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-empire fa-5x"></i>
                <div class="code">fa-brands fa-empire</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-envira fa-5x"></i>
                <div class="code">fa-brands fa-envira</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-erlang fa-5x"></i>
                <div class="code">fa-brands fa-erlang</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-ethereum fa-5x"></i>
                <div class="code">fa-brands fa-ethereum</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-etsy fa-5x"></i>
                <div class="code">fa-brands fa-etsy</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-evernote fa-5x"></i>
                <div class="code">fa-brands fa-evernote</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-expeditedssl fa-5x"></i>
                <div class="code">fa-brands fa-expeditedssl</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-facebook fa-5x"></i>
                <div class="code">fa-brands fa-facebook</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-facebook-f fa-5x"></i>
                <div class="code">fa-brands fa-facebook-f</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-facebook-messenger fa-5x"></i>
                <div class="code">fa-brands fa-facebook-messenger</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-fantasy-flight-games fa-5x"></i>
                <div class="code">fa-brands fa-fantasy-flight-games</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-fedex fa-5x"></i>
                <div class="code">fa-brands fa-fedex</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-fedora fa-5x"></i>
                <div class="code">fa-brands fa-fedora</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-figma fa-5x"></i>
                <div class="code">fa-brands fa-figma</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-firefox fa-5x"></i>
                <div class="code">fa-brands fa-firefox</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-firefox-browser fa-5x"></i>
                <div class="code">fa-brands fa-firefox-browser</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-firstdraft fa-5x"></i>
                <div class="code">fa-brands fa-firstdraft</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-first-order fa-5x"></i>
                <div class="code">fa-brands fa-first-order</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-first-order-alt fa-5x"></i>
                <div class="code">fa-brands fa-first-order-alt</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-flickr fa-5x"></i>
                <div class="code">fa-brands fa-flickr</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-flipboard fa-5x"></i>
                <div class="code">fa-brands fa-flipboard</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-fly fa-5x"></i>
                <div class="code">fa-brands fa-fly</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-font-awesome fa-5x"></i>
                <div class="code">fa-brands fa-font-awesome</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-fonticons fa-5x"></i>
                <div class="code">fa-brands fa-fonticons</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-fonticons-fi fa-5x"></i>
                <div class="code">fa-brands fa-fonticons-fi</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-fort-awesome fa-5x"></i>
                <div class="code">fa-brands fa-fort-awesome</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-fort-awesome-alt fa-5x"></i>
                <div class="code">fa-brands fa-fort-awesome-alt</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-forumbee fa-5x"></i>
                <div class="code">fa-brands fa-forumbee</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-foursquare fa-5x"></i>
                <div class="code">fa-brands fa-foursquare</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-freebsd fa-5x"></i>
                <div class="code">fa-brands fa-freebsd</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-free-code-camp fa-5x"></i>
                <div class="code">fa-brands fa-free-code-camp</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-fulcrum fa-5x"></i>
                <div class="code">fa-brands fa-fulcrum</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-galactic-republic fa-5x"></i>
                <div class="code">fa-brands fa-galactic-republic</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-galactic-senate fa-5x"></i>
                <div class="code">fa-brands fa-galactic-senate</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-get-pocket fa-5x"></i>
                <div class="code">fa-brands fa-get-pocket</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-gg fa-5x"></i>
                <div class="code">fa-brands fa-gg</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-gg-circle fa-5x"></i>
                <div class="code">fa-brands fa-gg-circle</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-git fa-5x"></i>
                <div class="code">fa-brands fa-git</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-git-alt fa-5x"></i>
                <div class="code">fa-brands fa-git-alt</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-github fa-5x"></i>
                <div class="code">fa-brands fa-github</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-github-alt fa-5x"></i>
                <div class="code">fa-brands fa-github-alt</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-gitkraken fa-5x"></i>
                <div class="code">fa-brands fa-gitkraken</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-gitlab fa-5x"></i>
                <div class="code">fa-brands fa-gitlab</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-gitter fa-5x"></i>
                <div class="code">fa-brands fa-gitter</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-glide fa-5x"></i>
                <div class="code">fa-brands fa-glide</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-glide-g fa-5x"></i>
                <div class="code">fa-brands fa-glide-g</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-gofore fa-5x"></i>
                <div class="code">fa-brands fa-gofore</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-golang fa-5x"></i>
                <div class="code">fa-brands fa-golang</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-goodreads fa-5x"></i>
                <div class="code">fa-brands fa-goodreads</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-goodreads-g fa-5x"></i>
                <div class="code">fa-brands fa-goodreads-g</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-google fa-5x"></i>
                <div class="code">fa-brands fa-google</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-google-drive fa-5x"></i>
                <div class="code">fa-brands fa-google-drive</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-google-pay fa-5x"></i>
                <div class="code">fa-brands fa-google-pay</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-google-play fa-5x"></i>
                <div class="code">fa-brands fa-google-play</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-google-plus fa-5x"></i>
                <div class="code">fa-brands fa-google-plus</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-google-plus-g fa-5x"></i>
                <div class="code">fa-brands fa-google-plus-g</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-google-wallet fa-5x"></i>
                <div class="code">fa-brands fa-google-wallet</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-gratipay fa-5x"></i>
                <div class="code">fa-brands fa-gratipay</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-grav fa-5x"></i>
                <div class="code">fa-brands fa-grav</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-gripfire fa-5x"></i>
                <div class="code">fa-brands fa-gripfire</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-grunt fa-5x"></i>
                <div class="code">fa-brands fa-grunt</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-guilded fa-5x"></i>
                <div class="code">fa-brands fa-guilded</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-gulp fa-5x"></i>
                <div class="code">fa-brands fa-gulp</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-hacker-news fa-5x"></i>
                <div class="code">fa-brands fa-hacker-news</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-hackerrank fa-5x"></i>
                <div class="code">fa-brands fa-hackerrank</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-hashnode fa-5x"></i>
                <div class="code">fa-brands fa-hashnode</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-hips fa-5x"></i>
                <div class="code">fa-brands fa-hips</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-hire-a-helper fa-5x"></i>
                <div class="code">fa-brands fa-hire-a-helper</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-hive fa-5x"></i>
                <div class="code">fa-brands fa-hive</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-hooli fa-5x"></i>
                <div class="code">fa-brands fa-hooli</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-hornbill fa-5x"></i>
                <div class="code">fa-brands fa-hornbill</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-hotjar fa-5x"></i>
                <div class="code">fa-brands fa-hotjar</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-houzz fa-5x"></i>
                <div class="code">fa-brands fa-houzz</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-html5 fa-5x"></i>
                <div class="code">fa-brands fa-html5</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-hubspot fa-5x"></i>
                <div class="code">fa-brands fa-hubspot</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-ideal fa-5x"></i>
                <div class="code">fa-brands fa-ideal</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-imdb fa-5x"></i>
                <div class="code">fa-brands fa-imdb</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-instagram fa-5x"></i>
                <div class="code">fa-brands fa-instagram</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-instalod fa-5x"></i>
                <div class="code">fa-brands fa-instalod</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-intercom fa-5x"></i>
                <div class="code">fa-brands fa-intercom</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-internet-explorer fa-5x"></i>
                <div class="code">fa-brands fa-internet-explorer</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-invision fa-5x"></i>
                <div class="code">fa-brands fa-invision</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-ioxhost fa-5x"></i>
                <div class="code">fa-brands fa-ioxhost</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-itch-io fa-5x"></i>
                <div class="code">fa-brands fa-itch-io</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-itunes fa-5x"></i>
                <div class="code">fa-brands fa-itunes</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-itunes-note fa-5x"></i>
                <div class="code">fa-brands fa-itunes-note</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-java fa-5x"></i>
                <div class="code">fa-brands fa-java</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-jedi-order fa-5x"></i>
                <div class="code">fa-brands fa-jedi-order</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-jenkins fa-5x"></i>
                <div class="code">fa-brands fa-jenkins</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-jira fa-5x"></i>
                <div class="code">fa-brands fa-jira</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-joget fa-5x"></i>
                <div class="code">fa-brands fa-joget</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-joomla fa-5x"></i>
                <div class="code">fa-brands fa-joomla</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-js fa-5x"></i>
                <div class="code">fa-brands fa-js</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-jsfiddle fa-5x"></i>
                <div class="code">fa-brands fa-jsfiddle</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-kaggle fa-5x"></i>
                <div class="code">fa-brands fa-kaggle</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-keybase fa-5x"></i>
                <div class="code">fa-brands fa-keybase</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-keycdn fa-5x"></i>
                <div class="code">fa-brands fa-keycdn</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-kickstarter fa-5x"></i>
                <div class="code">fa-brands fa-kickstarter</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-kickstarter-k fa-5x"></i>
                <div class="code">fa-brands fa-kickstarter-k</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-korvue fa-5x"></i>
                <div class="code">fa-brands fa-korvue</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-laravel fa-5x"></i>
                <div class="code">fa-brands fa-laravel</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-lastfm fa-5x"></i>
                <div class="code">fa-brands fa-lastfm</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-leanpub fa-5x"></i>
                <div class="code">fa-brands fa-leanpub</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-less fa-5x"></i>
                <div class="code">fa-brands fa-less</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-line fa-5x"></i>
                <div class="code">fa-brands fa-line</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-linkedin fa-5x"></i>
                <div class="code">fa-brands fa-linkedin</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-linkedin-in fa-5x"></i>
                <div class="code">fa-brands fa-linkedin-in</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-linode fa-5x"></i>
                <div class="code">fa-brands fa-linode</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-linux fa-5x"></i>
                <div class="code">fa-brands fa-linux</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-lyft fa-5x"></i>
                <div class="code">fa-brands fa-lyft</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-magento fa-5x"></i>
                <div class="code">fa-brands fa-magento</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-mailchimp fa-5x"></i>
                <div class="code">fa-brands fa-mailchimp</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-mandalorian fa-5x"></i>
                <div class="code">fa-brands fa-mandalorian</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-markdown fa-5x"></i>
                <div class="code">fa-brands fa-markdown</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-mastodon fa-5x"></i>
                <div class="code">fa-brands fa-mastodon</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-maxcdn fa-5x"></i>
                <div class="code">fa-brands fa-maxcdn</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-mdb fa-5x"></i>
                <div class="code">fa-brands fa-mdb</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-medapps fa-5x"></i>
                <div class="code">fa-brands fa-medapps</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-medium fa-5x"></i>
                <div class="code">fa-brands fa-medium</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-medrt fa-5x"></i>
                <div class="code">fa-brands fa-medrt</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-meetup fa-5x"></i>
                <div class="code">fa-brands fa-meetup</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-megaport fa-5x"></i>
                <div class="code">fa-brands fa-megaport</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-mendeley fa-5x"></i>
                <div class="code">fa-brands fa-mendeley</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-meta fa-5x"></i>
                <div class="code">fa-brands fa-meta</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-microblog fa-5x"></i>
                <div class="code">fa-brands fa-microblog</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-microsoft fa-5x"></i>
                <div class="code">fa-brands fa-microsoft</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-mix fa-5x"></i>
                <div class="code">fa-brands fa-mix</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-mixcloud fa-5x"></i>
                <div class="code">fa-brands fa-mixcloud</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-mixer fa-5x"></i>
                <div class="code">fa-brands fa-mixer</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-mizuni fa-5x"></i>
                <div class="code">fa-brands fa-mizuni</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-modx fa-5x"></i>
                <div class="code">fa-brands fa-modx</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-monero fa-5x"></i>
                <div class="code">fa-brands fa-monero</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-napster fa-5x"></i>
                <div class="code">fa-brands fa-napster</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-neos fa-5x"></i>
                <div class="code">fa-brands fa-neos</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-nfc-directional fa-5x"></i>
                <div class="code">fa-brands fa-nfc-directional</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-nfc-symbol fa-5x"></i>
                <div class="code">fa-brands fa-nfc-symbol</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-nimblr fa-5x"></i>
                <div class="code">fa-brands fa-nimblr</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-node fa-5x"></i>
                <div class="code">fa-brands fa-node</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-node-js fa-5x"></i>
                <div class="code">fa-brands fa-node-js</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-npm fa-5x"></i>
                <div class="code">fa-brands fa-npm</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-ns8 fa-5x"></i>
                <div class="code">fa-brands fa-ns8</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-nutritionix fa-5x"></i>
                <div class="code">fa-brands fa-nutritionix</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-octopus-deploy fa-5x"></i>
                <div class="code">fa-brands fa-octopus-deploy</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-odnoklassniki fa-5x"></i>
                <div class="code">fa-brands fa-odnoklassniki</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-odysee fa-5x"></i>
                <div class="code">fa-brands fa-odysee</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-old-republic fa-5x"></i>
                <div class="code">fa-brands fa-old-republic</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-opencart fa-5x"></i>
                <div class="code">fa-brands fa-opencart</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-openid fa-5x"></i>
                <div class="code">fa-brands fa-openid</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-opera fa-5x"></i>
                <div class="code">fa-brands fa-opera</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-optin-monster fa-5x"></i>
                <div class="code">fa-brands fa-optin-monster</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-orcid fa-5x"></i>
                <div class="code">fa-brands fa-orcid</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-osi fa-5x"></i>
                <div class="code">fa-brands fa-osi</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-padlet fa-5x"></i>
                <div class="code">fa-brands fa-padlet</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-page4 fa-5x"></i>
                <div class="code">fa-brands fa-page4</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-pagelines fa-5x"></i>
                <div class="code">fa-brands fa-pagelines</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-palfed fa-5x"></i>
                <div class="code">fa-brands fa-palfed</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-patreon fa-5x"></i>
                <div class="code">fa-brands fa-patreon</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-paypal fa-5x"></i>
                <div class="code">fa-brands fa-paypal</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-perbyte fa-5x"></i>
                <div class="code">fa-brands fa-perbyte</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-periscope fa-5x"></i>
                <div class="code">fa-brands fa-periscope</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-phabricator fa-5x"></i>
                <div class="code">fa-brands fa-phabricator</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-phoenix-framework fa-5x"></i>
                <div class="code">fa-brands fa-phoenix-framework</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-phoenix-squadron fa-5x"></i>
                <div class="code">fa-brands fa-phoenix-squadron</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-php fa-5x"></i>
                <div class="code">fa-brands fa-php</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-pied-piper fa-5x"></i>
                <div class="code">fa-brands fa-pied-piper</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-pied-piper-alt fa-5x"></i>
                <div class="code">fa-brands fa-pied-piper-alt</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-pied-piper-hat fa-5x"></i>
                <div class="code">fa-brands fa-pied-piper-hat</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-pied-piper-pp fa-5x"></i>
                <div class="code">fa-brands fa-pied-piper-pp</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-pinterest fa-5x"></i>
                <div class="code">fa-brands fa-pinterest</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-pinterest-p fa-5x"></i>
                <div class="code">fa-brands fa-pinterest-p</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-pix fa-5x"></i>
                <div class="code">fa-brands fa-pix</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-playstation fa-5x"></i>
                <div class="code">fa-brands fa-playstation</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-product-hunt fa-5x"></i>
                <div class="code">fa-brands fa-product-hunt</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-pushed fa-5x"></i>
                <div class="code">fa-brands fa-pushed</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-python fa-5x"></i>
                <div class="code">fa-brands fa-python</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-qq fa-5x"></i>
                <div class="code">fa-brands fa-qq</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-quinscape fa-5x"></i>
                <div class="code">fa-brands fa-quinscape</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-quora fa-5x"></i>
                <div class="code">fa-brands fa-quora</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-raspberry-pi fa-5x"></i>
                <div class="code">fa-brands fa-raspberry-pi</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-ravelry fa-5x"></i>
                <div class="code">fa-brands fa-ravelry</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-react fa-5x"></i>
                <div class="code">fa-brands fa-react</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-reacteurope fa-5x"></i>
                <div class="code">fa-brands fa-reacteurope</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-readme fa-5x"></i>
                <div class="code">fa-brands fa-readme</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-rebel fa-5x"></i>
                <div class="code">fa-brands fa-rebel</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-reddit fa-5x"></i>
                <div class="code">fa-brands fa-reddit</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-reddit-alien fa-5x"></i>
                <div class="code">fa-brands fa-reddit-alien</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-redhat fa-5x"></i>
                <div class="code">fa-brands fa-redhat</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-red-river fa-5x"></i>
                <div class="code">fa-brands fa-red-river</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-renren fa-5x"></i>
                <div class="code">fa-brands fa-renren</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-replyd fa-5x"></i>
                <div class="code">fa-brands fa-replyd</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-researchgate fa-5x"></i>
                <div class="code">fa-brands fa-researchgate</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-resolving fa-5x"></i>
                <div class="code">fa-brands fa-resolving</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-rev fa-5x"></i>
                <div class="code">fa-brands fa-rev</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-rocketchat fa-5x"></i>
                <div class="code">fa-brands fa-rocketchat</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-rockrms fa-5x"></i>
                <div class="code">fa-brands fa-rockrms</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-r-project fa-5x"></i>
                <div class="code">fa-brands fa-r-project</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-rust fa-5x"></i>
                <div class="code">fa-brands fa-rust</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-safari fa-5x"></i>
                <div class="code">fa-brands fa-safari</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-salesforce fa-5x"></i>
                <div class="code">fa-brands fa-salesforce</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-sass fa-5x"></i>
                <div class="code">fa-brands fa-sass</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-schlix fa-5x"></i>
                <div class="code">fa-brands fa-schlix</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-screenpal fa-5x"></i>
                <div class="code">fa-brands fa-screenpal</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-scribd fa-5x"></i>
                <div class="code">fa-brands fa-scribd</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-searchengin fa-5x"></i>
                <div class="code">fa-brands fa-searchengin</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-sellcast fa-5x"></i>
                <div class="code">fa-brands fa-sellcast</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-sellsy fa-5x"></i>
                <div class="code">fa-brands fa-sellsy</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-servicestack fa-5x"></i>
                <div class="code">fa-brands fa-servicestack</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-shirtsinbulk fa-5x"></i>
                <div class="code">fa-brands fa-shirtsinbulk</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-shopify fa-5x"></i>
                <div class="code">fa-brands fa-shopify</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-shopware fa-5x"></i>
                <div class="code">fa-brands fa-shopware</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-simplybuilt fa-5x"></i>
                <div class="code">fa-brands fa-simplybuilt</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-sistrix fa-5x"></i>
                <div class="code">fa-brands fa-sistrix</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-sith fa-5x"></i>
                <div class="code">fa-brands fa-sith</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-sitrox fa-5x"></i>
                <div class="code">fa-brands fa-sitrox</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-sketch fa-5x"></i>
                <div class="code">fa-brands fa-sketch</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-skyatlas fa-5x"></i>
                <div class="code">fa-brands fa-skyatlas</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-skype fa-5x"></i>
                <div class="code">fa-brands fa-skype</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-slack fa-5x"></i>
                <div class="code">fa-brands fa-slack</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-slideshare fa-5x"></i>
                <div class="code">fa-brands fa-slideshare</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-snapchat fa-5x"></i>
                <div class="code">fa-brands fa-snapchat</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-soundcloud fa-5x"></i>
                <div class="code">fa-brands fa-soundcloud</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-sourcetree fa-5x"></i>
                <div class="code">fa-brands fa-sourcetree</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-space-awesome fa-5x"></i>
                <div class="code">fa-brands fa-space-awesome</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-speakap fa-5x"></i>
                <div class="code">fa-brands fa-speakap</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-speaker-deck fa-5x"></i>
                <div class="code">fa-brands fa-speaker-deck</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-spotify fa-5x"></i>
                <div class="code">fa-brands fa-spotify</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-behance fa-5x"></i>
                <div class="code">fa-brands fa-square-behance</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-dribbble fa-5x"></i>
                <div class="code">fa-brands fa-square-dribbble</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-facebook fa-5x"></i>
                <div class="code">fa-brands fa-square-facebook</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-font-awesome fa-5x"></i>
                <div class="code">fa-brands fa-square-font-awesome</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-font-awesome-stroke fa-5x"></i>
                <div class="code">fa-brands fa-square-font-awesome-stroke</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-git fa-5x"></i>
                <div class="code">fa-brands fa-square-git</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-github fa-5x"></i>
                <div class="code">fa-brands fa-square-github</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-gitlab fa-5x"></i>
                <div class="code">fa-brands fa-square-gitlab</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-google-plus fa-5x"></i>
                <div class="code">fa-brands fa-square-google-plus</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-hacker-news fa-5x"></i>
                <div class="code">fa-brands fa-square-hacker-news</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-instagram fa-5x"></i>
                <div class="code">fa-brands fa-square-instagram</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-js fa-5x"></i>
                <div class="code">fa-brands fa-square-js</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-lastfm fa-5x"></i>
                <div class="code">fa-brands fa-square-lastfm</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-odnoklassniki fa-5x"></i>
                <div class="code">fa-brands fa-square-odnoklassniki</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-pied-piper fa-5x"></i>
                <div class="code">fa-brands fa-square-pied-piper</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-pinterest fa-5x"></i>
                <div class="code">fa-brands fa-square-pinterest</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-reddit fa-5x"></i>
                <div class="code">fa-brands fa-square-reddit</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-snapchat fa-5x"></i>
                <div class="code">fa-brands fa-square-snapchat</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-squarespace fa-5x"></i>
                <div class="code">fa-brands fa-squarespace</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-steam fa-5x"></i>
                <div class="code">fa-brands fa-square-steam</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-threads fa-5x"></i>
                <div class="code">fa-brands fa-square-threads</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-tumblr fa-5x"></i>
                <div class="code">fa-brands fa-square-tumblr</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-twitter fa-5x"></i>
                <div class="code">fa-brands fa-square-twitter</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-viadeo fa-5x"></i>
                <div class="code">fa-brands fa-square-viadeo</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-vimeo fa-5x"></i>
                <div class="code">fa-brands fa-square-vimeo</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-whatsapp fa-5x"></i>
                <div class="code">fa-brands fa-square-whatsapp</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-xing fa-5x"></i>
                <div class="code">fa-brands fa-square-xing</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-x-twitter fa-5x"></i>
                <div class="code">fa-brands fa-square-x-twitter</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-square-youtube fa-5x"></i>
                <div class="code">fa-brands fa-square-youtube</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-stack-exchange fa-5x"></i>
                <div class="code">fa-brands fa-stack-exchange</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-stack-overflow fa-5x"></i>
                <div class="code">fa-brands fa-stack-overflow</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-stackpath fa-5x"></i>
                <div class="code">fa-brands fa-stackpath</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-staylinked fa-5x"></i>
                <div class="code">fa-brands fa-staylinked</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-steam fa-5x"></i>
                <div class="code">fa-brands fa-steam</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-steam-symbol fa-5x"></i>
                <div class="code">fa-brands fa-steam-symbol</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-sticker-mule fa-5x"></i>
                <div class="code">fa-brands fa-sticker-mule</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-strava fa-5x"></i>
                <div class="code">fa-brands fa-strava</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-stripe fa-5x"></i>
                <div class="code">fa-brands fa-stripe</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-stripe-s fa-5x"></i>
                <div class="code">fa-brands fa-stripe-s</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-stubber fa-5x"></i>
                <div class="code">fa-brands fa-stubber</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-studiovinari fa-5x"></i>
                <div class="code">fa-brands fa-studiovinari</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-stumbleupon fa-5x"></i>
                <div class="code">fa-brands fa-stumbleupon</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-stumbleupon-circle fa-5x"></i>
                <div class="code">fa-brands fa-stumbleupon-circle</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-superpowers fa-5x"></i>
                <div class="code">fa-brands fa-superpowers</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-supple fa-5x"></i>
                <div class="code">fa-brands fa-supple</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-suse fa-5x"></i>
                <div class="code">fa-brands fa-suse</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-swift fa-5x"></i>
                <div class="code">fa-brands fa-swift</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-symfony fa-5x"></i>
                <div class="code">fa-brands fa-symfony</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-teamspeak fa-5x"></i>
                <div class="code">fa-brands fa-teamspeak</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-telegram fa-5x"></i>
                <div class="code">fa-brands fa-telegram</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-tencent-weibo fa-5x"></i>
                <div class="code">fa-brands fa-tencent-weibo</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-themeco fa-5x"></i>
                <div class="code">fa-brands fa-themeco</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-themeisle fa-5x"></i>
                <div class="code">fa-brands fa-themeisle</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-the-red-yeti fa-5x"></i>
                <div class="code">fa-brands fa-the-red-yeti</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-think-peaks fa-5x"></i>
                <div class="code">fa-brands fa-think-peaks</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-threads fa-5x"></i>
                <div class="code">fa-brands fa-threads</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-tiktok fa-5x"></i>
                <div class="code">fa-brands fa-tiktok</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-trade-federation fa-5x"></i>
                <div class="code">fa-brands fa-trade-federation</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-trello fa-5x"></i>
                <div class="code">fa-brands fa-trello</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-tumblr fa-5x"></i>
                <div class="code">fa-brands fa-tumblr</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-twitch fa-5x"></i>
                <div class="code">fa-brands fa-twitch</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-twitter fa-5x"></i>
                <div class="code">fa-brands fa-twitter</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-typo3 fa-5x"></i>
                <div class="code">fa-brands fa-typo3</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-uber fa-5x"></i>
                <div class="code">fa-brands fa-uber</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-ubuntu fa-5x"></i>
                <div class="code">fa-brands fa-ubuntu</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-uikit fa-5x"></i>
                <div class="code">fa-brands fa-uikit</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-umbraco fa-5x"></i>
                <div class="code">fa-brands fa-umbraco</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-uncharted fa-5x"></i>
                <div class="code">fa-brands fa-uncharted</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-uniregistry fa-5x"></i>
                <div class="code">fa-brands fa-uniregistry</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-unity fa-5x"></i>
                <div class="code">fa-brands fa-unity</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-unsplash fa-5x"></i>
                <div class="code">fa-brands fa-unsplash</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-untappd fa-5x"></i>
                <div class="code">fa-brands fa-untappd</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-ups fa-5x"></i>
                <div class="code">fa-brands fa-ups</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-usb fa-5x"></i>
                <div class="code">fa-brands fa-usb</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-usps fa-5x"></i>
                <div class="code">fa-brands fa-usps</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-ussunnah fa-5x"></i>
                <div class="code">fa-brands fa-ussunnah</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-vaadin fa-5x"></i>
                <div class="code">fa-brands fa-vaadin</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-viacoin fa-5x"></i>
                <div class="code">fa-brands fa-viacoin</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-viadeo fa-5x"></i>
                <div class="code">fa-brands fa-viadeo</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-viber fa-5x"></i>
                <div class="code">fa-brands fa-viber</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-vimeo fa-5x"></i>
                <div class="code">fa-brands fa-vimeo</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-vimeo-v fa-5x"></i>
                <div class="code">fa-brands fa-vimeo-v</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-vine fa-5x"></i>
                <div class="code">fa-brands fa-vine</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-vk fa-5x"></i>
                <div class="code">fa-brands fa-vk</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-vnv fa-5x"></i>
                <div class="code">fa-brands fa-vnv</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-vuejs fa-5x"></i>
                <div class="code">fa-brands fa-vuejs</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-watchman-monitoring fa-5x"></i>
                <div class="code">fa-brands fa-watchman-monitoring</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-waze fa-5x"></i>
                <div class="code">fa-brands fa-waze</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-weebly fa-5x"></i>
                <div class="code">fa-brands fa-weebly</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-weibo fa-5x"></i>
                <div class="code">fa-brands fa-weibo</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-weixin fa-5x"></i>
                <div class="code">fa-brands fa-weixin</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-whatsapp fa-5x"></i>
                <div class="code">fa-brands fa-whatsapp</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-whmcs fa-5x"></i>
                <div class="code">fa-brands fa-whmcs</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-wikipedia-w fa-5x"></i>
                <div class="code">fa-brands fa-wikipedia-w</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-windows fa-5x"></i>
                <div class="code">fa-brands fa-windows</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-wirsindhandwerk fa-5x"></i>
                <div class="code">fa-brands fa-wirsindhandwerk</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-wix fa-5x"></i>
                <div class="code">fa-brands fa-wix</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-wizards-of-the-coast fa-5x"></i>
                <div class="code">fa-brands fa-wizards-of-the-coast</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-wodu fa-5x"></i>
                <div class="code">fa-brands fa-wodu</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-wolf-pack-battalion fa-5x"></i>
                <div class="code">fa-brands fa-wolf-pack-battalion</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-wordpress fa-5x"></i>
                <div class="code">fa-brands fa-wordpress</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-wordpress-simple fa-5x"></i>
                <div class="code">fa-brands fa-wordpress-simple</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-wpbeginner fa-5x"></i>
                <div class="code">fa-brands fa-wpbeginner</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-wpexplorer fa-5x"></i>
                <div class="code">fa-brands fa-wpexplorer</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-wpforms fa-5x"></i>
                <div class="code">fa-brands fa-wpforms</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-wpressr fa-5x"></i>
                <div class="code">fa-brands fa-wpressr</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-xbox fa-5x"></i>
                <div class="code">fa-brands fa-xbox</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-xing fa-5x"></i>
                <div class="code">fa-brands fa-xing</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-x-twitter fa-5x"></i>
                <div class="code">fa-brands fa-x-twitter</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-yahoo fa-5x"></i>
                <div class="code">fa-brands fa-yahoo</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-yammer fa-5x"></i>
                <div class="code">fa-brands fa-yammer</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-yandex fa-5x"></i>
                <div class="code">fa-brands fa-yandex</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-yandex-international fa-5x"></i>
                <div class="code">fa-brands fa-yandex-international</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-yarn fa-5x"></i>
                <div class="code">fa-brands fa-yarn</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-y-combinator fa-5x"></i>
                <div class="code">fa-brands fa-y-combinator</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-yelp fa-5x"></i>
                <div class="code">fa-brands fa-yelp</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-yoast fa-5x"></i>
                <div class="code">fa-brands fa-yoast</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-youtube fa-5x"></i>
                <div class="code">fa-brands fa-youtube</div>
            </div></li>
            <li><div>
                <i class="fa-brands fa-zhihu fa-5x"></i>
                <div class="code">fa-brands fa-zhihu</div>
            </div></li>
        </ul>
        <h2><a href="#regular" id="regular">regular</a></h2>
        <ul class="icon_lists clear">
            <li><div>
                <i class="fa-solid fa-address-book fa-5x"></i>
                <div class="code">fa-solid fa-address-book</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-address-card fa-5x"></i>
                <div class="code">fa-solid fa-address-card</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bell fa-5x"></i>
                <div class="code">fa-solid fa-bell</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bell-slash fa-5x"></i>
                <div class="code">fa-solid fa-bell-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bookmark fa-5x"></i>
                <div class="code">fa-solid fa-bookmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-building fa-5x"></i>
                <div class="code">fa-solid fa-building</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-calendar fa-5x"></i>
                <div class="code">fa-solid fa-calendar</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-calendar-check fa-5x"></i>
                <div class="code">fa-solid fa-calendar-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-calendar-days fa-5x"></i>
                <div class="code">fa-solid fa-calendar-days</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-calendar-minus fa-5x"></i>
                <div class="code">fa-solid fa-calendar-minus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-calendar-plus fa-5x"></i>
                <div class="code">fa-solid fa-calendar-plus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-calendar-xmark fa-5x"></i>
                <div class="code">fa-solid fa-calendar-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chart-bar fa-5x"></i>
                <div class="code">fa-solid fa-chart-bar</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chess-bishop fa-5x"></i>
                <div class="code">fa-solid fa-chess-bishop</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chess-king fa-5x"></i>
                <div class="code">fa-solid fa-chess-king</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chess-knight fa-5x"></i>
                <div class="code">fa-solid fa-chess-knight</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chess-pawn fa-5x"></i>
                <div class="code">fa-solid fa-chess-pawn</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chess-queen fa-5x"></i>
                <div class="code">fa-solid fa-chess-queen</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chess-rook fa-5x"></i>
                <div class="code">fa-solid fa-chess-rook</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle fa-5x"></i>
                <div class="code">fa-solid fa-circle</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-check fa-5x"></i>
                <div class="code">fa-solid fa-circle-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-dot fa-5x"></i>
                <div class="code">fa-solid fa-circle-dot</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-down fa-5x"></i>
                <div class="code">fa-solid fa-circle-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-left fa-5x"></i>
                <div class="code">fa-solid fa-circle-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-pause fa-5x"></i>
                <div class="code">fa-solid fa-circle-pause</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-play fa-5x"></i>
                <div class="code">fa-solid fa-circle-play</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-question fa-5x"></i>
                <div class="code">fa-solid fa-circle-question</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-right fa-5x"></i>
                <div class="code">fa-solid fa-circle-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-stop fa-5x"></i>
                <div class="code">fa-solid fa-circle-stop</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-up fa-5x"></i>
                <div class="code">fa-solid fa-circle-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-user fa-5x"></i>
                <div class="code">fa-solid fa-circle-user</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-xmark fa-5x"></i>
                <div class="code">fa-solid fa-circle-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-clipboard fa-5x"></i>
                <div class="code">fa-solid fa-clipboard</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-clock fa-5x"></i>
                <div class="code">fa-solid fa-clock</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-clone fa-5x"></i>
                <div class="code">fa-solid fa-clone</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-closed-captioning fa-5x"></i>
                <div class="code">fa-solid fa-closed-captioning</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-comment fa-5x"></i>
                <div class="code">fa-solid fa-comment</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-comment-dots fa-5x"></i>
                <div class="code">fa-solid fa-comment-dots</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-comments fa-5x"></i>
                <div class="code">fa-solid fa-comments</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-compass fa-5x"></i>
                <div class="code">fa-solid fa-compass</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-copy fa-5x"></i>
                <div class="code">fa-solid fa-copy</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-copyright fa-5x"></i>
                <div class="code">fa-solid fa-copyright</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-credit-card fa-5x"></i>
                <div class="code">fa-solid fa-credit-card</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-envelope fa-5x"></i>
                <div class="code">fa-solid fa-envelope</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-envelope-open fa-5x"></i>
                <div class="code">fa-solid fa-envelope-open</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-eye fa-5x"></i>
                <div class="code">fa-solid fa-eye</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-eye-slash fa-5x"></i>
                <div class="code">fa-solid fa-eye-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-angry fa-5x"></i>
                <div class="code">fa-solid fa-face-angry</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-dizzy fa-5x"></i>
                <div class="code">fa-solid fa-face-dizzy</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-flushed fa-5x"></i>
                <div class="code">fa-solid fa-face-flushed</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-frown fa-5x"></i>
                <div class="code">fa-solid fa-face-frown</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-frown-open fa-5x"></i>
                <div class="code">fa-solid fa-face-frown-open</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grimace fa-5x"></i>
                <div class="code">fa-solid fa-face-grimace</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin fa-5x"></i>
                <div class="code">fa-solid fa-face-grin</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-beam fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-beam</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-beam-sweat fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-beam-sweat</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-hearts fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-hearts</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-squint fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-squint</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-squint-tears fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-squint-tears</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-stars fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-stars</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-tears fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-tears</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-tongue fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-tongue</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-tongue-squint fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-tongue-squint</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-tongue-wink fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-tongue-wink</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-wide fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-wide</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-wink fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-wink</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-kiss fa-5x"></i>
                <div class="code">fa-solid fa-face-kiss</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-kiss-beam fa-5x"></i>
                <div class="code">fa-solid fa-face-kiss-beam</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-kiss-wink-heart fa-5x"></i>
                <div class="code">fa-solid fa-face-kiss-wink-heart</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-laugh fa-5x"></i>
                <div class="code">fa-solid fa-face-laugh</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-laugh-beam fa-5x"></i>
                <div class="code">fa-solid fa-face-laugh-beam</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-laugh-squint fa-5x"></i>
                <div class="code">fa-solid fa-face-laugh-squint</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-laugh-wink fa-5x"></i>
                <div class="code">fa-solid fa-face-laugh-wink</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-meh fa-5x"></i>
                <div class="code">fa-solid fa-face-meh</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-meh-blank fa-5x"></i>
                <div class="code">fa-solid fa-face-meh-blank</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-rolling-eyes fa-5x"></i>
                <div class="code">fa-solid fa-face-rolling-eyes</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-sad-cry fa-5x"></i>
                <div class="code">fa-solid fa-face-sad-cry</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-sad-tear fa-5x"></i>
                <div class="code">fa-solid fa-face-sad-tear</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-smile fa-5x"></i>
                <div class="code">fa-solid fa-face-smile</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-smile-beam fa-5x"></i>
                <div class="code">fa-solid fa-face-smile-beam</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-smile-wink fa-5x"></i>
                <div class="code">fa-solid fa-face-smile-wink</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-surprise fa-5x"></i>
                <div class="code">fa-solid fa-face-surprise</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-tired fa-5x"></i>
                <div class="code">fa-solid fa-face-tired</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file fa-5x"></i>
                <div class="code">fa-solid fa-file</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-audio fa-5x"></i>
                <div class="code">fa-solid fa-file-audio</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-code fa-5x"></i>
                <div class="code">fa-solid fa-file-code</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-excel fa-5x"></i>
                <div class="code">fa-solid fa-file-excel</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-image fa-5x"></i>
                <div class="code">fa-solid fa-file-image</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-lines fa-5x"></i>
                <div class="code">fa-solid fa-file-lines</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-pdf fa-5x"></i>
                <div class="code">fa-solid fa-file-pdf</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-powerpoint fa-5x"></i>
                <div class="code">fa-solid fa-file-powerpoint</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-video fa-5x"></i>
                <div class="code">fa-solid fa-file-video</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-word fa-5x"></i>
                <div class="code">fa-solid fa-file-word</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-zipper fa-5x"></i>
                <div class="code">fa-solid fa-file-zipper</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-flag fa-5x"></i>
                <div class="code">fa-solid fa-flag</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-floppy-disk fa-5x"></i>
                <div class="code">fa-solid fa-floppy-disk</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-folder fa-5x"></i>
                <div class="code">fa-solid fa-folder</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-folder-closed fa-5x"></i>
                <div class="code">fa-solid fa-folder-closed</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-folder-open fa-5x"></i>
                <div class="code">fa-solid fa-folder-open</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-font-awesome fa-5x"></i>
                <div class="code">fa-solid fa-font-awesome</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-futbol fa-5x"></i>
                <div class="code">fa-solid fa-futbol</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-gem fa-5x"></i>
                <div class="code">fa-solid fa-gem</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand fa-5x"></i>
                <div class="code">fa-solid fa-hand</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-back-fist fa-5x"></i>
                <div class="code">fa-solid fa-hand-back-fist</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-lizard fa-5x"></i>
                <div class="code">fa-solid fa-hand-lizard</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-peace fa-5x"></i>
                <div class="code">fa-solid fa-hand-peace</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-point-down fa-5x"></i>
                <div class="code">fa-solid fa-hand-point-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-pointer fa-5x"></i>
                <div class="code">fa-solid fa-hand-pointer</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-point-left fa-5x"></i>
                <div class="code">fa-solid fa-hand-point-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-point-right fa-5x"></i>
                <div class="code">fa-solid fa-hand-point-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-point-up fa-5x"></i>
                <div class="code">fa-solid fa-hand-point-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-scissors fa-5x"></i>
                <div class="code">fa-solid fa-hand-scissors</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-handshake fa-5x"></i>
                <div class="code">fa-solid fa-handshake</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-spock fa-5x"></i>
                <div class="code">fa-solid fa-hand-spock</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hard-drive fa-5x"></i>
                <div class="code">fa-solid fa-hard-drive</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-heart fa-5x"></i>
                <div class="code">fa-solid fa-heart</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hospital fa-5x"></i>
                <div class="code">fa-solid fa-hospital</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hourglass fa-5x"></i>
                <div class="code">fa-solid fa-hourglass</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hourglass-half fa-5x"></i>
                <div class="code">fa-solid fa-hourglass-half</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-id-badge fa-5x"></i>
                <div class="code">fa-solid fa-id-badge</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-id-card fa-5x"></i>
                <div class="code">fa-solid fa-id-card</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-image fa-5x"></i>
                <div class="code">fa-solid fa-image</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-images fa-5x"></i>
                <div class="code">fa-solid fa-images</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-keyboard fa-5x"></i>
                <div class="code">fa-solid fa-keyboard</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-lemon fa-5x"></i>
                <div class="code">fa-solid fa-lemon</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-life-ring fa-5x"></i>
                <div class="code">fa-solid fa-life-ring</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-lightbulb fa-5x"></i>
                <div class="code">fa-solid fa-lightbulb</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-map fa-5x"></i>
                <div class="code">fa-solid fa-map</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-message fa-5x"></i>
                <div class="code">fa-solid fa-message</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-money-bill-1 fa-5x"></i>
                <div class="code">fa-solid fa-money-bill-1</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-moon fa-5x"></i>
                <div class="code">fa-solid fa-moon</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-newspaper fa-5x"></i>
                <div class="code">fa-solid fa-newspaper</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-note-sticky fa-5x"></i>
                <div class="code">fa-solid fa-note-sticky</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-object-group fa-5x"></i>
                <div class="code">fa-solid fa-object-group</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-object-ungroup fa-5x"></i>
                <div class="code">fa-solid fa-object-ungroup</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-paper-plane fa-5x"></i>
                <div class="code">fa-solid fa-paper-plane</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-paste fa-5x"></i>
                <div class="code">fa-solid fa-paste</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-pen-to-square fa-5x"></i>
                <div class="code">fa-solid fa-pen-to-square</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-rectangle-list fa-5x"></i>
                <div class="code">fa-solid fa-rectangle-list</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-rectangle-xmark fa-5x"></i>
                <div class="code">fa-solid fa-rectangle-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-registered fa-5x"></i>
                <div class="code">fa-solid fa-registered</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-share-from-square fa-5x"></i>
                <div class="code">fa-solid fa-share-from-square</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-snowflake fa-5x"></i>
                <div class="code">fa-solid fa-snowflake</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square fa-5x"></i>
                <div class="code">fa-solid fa-square</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-caret-down fa-5x"></i>
                <div class="code">fa-solid fa-square-caret-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-caret-left fa-5x"></i>
                <div class="code">fa-solid fa-square-caret-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-caret-right fa-5x"></i>
                <div class="code">fa-solid fa-square-caret-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-caret-up fa-5x"></i>
                <div class="code">fa-solid fa-square-caret-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-check fa-5x"></i>
                <div class="code">fa-solid fa-square-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-full fa-5x"></i>
                <div class="code">fa-solid fa-square-full</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-minus fa-5x"></i>
                <div class="code">fa-solid fa-square-minus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-plus fa-5x"></i>
                <div class="code">fa-solid fa-square-plus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-star fa-5x"></i>
                <div class="code">fa-solid fa-star</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-star-half fa-5x"></i>
                <div class="code">fa-solid fa-star-half</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-star-half-stroke fa-5x"></i>
                <div class="code">fa-solid fa-star-half-stroke</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-sun fa-5x"></i>
                <div class="code">fa-solid fa-sun</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-thumbs-down fa-5x"></i>
                <div class="code">fa-solid fa-thumbs-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-thumbs-up fa-5x"></i>
                <div class="code">fa-solid fa-thumbs-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-trash-can fa-5x"></i>
                <div class="code">fa-solid fa-trash-can</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user fa-5x"></i>
                <div class="code">fa-solid fa-user</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-window-maximize fa-5x"></i>
                <div class="code">fa-solid fa-window-maximize</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-window-minimize fa-5x"></i>
                <div class="code">fa-solid fa-window-minimize</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-window-restore fa-5x"></i>
                <div class="code">fa-solid fa-window-restore</div>
            </div></li>
        </ul>
        <h2><a href="#solid" id="solid">solid</a></h2>
        <ul class="icon_lists clear">
            <li><div>
                <i class="fa-solid fa-0 fa-5x"></i>
                <div class="code">fa-solid fa-0</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-1 fa-5x"></i>
                <div class="code">fa-solid fa-1</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-2 fa-5x"></i>
                <div class="code">fa-solid fa-2</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-3 fa-5x"></i>
                <div class="code">fa-solid fa-3</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-4 fa-5x"></i>
                <div class="code">fa-solid fa-4</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-5 fa-5x"></i>
                <div class="code">fa-solid fa-5</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-6 fa-5x"></i>
                <div class="code">fa-solid fa-6</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-7 fa-5x"></i>
                <div class="code">fa-solid fa-7</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-8 fa-5x"></i>
                <div class="code">fa-solid fa-8</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-9 fa-5x"></i>
                <div class="code">fa-solid fa-9</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-a fa-5x"></i>
                <div class="code">fa-solid fa-a</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-address-book fa-5x"></i>
                <div class="code">fa-solid fa-address-book</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-address-card fa-5x"></i>
                <div class="code">fa-solid fa-address-card</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-align-center fa-5x"></i>
                <div class="code">fa-solid fa-align-center</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-align-justify fa-5x"></i>
                <div class="code">fa-solid fa-align-justify</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-align-left fa-5x"></i>
                <div class="code">fa-solid fa-align-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-align-right fa-5x"></i>
                <div class="code">fa-solid fa-align-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-anchor fa-5x"></i>
                <div class="code">fa-solid fa-anchor</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-anchor-circle-check fa-5x"></i>
                <div class="code">fa-solid fa-anchor-circle-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-anchor-circle-exclamation fa-5x"></i>
                <div class="code">fa-solid fa-anchor-circle-exclamation</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-anchor-circle-xmark fa-5x"></i>
                <div class="code">fa-solid fa-anchor-circle-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-anchor-lock fa-5x"></i>
                <div class="code">fa-solid fa-anchor-lock</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-angle-down fa-5x"></i>
                <div class="code">fa-solid fa-angle-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-angle-left fa-5x"></i>
                <div class="code">fa-solid fa-angle-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-angle-right fa-5x"></i>
                <div class="code">fa-solid fa-angle-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-angles-down fa-5x"></i>
                <div class="code">fa-solid fa-angles-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-angles-left fa-5x"></i>
                <div class="code">fa-solid fa-angles-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-angles-right fa-5x"></i>
                <div class="code">fa-solid fa-angles-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-angles-up fa-5x"></i>
                <div class="code">fa-solid fa-angles-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-angle-up fa-5x"></i>
                <div class="code">fa-solid fa-angle-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ankh fa-5x"></i>
                <div class="code">fa-solid fa-ankh</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-apple-whole fa-5x"></i>
                <div class="code">fa-solid fa-apple-whole</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-archway fa-5x"></i>
                <div class="code">fa-solid fa-archway</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-down fa-5x"></i>
                <div class="code">fa-solid fa-arrow-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-down-1-9 fa-5x"></i>
                <div class="code">fa-solid fa-arrow-down-1-9</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-down-9-1 fa-5x"></i>
                <div class="code">fa-solid fa-arrow-down-9-1</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-down-a-z fa-5x"></i>
                <div class="code">fa-solid fa-arrow-down-a-z</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-down-long fa-5x"></i>
                <div class="code">fa-solid fa-arrow-down-long</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-down-short-wide fa-5x"></i>
                <div class="code">fa-solid fa-arrow-down-short-wide</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-down-up-across-line fa-5x"></i>
                <div class="code">fa-solid fa-arrow-down-up-across-line</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-down-up-lock fa-5x"></i>
                <div class="code">fa-solid fa-arrow-down-up-lock</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-down-wide-short fa-5x"></i>
                <div class="code">fa-solid fa-arrow-down-wide-short</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-down-z-a fa-5x"></i>
                <div class="code">fa-solid fa-arrow-down-z-a</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-left fa-5x"></i>
                <div class="code">fa-solid fa-arrow-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-left-long fa-5x"></i>
                <div class="code">fa-solid fa-arrow-left-long</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-pointer fa-5x"></i>
                <div class="code">fa-solid fa-arrow-pointer</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-right fa-5x"></i>
                <div class="code">fa-solid fa-arrow-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-right-arrow-left fa-5x"></i>
                <div class="code">fa-solid fa-arrow-right-arrow-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-right-from-bracket fa-5x"></i>
                <div class="code">fa-solid fa-arrow-right-from-bracket</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-right-long fa-5x"></i>
                <div class="code">fa-solid fa-arrow-right-long</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-right-to-bracket fa-5x"></i>
                <div class="code">fa-solid fa-arrow-right-to-bracket</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-right-to-city fa-5x"></i>
                <div class="code">fa-solid fa-arrow-right-to-city</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-rotate-left fa-5x"></i>
                <div class="code">fa-solid fa-arrow-rotate-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-rotate-right fa-5x"></i>
                <div class="code">fa-solid fa-arrow-rotate-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrows-down-to-line fa-5x"></i>
                <div class="code">fa-solid fa-arrows-down-to-line</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrows-down-to-people fa-5x"></i>
                <div class="code">fa-solid fa-arrows-down-to-people</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrows-left-right fa-5x"></i>
                <div class="code">fa-solid fa-arrows-left-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrows-left-right-to-line fa-5x"></i>
                <div class="code">fa-solid fa-arrows-left-right-to-line</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrows-rotate fa-5x"></i>
                <div class="code">fa-solid fa-arrows-rotate</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrows-spin fa-5x"></i>
                <div class="code">fa-solid fa-arrows-spin</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrows-split-up-and-left fa-5x"></i>
                <div class="code">fa-solid fa-arrows-split-up-and-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrows-to-circle fa-5x"></i>
                <div class="code">fa-solid fa-arrows-to-circle</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrows-to-dot fa-5x"></i>
                <div class="code">fa-solid fa-arrows-to-dot</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrows-to-eye fa-5x"></i>
                <div class="code">fa-solid fa-arrows-to-eye</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrows-turn-right fa-5x"></i>
                <div class="code">fa-solid fa-arrows-turn-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrows-turn-to-dots fa-5x"></i>
                <div class="code">fa-solid fa-arrows-turn-to-dots</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrows-up-down fa-5x"></i>
                <div class="code">fa-solid fa-arrows-up-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrows-up-down-left-right fa-5x"></i>
                <div class="code">fa-solid fa-arrows-up-down-left-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrows-up-to-line fa-5x"></i>
                <div class="code">fa-solid fa-arrows-up-to-line</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-trend-down fa-5x"></i>
                <div class="code">fa-solid fa-arrow-trend-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-trend-up fa-5x"></i>
                <div class="code">fa-solid fa-arrow-trend-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-turn-down fa-5x"></i>
                <div class="code">fa-solid fa-arrow-turn-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-turn-up fa-5x"></i>
                <div class="code">fa-solid fa-arrow-turn-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-up fa-5x"></i>
                <div class="code">fa-solid fa-arrow-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-up-1-9 fa-5x"></i>
                <div class="code">fa-solid fa-arrow-up-1-9</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-up-9-1 fa-5x"></i>
                <div class="code">fa-solid fa-arrow-up-9-1</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-up-a-z fa-5x"></i>
                <div class="code">fa-solid fa-arrow-up-a-z</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-up-from-bracket fa-5x"></i>
                <div class="code">fa-solid fa-arrow-up-from-bracket</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-up-from-ground-water fa-5x"></i>
                <div class="code">fa-solid fa-arrow-up-from-ground-water</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-up-from-water-pump fa-5x"></i>
                <div class="code">fa-solid fa-arrow-up-from-water-pump</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-up-long fa-5x"></i>
                <div class="code">fa-solid fa-arrow-up-long</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-up-right-dots fa-5x"></i>
                <div class="code">fa-solid fa-arrow-up-right-dots</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-up-right-from-square fa-5x"></i>
                <div class="code">fa-solid fa-arrow-up-right-from-square</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-up-short-wide fa-5x"></i>
                <div class="code">fa-solid fa-arrow-up-short-wide</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-up-wide-short fa-5x"></i>
                <div class="code">fa-solid fa-arrow-up-wide-short</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-arrow-up-z-a fa-5x"></i>
                <div class="code">fa-solid fa-arrow-up-z-a</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-asterisk fa-5x"></i>
                <div class="code">fa-solid fa-asterisk</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-at fa-5x"></i>
                <div class="code">fa-solid fa-at</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-atom fa-5x"></i>
                <div class="code">fa-solid fa-atom</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-audio-description fa-5x"></i>
                <div class="code">fa-solid fa-audio-description</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-austral-sign fa-5x"></i>
                <div class="code">fa-solid fa-austral-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-award fa-5x"></i>
                <div class="code">fa-solid fa-award</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-b fa-5x"></i>
                <div class="code">fa-solid fa-b</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-baby fa-5x"></i>
                <div class="code">fa-solid fa-baby</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-baby-carriage fa-5x"></i>
                <div class="code">fa-solid fa-baby-carriage</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-backward fa-5x"></i>
                <div class="code">fa-solid fa-backward</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-backward-fast fa-5x"></i>
                <div class="code">fa-solid fa-backward-fast</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-backward-step fa-5x"></i>
                <div class="code">fa-solid fa-backward-step</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bacon fa-5x"></i>
                <div class="code">fa-solid fa-bacon</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bacteria fa-5x"></i>
                <div class="code">fa-solid fa-bacteria</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bacterium fa-5x"></i>
                <div class="code">fa-solid fa-bacterium</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bag-shopping fa-5x"></i>
                <div class="code">fa-solid fa-bag-shopping</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bahai fa-5x"></i>
                <div class="code">fa-solid fa-bahai</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-baht-sign fa-5x"></i>
                <div class="code">fa-solid fa-baht-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ban fa-5x"></i>
                <div class="code">fa-solid fa-ban</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bandage fa-5x"></i>
                <div class="code">fa-solid fa-bandage</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bangladeshi-taka-sign fa-5x"></i>
                <div class="code">fa-solid fa-bangladeshi-taka-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ban-smoking fa-5x"></i>
                <div class="code">fa-solid fa-ban-smoking</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-barcode fa-5x"></i>
                <div class="code">fa-solid fa-barcode</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bars fa-5x"></i>
                <div class="code">fa-solid fa-bars</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bars-progress fa-5x"></i>
                <div class="code">fa-solid fa-bars-progress</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bars-staggered fa-5x"></i>
                <div class="code">fa-solid fa-bars-staggered</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-baseball fa-5x"></i>
                <div class="code">fa-solid fa-baseball</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-baseball-bat-ball fa-5x"></i>
                <div class="code">fa-solid fa-baseball-bat-ball</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-basketball fa-5x"></i>
                <div class="code">fa-solid fa-basketball</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-basket-shopping fa-5x"></i>
                <div class="code">fa-solid fa-basket-shopping</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bath fa-5x"></i>
                <div class="code">fa-solid fa-bath</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-battery-empty fa-5x"></i>
                <div class="code">fa-solid fa-battery-empty</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-battery-full fa-5x"></i>
                <div class="code">fa-solid fa-battery-full</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-battery-half fa-5x"></i>
                <div class="code">fa-solid fa-battery-half</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-battery-quarter fa-5x"></i>
                <div class="code">fa-solid fa-battery-quarter</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-battery-three-quarters fa-5x"></i>
                <div class="code">fa-solid fa-battery-three-quarters</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bed fa-5x"></i>
                <div class="code">fa-solid fa-bed</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bed-pulse fa-5x"></i>
                <div class="code">fa-solid fa-bed-pulse</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-beer-mug-empty fa-5x"></i>
                <div class="code">fa-solid fa-beer-mug-empty</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bell fa-5x"></i>
                <div class="code">fa-solid fa-bell</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bell-concierge fa-5x"></i>
                <div class="code">fa-solid fa-bell-concierge</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bell-slash fa-5x"></i>
                <div class="code">fa-solid fa-bell-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bezier-curve fa-5x"></i>
                <div class="code">fa-solid fa-bezier-curve</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bicycle fa-5x"></i>
                <div class="code">fa-solid fa-bicycle</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-binoculars fa-5x"></i>
                <div class="code">fa-solid fa-binoculars</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-biohazard fa-5x"></i>
                <div class="code">fa-solid fa-biohazard</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bitcoin-sign fa-5x"></i>
                <div class="code">fa-solid fa-bitcoin-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-blender fa-5x"></i>
                <div class="code">fa-solid fa-blender</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-blender-phone fa-5x"></i>
                <div class="code">fa-solid fa-blender-phone</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-blog fa-5x"></i>
                <div class="code">fa-solid fa-blog</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bold fa-5x"></i>
                <div class="code">fa-solid fa-bold</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bolt fa-5x"></i>
                <div class="code">fa-solid fa-bolt</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bolt-lightning fa-5x"></i>
                <div class="code">fa-solid fa-bolt-lightning</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bomb fa-5x"></i>
                <div class="code">fa-solid fa-bomb</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bone fa-5x"></i>
                <div class="code">fa-solid fa-bone</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bong fa-5x"></i>
                <div class="code">fa-solid fa-bong</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-book fa-5x"></i>
                <div class="code">fa-solid fa-book</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-book-atlas fa-5x"></i>
                <div class="code">fa-solid fa-book-atlas</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-book-bible fa-5x"></i>
                <div class="code">fa-solid fa-book-bible</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-book-bookmark fa-5x"></i>
                <div class="code">fa-solid fa-book-bookmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-book-journal-whills fa-5x"></i>
                <div class="code">fa-solid fa-book-journal-whills</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bookmark fa-5x"></i>
                <div class="code">fa-solid fa-bookmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-book-medical fa-5x"></i>
                <div class="code">fa-solid fa-book-medical</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-book-open fa-5x"></i>
                <div class="code">fa-solid fa-book-open</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-book-open-reader fa-5x"></i>
                <div class="code">fa-solid fa-book-open-reader</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-book-quran fa-5x"></i>
                <div class="code">fa-solid fa-book-quran</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-book-skull fa-5x"></i>
                <div class="code">fa-solid fa-book-skull</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-book-tanakh fa-5x"></i>
                <div class="code">fa-solid fa-book-tanakh</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-border-all fa-5x"></i>
                <div class="code">fa-solid fa-border-all</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-border-none fa-5x"></i>
                <div class="code">fa-solid fa-border-none</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-border-top-left fa-5x"></i>
                <div class="code">fa-solid fa-border-top-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bore-hole fa-5x"></i>
                <div class="code">fa-solid fa-bore-hole</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bottle-droplet fa-5x"></i>
                <div class="code">fa-solid fa-bottle-droplet</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bottle-water fa-5x"></i>
                <div class="code">fa-solid fa-bottle-water</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bowl-food fa-5x"></i>
                <div class="code">fa-solid fa-bowl-food</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bowling-ball fa-5x"></i>
                <div class="code">fa-solid fa-bowling-ball</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bowl-rice fa-5x"></i>
                <div class="code">fa-solid fa-bowl-rice</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-box fa-5x"></i>
                <div class="code">fa-solid fa-box</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-box-archive fa-5x"></i>
                <div class="code">fa-solid fa-box-archive</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-boxes-packing fa-5x"></i>
                <div class="code">fa-solid fa-boxes-packing</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-boxes-stacked fa-5x"></i>
                <div class="code">fa-solid fa-boxes-stacked</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-box-open fa-5x"></i>
                <div class="code">fa-solid fa-box-open</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-box-tissue fa-5x"></i>
                <div class="code">fa-solid fa-box-tissue</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-braille fa-5x"></i>
                <div class="code">fa-solid fa-braille</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-brain fa-5x"></i>
                <div class="code">fa-solid fa-brain</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-brazilian-real-sign fa-5x"></i>
                <div class="code">fa-solid fa-brazilian-real-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bread-slice fa-5x"></i>
                <div class="code">fa-solid fa-bread-slice</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bridge fa-5x"></i>
                <div class="code">fa-solid fa-bridge</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bridge-circle-check fa-5x"></i>
                <div class="code">fa-solid fa-bridge-circle-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bridge-circle-exclamation fa-5x"></i>
                <div class="code">fa-solid fa-bridge-circle-exclamation</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bridge-circle-xmark fa-5x"></i>
                <div class="code">fa-solid fa-bridge-circle-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bridge-lock fa-5x"></i>
                <div class="code">fa-solid fa-bridge-lock</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bridge-water fa-5x"></i>
                <div class="code">fa-solid fa-bridge-water</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-briefcase fa-5x"></i>
                <div class="code">fa-solid fa-briefcase</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-briefcase-medical fa-5x"></i>
                <div class="code">fa-solid fa-briefcase-medical</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-broom fa-5x"></i>
                <div class="code">fa-solid fa-broom</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-broom-ball fa-5x"></i>
                <div class="code">fa-solid fa-broom-ball</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-brush fa-5x"></i>
                <div class="code">fa-solid fa-brush</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bucket fa-5x"></i>
                <div class="code">fa-solid fa-bucket</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bug fa-5x"></i>
                <div class="code">fa-solid fa-bug</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bugs fa-5x"></i>
                <div class="code">fa-solid fa-bugs</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bug-slash fa-5x"></i>
                <div class="code">fa-solid fa-bug-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-building fa-5x"></i>
                <div class="code">fa-solid fa-building</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-building-circle-arrow-right fa-5x"></i>
                <div class="code">fa-solid fa-building-circle-arrow-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-building-circle-check fa-5x"></i>
                <div class="code">fa-solid fa-building-circle-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-building-circle-exclamation fa-5x"></i>
                <div class="code">fa-solid fa-building-circle-exclamation</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-building-circle-xmark fa-5x"></i>
                <div class="code">fa-solid fa-building-circle-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-building-columns fa-5x"></i>
                <div class="code">fa-solid fa-building-columns</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-building-flag fa-5x"></i>
                <div class="code">fa-solid fa-building-flag</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-building-lock fa-5x"></i>
                <div class="code">fa-solid fa-building-lock</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-building-ngo fa-5x"></i>
                <div class="code">fa-solid fa-building-ngo</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-building-shield fa-5x"></i>
                <div class="code">fa-solid fa-building-shield</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-building-un fa-5x"></i>
                <div class="code">fa-solid fa-building-un</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-building-user fa-5x"></i>
                <div class="code">fa-solid fa-building-user</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-building-wheat fa-5x"></i>
                <div class="code">fa-solid fa-building-wheat</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bullhorn fa-5x"></i>
                <div class="code">fa-solid fa-bullhorn</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bullseye fa-5x"></i>
                <div class="code">fa-solid fa-bullseye</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-burger fa-5x"></i>
                <div class="code">fa-solid fa-burger</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-burst fa-5x"></i>
                <div class="code">fa-solid fa-burst</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bus fa-5x"></i>
                <div class="code">fa-solid fa-bus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-business-time fa-5x"></i>
                <div class="code">fa-solid fa-business-time</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-bus-simple fa-5x"></i>
                <div class="code">fa-solid fa-bus-simple</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-c fa-5x"></i>
                <div class="code">fa-solid fa-c</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cable-car fa-5x"></i>
                <div class="code">fa-solid fa-cable-car</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cake-candles fa-5x"></i>
                <div class="code">fa-solid fa-cake-candles</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-calculator fa-5x"></i>
                <div class="code">fa-solid fa-calculator</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-calendar fa-5x"></i>
                <div class="code">fa-solid fa-calendar</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-calendar-check fa-5x"></i>
                <div class="code">fa-solid fa-calendar-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-calendar-day fa-5x"></i>
                <div class="code">fa-solid fa-calendar-day</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-calendar-days fa-5x"></i>
                <div class="code">fa-solid fa-calendar-days</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-calendar-minus fa-5x"></i>
                <div class="code">fa-solid fa-calendar-minus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-calendar-plus fa-5x"></i>
                <div class="code">fa-solid fa-calendar-plus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-calendar-week fa-5x"></i>
                <div class="code">fa-solid fa-calendar-week</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-calendar-xmark fa-5x"></i>
                <div class="code">fa-solid fa-calendar-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-camera fa-5x"></i>
                <div class="code">fa-solid fa-camera</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-camera-retro fa-5x"></i>
                <div class="code">fa-solid fa-camera-retro</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-camera-rotate fa-5x"></i>
                <div class="code">fa-solid fa-camera-rotate</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-campground fa-5x"></i>
                <div class="code">fa-solid fa-campground</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-candy-cane fa-5x"></i>
                <div class="code">fa-solid fa-candy-cane</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cannabis fa-5x"></i>
                <div class="code">fa-solid fa-cannabis</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-capsules fa-5x"></i>
                <div class="code">fa-solid fa-capsules</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-car fa-5x"></i>
                <div class="code">fa-solid fa-car</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-caravan fa-5x"></i>
                <div class="code">fa-solid fa-caravan</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-car-battery fa-5x"></i>
                <div class="code">fa-solid fa-car-battery</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-car-burst fa-5x"></i>
                <div class="code">fa-solid fa-car-burst</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-caret-down fa-5x"></i>
                <div class="code">fa-solid fa-caret-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-caret-left fa-5x"></i>
                <div class="code">fa-solid fa-caret-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-caret-right fa-5x"></i>
                <div class="code">fa-solid fa-caret-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-caret-up fa-5x"></i>
                <div class="code">fa-solid fa-caret-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-car-on fa-5x"></i>
                <div class="code">fa-solid fa-car-on</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-car-rear fa-5x"></i>
                <div class="code">fa-solid fa-car-rear</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-carrot fa-5x"></i>
                <div class="code">fa-solid fa-carrot</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-car-side fa-5x"></i>
                <div class="code">fa-solid fa-car-side</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cart-arrow-down fa-5x"></i>
                <div class="code">fa-solid fa-cart-arrow-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cart-flatbed fa-5x"></i>
                <div class="code">fa-solid fa-cart-flatbed</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cart-flatbed-suitcase fa-5x"></i>
                <div class="code">fa-solid fa-cart-flatbed-suitcase</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cart-plus fa-5x"></i>
                <div class="code">fa-solid fa-cart-plus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cart-shopping fa-5x"></i>
                <div class="code">fa-solid fa-cart-shopping</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-car-tunnel fa-5x"></i>
                <div class="code">fa-solid fa-car-tunnel</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cash-register fa-5x"></i>
                <div class="code">fa-solid fa-cash-register</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cat fa-5x"></i>
                <div class="code">fa-solid fa-cat</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cedi-sign fa-5x"></i>
                <div class="code">fa-solid fa-cedi-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cent-sign fa-5x"></i>
                <div class="code">fa-solid fa-cent-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-certificate fa-5x"></i>
                <div class="code">fa-solid fa-certificate</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chair fa-5x"></i>
                <div class="code">fa-solid fa-chair</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chalkboard fa-5x"></i>
                <div class="code">fa-solid fa-chalkboard</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chalkboard-user fa-5x"></i>
                <div class="code">fa-solid fa-chalkboard-user</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-champagne-glasses fa-5x"></i>
                <div class="code">fa-solid fa-champagne-glasses</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-charging-station fa-5x"></i>
                <div class="code">fa-solid fa-charging-station</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chart-area fa-5x"></i>
                <div class="code">fa-solid fa-chart-area</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chart-bar fa-5x"></i>
                <div class="code">fa-solid fa-chart-bar</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chart-column fa-5x"></i>
                <div class="code">fa-solid fa-chart-column</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chart-gantt fa-5x"></i>
                <div class="code">fa-solid fa-chart-gantt</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chart-line fa-5x"></i>
                <div class="code">fa-solid fa-chart-line</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chart-pie fa-5x"></i>
                <div class="code">fa-solid fa-chart-pie</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chart-simple fa-5x"></i>
                <div class="code">fa-solid fa-chart-simple</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-check fa-5x"></i>
                <div class="code">fa-solid fa-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-check-double fa-5x"></i>
                <div class="code">fa-solid fa-check-double</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-check-to-slot fa-5x"></i>
                <div class="code">fa-solid fa-check-to-slot</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cheese fa-5x"></i>
                <div class="code">fa-solid fa-cheese</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chess fa-5x"></i>
                <div class="code">fa-solid fa-chess</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chess-bishop fa-5x"></i>
                <div class="code">fa-solid fa-chess-bishop</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chess-board fa-5x"></i>
                <div class="code">fa-solid fa-chess-board</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chess-king fa-5x"></i>
                <div class="code">fa-solid fa-chess-king</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chess-knight fa-5x"></i>
                <div class="code">fa-solid fa-chess-knight</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chess-pawn fa-5x"></i>
                <div class="code">fa-solid fa-chess-pawn</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chess-queen fa-5x"></i>
                <div class="code">fa-solid fa-chess-queen</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chess-rook fa-5x"></i>
                <div class="code">fa-solid fa-chess-rook</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chevron-down fa-5x"></i>
                <div class="code">fa-solid fa-chevron-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chevron-left fa-5x"></i>
                <div class="code">fa-solid fa-chevron-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chevron-right fa-5x"></i>
                <div class="code">fa-solid fa-chevron-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-chevron-up fa-5x"></i>
                <div class="code">fa-solid fa-chevron-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-child fa-5x"></i>
                <div class="code">fa-solid fa-child</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-child-combatant fa-5x"></i>
                <div class="code">fa-solid fa-child-combatant</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-child-dress fa-5x"></i>
                <div class="code">fa-solid fa-child-dress</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-child-reaching fa-5x"></i>
                <div class="code">fa-solid fa-child-reaching</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-children fa-5x"></i>
                <div class="code">fa-solid fa-children</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-church fa-5x"></i>
                <div class="code">fa-solid fa-church</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle fa-5x"></i>
                <div class="code">fa-solid fa-circle</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-arrow-down fa-5x"></i>
                <div class="code">fa-solid fa-circle-arrow-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-arrow-left fa-5x"></i>
                <div class="code">fa-solid fa-circle-arrow-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-arrow-right fa-5x"></i>
                <div class="code">fa-solid fa-circle-arrow-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-arrow-up fa-5x"></i>
                <div class="code">fa-solid fa-circle-arrow-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-check fa-5x"></i>
                <div class="code">fa-solid fa-circle-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-chevron-down fa-5x"></i>
                <div class="code">fa-solid fa-circle-chevron-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-chevron-left fa-5x"></i>
                <div class="code">fa-solid fa-circle-chevron-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-chevron-right fa-5x"></i>
                <div class="code">fa-solid fa-circle-chevron-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-chevron-up fa-5x"></i>
                <div class="code">fa-solid fa-circle-chevron-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-dollar-to-slot fa-5x"></i>
                <div class="code">fa-solid fa-circle-dollar-to-slot</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-dot fa-5x"></i>
                <div class="code">fa-solid fa-circle-dot</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-down fa-5x"></i>
                <div class="code">fa-solid fa-circle-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-exclamation fa-5x"></i>
                <div class="code">fa-solid fa-circle-exclamation</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-h fa-5x"></i>
                <div class="code">fa-solid fa-circle-h</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-half-stroke fa-5x"></i>
                <div class="code">fa-solid fa-circle-half-stroke</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-info fa-5x"></i>
                <div class="code">fa-solid fa-circle-info</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-left fa-5x"></i>
                <div class="code">fa-solid fa-circle-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-minus fa-5x"></i>
                <div class="code">fa-solid fa-circle-minus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-nodes fa-5x"></i>
                <div class="code">fa-solid fa-circle-nodes</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-notch fa-5x"></i>
                <div class="code">fa-solid fa-circle-notch</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-pause fa-5x"></i>
                <div class="code">fa-solid fa-circle-pause</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-play fa-5x"></i>
                <div class="code">fa-solid fa-circle-play</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-plus fa-5x"></i>
                <div class="code">fa-solid fa-circle-plus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-question fa-5x"></i>
                <div class="code">fa-solid fa-circle-question</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-radiation fa-5x"></i>
                <div class="code">fa-solid fa-circle-radiation</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-right fa-5x"></i>
                <div class="code">fa-solid fa-circle-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-stop fa-5x"></i>
                <div class="code">fa-solid fa-circle-stop</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-up fa-5x"></i>
                <div class="code">fa-solid fa-circle-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-user fa-5x"></i>
                <div class="code">fa-solid fa-circle-user</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-circle-xmark fa-5x"></i>
                <div class="code">fa-solid fa-circle-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-city fa-5x"></i>
                <div class="code">fa-solid fa-city</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-clapperboard fa-5x"></i>
                <div class="code">fa-solid fa-clapperboard</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-clipboard fa-5x"></i>
                <div class="code">fa-solid fa-clipboard</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-clipboard-check fa-5x"></i>
                <div class="code">fa-solid fa-clipboard-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-clipboard-list fa-5x"></i>
                <div class="code">fa-solid fa-clipboard-list</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-clipboard-question fa-5x"></i>
                <div class="code">fa-solid fa-clipboard-question</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-clipboard-user fa-5x"></i>
                <div class="code">fa-solid fa-clipboard-user</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-clock fa-5x"></i>
                <div class="code">fa-solid fa-clock</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-clock-rotate-left fa-5x"></i>
                <div class="code">fa-solid fa-clock-rotate-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-clone fa-5x"></i>
                <div class="code">fa-solid fa-clone</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-closed-captioning fa-5x"></i>
                <div class="code">fa-solid fa-closed-captioning</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cloud fa-5x"></i>
                <div class="code">fa-solid fa-cloud</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cloud-arrow-down fa-5x"></i>
                <div class="code">fa-solid fa-cloud-arrow-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cloud-arrow-up fa-5x"></i>
                <div class="code">fa-solid fa-cloud-arrow-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cloud-bolt fa-5x"></i>
                <div class="code">fa-solid fa-cloud-bolt</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cloud-meatball fa-5x"></i>
                <div class="code">fa-solid fa-cloud-meatball</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cloud-moon fa-5x"></i>
                <div class="code">fa-solid fa-cloud-moon</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cloud-moon-rain fa-5x"></i>
                <div class="code">fa-solid fa-cloud-moon-rain</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cloud-rain fa-5x"></i>
                <div class="code">fa-solid fa-cloud-rain</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cloud-showers-heavy fa-5x"></i>
                <div class="code">fa-solid fa-cloud-showers-heavy</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cloud-showers-water fa-5x"></i>
                <div class="code">fa-solid fa-cloud-showers-water</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cloud-sun fa-5x"></i>
                <div class="code">fa-solid fa-cloud-sun</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cloud-sun-rain fa-5x"></i>
                <div class="code">fa-solid fa-cloud-sun-rain</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-clover fa-5x"></i>
                <div class="code">fa-solid fa-clover</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-code fa-5x"></i>
                <div class="code">fa-solid fa-code</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-code-branch fa-5x"></i>
                <div class="code">fa-solid fa-code-branch</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-code-commit fa-5x"></i>
                <div class="code">fa-solid fa-code-commit</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-code-compare fa-5x"></i>
                <div class="code">fa-solid fa-code-compare</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-code-fork fa-5x"></i>
                <div class="code">fa-solid fa-code-fork</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-code-merge fa-5x"></i>
                <div class="code">fa-solid fa-code-merge</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-code-pull-request fa-5x"></i>
                <div class="code">fa-solid fa-code-pull-request</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-coins fa-5x"></i>
                <div class="code">fa-solid fa-coins</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-colon-sign fa-5x"></i>
                <div class="code">fa-solid fa-colon-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-comment fa-5x"></i>
                <div class="code">fa-solid fa-comment</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-comment-dollar fa-5x"></i>
                <div class="code">fa-solid fa-comment-dollar</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-comment-dots fa-5x"></i>
                <div class="code">fa-solid fa-comment-dots</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-comment-medical fa-5x"></i>
                <div class="code">fa-solid fa-comment-medical</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-comments fa-5x"></i>
                <div class="code">fa-solid fa-comments</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-comments-dollar fa-5x"></i>
                <div class="code">fa-solid fa-comments-dollar</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-comment-slash fa-5x"></i>
                <div class="code">fa-solid fa-comment-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-comment-sms fa-5x"></i>
                <div class="code">fa-solid fa-comment-sms</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-compact-disc fa-5x"></i>
                <div class="code">fa-solid fa-compact-disc</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-compass fa-5x"></i>
                <div class="code">fa-solid fa-compass</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-compass-drafting fa-5x"></i>
                <div class="code">fa-solid fa-compass-drafting</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-compress fa-5x"></i>
                <div class="code">fa-solid fa-compress</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-computer fa-5x"></i>
                <div class="code">fa-solid fa-computer</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-computer-mouse fa-5x"></i>
                <div class="code">fa-solid fa-computer-mouse</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cookie fa-5x"></i>
                <div class="code">fa-solid fa-cookie</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cookie-bite fa-5x"></i>
                <div class="code">fa-solid fa-cookie-bite</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-copy fa-5x"></i>
                <div class="code">fa-solid fa-copy</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-copyright fa-5x"></i>
                <div class="code">fa-solid fa-copyright</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-couch fa-5x"></i>
                <div class="code">fa-solid fa-couch</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cow fa-5x"></i>
                <div class="code">fa-solid fa-cow</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-credit-card fa-5x"></i>
                <div class="code">fa-solid fa-credit-card</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-crop fa-5x"></i>
                <div class="code">fa-solid fa-crop</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-crop-simple fa-5x"></i>
                <div class="code">fa-solid fa-crop-simple</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cross fa-5x"></i>
                <div class="code">fa-solid fa-cross</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-crosshairs fa-5x"></i>
                <div class="code">fa-solid fa-crosshairs</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-crow fa-5x"></i>
                <div class="code">fa-solid fa-crow</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-crown fa-5x"></i>
                <div class="code">fa-solid fa-crown</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-crutch fa-5x"></i>
                <div class="code">fa-solid fa-crutch</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cruzeiro-sign fa-5x"></i>
                <div class="code">fa-solid fa-cruzeiro-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cube fa-5x"></i>
                <div class="code">fa-solid fa-cube</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cubes fa-5x"></i>
                <div class="code">fa-solid fa-cubes</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-cubes-stacked fa-5x"></i>
                <div class="code">fa-solid fa-cubes-stacked</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-d fa-5x"></i>
                <div class="code">fa-solid fa-d</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-database fa-5x"></i>
                <div class="code">fa-solid fa-database</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-delete-left fa-5x"></i>
                <div class="code">fa-solid fa-delete-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-democrat fa-5x"></i>
                <div class="code">fa-solid fa-democrat</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-desktop fa-5x"></i>
                <div class="code">fa-solid fa-desktop</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dharmachakra fa-5x"></i>
                <div class="code">fa-solid fa-dharmachakra</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-diagram-next fa-5x"></i>
                <div class="code">fa-solid fa-diagram-next</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-diagram-predecessor fa-5x"></i>
                <div class="code">fa-solid fa-diagram-predecessor</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-diagram-project fa-5x"></i>
                <div class="code">fa-solid fa-diagram-project</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-diagram-successor fa-5x"></i>
                <div class="code">fa-solid fa-diagram-successor</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-diamond fa-5x"></i>
                <div class="code">fa-solid fa-diamond</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-diamond-turn-right fa-5x"></i>
                <div class="code">fa-solid fa-diamond-turn-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dice fa-5x"></i>
                <div class="code">fa-solid fa-dice</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dice-d6 fa-5x"></i>
                <div class="code">fa-solid fa-dice-d6</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dice-d20 fa-5x"></i>
                <div class="code">fa-solid fa-dice-d20</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dice-five fa-5x"></i>
                <div class="code">fa-solid fa-dice-five</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dice-four fa-5x"></i>
                <div class="code">fa-solid fa-dice-four</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dice-one fa-5x"></i>
                <div class="code">fa-solid fa-dice-one</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dice-six fa-5x"></i>
                <div class="code">fa-solid fa-dice-six</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dice-three fa-5x"></i>
                <div class="code">fa-solid fa-dice-three</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dice-two fa-5x"></i>
                <div class="code">fa-solid fa-dice-two</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-disease fa-5x"></i>
                <div class="code">fa-solid fa-disease</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-display fa-5x"></i>
                <div class="code">fa-solid fa-display</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-divide fa-5x"></i>
                <div class="code">fa-solid fa-divide</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dna fa-5x"></i>
                <div class="code">fa-solid fa-dna</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dog fa-5x"></i>
                <div class="code">fa-solid fa-dog</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dollar-sign fa-5x"></i>
                <div class="code">fa-solid fa-dollar-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dolly fa-5x"></i>
                <div class="code">fa-solid fa-dolly</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dong-sign fa-5x"></i>
                <div class="code">fa-solid fa-dong-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-door-closed fa-5x"></i>
                <div class="code">fa-solid fa-door-closed</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-door-open fa-5x"></i>
                <div class="code">fa-solid fa-door-open</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dove fa-5x"></i>
                <div class="code">fa-solid fa-dove</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-down-left-and-up-right-to-center fa-5x"></i>
                <div class="code">fa-solid fa-down-left-and-up-right-to-center</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-download fa-5x"></i>
                <div class="code">fa-solid fa-download</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-down-long fa-5x"></i>
                <div class="code">fa-solid fa-down-long</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dragon fa-5x"></i>
                <div class="code">fa-solid fa-dragon</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-draw-polygon fa-5x"></i>
                <div class="code">fa-solid fa-draw-polygon</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-droplet fa-5x"></i>
                <div class="code">fa-solid fa-droplet</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-droplet-slash fa-5x"></i>
                <div class="code">fa-solid fa-droplet-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-drum fa-5x"></i>
                <div class="code">fa-solid fa-drum</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-drum-steelpan fa-5x"></i>
                <div class="code">fa-solid fa-drum-steelpan</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-drumstick-bite fa-5x"></i>
                <div class="code">fa-solid fa-drumstick-bite</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dumbbell fa-5x"></i>
                <div class="code">fa-solid fa-dumbbell</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dumpster fa-5x"></i>
                <div class="code">fa-solid fa-dumpster</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dumpster-fire fa-5x"></i>
                <div class="code">fa-solid fa-dumpster-fire</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-dungeon fa-5x"></i>
                <div class="code">fa-solid fa-dungeon</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-e fa-5x"></i>
                <div class="code">fa-solid fa-e</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ear-deaf fa-5x"></i>
                <div class="code">fa-solid fa-ear-deaf</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ear-listen fa-5x"></i>
                <div class="code">fa-solid fa-ear-listen</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-earth-africa fa-5x"></i>
                <div class="code">fa-solid fa-earth-africa</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-earth-americas fa-5x"></i>
                <div class="code">fa-solid fa-earth-americas</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-earth-asia fa-5x"></i>
                <div class="code">fa-solid fa-earth-asia</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-earth-europe fa-5x"></i>
                <div class="code">fa-solid fa-earth-europe</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-earth-oceania fa-5x"></i>
                <div class="code">fa-solid fa-earth-oceania</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-egg fa-5x"></i>
                <div class="code">fa-solid fa-egg</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-eject fa-5x"></i>
                <div class="code">fa-solid fa-eject</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-elevator fa-5x"></i>
                <div class="code">fa-solid fa-elevator</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ellipsis fa-5x"></i>
                <div class="code">fa-solid fa-ellipsis</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ellipsis-vertical fa-5x"></i>
                <div class="code">fa-solid fa-ellipsis-vertical</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-envelope fa-5x"></i>
                <div class="code">fa-solid fa-envelope</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-envelope-circle-check fa-5x"></i>
                <div class="code">fa-solid fa-envelope-circle-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-envelope-open fa-5x"></i>
                <div class="code">fa-solid fa-envelope-open</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-envelope-open-text fa-5x"></i>
                <div class="code">fa-solid fa-envelope-open-text</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-envelopes-bulk fa-5x"></i>
                <div class="code">fa-solid fa-envelopes-bulk</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-equals fa-5x"></i>
                <div class="code">fa-solid fa-equals</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-eraser fa-5x"></i>
                <div class="code">fa-solid fa-eraser</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ethernet fa-5x"></i>
                <div class="code">fa-solid fa-ethernet</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-euro-sign fa-5x"></i>
                <div class="code">fa-solid fa-euro-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-exclamation fa-5x"></i>
                <div class="code">fa-solid fa-exclamation</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-expand fa-5x"></i>
                <div class="code">fa-solid fa-expand</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-explosion fa-5x"></i>
                <div class="code">fa-solid fa-explosion</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-eye fa-5x"></i>
                <div class="code">fa-solid fa-eye</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-eye-dropper fa-5x"></i>
                <div class="code">fa-solid fa-eye-dropper</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-eye-low-vision fa-5x"></i>
                <div class="code">fa-solid fa-eye-low-vision</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-eye-slash fa-5x"></i>
                <div class="code">fa-solid fa-eye-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-f fa-5x"></i>
                <div class="code">fa-solid fa-f</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-angry fa-5x"></i>
                <div class="code">fa-solid fa-face-angry</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-dizzy fa-5x"></i>
                <div class="code">fa-solid fa-face-dizzy</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-flushed fa-5x"></i>
                <div class="code">fa-solid fa-face-flushed</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-frown fa-5x"></i>
                <div class="code">fa-solid fa-face-frown</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-frown-open fa-5x"></i>
                <div class="code">fa-solid fa-face-frown-open</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grimace fa-5x"></i>
                <div class="code">fa-solid fa-face-grimace</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin fa-5x"></i>
                <div class="code">fa-solid fa-face-grin</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-beam fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-beam</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-beam-sweat fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-beam-sweat</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-hearts fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-hearts</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-squint fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-squint</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-squint-tears fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-squint-tears</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-stars fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-stars</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-tears fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-tears</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-tongue fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-tongue</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-tongue-squint fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-tongue-squint</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-tongue-wink fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-tongue-wink</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-wide fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-wide</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-grin-wink fa-5x"></i>
                <div class="code">fa-solid fa-face-grin-wink</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-kiss fa-5x"></i>
                <div class="code">fa-solid fa-face-kiss</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-kiss-beam fa-5x"></i>
                <div class="code">fa-solid fa-face-kiss-beam</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-kiss-wink-heart fa-5x"></i>
                <div class="code">fa-solid fa-face-kiss-wink-heart</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-laugh fa-5x"></i>
                <div class="code">fa-solid fa-face-laugh</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-laugh-beam fa-5x"></i>
                <div class="code">fa-solid fa-face-laugh-beam</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-laugh-squint fa-5x"></i>
                <div class="code">fa-solid fa-face-laugh-squint</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-laugh-wink fa-5x"></i>
                <div class="code">fa-solid fa-face-laugh-wink</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-meh fa-5x"></i>
                <div class="code">fa-solid fa-face-meh</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-meh-blank fa-5x"></i>
                <div class="code">fa-solid fa-face-meh-blank</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-rolling-eyes fa-5x"></i>
                <div class="code">fa-solid fa-face-rolling-eyes</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-sad-cry fa-5x"></i>
                <div class="code">fa-solid fa-face-sad-cry</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-sad-tear fa-5x"></i>
                <div class="code">fa-solid fa-face-sad-tear</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-smile fa-5x"></i>
                <div class="code">fa-solid fa-face-smile</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-smile-beam fa-5x"></i>
                <div class="code">fa-solid fa-face-smile-beam</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-smile-wink fa-5x"></i>
                <div class="code">fa-solid fa-face-smile-wink</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-surprise fa-5x"></i>
                <div class="code">fa-solid fa-face-surprise</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-face-tired fa-5x"></i>
                <div class="code">fa-solid fa-face-tired</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-fan fa-5x"></i>
                <div class="code">fa-solid fa-fan</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-faucet fa-5x"></i>
                <div class="code">fa-solid fa-faucet</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-faucet-drip fa-5x"></i>
                <div class="code">fa-solid fa-faucet-drip</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-fax fa-5x"></i>
                <div class="code">fa-solid fa-fax</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-feather fa-5x"></i>
                <div class="code">fa-solid fa-feather</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-feather-pointed fa-5x"></i>
                <div class="code">fa-solid fa-feather-pointed</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ferry fa-5x"></i>
                <div class="code">fa-solid fa-ferry</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file fa-5x"></i>
                <div class="code">fa-solid fa-file</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-arrow-down fa-5x"></i>
                <div class="code">fa-solid fa-file-arrow-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-arrow-up fa-5x"></i>
                <div class="code">fa-solid fa-file-arrow-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-audio fa-5x"></i>
                <div class="code">fa-solid fa-file-audio</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-circle-check fa-5x"></i>
                <div class="code">fa-solid fa-file-circle-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-circle-exclamation fa-5x"></i>
                <div class="code">fa-solid fa-file-circle-exclamation</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-circle-minus fa-5x"></i>
                <div class="code">fa-solid fa-file-circle-minus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-circle-plus fa-5x"></i>
                <div class="code">fa-solid fa-file-circle-plus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-circle-question fa-5x"></i>
                <div class="code">fa-solid fa-file-circle-question</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-circle-xmark fa-5x"></i>
                <div class="code">fa-solid fa-file-circle-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-code fa-5x"></i>
                <div class="code">fa-solid fa-file-code</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-contract fa-5x"></i>
                <div class="code">fa-solid fa-file-contract</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-csv fa-5x"></i>
                <div class="code">fa-solid fa-file-csv</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-excel fa-5x"></i>
                <div class="code">fa-solid fa-file-excel</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-export fa-5x"></i>
                <div class="code">fa-solid fa-file-export</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-image fa-5x"></i>
                <div class="code">fa-solid fa-file-image</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-import fa-5x"></i>
                <div class="code">fa-solid fa-file-import</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-invoice fa-5x"></i>
                <div class="code">fa-solid fa-file-invoice</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-invoice-dollar fa-5x"></i>
                <div class="code">fa-solid fa-file-invoice-dollar</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-lines fa-5x"></i>
                <div class="code">fa-solid fa-file-lines</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-medical fa-5x"></i>
                <div class="code">fa-solid fa-file-medical</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-pdf fa-5x"></i>
                <div class="code">fa-solid fa-file-pdf</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-pen fa-5x"></i>
                <div class="code">fa-solid fa-file-pen</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-powerpoint fa-5x"></i>
                <div class="code">fa-solid fa-file-powerpoint</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-prescription fa-5x"></i>
                <div class="code">fa-solid fa-file-prescription</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-shield fa-5x"></i>
                <div class="code">fa-solid fa-file-shield</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-signature fa-5x"></i>
                <div class="code">fa-solid fa-file-signature</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-video fa-5x"></i>
                <div class="code">fa-solid fa-file-video</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-waveform fa-5x"></i>
                <div class="code">fa-solid fa-file-waveform</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-word fa-5x"></i>
                <div class="code">fa-solid fa-file-word</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-file-zipper fa-5x"></i>
                <div class="code">fa-solid fa-file-zipper</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-fill fa-5x"></i>
                <div class="code">fa-solid fa-fill</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-fill-drip fa-5x"></i>
                <div class="code">fa-solid fa-fill-drip</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-film fa-5x"></i>
                <div class="code">fa-solid fa-film</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-filter fa-5x"></i>
                <div class="code">fa-solid fa-filter</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-filter-circle-dollar fa-5x"></i>
                <div class="code">fa-solid fa-filter-circle-dollar</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-filter-circle-xmark fa-5x"></i>
                <div class="code">fa-solid fa-filter-circle-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-fingerprint fa-5x"></i>
                <div class="code">fa-solid fa-fingerprint</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-fire fa-5x"></i>
                <div class="code">fa-solid fa-fire</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-fire-burner fa-5x"></i>
                <div class="code">fa-solid fa-fire-burner</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-fire-extinguisher fa-5x"></i>
                <div class="code">fa-solid fa-fire-extinguisher</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-fire-flame-curved fa-5x"></i>
                <div class="code">fa-solid fa-fire-flame-curved</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-fire-flame-simple fa-5x"></i>
                <div class="code">fa-solid fa-fire-flame-simple</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-fish fa-5x"></i>
                <div class="code">fa-solid fa-fish</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-fish-fins fa-5x"></i>
                <div class="code">fa-solid fa-fish-fins</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-flag fa-5x"></i>
                <div class="code">fa-solid fa-flag</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-flag-checkered fa-5x"></i>
                <div class="code">fa-solid fa-flag-checkered</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-flag-usa fa-5x"></i>
                <div class="code">fa-solid fa-flag-usa</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-flask fa-5x"></i>
                <div class="code">fa-solid fa-flask</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-flask-vial fa-5x"></i>
                <div class="code">fa-solid fa-flask-vial</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-floppy-disk fa-5x"></i>
                <div class="code">fa-solid fa-floppy-disk</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-florin-sign fa-5x"></i>
                <div class="code">fa-solid fa-florin-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-folder fa-5x"></i>
                <div class="code">fa-solid fa-folder</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-folder-closed fa-5x"></i>
                <div class="code">fa-solid fa-folder-closed</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-folder-minus fa-5x"></i>
                <div class="code">fa-solid fa-folder-minus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-folder-open fa-5x"></i>
                <div class="code">fa-solid fa-folder-open</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-folder-plus fa-5x"></i>
                <div class="code">fa-solid fa-folder-plus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-folder-tree fa-5x"></i>
                <div class="code">fa-solid fa-folder-tree</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-font fa-5x"></i>
                <div class="code">fa-solid fa-font</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-font-awesome fa-5x"></i>
                <div class="code">fa-solid fa-font-awesome</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-football fa-5x"></i>
                <div class="code">fa-solid fa-football</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-forward fa-5x"></i>
                <div class="code">fa-solid fa-forward</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-forward-fast fa-5x"></i>
                <div class="code">fa-solid fa-forward-fast</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-forward-step fa-5x"></i>
                <div class="code">fa-solid fa-forward-step</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-franc-sign fa-5x"></i>
                <div class="code">fa-solid fa-franc-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-frog fa-5x"></i>
                <div class="code">fa-solid fa-frog</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-futbol fa-5x"></i>
                <div class="code">fa-solid fa-futbol</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-g fa-5x"></i>
                <div class="code">fa-solid fa-g</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-gamepad fa-5x"></i>
                <div class="code">fa-solid fa-gamepad</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-gas-pump fa-5x"></i>
                <div class="code">fa-solid fa-gas-pump</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-gauge fa-5x"></i>
                <div class="code">fa-solid fa-gauge</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-gauge-high fa-5x"></i>
                <div class="code">fa-solid fa-gauge-high</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-gauge-simple fa-5x"></i>
                <div class="code">fa-solid fa-gauge-simple</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-gauge-simple-high fa-5x"></i>
                <div class="code">fa-solid fa-gauge-simple-high</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-gavel fa-5x"></i>
                <div class="code">fa-solid fa-gavel</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-gear fa-5x"></i>
                <div class="code">fa-solid fa-gear</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-gears fa-5x"></i>
                <div class="code">fa-solid fa-gears</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-gem fa-5x"></i>
                <div class="code">fa-solid fa-gem</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-genderless fa-5x"></i>
                <div class="code">fa-solid fa-genderless</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ghost fa-5x"></i>
                <div class="code">fa-solid fa-ghost</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-gift fa-5x"></i>
                <div class="code">fa-solid fa-gift</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-gifts fa-5x"></i>
                <div class="code">fa-solid fa-gifts</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-glasses fa-5x"></i>
                <div class="code">fa-solid fa-glasses</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-glass-water fa-5x"></i>
                <div class="code">fa-solid fa-glass-water</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-glass-water-droplet fa-5x"></i>
                <div class="code">fa-solid fa-glass-water-droplet</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-globe fa-5x"></i>
                <div class="code">fa-solid fa-globe</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-golf-ball-tee fa-5x"></i>
                <div class="code">fa-solid fa-golf-ball-tee</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-gopuram fa-5x"></i>
                <div class="code">fa-solid fa-gopuram</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-graduation-cap fa-5x"></i>
                <div class="code">fa-solid fa-graduation-cap</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-greater-than fa-5x"></i>
                <div class="code">fa-solid fa-greater-than</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-greater-than-equal fa-5x"></i>
                <div class="code">fa-solid fa-greater-than-equal</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-grip fa-5x"></i>
                <div class="code">fa-solid fa-grip</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-grip-lines fa-5x"></i>
                <div class="code">fa-solid fa-grip-lines</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-grip-lines-vertical fa-5x"></i>
                <div class="code">fa-solid fa-grip-lines-vertical</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-grip-vertical fa-5x"></i>
                <div class="code">fa-solid fa-grip-vertical</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-group-arrows-rotate fa-5x"></i>
                <div class="code">fa-solid fa-group-arrows-rotate</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-guarani-sign fa-5x"></i>
                <div class="code">fa-solid fa-guarani-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-guitar fa-5x"></i>
                <div class="code">fa-solid fa-guitar</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-gun fa-5x"></i>
                <div class="code">fa-solid fa-gun</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-h fa-5x"></i>
                <div class="code">fa-solid fa-h</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hammer fa-5x"></i>
                <div class="code">fa-solid fa-hammer</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hamsa fa-5x"></i>
                <div class="code">fa-solid fa-hamsa</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand fa-5x"></i>
                <div class="code">fa-solid fa-hand</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-back-fist fa-5x"></i>
                <div class="code">fa-solid fa-hand-back-fist</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-handcuffs fa-5x"></i>
                <div class="code">fa-solid fa-handcuffs</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-dots fa-5x"></i>
                <div class="code">fa-solid fa-hand-dots</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-fist fa-5x"></i>
                <div class="code">fa-solid fa-hand-fist</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-holding fa-5x"></i>
                <div class="code">fa-solid fa-hand-holding</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-holding-dollar fa-5x"></i>
                <div class="code">fa-solid fa-hand-holding-dollar</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-holding-droplet fa-5x"></i>
                <div class="code">fa-solid fa-hand-holding-droplet</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-holding-hand fa-5x"></i>
                <div class="code">fa-solid fa-hand-holding-hand</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-holding-heart fa-5x"></i>
                <div class="code">fa-solid fa-hand-holding-heart</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-holding-medical fa-5x"></i>
                <div class="code">fa-solid fa-hand-holding-medical</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-lizard fa-5x"></i>
                <div class="code">fa-solid fa-hand-lizard</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-middle-finger fa-5x"></i>
                <div class="code">fa-solid fa-hand-middle-finger</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-peace fa-5x"></i>
                <div class="code">fa-solid fa-hand-peace</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-point-down fa-5x"></i>
                <div class="code">fa-solid fa-hand-point-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-pointer fa-5x"></i>
                <div class="code">fa-solid fa-hand-pointer</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-point-left fa-5x"></i>
                <div class="code">fa-solid fa-hand-point-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-point-right fa-5x"></i>
                <div class="code">fa-solid fa-hand-point-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-point-up fa-5x"></i>
                <div class="code">fa-solid fa-hand-point-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hands fa-5x"></i>
                <div class="code">fa-solid fa-hands</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hands-asl-interpreting fa-5x"></i>
                <div class="code">fa-solid fa-hands-asl-interpreting</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hands-bound fa-5x"></i>
                <div class="code">fa-solid fa-hands-bound</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hands-bubbles fa-5x"></i>
                <div class="code">fa-solid fa-hands-bubbles</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-scissors fa-5x"></i>
                <div class="code">fa-solid fa-hand-scissors</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hands-clapping fa-5x"></i>
                <div class="code">fa-solid fa-hands-clapping</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-handshake fa-5x"></i>
                <div class="code">fa-solid fa-handshake</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-handshake-angle fa-5x"></i>
                <div class="code">fa-solid fa-handshake-angle</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-handshake-simple fa-5x"></i>
                <div class="code">fa-solid fa-handshake-simple</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-handshake-simple-slash fa-5x"></i>
                <div class="code">fa-solid fa-handshake-simple-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-handshake-slash fa-5x"></i>
                <div class="code">fa-solid fa-handshake-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hands-holding fa-5x"></i>
                <div class="code">fa-solid fa-hands-holding</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hands-holding-child fa-5x"></i>
                <div class="code">fa-solid fa-hands-holding-child</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hands-holding-circle fa-5x"></i>
                <div class="code">fa-solid fa-hands-holding-circle</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-sparkles fa-5x"></i>
                <div class="code">fa-solid fa-hand-sparkles</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hand-spock fa-5x"></i>
                <div class="code">fa-solid fa-hand-spock</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hands-praying fa-5x"></i>
                <div class="code">fa-solid fa-hands-praying</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hanukiah fa-5x"></i>
                <div class="code">fa-solid fa-hanukiah</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hard-drive fa-5x"></i>
                <div class="code">fa-solid fa-hard-drive</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hashtag fa-5x"></i>
                <div class="code">fa-solid fa-hashtag</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hat-cowboy fa-5x"></i>
                <div class="code">fa-solid fa-hat-cowboy</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hat-cowboy-side fa-5x"></i>
                <div class="code">fa-solid fa-hat-cowboy-side</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hat-wizard fa-5x"></i>
                <div class="code">fa-solid fa-hat-wizard</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-heading fa-5x"></i>
                <div class="code">fa-solid fa-heading</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-headphones fa-5x"></i>
                <div class="code">fa-solid fa-headphones</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-headphones-simple fa-5x"></i>
                <div class="code">fa-solid fa-headphones-simple</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-headset fa-5x"></i>
                <div class="code">fa-solid fa-headset</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-head-side-cough fa-5x"></i>
                <div class="code">fa-solid fa-head-side-cough</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-head-side-cough-slash fa-5x"></i>
                <div class="code">fa-solid fa-head-side-cough-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-head-side-mask fa-5x"></i>
                <div class="code">fa-solid fa-head-side-mask</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-head-side-virus fa-5x"></i>
                <div class="code">fa-solid fa-head-side-virus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-heart fa-5x"></i>
                <div class="code">fa-solid fa-heart</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-heart-circle-bolt fa-5x"></i>
                <div class="code">fa-solid fa-heart-circle-bolt</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-heart-circle-check fa-5x"></i>
                <div class="code">fa-solid fa-heart-circle-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-heart-circle-exclamation fa-5x"></i>
                <div class="code">fa-solid fa-heart-circle-exclamation</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-heart-circle-minus fa-5x"></i>
                <div class="code">fa-solid fa-heart-circle-minus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-heart-circle-plus fa-5x"></i>
                <div class="code">fa-solid fa-heart-circle-plus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-heart-circle-xmark fa-5x"></i>
                <div class="code">fa-solid fa-heart-circle-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-heart-crack fa-5x"></i>
                <div class="code">fa-solid fa-heart-crack</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-heart-pulse fa-5x"></i>
                <div class="code">fa-solid fa-heart-pulse</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-helicopter fa-5x"></i>
                <div class="code">fa-solid fa-helicopter</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-helicopter-symbol fa-5x"></i>
                <div class="code">fa-solid fa-helicopter-symbol</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-helmet-safety fa-5x"></i>
                <div class="code">fa-solid fa-helmet-safety</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-helmet-un fa-5x"></i>
                <div class="code">fa-solid fa-helmet-un</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-highlighter fa-5x"></i>
                <div class="code">fa-solid fa-highlighter</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hill-avalanche fa-5x"></i>
                <div class="code">fa-solid fa-hill-avalanche</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hill-rockslide fa-5x"></i>
                <div class="code">fa-solid fa-hill-rockslide</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hippo fa-5x"></i>
                <div class="code">fa-solid fa-hippo</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hockey-puck fa-5x"></i>
                <div class="code">fa-solid fa-hockey-puck</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-holly-berry fa-5x"></i>
                <div class="code">fa-solid fa-holly-berry</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-horse fa-5x"></i>
                <div class="code">fa-solid fa-horse</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-horse-head fa-5x"></i>
                <div class="code">fa-solid fa-horse-head</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hospital fa-5x"></i>
                <div class="code">fa-solid fa-hospital</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hospital-user fa-5x"></i>
                <div class="code">fa-solid fa-hospital-user</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hotdog fa-5x"></i>
                <div class="code">fa-solid fa-hotdog</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hotel fa-5x"></i>
                <div class="code">fa-solid fa-hotel</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hot-tub-person fa-5x"></i>
                <div class="code">fa-solid fa-hot-tub-person</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hourglass fa-5x"></i>
                <div class="code">fa-solid fa-hourglass</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hourglass-end fa-5x"></i>
                <div class="code">fa-solid fa-hourglass-end</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hourglass-half fa-5x"></i>
                <div class="code">fa-solid fa-hourglass-half</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hourglass-start fa-5x"></i>
                <div class="code">fa-solid fa-hourglass-start</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house fa-5x"></i>
                <div class="code">fa-solid fa-house</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-chimney fa-5x"></i>
                <div class="code">fa-solid fa-house-chimney</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-chimney-crack fa-5x"></i>
                <div class="code">fa-solid fa-house-chimney-crack</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-chimney-medical fa-5x"></i>
                <div class="code">fa-solid fa-house-chimney-medical</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-chimney-user fa-5x"></i>
                <div class="code">fa-solid fa-house-chimney-user</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-chimney-window fa-5x"></i>
                <div class="code">fa-solid fa-house-chimney-window</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-circle-check fa-5x"></i>
                <div class="code">fa-solid fa-house-circle-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-circle-exclamation fa-5x"></i>
                <div class="code">fa-solid fa-house-circle-exclamation</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-circle-xmark fa-5x"></i>
                <div class="code">fa-solid fa-house-circle-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-crack fa-5x"></i>
                <div class="code">fa-solid fa-house-crack</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-fire fa-5x"></i>
                <div class="code">fa-solid fa-house-fire</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-flag fa-5x"></i>
                <div class="code">fa-solid fa-house-flag</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-flood-water fa-5x"></i>
                <div class="code">fa-solid fa-house-flood-water</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-flood-water-circle-arrow-right fa-5x"></i>
                <div class="code">fa-solid fa-house-flood-water-circle-arrow-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-laptop fa-5x"></i>
                <div class="code">fa-solid fa-house-laptop</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-lock fa-5x"></i>
                <div class="code">fa-solid fa-house-lock</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-medical fa-5x"></i>
                <div class="code">fa-solid fa-house-medical</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-medical-circle-check fa-5x"></i>
                <div class="code">fa-solid fa-house-medical-circle-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-medical-circle-exclamation fa-5x"></i>
                <div class="code">fa-solid fa-house-medical-circle-exclamation</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-medical-circle-xmark fa-5x"></i>
                <div class="code">fa-solid fa-house-medical-circle-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-medical-flag fa-5x"></i>
                <div class="code">fa-solid fa-house-medical-flag</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-signal fa-5x"></i>
                <div class="code">fa-solid fa-house-signal</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-tsunami fa-5x"></i>
                <div class="code">fa-solid fa-house-tsunami</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-house-user fa-5x"></i>
                <div class="code">fa-solid fa-house-user</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hryvnia-sign fa-5x"></i>
                <div class="code">fa-solid fa-hryvnia-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-hurricane fa-5x"></i>
                <div class="code">fa-solid fa-hurricane</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-i fa-5x"></i>
                <div class="code">fa-solid fa-i</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ice-cream fa-5x"></i>
                <div class="code">fa-solid fa-ice-cream</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-icicles fa-5x"></i>
                <div class="code">fa-solid fa-icicles</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-icons fa-5x"></i>
                <div class="code">fa-solid fa-icons</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-i-cursor fa-5x"></i>
                <div class="code">fa-solid fa-i-cursor</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-id-badge fa-5x"></i>
                <div class="code">fa-solid fa-id-badge</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-id-card fa-5x"></i>
                <div class="code">fa-solid fa-id-card</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-id-card-clip fa-5x"></i>
                <div class="code">fa-solid fa-id-card-clip</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-igloo fa-5x"></i>
                <div class="code">fa-solid fa-igloo</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-image fa-5x"></i>
                <div class="code">fa-solid fa-image</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-image-portrait fa-5x"></i>
                <div class="code">fa-solid fa-image-portrait</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-images fa-5x"></i>
                <div class="code">fa-solid fa-images</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-inbox fa-5x"></i>
                <div class="code">fa-solid fa-inbox</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-indent fa-5x"></i>
                <div class="code">fa-solid fa-indent</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-indian-rupee-sign fa-5x"></i>
                <div class="code">fa-solid fa-indian-rupee-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-industry fa-5x"></i>
                <div class="code">fa-solid fa-industry</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-infinity fa-5x"></i>
                <div class="code">fa-solid fa-infinity</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-info fa-5x"></i>
                <div class="code">fa-solid fa-info</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-italic fa-5x"></i>
                <div class="code">fa-solid fa-italic</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-j fa-5x"></i>
                <div class="code">fa-solid fa-j</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-jar fa-5x"></i>
                <div class="code">fa-solid fa-jar</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-jar-wheat fa-5x"></i>
                <div class="code">fa-solid fa-jar-wheat</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-jedi fa-5x"></i>
                <div class="code">fa-solid fa-jedi</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-jet-fighter fa-5x"></i>
                <div class="code">fa-solid fa-jet-fighter</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-jet-fighter-up fa-5x"></i>
                <div class="code">fa-solid fa-jet-fighter-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-joint fa-5x"></i>
                <div class="code">fa-solid fa-joint</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-jug-detergent fa-5x"></i>
                <div class="code">fa-solid fa-jug-detergent</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-k fa-5x"></i>
                <div class="code">fa-solid fa-k</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-kaaba fa-5x"></i>
                <div class="code">fa-solid fa-kaaba</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-key fa-5x"></i>
                <div class="code">fa-solid fa-key</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-keyboard fa-5x"></i>
                <div class="code">fa-solid fa-keyboard</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-khanda fa-5x"></i>
                <div class="code">fa-solid fa-khanda</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-kip-sign fa-5x"></i>
                <div class="code">fa-solid fa-kip-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-kitchen-set fa-5x"></i>
                <div class="code">fa-solid fa-kitchen-set</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-kit-medical fa-5x"></i>
                <div class="code">fa-solid fa-kit-medical</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-kiwi-bird fa-5x"></i>
                <div class="code">fa-solid fa-kiwi-bird</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-l fa-5x"></i>
                <div class="code">fa-solid fa-l</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-landmark fa-5x"></i>
                <div class="code">fa-solid fa-landmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-landmark-dome fa-5x"></i>
                <div class="code">fa-solid fa-landmark-dome</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-landmark-flag fa-5x"></i>
                <div class="code">fa-solid fa-landmark-flag</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-land-mine-on fa-5x"></i>
                <div class="code">fa-solid fa-land-mine-on</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-language fa-5x"></i>
                <div class="code">fa-solid fa-language</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-laptop fa-5x"></i>
                <div class="code">fa-solid fa-laptop</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-laptop-code fa-5x"></i>
                <div class="code">fa-solid fa-laptop-code</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-laptop-file fa-5x"></i>
                <div class="code">fa-solid fa-laptop-file</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-laptop-medical fa-5x"></i>
                <div class="code">fa-solid fa-laptop-medical</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-lari-sign fa-5x"></i>
                <div class="code">fa-solid fa-lari-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-layer-group fa-5x"></i>
                <div class="code">fa-solid fa-layer-group</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-leaf fa-5x"></i>
                <div class="code">fa-solid fa-leaf</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-left-long fa-5x"></i>
                <div class="code">fa-solid fa-left-long</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-left-right fa-5x"></i>
                <div class="code">fa-solid fa-left-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-lemon fa-5x"></i>
                <div class="code">fa-solid fa-lemon</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-less-than fa-5x"></i>
                <div class="code">fa-solid fa-less-than</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-less-than-equal fa-5x"></i>
                <div class="code">fa-solid fa-less-than-equal</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-life-ring fa-5x"></i>
                <div class="code">fa-solid fa-life-ring</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-lightbulb fa-5x"></i>
                <div class="code">fa-solid fa-lightbulb</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-lines-leaning fa-5x"></i>
                <div class="code">fa-solid fa-lines-leaning</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-link fa-5x"></i>
                <div class="code">fa-solid fa-link</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-link-slash fa-5x"></i>
                <div class="code">fa-solid fa-link-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-lira-sign fa-5x"></i>
                <div class="code">fa-solid fa-lira-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-list fa-5x"></i>
                <div class="code">fa-solid fa-list</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-list-check fa-5x"></i>
                <div class="code">fa-solid fa-list-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-list-ol fa-5x"></i>
                <div class="code">fa-solid fa-list-ol</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-list-ul fa-5x"></i>
                <div class="code">fa-solid fa-list-ul</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-litecoin-sign fa-5x"></i>
                <div class="code">fa-solid fa-litecoin-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-location-arrow fa-5x"></i>
                <div class="code">fa-solid fa-location-arrow</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-location-crosshairs fa-5x"></i>
                <div class="code">fa-solid fa-location-crosshairs</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-location-dot fa-5x"></i>
                <div class="code">fa-solid fa-location-dot</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-location-pin fa-5x"></i>
                <div class="code">fa-solid fa-location-pin</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-location-pin-lock fa-5x"></i>
                <div class="code">fa-solid fa-location-pin-lock</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-lock fa-5x"></i>
                <div class="code">fa-solid fa-lock</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-lock-open fa-5x"></i>
                <div class="code">fa-solid fa-lock-open</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-locust fa-5x"></i>
                <div class="code">fa-solid fa-locust</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-lungs fa-5x"></i>
                <div class="code">fa-solid fa-lungs</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-lungs-virus fa-5x"></i>
                <div class="code">fa-solid fa-lungs-virus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-m fa-5x"></i>
                <div class="code">fa-solid fa-m</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-magnet fa-5x"></i>
                <div class="code">fa-solid fa-magnet</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-magnifying-glass fa-5x"></i>
                <div class="code">fa-solid fa-magnifying-glass</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-magnifying-glass-arrow-right fa-5x"></i>
                <div class="code">fa-solid fa-magnifying-glass-arrow-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-magnifying-glass-chart fa-5x"></i>
                <div class="code">fa-solid fa-magnifying-glass-chart</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-magnifying-glass-dollar fa-5x"></i>
                <div class="code">fa-solid fa-magnifying-glass-dollar</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-magnifying-glass-location fa-5x"></i>
                <div class="code">fa-solid fa-magnifying-glass-location</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-magnifying-glass-minus fa-5x"></i>
                <div class="code">fa-solid fa-magnifying-glass-minus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-magnifying-glass-plus fa-5x"></i>
                <div class="code">fa-solid fa-magnifying-glass-plus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-manat-sign fa-5x"></i>
                <div class="code">fa-solid fa-manat-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-map fa-5x"></i>
                <div class="code">fa-solid fa-map</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-map-location fa-5x"></i>
                <div class="code">fa-solid fa-map-location</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-map-location-dot fa-5x"></i>
                <div class="code">fa-solid fa-map-location-dot</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-map-pin fa-5x"></i>
                <div class="code">fa-solid fa-map-pin</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-marker fa-5x"></i>
                <div class="code">fa-solid fa-marker</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mars fa-5x"></i>
                <div class="code">fa-solid fa-mars</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mars-and-venus fa-5x"></i>
                <div class="code">fa-solid fa-mars-and-venus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mars-and-venus-burst fa-5x"></i>
                <div class="code">fa-solid fa-mars-and-venus-burst</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mars-double fa-5x"></i>
                <div class="code">fa-solid fa-mars-double</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mars-stroke fa-5x"></i>
                <div class="code">fa-solid fa-mars-stroke</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mars-stroke-right fa-5x"></i>
                <div class="code">fa-solid fa-mars-stroke-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mars-stroke-up fa-5x"></i>
                <div class="code">fa-solid fa-mars-stroke-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-martini-glass fa-5x"></i>
                <div class="code">fa-solid fa-martini-glass</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-martini-glass-citrus fa-5x"></i>
                <div class="code">fa-solid fa-martini-glass-citrus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-martini-glass-empty fa-5x"></i>
                <div class="code">fa-solid fa-martini-glass-empty</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mask fa-5x"></i>
                <div class="code">fa-solid fa-mask</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mask-face fa-5x"></i>
                <div class="code">fa-solid fa-mask-face</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-masks-theater fa-5x"></i>
                <div class="code">fa-solid fa-masks-theater</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mask-ventilator fa-5x"></i>
                <div class="code">fa-solid fa-mask-ventilator</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mattress-pillow fa-5x"></i>
                <div class="code">fa-solid fa-mattress-pillow</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-maximize fa-5x"></i>
                <div class="code">fa-solid fa-maximize</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-medal fa-5x"></i>
                <div class="code">fa-solid fa-medal</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-memory fa-5x"></i>
                <div class="code">fa-solid fa-memory</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-menorah fa-5x"></i>
                <div class="code">fa-solid fa-menorah</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mercury fa-5x"></i>
                <div class="code">fa-solid fa-mercury</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-message fa-5x"></i>
                <div class="code">fa-solid fa-message</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-meteor fa-5x"></i>
                <div class="code">fa-solid fa-meteor</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-microchip fa-5x"></i>
                <div class="code">fa-solid fa-microchip</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-microphone fa-5x"></i>
                <div class="code">fa-solid fa-microphone</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-microphone-lines fa-5x"></i>
                <div class="code">fa-solid fa-microphone-lines</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-microphone-lines-slash fa-5x"></i>
                <div class="code">fa-solid fa-microphone-lines-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-microphone-slash fa-5x"></i>
                <div class="code">fa-solid fa-microphone-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-microscope fa-5x"></i>
                <div class="code">fa-solid fa-microscope</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mill-sign fa-5x"></i>
                <div class="code">fa-solid fa-mill-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-minimize fa-5x"></i>
                <div class="code">fa-solid fa-minimize</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-minus fa-5x"></i>
                <div class="code">fa-solid fa-minus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mitten fa-5x"></i>
                <div class="code">fa-solid fa-mitten</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mobile fa-5x"></i>
                <div class="code">fa-solid fa-mobile</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mobile-button fa-5x"></i>
                <div class="code">fa-solid fa-mobile-button</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mobile-retro fa-5x"></i>
                <div class="code">fa-solid fa-mobile-retro</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mobile-screen fa-5x"></i>
                <div class="code">fa-solid fa-mobile-screen</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mobile-screen-button fa-5x"></i>
                <div class="code">fa-solid fa-mobile-screen-button</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-money-bill fa-5x"></i>
                <div class="code">fa-solid fa-money-bill</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-money-bill-1 fa-5x"></i>
                <div class="code">fa-solid fa-money-bill-1</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-money-bill-1-wave fa-5x"></i>
                <div class="code">fa-solid fa-money-bill-1-wave</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-money-bills fa-5x"></i>
                <div class="code">fa-solid fa-money-bills</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-money-bill-transfer fa-5x"></i>
                <div class="code">fa-solid fa-money-bill-transfer</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-money-bill-trend-up fa-5x"></i>
                <div class="code">fa-solid fa-money-bill-trend-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-money-bill-wave fa-5x"></i>
                <div class="code">fa-solid fa-money-bill-wave</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-money-bill-wheat fa-5x"></i>
                <div class="code">fa-solid fa-money-bill-wheat</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-money-check fa-5x"></i>
                <div class="code">fa-solid fa-money-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-money-check-dollar fa-5x"></i>
                <div class="code">fa-solid fa-money-check-dollar</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-monument fa-5x"></i>
                <div class="code">fa-solid fa-monument</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-moon fa-5x"></i>
                <div class="code">fa-solid fa-moon</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mortar-pestle fa-5x"></i>
                <div class="code">fa-solid fa-mortar-pestle</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mosque fa-5x"></i>
                <div class="code">fa-solid fa-mosque</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mosquito fa-5x"></i>
                <div class="code">fa-solid fa-mosquito</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mosquito-net fa-5x"></i>
                <div class="code">fa-solid fa-mosquito-net</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-motorcycle fa-5x"></i>
                <div class="code">fa-solid fa-motorcycle</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mound fa-5x"></i>
                <div class="code">fa-solid fa-mound</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mountain fa-5x"></i>
                <div class="code">fa-solid fa-mountain</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mountain-city fa-5x"></i>
                <div class="code">fa-solid fa-mountain-city</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mountain-sun fa-5x"></i>
                <div class="code">fa-solid fa-mountain-sun</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mug-hot fa-5x"></i>
                <div class="code">fa-solid fa-mug-hot</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-mug-saucer fa-5x"></i>
                <div class="code">fa-solid fa-mug-saucer</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-music fa-5x"></i>
                <div class="code">fa-solid fa-music</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-n fa-5x"></i>
                <div class="code">fa-solid fa-n</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-naira-sign fa-5x"></i>
                <div class="code">fa-solid fa-naira-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-network-wired fa-5x"></i>
                <div class="code">fa-solid fa-network-wired</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-neuter fa-5x"></i>
                <div class="code">fa-solid fa-neuter</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-newspaper fa-5x"></i>
                <div class="code">fa-solid fa-newspaper</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-notdef fa-5x"></i>
                <div class="code">fa-solid fa-notdef</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-not-equal fa-5x"></i>
                <div class="code">fa-solid fa-not-equal</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-notes-medical fa-5x"></i>
                <div class="code">fa-solid fa-notes-medical</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-note-sticky fa-5x"></i>
                <div class="code">fa-solid fa-note-sticky</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-o fa-5x"></i>
                <div class="code">fa-solid fa-o</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-object-group fa-5x"></i>
                <div class="code">fa-solid fa-object-group</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-object-ungroup fa-5x"></i>
                <div class="code">fa-solid fa-object-ungroup</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-oil-can fa-5x"></i>
                <div class="code">fa-solid fa-oil-can</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-oil-well fa-5x"></i>
                <div class="code">fa-solid fa-oil-well</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-om fa-5x"></i>
                <div class="code">fa-solid fa-om</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-otter fa-5x"></i>
                <div class="code">fa-solid fa-otter</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-outdent fa-5x"></i>
                <div class="code">fa-solid fa-outdent</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-p fa-5x"></i>
                <div class="code">fa-solid fa-p</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-pager fa-5x"></i>
                <div class="code">fa-solid fa-pager</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-paintbrush fa-5x"></i>
                <div class="code">fa-solid fa-paintbrush</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-paint-roller fa-5x"></i>
                <div class="code">fa-solid fa-paint-roller</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-palette fa-5x"></i>
                <div class="code">fa-solid fa-palette</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-pallet fa-5x"></i>
                <div class="code">fa-solid fa-pallet</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-panorama fa-5x"></i>
                <div class="code">fa-solid fa-panorama</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-paperclip fa-5x"></i>
                <div class="code">fa-solid fa-paperclip</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-paper-plane fa-5x"></i>
                <div class="code">fa-solid fa-paper-plane</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-parachute-box fa-5x"></i>
                <div class="code">fa-solid fa-parachute-box</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-paragraph fa-5x"></i>
                <div class="code">fa-solid fa-paragraph</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-passport fa-5x"></i>
                <div class="code">fa-solid fa-passport</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-paste fa-5x"></i>
                <div class="code">fa-solid fa-paste</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-pause fa-5x"></i>
                <div class="code">fa-solid fa-pause</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-paw fa-5x"></i>
                <div class="code">fa-solid fa-paw</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-peace fa-5x"></i>
                <div class="code">fa-solid fa-peace</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-pen fa-5x"></i>
                <div class="code">fa-solid fa-pen</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-pencil fa-5x"></i>
                <div class="code">fa-solid fa-pencil</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-pen-clip fa-5x"></i>
                <div class="code">fa-solid fa-pen-clip</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-pen-fancy fa-5x"></i>
                <div class="code">fa-solid fa-pen-fancy</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-pen-nib fa-5x"></i>
                <div class="code">fa-solid fa-pen-nib</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-pen-ruler fa-5x"></i>
                <div class="code">fa-solid fa-pen-ruler</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-pen-to-square fa-5x"></i>
                <div class="code">fa-solid fa-pen-to-square</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-people-arrows fa-5x"></i>
                <div class="code">fa-solid fa-people-arrows</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-people-carry-box fa-5x"></i>
                <div class="code">fa-solid fa-people-carry-box</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-people-group fa-5x"></i>
                <div class="code">fa-solid fa-people-group</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-people-line fa-5x"></i>
                <div class="code">fa-solid fa-people-line</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-people-pulling fa-5x"></i>
                <div class="code">fa-solid fa-people-pulling</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-people-robbery fa-5x"></i>
                <div class="code">fa-solid fa-people-robbery</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-people-roof fa-5x"></i>
                <div class="code">fa-solid fa-people-roof</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-pepper-hot fa-5x"></i>
                <div class="code">fa-solid fa-pepper-hot</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-percent fa-5x"></i>
                <div class="code">fa-solid fa-percent</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person fa-5x"></i>
                <div class="code">fa-solid fa-person</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-arrow-down-to-line fa-5x"></i>
                <div class="code">fa-solid fa-person-arrow-down-to-line</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-arrow-up-from-line fa-5x"></i>
                <div class="code">fa-solid fa-person-arrow-up-from-line</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-biking fa-5x"></i>
                <div class="code">fa-solid fa-person-biking</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-booth fa-5x"></i>
                <div class="code">fa-solid fa-person-booth</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-breastfeeding fa-5x"></i>
                <div class="code">fa-solid fa-person-breastfeeding</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-burst fa-5x"></i>
                <div class="code">fa-solid fa-person-burst</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-cane fa-5x"></i>
                <div class="code">fa-solid fa-person-cane</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-chalkboard fa-5x"></i>
                <div class="code">fa-solid fa-person-chalkboard</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-circle-check fa-5x"></i>
                <div class="code">fa-solid fa-person-circle-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-circle-exclamation fa-5x"></i>
                <div class="code">fa-solid fa-person-circle-exclamation</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-circle-minus fa-5x"></i>
                <div class="code">fa-solid fa-person-circle-minus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-circle-plus fa-5x"></i>
                <div class="code">fa-solid fa-person-circle-plus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-circle-question fa-5x"></i>
                <div class="code">fa-solid fa-person-circle-question</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-circle-xmark fa-5x"></i>
                <div class="code">fa-solid fa-person-circle-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-digging fa-5x"></i>
                <div class="code">fa-solid fa-person-digging</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-dots-from-line fa-5x"></i>
                <div class="code">fa-solid fa-person-dots-from-line</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-dress fa-5x"></i>
                <div class="code">fa-solid fa-person-dress</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-dress-burst fa-5x"></i>
                <div class="code">fa-solid fa-person-dress-burst</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-drowning fa-5x"></i>
                <div class="code">fa-solid fa-person-drowning</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-falling fa-5x"></i>
                <div class="code">fa-solid fa-person-falling</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-falling-burst fa-5x"></i>
                <div class="code">fa-solid fa-person-falling-burst</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-half-dress fa-5x"></i>
                <div class="code">fa-solid fa-person-half-dress</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-harassing fa-5x"></i>
                <div class="code">fa-solid fa-person-harassing</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-hiking fa-5x"></i>
                <div class="code">fa-solid fa-person-hiking</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-military-pointing fa-5x"></i>
                <div class="code">fa-solid fa-person-military-pointing</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-military-rifle fa-5x"></i>
                <div class="code">fa-solid fa-person-military-rifle</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-military-to-person fa-5x"></i>
                <div class="code">fa-solid fa-person-military-to-person</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-praying fa-5x"></i>
                <div class="code">fa-solid fa-person-praying</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-pregnant fa-5x"></i>
                <div class="code">fa-solid fa-person-pregnant</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-rays fa-5x"></i>
                <div class="code">fa-solid fa-person-rays</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-rifle fa-5x"></i>
                <div class="code">fa-solid fa-person-rifle</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-running fa-5x"></i>
                <div class="code">fa-solid fa-person-running</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-shelter fa-5x"></i>
                <div class="code">fa-solid fa-person-shelter</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-skating fa-5x"></i>
                <div class="code">fa-solid fa-person-skating</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-skiing fa-5x"></i>
                <div class="code">fa-solid fa-person-skiing</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-skiing-nordic fa-5x"></i>
                <div class="code">fa-solid fa-person-skiing-nordic</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-snowboarding fa-5x"></i>
                <div class="code">fa-solid fa-person-snowboarding</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-swimming fa-5x"></i>
                <div class="code">fa-solid fa-person-swimming</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-through-window fa-5x"></i>
                <div class="code">fa-solid fa-person-through-window</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-walking fa-5x"></i>
                <div class="code">fa-solid fa-person-walking</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-walking-arrow-loop-left fa-5x"></i>
                <div class="code">fa-solid fa-person-walking-arrow-loop-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-walking-arrow-right fa-5x"></i>
                <div class="code">fa-solid fa-person-walking-arrow-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-walking-dashed-line-arrow-right fa-5x"></i>
                <div class="code">fa-solid fa-person-walking-dashed-line-arrow-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-walking-luggage fa-5x"></i>
                <div class="code">fa-solid fa-person-walking-luggage</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-person-walking-with-cane fa-5x"></i>
                <div class="code">fa-solid fa-person-walking-with-cane</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-peseta-sign fa-5x"></i>
                <div class="code">fa-solid fa-peseta-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-peso-sign fa-5x"></i>
                <div class="code">fa-solid fa-peso-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-phone fa-5x"></i>
                <div class="code">fa-solid fa-phone</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-phone-flip fa-5x"></i>
                <div class="code">fa-solid fa-phone-flip</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-phone-slash fa-5x"></i>
                <div class="code">fa-solid fa-phone-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-phone-volume fa-5x"></i>
                <div class="code">fa-solid fa-phone-volume</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-photo-film fa-5x"></i>
                <div class="code">fa-solid fa-photo-film</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-piggy-bank fa-5x"></i>
                <div class="code">fa-solid fa-piggy-bank</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-pills fa-5x"></i>
                <div class="code">fa-solid fa-pills</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-pizza-slice fa-5x"></i>
                <div class="code">fa-solid fa-pizza-slice</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-place-of-worship fa-5x"></i>
                <div class="code">fa-solid fa-place-of-worship</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-plane fa-5x"></i>
                <div class="code">fa-solid fa-plane</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-plane-arrival fa-5x"></i>
                <div class="code">fa-solid fa-plane-arrival</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-plane-circle-check fa-5x"></i>
                <div class="code">fa-solid fa-plane-circle-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-plane-circle-exclamation fa-5x"></i>
                <div class="code">fa-solid fa-plane-circle-exclamation</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-plane-circle-xmark fa-5x"></i>
                <div class="code">fa-solid fa-plane-circle-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-plane-departure fa-5x"></i>
                <div class="code">fa-solid fa-plane-departure</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-plane-lock fa-5x"></i>
                <div class="code">fa-solid fa-plane-lock</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-plane-slash fa-5x"></i>
                <div class="code">fa-solid fa-plane-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-plane-up fa-5x"></i>
                <div class="code">fa-solid fa-plane-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-plant-wilt fa-5x"></i>
                <div class="code">fa-solid fa-plant-wilt</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-plate-wheat fa-5x"></i>
                <div class="code">fa-solid fa-plate-wheat</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-play fa-5x"></i>
                <div class="code">fa-solid fa-play</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-plug fa-5x"></i>
                <div class="code">fa-solid fa-plug</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-plug-circle-bolt fa-5x"></i>
                <div class="code">fa-solid fa-plug-circle-bolt</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-plug-circle-check fa-5x"></i>
                <div class="code">fa-solid fa-plug-circle-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-plug-circle-exclamation fa-5x"></i>
                <div class="code">fa-solid fa-plug-circle-exclamation</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-plug-circle-minus fa-5x"></i>
                <div class="code">fa-solid fa-plug-circle-minus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-plug-circle-plus fa-5x"></i>
                <div class="code">fa-solid fa-plug-circle-plus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-plug-circle-xmark fa-5x"></i>
                <div class="code">fa-solid fa-plug-circle-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-plus fa-5x"></i>
                <div class="code">fa-solid fa-plus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-plus-minus fa-5x"></i>
                <div class="code">fa-solid fa-plus-minus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-podcast fa-5x"></i>
                <div class="code">fa-solid fa-podcast</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-poo fa-5x"></i>
                <div class="code">fa-solid fa-poo</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-poop fa-5x"></i>
                <div class="code">fa-solid fa-poop</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-poo-storm fa-5x"></i>
                <div class="code">fa-solid fa-poo-storm</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-power-off fa-5x"></i>
                <div class="code">fa-solid fa-power-off</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-prescription fa-5x"></i>
                <div class="code">fa-solid fa-prescription</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-prescription-bottle fa-5x"></i>
                <div class="code">fa-solid fa-prescription-bottle</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-prescription-bottle-medical fa-5x"></i>
                <div class="code">fa-solid fa-prescription-bottle-medical</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-print fa-5x"></i>
                <div class="code">fa-solid fa-print</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-pump-medical fa-5x"></i>
                <div class="code">fa-solid fa-pump-medical</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-pump-soap fa-5x"></i>
                <div class="code">fa-solid fa-pump-soap</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-puzzle-piece fa-5x"></i>
                <div class="code">fa-solid fa-puzzle-piece</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-q fa-5x"></i>
                <div class="code">fa-solid fa-q</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-qrcode fa-5x"></i>
                <div class="code">fa-solid fa-qrcode</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-question fa-5x"></i>
                <div class="code">fa-solid fa-question</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-quote-left fa-5x"></i>
                <div class="code">fa-solid fa-quote-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-quote-right fa-5x"></i>
                <div class="code">fa-solid fa-quote-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-r fa-5x"></i>
                <div class="code">fa-solid fa-r</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-radiation fa-5x"></i>
                <div class="code">fa-solid fa-radiation</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-radio fa-5x"></i>
                <div class="code">fa-solid fa-radio</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-rainbow fa-5x"></i>
                <div class="code">fa-solid fa-rainbow</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ranking-star fa-5x"></i>
                <div class="code">fa-solid fa-ranking-star</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-receipt fa-5x"></i>
                <div class="code">fa-solid fa-receipt</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-record-vinyl fa-5x"></i>
                <div class="code">fa-solid fa-record-vinyl</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-rectangle-ad fa-5x"></i>
                <div class="code">fa-solid fa-rectangle-ad</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-rectangle-list fa-5x"></i>
                <div class="code">fa-solid fa-rectangle-list</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-rectangle-xmark fa-5x"></i>
                <div class="code">fa-solid fa-rectangle-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-recycle fa-5x"></i>
                <div class="code">fa-solid fa-recycle</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-registered fa-5x"></i>
                <div class="code">fa-solid fa-registered</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-repeat fa-5x"></i>
                <div class="code">fa-solid fa-repeat</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-reply fa-5x"></i>
                <div class="code">fa-solid fa-reply</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-reply-all fa-5x"></i>
                <div class="code">fa-solid fa-reply-all</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-republican fa-5x"></i>
                <div class="code">fa-solid fa-republican</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-restroom fa-5x"></i>
                <div class="code">fa-solid fa-restroom</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-retweet fa-5x"></i>
                <div class="code">fa-solid fa-retweet</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ribbon fa-5x"></i>
                <div class="code">fa-solid fa-ribbon</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-right-from-bracket fa-5x"></i>
                <div class="code">fa-solid fa-right-from-bracket</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-right-left fa-5x"></i>
                <div class="code">fa-solid fa-right-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-right-long fa-5x"></i>
                <div class="code">fa-solid fa-right-long</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-right-to-bracket fa-5x"></i>
                <div class="code">fa-solid fa-right-to-bracket</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ring fa-5x"></i>
                <div class="code">fa-solid fa-ring</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-road fa-5x"></i>
                <div class="code">fa-solid fa-road</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-road-barrier fa-5x"></i>
                <div class="code">fa-solid fa-road-barrier</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-road-bridge fa-5x"></i>
                <div class="code">fa-solid fa-road-bridge</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-road-circle-check fa-5x"></i>
                <div class="code">fa-solid fa-road-circle-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-road-circle-exclamation fa-5x"></i>
                <div class="code">fa-solid fa-road-circle-exclamation</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-road-circle-xmark fa-5x"></i>
                <div class="code">fa-solid fa-road-circle-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-road-lock fa-5x"></i>
                <div class="code">fa-solid fa-road-lock</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-road-spikes fa-5x"></i>
                <div class="code">fa-solid fa-road-spikes</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-robot fa-5x"></i>
                <div class="code">fa-solid fa-robot</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-rocket fa-5x"></i>
                <div class="code">fa-solid fa-rocket</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-rotate fa-5x"></i>
                <div class="code">fa-solid fa-rotate</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-rotate-left fa-5x"></i>
                <div class="code">fa-solid fa-rotate-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-rotate-right fa-5x"></i>
                <div class="code">fa-solid fa-rotate-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-route fa-5x"></i>
                <div class="code">fa-solid fa-route</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-rss fa-5x"></i>
                <div class="code">fa-solid fa-rss</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ruble-sign fa-5x"></i>
                <div class="code">fa-solid fa-ruble-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-rug fa-5x"></i>
                <div class="code">fa-solid fa-rug</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ruler fa-5x"></i>
                <div class="code">fa-solid fa-ruler</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ruler-combined fa-5x"></i>
                <div class="code">fa-solid fa-ruler-combined</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ruler-horizontal fa-5x"></i>
                <div class="code">fa-solid fa-ruler-horizontal</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ruler-vertical fa-5x"></i>
                <div class="code">fa-solid fa-ruler-vertical</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-rupee-sign fa-5x"></i>
                <div class="code">fa-solid fa-rupee-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-rupiah-sign fa-5x"></i>
                <div class="code">fa-solid fa-rupiah-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-s fa-5x"></i>
                <div class="code">fa-solid fa-s</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-sack-dollar fa-5x"></i>
                <div class="code">fa-solid fa-sack-dollar</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-sack-xmark fa-5x"></i>
                <div class="code">fa-solid fa-sack-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-sailboat fa-5x"></i>
                <div class="code">fa-solid fa-sailboat</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-satellite fa-5x"></i>
                <div class="code">fa-solid fa-satellite</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-satellite-dish fa-5x"></i>
                <div class="code">fa-solid fa-satellite-dish</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-scale-balanced fa-5x"></i>
                <div class="code">fa-solid fa-scale-balanced</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-scale-unbalanced fa-5x"></i>
                <div class="code">fa-solid fa-scale-unbalanced</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-scale-unbalanced-flip fa-5x"></i>
                <div class="code">fa-solid fa-scale-unbalanced-flip</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-school fa-5x"></i>
                <div class="code">fa-solid fa-school</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-school-circle-check fa-5x"></i>
                <div class="code">fa-solid fa-school-circle-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-school-circle-exclamation fa-5x"></i>
                <div class="code">fa-solid fa-school-circle-exclamation</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-school-circle-xmark fa-5x"></i>
                <div class="code">fa-solid fa-school-circle-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-school-flag fa-5x"></i>
                <div class="code">fa-solid fa-school-flag</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-school-lock fa-5x"></i>
                <div class="code">fa-solid fa-school-lock</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-scissors fa-5x"></i>
                <div class="code">fa-solid fa-scissors</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-screwdriver fa-5x"></i>
                <div class="code">fa-solid fa-screwdriver</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-screwdriver-wrench fa-5x"></i>
                <div class="code">fa-solid fa-screwdriver-wrench</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-scroll fa-5x"></i>
                <div class="code">fa-solid fa-scroll</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-scroll-torah fa-5x"></i>
                <div class="code">fa-solid fa-scroll-torah</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-sd-card fa-5x"></i>
                <div class="code">fa-solid fa-sd-card</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-section fa-5x"></i>
                <div class="code">fa-solid fa-section</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-seedling fa-5x"></i>
                <div class="code">fa-solid fa-seedling</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-server fa-5x"></i>
                <div class="code">fa-solid fa-server</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-shapes fa-5x"></i>
                <div class="code">fa-solid fa-shapes</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-share fa-5x"></i>
                <div class="code">fa-solid fa-share</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-share-from-square fa-5x"></i>
                <div class="code">fa-solid fa-share-from-square</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-share-nodes fa-5x"></i>
                <div class="code">fa-solid fa-share-nodes</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-sheet-plastic fa-5x"></i>
                <div class="code">fa-solid fa-sheet-plastic</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-shekel-sign fa-5x"></i>
                <div class="code">fa-solid fa-shekel-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-shield fa-5x"></i>
                <div class="code">fa-solid fa-shield</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-shield-cat fa-5x"></i>
                <div class="code">fa-solid fa-shield-cat</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-shield-dog fa-5x"></i>
                <div class="code">fa-solid fa-shield-dog</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-shield-halved fa-5x"></i>
                <div class="code">fa-solid fa-shield-halved</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-shield-heart fa-5x"></i>
                <div class="code">fa-solid fa-shield-heart</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-shield-virus fa-5x"></i>
                <div class="code">fa-solid fa-shield-virus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ship fa-5x"></i>
                <div class="code">fa-solid fa-ship</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-shirt fa-5x"></i>
                <div class="code">fa-solid fa-shirt</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-shoe-prints fa-5x"></i>
                <div class="code">fa-solid fa-shoe-prints</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-shop fa-5x"></i>
                <div class="code">fa-solid fa-shop</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-shop-lock fa-5x"></i>
                <div class="code">fa-solid fa-shop-lock</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-shop-slash fa-5x"></i>
                <div class="code">fa-solid fa-shop-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-shower fa-5x"></i>
                <div class="code">fa-solid fa-shower</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-shrimp fa-5x"></i>
                <div class="code">fa-solid fa-shrimp</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-shuffle fa-5x"></i>
                <div class="code">fa-solid fa-shuffle</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-shuttle-space fa-5x"></i>
                <div class="code">fa-solid fa-shuttle-space</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-signal fa-5x"></i>
                <div class="code">fa-solid fa-signal</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-signature fa-5x"></i>
                <div class="code">fa-solid fa-signature</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-sign-hanging fa-5x"></i>
                <div class="code">fa-solid fa-sign-hanging</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-signs-post fa-5x"></i>
                <div class="code">fa-solid fa-signs-post</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-sim-card fa-5x"></i>
                <div class="code">fa-solid fa-sim-card</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-sink fa-5x"></i>
                <div class="code">fa-solid fa-sink</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-sitemap fa-5x"></i>
                <div class="code">fa-solid fa-sitemap</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-skull fa-5x"></i>
                <div class="code">fa-solid fa-skull</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-skull-crossbones fa-5x"></i>
                <div class="code">fa-solid fa-skull-crossbones</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-slash fa-5x"></i>
                <div class="code">fa-solid fa-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-sleigh fa-5x"></i>
                <div class="code">fa-solid fa-sleigh</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-sliders fa-5x"></i>
                <div class="code">fa-solid fa-sliders</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-smog fa-5x"></i>
                <div class="code">fa-solid fa-smog</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-smoking fa-5x"></i>
                <div class="code">fa-solid fa-smoking</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-snowflake fa-5x"></i>
                <div class="code">fa-solid fa-snowflake</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-snowman fa-5x"></i>
                <div class="code">fa-solid fa-snowman</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-snowplow fa-5x"></i>
                <div class="code">fa-solid fa-snowplow</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-soap fa-5x"></i>
                <div class="code">fa-solid fa-soap</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-socks fa-5x"></i>
                <div class="code">fa-solid fa-socks</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-solar-panel fa-5x"></i>
                <div class="code">fa-solid fa-solar-panel</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-sort fa-5x"></i>
                <div class="code">fa-solid fa-sort</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-sort-down fa-5x"></i>
                <div class="code">fa-solid fa-sort-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-sort-up fa-5x"></i>
                <div class="code">fa-solid fa-sort-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-spa fa-5x"></i>
                <div class="code">fa-solid fa-spa</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-spaghetti-monster-flying fa-5x"></i>
                <div class="code">fa-solid fa-spaghetti-monster-flying</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-spell-check fa-5x"></i>
                <div class="code">fa-solid fa-spell-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-spider fa-5x"></i>
                <div class="code">fa-solid fa-spider</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-spinner fa-5x"></i>
                <div class="code">fa-solid fa-spinner</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-splotch fa-5x"></i>
                <div class="code">fa-solid fa-splotch</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-spoon fa-5x"></i>
                <div class="code">fa-solid fa-spoon</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-spray-can fa-5x"></i>
                <div class="code">fa-solid fa-spray-can</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-spray-can-sparkles fa-5x"></i>
                <div class="code">fa-solid fa-spray-can-sparkles</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square fa-5x"></i>
                <div class="code">fa-solid fa-square</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-arrow-up-right fa-5x"></i>
                <div class="code">fa-solid fa-square-arrow-up-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-caret-down fa-5x"></i>
                <div class="code">fa-solid fa-square-caret-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-caret-left fa-5x"></i>
                <div class="code">fa-solid fa-square-caret-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-caret-right fa-5x"></i>
                <div class="code">fa-solid fa-square-caret-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-caret-up fa-5x"></i>
                <div class="code">fa-solid fa-square-caret-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-check fa-5x"></i>
                <div class="code">fa-solid fa-square-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-envelope fa-5x"></i>
                <div class="code">fa-solid fa-square-envelope</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-full fa-5x"></i>
                <div class="code">fa-solid fa-square-full</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-h fa-5x"></i>
                <div class="code">fa-solid fa-square-h</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-minus fa-5x"></i>
                <div class="code">fa-solid fa-square-minus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-nfi fa-5x"></i>
                <div class="code">fa-solid fa-square-nfi</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-parking fa-5x"></i>
                <div class="code">fa-solid fa-square-parking</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-pen fa-5x"></i>
                <div class="code">fa-solid fa-square-pen</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-person-confined fa-5x"></i>
                <div class="code">fa-solid fa-square-person-confined</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-phone fa-5x"></i>
                <div class="code">fa-solid fa-square-phone</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-phone-flip fa-5x"></i>
                <div class="code">fa-solid fa-square-phone-flip</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-plus fa-5x"></i>
                <div class="code">fa-solid fa-square-plus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-poll-horizontal fa-5x"></i>
                <div class="code">fa-solid fa-square-poll-horizontal</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-poll-vertical fa-5x"></i>
                <div class="code">fa-solid fa-square-poll-vertical</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-root-variable fa-5x"></i>
                <div class="code">fa-solid fa-square-root-variable</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-rss fa-5x"></i>
                <div class="code">fa-solid fa-square-rss</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-share-nodes fa-5x"></i>
                <div class="code">fa-solid fa-square-share-nodes</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-up-right fa-5x"></i>
                <div class="code">fa-solid fa-square-up-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-virus fa-5x"></i>
                <div class="code">fa-solid fa-square-virus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-square-xmark fa-5x"></i>
                <div class="code">fa-solid fa-square-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-staff-snake fa-5x"></i>
                <div class="code">fa-solid fa-staff-snake</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-stairs fa-5x"></i>
                <div class="code">fa-solid fa-stairs</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-stamp fa-5x"></i>
                <div class="code">fa-solid fa-stamp</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-stapler fa-5x"></i>
                <div class="code">fa-solid fa-stapler</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-star fa-5x"></i>
                <div class="code">fa-solid fa-star</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-star-and-crescent fa-5x"></i>
                <div class="code">fa-solid fa-star-and-crescent</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-star-half fa-5x"></i>
                <div class="code">fa-solid fa-star-half</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-star-half-stroke fa-5x"></i>
                <div class="code">fa-solid fa-star-half-stroke</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-star-of-david fa-5x"></i>
                <div class="code">fa-solid fa-star-of-david</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-star-of-life fa-5x"></i>
                <div class="code">fa-solid fa-star-of-life</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-sterling-sign fa-5x"></i>
                <div class="code">fa-solid fa-sterling-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-stethoscope fa-5x"></i>
                <div class="code">fa-solid fa-stethoscope</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-stop fa-5x"></i>
                <div class="code">fa-solid fa-stop</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-stopwatch fa-5x"></i>
                <div class="code">fa-solid fa-stopwatch</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-stopwatch-20 fa-5x"></i>
                <div class="code">fa-solid fa-stopwatch-20</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-store fa-5x"></i>
                <div class="code">fa-solid fa-store</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-store-slash fa-5x"></i>
                <div class="code">fa-solid fa-store-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-street-view fa-5x"></i>
                <div class="code">fa-solid fa-street-view</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-strikethrough fa-5x"></i>
                <div class="code">fa-solid fa-strikethrough</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-stroopwafel fa-5x"></i>
                <div class="code">fa-solid fa-stroopwafel</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-subscript fa-5x"></i>
                <div class="code">fa-solid fa-subscript</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-suitcase fa-5x"></i>
                <div class="code">fa-solid fa-suitcase</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-suitcase-medical fa-5x"></i>
                <div class="code">fa-solid fa-suitcase-medical</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-suitcase-rolling fa-5x"></i>
                <div class="code">fa-solid fa-suitcase-rolling</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-sun fa-5x"></i>
                <div class="code">fa-solid fa-sun</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-sun-plant-wilt fa-5x"></i>
                <div class="code">fa-solid fa-sun-plant-wilt</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-superscript fa-5x"></i>
                <div class="code">fa-solid fa-superscript</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-swatchbook fa-5x"></i>
                <div class="code">fa-solid fa-swatchbook</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-synagogue fa-5x"></i>
                <div class="code">fa-solid fa-synagogue</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-syringe fa-5x"></i>
                <div class="code">fa-solid fa-syringe</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-t fa-5x"></i>
                <div class="code">fa-solid fa-t</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-table fa-5x"></i>
                <div class="code">fa-solid fa-table</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-table-cells fa-5x"></i>
                <div class="code">fa-solid fa-table-cells</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-table-cells-large fa-5x"></i>
                <div class="code">fa-solid fa-table-cells-large</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-table-columns fa-5x"></i>
                <div class="code">fa-solid fa-table-columns</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-table-list fa-5x"></i>
                <div class="code">fa-solid fa-table-list</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tablet fa-5x"></i>
                <div class="code">fa-solid fa-tablet</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tablet-button fa-5x"></i>
                <div class="code">fa-solid fa-tablet-button</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-table-tennis-paddle-ball fa-5x"></i>
                <div class="code">fa-solid fa-table-tennis-paddle-ball</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tablets fa-5x"></i>
                <div class="code">fa-solid fa-tablets</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tablet-screen-button fa-5x"></i>
                <div class="code">fa-solid fa-tablet-screen-button</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tachograph-digital fa-5x"></i>
                <div class="code">fa-solid fa-tachograph-digital</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tag fa-5x"></i>
                <div class="code">fa-solid fa-tag</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tags fa-5x"></i>
                <div class="code">fa-solid fa-tags</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tape fa-5x"></i>
                <div class="code">fa-solid fa-tape</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tarp fa-5x"></i>
                <div class="code">fa-solid fa-tarp</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tarp-droplet fa-5x"></i>
                <div class="code">fa-solid fa-tarp-droplet</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-taxi fa-5x"></i>
                <div class="code">fa-solid fa-taxi</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-teeth fa-5x"></i>
                <div class="code">fa-solid fa-teeth</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-teeth-open fa-5x"></i>
                <div class="code">fa-solid fa-teeth-open</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-temperature-arrow-down fa-5x"></i>
                <div class="code">fa-solid fa-temperature-arrow-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-temperature-arrow-up fa-5x"></i>
                <div class="code">fa-solid fa-temperature-arrow-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-temperature-empty fa-5x"></i>
                <div class="code">fa-solid fa-temperature-empty</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-temperature-full fa-5x"></i>
                <div class="code">fa-solid fa-temperature-full</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-temperature-half fa-5x"></i>
                <div class="code">fa-solid fa-temperature-half</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-temperature-high fa-5x"></i>
                <div class="code">fa-solid fa-temperature-high</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-temperature-low fa-5x"></i>
                <div class="code">fa-solid fa-temperature-low</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-temperature-quarter fa-5x"></i>
                <div class="code">fa-solid fa-temperature-quarter</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-temperature-three-quarters fa-5x"></i>
                <div class="code">fa-solid fa-temperature-three-quarters</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tenge-sign fa-5x"></i>
                <div class="code">fa-solid fa-tenge-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tent fa-5x"></i>
                <div class="code">fa-solid fa-tent</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tent-arrow-down-to-line fa-5x"></i>
                <div class="code">fa-solid fa-tent-arrow-down-to-line</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tent-arrow-left-right fa-5x"></i>
                <div class="code">fa-solid fa-tent-arrow-left-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tent-arrows-down fa-5x"></i>
                <div class="code">fa-solid fa-tent-arrows-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tent-arrow-turn-left fa-5x"></i>
                <div class="code">fa-solid fa-tent-arrow-turn-left</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tents fa-5x"></i>
                <div class="code">fa-solid fa-tents</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-terminal fa-5x"></i>
                <div class="code">fa-solid fa-terminal</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-text-height fa-5x"></i>
                <div class="code">fa-solid fa-text-height</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-text-slash fa-5x"></i>
                <div class="code">fa-solid fa-text-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-text-width fa-5x"></i>
                <div class="code">fa-solid fa-text-width</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-thermometer fa-5x"></i>
                <div class="code">fa-solid fa-thermometer</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-thumbs-down fa-5x"></i>
                <div class="code">fa-solid fa-thumbs-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-thumbs-up fa-5x"></i>
                <div class="code">fa-solid fa-thumbs-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-thumbtack fa-5x"></i>
                <div class="code">fa-solid fa-thumbtack</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ticket fa-5x"></i>
                <div class="code">fa-solid fa-ticket</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-ticket-simple fa-5x"></i>
                <div class="code">fa-solid fa-ticket-simple</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-timeline fa-5x"></i>
                <div class="code">fa-solid fa-timeline</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-toggle-off fa-5x"></i>
                <div class="code">fa-solid fa-toggle-off</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-toggle-on fa-5x"></i>
                <div class="code">fa-solid fa-toggle-on</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-toilet fa-5x"></i>
                <div class="code">fa-solid fa-toilet</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-toilet-paper fa-5x"></i>
                <div class="code">fa-solid fa-toilet-paper</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-toilet-paper-slash fa-5x"></i>
                <div class="code">fa-solid fa-toilet-paper-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-toilet-portable fa-5x"></i>
                <div class="code">fa-solid fa-toilet-portable</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-toilets-portable fa-5x"></i>
                <div class="code">fa-solid fa-toilets-portable</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-toolbox fa-5x"></i>
                <div class="code">fa-solid fa-toolbox</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tooth fa-5x"></i>
                <div class="code">fa-solid fa-tooth</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-torii-gate fa-5x"></i>
                <div class="code">fa-solid fa-torii-gate</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tornado fa-5x"></i>
                <div class="code">fa-solid fa-tornado</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tower-broadcast fa-5x"></i>
                <div class="code">fa-solid fa-tower-broadcast</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tower-cell fa-5x"></i>
                <div class="code">fa-solid fa-tower-cell</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tower-observation fa-5x"></i>
                <div class="code">fa-solid fa-tower-observation</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tractor fa-5x"></i>
                <div class="code">fa-solid fa-tractor</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-trademark fa-5x"></i>
                <div class="code">fa-solid fa-trademark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-traffic-light fa-5x"></i>
                <div class="code">fa-solid fa-traffic-light</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-trailer fa-5x"></i>
                <div class="code">fa-solid fa-trailer</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-train fa-5x"></i>
                <div class="code">fa-solid fa-train</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-train-subway fa-5x"></i>
                <div class="code">fa-solid fa-train-subway</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-train-tram fa-5x"></i>
                <div class="code">fa-solid fa-train-tram</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-transgender fa-5x"></i>
                <div class="code">fa-solid fa-transgender</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-trash fa-5x"></i>
                <div class="code">fa-solid fa-trash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-trash-arrow-up fa-5x"></i>
                <div class="code">fa-solid fa-trash-arrow-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-trash-can fa-5x"></i>
                <div class="code">fa-solid fa-trash-can</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-trash-can-arrow-up fa-5x"></i>
                <div class="code">fa-solid fa-trash-can-arrow-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tree fa-5x"></i>
                <div class="code">fa-solid fa-tree</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tree-city fa-5x"></i>
                <div class="code">fa-solid fa-tree-city</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-triangle-exclamation fa-5x"></i>
                <div class="code">fa-solid fa-triangle-exclamation</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-trophy fa-5x"></i>
                <div class="code">fa-solid fa-trophy</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-trowel fa-5x"></i>
                <div class="code">fa-solid fa-trowel</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-trowel-bricks fa-5x"></i>
                <div class="code">fa-solid fa-trowel-bricks</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-truck fa-5x"></i>
                <div class="code">fa-solid fa-truck</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-truck-arrow-right fa-5x"></i>
                <div class="code">fa-solid fa-truck-arrow-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-truck-droplet fa-5x"></i>
                <div class="code">fa-solid fa-truck-droplet</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-truck-fast fa-5x"></i>
                <div class="code">fa-solid fa-truck-fast</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-truck-field fa-5x"></i>
                <div class="code">fa-solid fa-truck-field</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-truck-field-un fa-5x"></i>
                <div class="code">fa-solid fa-truck-field-un</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-truck-front fa-5x"></i>
                <div class="code">fa-solid fa-truck-front</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-truck-medical fa-5x"></i>
                <div class="code">fa-solid fa-truck-medical</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-truck-monster fa-5x"></i>
                <div class="code">fa-solid fa-truck-monster</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-truck-moving fa-5x"></i>
                <div class="code">fa-solid fa-truck-moving</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-truck-pickup fa-5x"></i>
                <div class="code">fa-solid fa-truck-pickup</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-truck-plane fa-5x"></i>
                <div class="code">fa-solid fa-truck-plane</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-truck-ramp-box fa-5x"></i>
                <div class="code">fa-solid fa-truck-ramp-box</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tty fa-5x"></i>
                <div class="code">fa-solid fa-tty</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-turkish-lira-sign fa-5x"></i>
                <div class="code">fa-solid fa-turkish-lira-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-turn-down fa-5x"></i>
                <div class="code">fa-solid fa-turn-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-turn-up fa-5x"></i>
                <div class="code">fa-solid fa-turn-up</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-tv fa-5x"></i>
                <div class="code">fa-solid fa-tv</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-u fa-5x"></i>
                <div class="code">fa-solid fa-u</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-umbrella fa-5x"></i>
                <div class="code">fa-solid fa-umbrella</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-umbrella-beach fa-5x"></i>
                <div class="code">fa-solid fa-umbrella-beach</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-underline fa-5x"></i>
                <div class="code">fa-solid fa-underline</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-universal-access fa-5x"></i>
                <div class="code">fa-solid fa-universal-access</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-unlock fa-5x"></i>
                <div class="code">fa-solid fa-unlock</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-unlock-keyhole fa-5x"></i>
                <div class="code">fa-solid fa-unlock-keyhole</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-up-down fa-5x"></i>
                <div class="code">fa-solid fa-up-down</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-up-down-left-right fa-5x"></i>
                <div class="code">fa-solid fa-up-down-left-right</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-upload fa-5x"></i>
                <div class="code">fa-solid fa-upload</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-up-long fa-5x"></i>
                <div class="code">fa-solid fa-up-long</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-up-right-and-down-left-from-center fa-5x"></i>
                <div class="code">fa-solid fa-up-right-and-down-left-from-center</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-up-right-from-square fa-5x"></i>
                <div class="code">fa-solid fa-up-right-from-square</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user fa-5x"></i>
                <div class="code">fa-solid fa-user</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-astronaut fa-5x"></i>
                <div class="code">fa-solid fa-user-astronaut</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-check fa-5x"></i>
                <div class="code">fa-solid fa-user-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-clock fa-5x"></i>
                <div class="code">fa-solid fa-user-clock</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-doctor fa-5x"></i>
                <div class="code">fa-solid fa-user-doctor</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-gear fa-5x"></i>
                <div class="code">fa-solid fa-user-gear</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-graduate fa-5x"></i>
                <div class="code">fa-solid fa-user-graduate</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-group fa-5x"></i>
                <div class="code">fa-solid fa-user-group</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-injured fa-5x"></i>
                <div class="code">fa-solid fa-user-injured</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-large fa-5x"></i>
                <div class="code">fa-solid fa-user-large</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-large-slash fa-5x"></i>
                <div class="code">fa-solid fa-user-large-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-lock fa-5x"></i>
                <div class="code">fa-solid fa-user-lock</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-minus fa-5x"></i>
                <div class="code">fa-solid fa-user-minus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-ninja fa-5x"></i>
                <div class="code">fa-solid fa-user-ninja</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-nurse fa-5x"></i>
                <div class="code">fa-solid fa-user-nurse</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-pen fa-5x"></i>
                <div class="code">fa-solid fa-user-pen</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-plus fa-5x"></i>
                <div class="code">fa-solid fa-user-plus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-users fa-5x"></i>
                <div class="code">fa-solid fa-users</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-users-between-lines fa-5x"></i>
                <div class="code">fa-solid fa-users-between-lines</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-secret fa-5x"></i>
                <div class="code">fa-solid fa-user-secret</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-users-gear fa-5x"></i>
                <div class="code">fa-solid fa-users-gear</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-shield fa-5x"></i>
                <div class="code">fa-solid fa-user-shield</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-slash fa-5x"></i>
                <div class="code">fa-solid fa-user-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-users-line fa-5x"></i>
                <div class="code">fa-solid fa-users-line</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-users-rays fa-5x"></i>
                <div class="code">fa-solid fa-users-rays</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-users-rectangle fa-5x"></i>
                <div class="code">fa-solid fa-users-rectangle</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-users-slash fa-5x"></i>
                <div class="code">fa-solid fa-users-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-users-viewfinder fa-5x"></i>
                <div class="code">fa-solid fa-users-viewfinder</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-tag fa-5x"></i>
                <div class="code">fa-solid fa-user-tag</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-tie fa-5x"></i>
                <div class="code">fa-solid fa-user-tie</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-user-xmark fa-5x"></i>
                <div class="code">fa-solid fa-user-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-utensils fa-5x"></i>
                <div class="code">fa-solid fa-utensils</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-v fa-5x"></i>
                <div class="code">fa-solid fa-v</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-van-shuttle fa-5x"></i>
                <div class="code">fa-solid fa-van-shuttle</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-vault fa-5x"></i>
                <div class="code">fa-solid fa-vault</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-vector-square fa-5x"></i>
                <div class="code">fa-solid fa-vector-square</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-venus fa-5x"></i>
                <div class="code">fa-solid fa-venus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-venus-double fa-5x"></i>
                <div class="code">fa-solid fa-venus-double</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-venus-mars fa-5x"></i>
                <div class="code">fa-solid fa-venus-mars</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-vest fa-5x"></i>
                <div class="code">fa-solid fa-vest</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-vest-patches fa-5x"></i>
                <div class="code">fa-solid fa-vest-patches</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-vial fa-5x"></i>
                <div class="code">fa-solid fa-vial</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-vial-circle-check fa-5x"></i>
                <div class="code">fa-solid fa-vial-circle-check</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-vials fa-5x"></i>
                <div class="code">fa-solid fa-vials</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-vial-virus fa-5x"></i>
                <div class="code">fa-solid fa-vial-virus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-video fa-5x"></i>
                <div class="code">fa-solid fa-video</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-video-slash fa-5x"></i>
                <div class="code">fa-solid fa-video-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-vihara fa-5x"></i>
                <div class="code">fa-solid fa-vihara</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-virus fa-5x"></i>
                <div class="code">fa-solid fa-virus</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-virus-covid fa-5x"></i>
                <div class="code">fa-solid fa-virus-covid</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-virus-covid-slash fa-5x"></i>
                <div class="code">fa-solid fa-virus-covid-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-viruses fa-5x"></i>
                <div class="code">fa-solid fa-viruses</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-virus-slash fa-5x"></i>
                <div class="code">fa-solid fa-virus-slash</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-voicemail fa-5x"></i>
                <div class="code">fa-solid fa-voicemail</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-volcano fa-5x"></i>
                <div class="code">fa-solid fa-volcano</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-volleyball fa-5x"></i>
                <div class="code">fa-solid fa-volleyball</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-volume-high fa-5x"></i>
                <div class="code">fa-solid fa-volume-high</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-volume-low fa-5x"></i>
                <div class="code">fa-solid fa-volume-low</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-volume-off fa-5x"></i>
                <div class="code">fa-solid fa-volume-off</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-volume-xmark fa-5x"></i>
                <div class="code">fa-solid fa-volume-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-vr-cardboard fa-5x"></i>
                <div class="code">fa-solid fa-vr-cardboard</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-w fa-5x"></i>
                <div class="code">fa-solid fa-w</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-walkie-talkie fa-5x"></i>
                <div class="code">fa-solid fa-walkie-talkie</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-wallet fa-5x"></i>
                <div class="code">fa-solid fa-wallet</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-wand-magic fa-5x"></i>
                <div class="code">fa-solid fa-wand-magic</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-wand-magic-sparkles fa-5x"></i>
                <div class="code">fa-solid fa-wand-magic-sparkles</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-wand-sparkles fa-5x"></i>
                <div class="code">fa-solid fa-wand-sparkles</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-warehouse fa-5x"></i>
                <div class="code">fa-solid fa-warehouse</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-water fa-5x"></i>
                <div class="code">fa-solid fa-water</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-water-ladder fa-5x"></i>
                <div class="code">fa-solid fa-water-ladder</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-wave-square fa-5x"></i>
                <div class="code">fa-solid fa-wave-square</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-weight-hanging fa-5x"></i>
                <div class="code">fa-solid fa-weight-hanging</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-weight-scale fa-5x"></i>
                <div class="code">fa-solid fa-weight-scale</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-wheat-awn fa-5x"></i>
                <div class="code">fa-solid fa-wheat-awn</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-wheat-awn-circle-exclamation fa-5x"></i>
                <div class="code">fa-solid fa-wheat-awn-circle-exclamation</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-wheelchair fa-5x"></i>
                <div class="code">fa-solid fa-wheelchair</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-wheelchair-move fa-5x"></i>
                <div class="code">fa-solid fa-wheelchair-move</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-whiskey-glass fa-5x"></i>
                <div class="code">fa-solid fa-whiskey-glass</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-wifi fa-5x"></i>
                <div class="code">fa-solid fa-wifi</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-wind fa-5x"></i>
                <div class="code">fa-solid fa-wind</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-window-maximize fa-5x"></i>
                <div class="code">fa-solid fa-window-maximize</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-window-minimize fa-5x"></i>
                <div class="code">fa-solid fa-window-minimize</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-window-restore fa-5x"></i>
                <div class="code">fa-solid fa-window-restore</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-wine-bottle fa-5x"></i>
                <div class="code">fa-solid fa-wine-bottle</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-wine-glass fa-5x"></i>
                <div class="code">fa-solid fa-wine-glass</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-wine-glass-empty fa-5x"></i>
                <div class="code">fa-solid fa-wine-glass-empty</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-won-sign fa-5x"></i>
                <div class="code">fa-solid fa-won-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-worm fa-5x"></i>
                <div class="code">fa-solid fa-worm</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-wrench fa-5x"></i>
                <div class="code">fa-solid fa-wrench</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-x fa-5x"></i>
                <div class="code">fa-solid fa-x</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-xmark fa-5x"></i>
                <div class="code">fa-solid fa-xmark</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-xmarks-lines fa-5x"></i>
                <div class="code">fa-solid fa-xmarks-lines</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-x-ray fa-5x"></i>
                <div class="code">fa-solid fa-x-ray</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-y fa-5x"></i>
                <div class="code">fa-solid fa-y</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-yen-sign fa-5x"></i>
                <div class="code">fa-solid fa-yen-sign</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-yin-yang fa-5x"></i>
                <div class="code">fa-solid fa-yin-yang</div>
            </div></li>
            <li><div>
                <i class="fa-solid fa-z fa-5x"></i>
                <div class="code">fa-solid fa-z</div>
            </div></li>
        </ul>
<!--
        <h2 id="unicode-">unicode引用</h2>
        <hr>

        <p>unicode是字体在网页端最原始的应用方式，特点是：</p>
        <ul>
        <li>兼容性最好，支持ie6+，及所有现代浏览器。</li>
        <li>支持按字体的方式去动态调整图标大小，颜色等等。</li>
        <li>但是因为是字体，所以不支持多色。只能使用平台里单色的图标，就算项目里有多色图标也会自动去色。</li>
        </ul>
        <blockquote>
        <p>注意：新版iconfont支持多色图标，这些多色图标在unicode模式下将不能使用，如果有需求建议使用symbol的引用方式</p>
        </blockquote>
        
        <h3 id="-">挑选相应图标并获取字体编码，应用于页面</h3>
        <pre><code class="lang-js hljs javascript">&lt;i <span class="hljs-class"><span class="hljs-keyword">class</span></span>=<span class="hljs-string">"iconfont"</span>&gt;&amp;#x33;<span class="xml"><span class="hljs-tag">&lt;/<span class="hljs-name">i</span>&gt;</span></span></code></pre>

        <blockquote>
        <p>"iconfont"是你项目下的font-family。可以通过编辑项目查看，默认是"iconfont"。</p>
        </blockquote>
-->
    </div>


</body>
<script defer src="./fonts/fontawesome/js/brands.js"></script>
<script defer src="./fonts/fontawesome/js/solid.js"></script>
<script defer src="./fonts/fontawesome/js/fontawesome.js"></script>
<script type="text/javascript" src="./js/jquery.min.js"></script>
<script src="./lib/layui/layui.js" charset="utf-8"></script>
<script>
    layui.use(function(){
        var layer = layui.layer;
        var index = parent.layer.getFrameIndex(window.name);
        $(".icon_lists > li").each(function(){
            $(this).click(function(){
                //layer.msg($(this).html());
                //layer.msg($(this).text());
                parent.layui.$('#edit-iconfont').val($(this).find(".code").text());
                parent.layer.close(index);
            });
        });
    });
</script>
</html>
END;
?>