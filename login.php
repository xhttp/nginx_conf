<?php
session_start();

define('USER_NAME', 'admin');
define('PASS_WORD', 'admin');

if(!isset($_SESSION['USER_NAME']) && isset($_POST['username']) && isset($_POST['username']) && ($_POST['username'] === USER_NAME) && (md5($_POST['password']) == md5(PASS_WORD))) {
    $_SESSION['USER_NAME'] = USER_NAME;
    header("Location: /");
} else {
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
</style>
</head>

<body>
<center>
<img src="/images/nginx.gif" border="0"><br/>nginx配置下发系统<br/><br/><br/><br/><form id="frmlogin" name="frmlogin" method="post" action="">用户名: <input type="text" name="username" id="username" /> 密码: <input type="password" name="password" id="password" /> <input type="submit" name="btnLogin" id="btnLogin" value="登陆" /></form>
</center>
</body>
</html>
<?php
}
?>
