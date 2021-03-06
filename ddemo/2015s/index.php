<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">

<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
<meta content="yes" name="apple-mobile-web-app-capable"/>
<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
<meta content="telephone=no" name="format-detection"/>

<title>百度祝你元旦快乐</title>

<style>

    #body {
        margin: 0;
        padding: 0;
        background: #fff;
        color: #555;
        font-family: 'Avenir Next', Avenir, 'Helvetica Neue', Helvetica, 'Lantinghei SC', 'Hiragino Sans GB', 'Microsoft YaHei';
        font-size: 12px;
        -webkit-font-smoothing: antialiased;
        -moz-font-smoothing: antialiased;
    }

    #body .hide {
        display: none;
    }

    #body .big {
        font-size: 18px;
        color: #D00;
    }

    #body .rotated {
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
    }

    #body .c {
        margin: 10px;
        box-shadow: 0 0 2px rgba(0, 0, 0, .5);
    }

    /*主场景*/
    #canvas {
        display: block;
        background-color: #fff;
        position: absolute;
        z-index: 1;
        box-shadow: 0 0 2px rgba(0, 0, 0, .5);
        cursor: pointer;
    }

    .canvas_pc {
        width: 980px;
        height: 552px;
        left: 50%;
        top: 50%;
        margin: -276px 0 0 -490px;

    }

    /*加载页*/
    #loading_wrap {
        width: 100%;
        height: 100%;
        background: #fff;
        position: absolute;
        display: block;
        z-index: 2;
    }

    #loading_gif {
        position: absolute;
        width: 75px;
        height: 75px;
        left: 50%;
        top: 0;
        margin-left: -37px;
    }

    #loading_main {
        position: absolute;
        width: 400px;
        height: 30px;
        padding-top: 75px;
        left: 50%;
        top: 40%;
        margin-left: -200px;
        margin-top: -15px;
        font-size: 14px;
        line-height: 30px;
        text-align: center;

    }

    #init,
    #lowScreen,
    #unSupportBrowser,
    #networkSlower,
    #readyGo {
        position: absolute;
        width: 100%;
        text-align: center;
        left: 0;
        bottom: -40px;

        opacity: 0;
        transition: all 1s;

        -webkit-opacity: 0;
        -webkit-transition: all 1s;

        -moz-opacity: 0;
        -moz-transition: all 1s;
    }

    #loading_main .showing {
        bottom: 0;

        opacity: 1;
        -webkit-opacity: 1;
        -moz-opacity: 1;
    }

    #go {
        display: inline-block;
        width: 26px;
        height: 28px;
        line-height: 28px;
        font-size: 14px;
        color: #fff;
        background: #f00;
        -moz-border-radius: 13px; /* Firefox */
        -webkit-border-radius: 13px; /* Safari 和 Chrome */
        border-radius: 13px; /* Opera 10.5+, 以及使用了IE-CSS3的IE浏览器 */
        position: relative;
    }

    #go:after {
        content: ' ';
        display: block;
        width: 1px;
        height: 30px;
        background: red;
        position: absolute;
        left: 12px;
        top: 24px;

    }

    /*微信分享*/
    #weixin_share {
        width: 100%;
        height: 100%;
        overflow: hidden;
        position: absolute;
        left: 0;
        top: 0;
        background-color: #000;
        background-color: rgba(0, 0, 0, .5);
        z-index: 999;
    }

    #weixin_share .list {
        padding: 10%;
        color: #fff;
        font-size: 14px;
        line-height: 20px;

    }

    #weixin_share .list .item {
        padding-left: 30px;
        padding-bottom: 20px;
        position: relative;
    }

    #weixin_share .list .li {
        display: block;
        width: 20px;
        height: 20px;
        line-height: 20px;
        background: #d00;
        border-radius: 50%;
        text-align: center;
        margin-right: 10px;
        position: absolute;
        left: 0;
        top: 0;
    }

    /*日志*/
    #log {
        position: absolute;
        width: 50%;
        height: 50%;
        top: 5%;
        left: 5%;

        overflow: auto;
        font-size: 12px;
        background: #eee;
        z-index: 999;
        opacity: .5;
        -webkit-opacity: .5;
    }
</style>

</head>

<body id="body">

<canvas id="canvas" width="100" height="100">您的浏览器不支持canvas。</canvas>
<div id="log" class="hide"></div>
<div id="weixin_share" class="hide">

    <div class="list">
        <div class="item"><span class="li">1</span>点击微信右上角『...』进行分享</div>
        <div class="item"><span class="li">2</span>复制网址 <span id="location"></span></div>
        <div class="item"><span class="li">3</span>扫描如下二维码进行分享
            <br><br>
            <img src="http://s1.bdstatic.com/r/www/cache/holiday/2015newyear/img/qrcode.png" width="140" height="140">
        </div>
    </div>
</div>

<div id="loading_wrap">

    <div id="loading_main">

        <img id="loading_gif" src="http://s1.bdstatic.com/r/www/cache/holiday/2015newyear/img/loading.gif" width="75" height="75"/>
        <span id="init"> 加载中，请稍候... </span>
        <span id="readyGo" onclick="load.status('startGame')"><span id="tip"><span class="big">点气球</span>，赢新年祝福 </span><b id="go">Go</b></span></span>
        <span id="networkSlower">抱歉，您当前网速过慢，请稍后重试</span>
        <span id="unSupportBrowser">抱歉，您当前的浏览器无法支持游戏，请更换浏览器尝试</span>
        <span id="lowScreen">抱歉，您的设备无法支持游戏，请更换设备尝试</span>

    </div>
</div>

<div id="script" class="hide"></div>

<script type="text/javascript">
    var g = function (id) {
        return document.getElementById(id);
    }
    var u = navigator.userAgent;

    var r_path = 'http://s1.bdstatic.com/r/www/cache/holiday/2015newyear/img';

    //  微信分享提示
    g('location').innerHTML = location.href;
    g('weixin_share').onclick = function () {
        this.className = 'hide';
    }

    //  输出主代码
    // var html = ['<script type="text/javascript" src="http://s1.bdstatic.com/r/www/cache/holiday/2015newyear/js/index.'];
    // html.push(u.indexOf('Android') > -1 ? 1 : 2);
    // html.push('x.1.js"><\/script>');
    // document.write(html.join(''));

    var html = ['<script type="text/javascript" src="js.php?f=index.'];
    html.push(u.indexOf('Android') > -1 ? 1 : 2);
    html.push('x.js"><\/script>');
    document.write(html.join(''));

    g('loading_gif').onclick = function () {
        g('loading_gif').c = g('loading_gif').c ? g('loading_gif').c + 1 : 1;
        if (g('loading_gif').c >= 5) {
            g('loading_wrap').className = 'hide';
            game.config.pause = 0;
        }
    }
</script>

<script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?6df91c0f07edca07f3bd1758af24ff30";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

</body>
</html>

