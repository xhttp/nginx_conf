<?php
session_start();

if(!isset($_SESSION['USER_NAME'])) {
    header('Location: login.php');
    exit();
}

$action = isset($_GET['action']) ? strval($_GET['action']) : '';
?>
<html>
<head>
<title>nginx配置下发系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
body{margin:0px;}
body,td{font: 12px Arial,Tahoma;line-height: 16px;}
a {color: #00f;text-decoration:underline;}
a:hover{color: #f00;text-decoration:none;}
.alt1 td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#f1f1f1;padding:5px 10px 5px 5px;border-right: 1px solid #ddd;}
.alt2 td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#f9f9f9;padding:5px 10px 5px 5px;border-right: 1px solid #ddd;}
.focus td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#d6e9c6;padding:5px 10px 5px 5px;}
.head td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#e9e9e9;padding:5px 10px 5px 5px;font-weight:bold;}
.head td span{font-weight:normal;}

.clearfix:after { content: "."; display: block; height: 0; clear: both; visibility: hidden; }
.clearfix { display: inline-block; }
clearfix { display: block; }
.clear { clear:both; height:0; font:0/0 Arial; visibility:hidden; }

#left {width:19%;float:left;}
#right {width:80%;float:right;}
#main {width:100%;padding-top:10px;}
</style>
</head>
<body>

<div style="width:100%;margin:0px auto;border: 1px solid #ccc;">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
 <tbody>
 <tr class="head">
   <td width="150"><img src="/images/nginx.gif" border="0"></td>
   <td>nginx配置下发系统 <span style="float: right;">您的IP：192.168.198.128　|　系统时间:2014-02-08 16:07:40　｜　<a href="">退出</a></span></td>
 </tr>
</tbody>
</table>


<div class="clearfix" id="main">
    <div id="left">
        <ul>
            <li><a href="">192.168.0.1</a></li>
        </ul>
    </div>

    <div id="right">
        <form name="frmScan" method="post" action="">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td><input type="button" name="btnHost" id="btnHost" value="添加主机" onclick="javascript: window.location.href='?action=add';"></td>
                <td width="20" style="vertical-align:middle; padding-left:5px;">IP:</td>
                <td width="690">
                    <input type="text" name="ip" id="ip" style="width:200px" value="">
                    &nbsp;&nbsp;<input type="submit" name="btnScan" id="btnScan" value="查找"></td>
                </tr>
            </table>
        </form>
        <div style="padding:10px; background-color:#ccc">
<?php
if($action == '') {
} else if($action == 'add') {
    echo '添加配置';
}
?>
        </div>
<?php
if($action == '') {
?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr class="head">
            <td width="15" align="center">No.</td>
            <td width="350">恶意文件</td>
            <td width="100">所在行号</td>
            <td width="300">详细内容</td>
            </tr>
            <tr class='alt2' onmouseover='this.className="focus";' onmouseout='this.className="alt2";'>
            <td>1</td>
            <td>/data/www/tcp.php</td>
            <td>第 5 行</td>
            <td>$sock = fsockopen(&quot;udp://192.168.0.1&quot;,53);
            </td>
            </tr>
        </table>
<?php
} else if($action == 'add') {
?>
        <form name="frmSave" method="post" action="?action=save">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr class="alt2">
                <td>主机IP：</td>
                <td><input type="text" name="host" id="host" style="width:200px" value=""></td>
            </tr>
            <tr class="alt2">
                <td>文件名：</td>
                <td><input type="text" name="file" id="file" style="width:500px" value=""></td>
            </tr>
            <tr class="alt2">
                <td>配置内容：</td>
                <td><textarea name="conf" id="conf" style="width:600px; height:300px" value=""></textarea></td>
            </tr>
            <tr class="alt2">
                <td>&nbsp;</td>
                <td><input type="submit" name="btnSave" id="btnSave" value="保存"></td>
            </tr>
        </table>
        </form>
<?php
}
?>
    </div>
</div>
</div>
</body>
</html>
