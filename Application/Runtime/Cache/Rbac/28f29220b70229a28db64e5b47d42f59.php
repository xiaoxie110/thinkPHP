<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ThinkPHP管理系统登录</title>
<link rel="stylesheet" type="text/css" href="/thinkPHP/Public/Css/style.css" />
<script type="text/javascript" src="/thinkPHP/Public/Js/Base.js"></script>
<script type="text/javascript" src="/thinkPHP/Public/Js/prototype.js"></script>
<script type="text/javascript" src="/thinkPHP/Public/Js/mootools.js"></script>
<script type="text/javascript" src="/thinkPHP/Public/Js/Think/ThinkAjax.js"></script>
<script type="text/javascript" src="/thinkPHP/Public/Js/common.js"></script>
 <script language="JavaScript">
<!--
var PUBLIC	 =	 '/thinkPHP/Public';
function keydown(e){
	var e = e || event;
	if (e.keyCode==13)
	{
	ThinkAjax.sendForm('form1','/thinkPHP/Rbac/Public/checkLogin/',loginHandle,'result');
	}
}
function fleshVerify(){ 
	//重载验证码
	var timenow = new Date().getTime();
	$('verifyImg').src= '/thinkPHP/Rbac/Public/verify/'+timenow;
}
//-->
</script>
</head>
<body onLoad="document.login.account.focus()" >
<form method='post' name="login" id="form1" ACTION="/thinkPHP/Rbac/Public/checkLogin">
<div class="tCenter hMargin">
<table id="checkList" class="login shadow" cellpadding=0 cellspacing=0 >
<tr><td height="3" colspan="2" class="topTd" ></td></tr>
<tr class="row" ><Th colspan="2" class="tCenter space" ><img src="/thinkPHP/Public/Images/preview_f2.png" width="32" height="32" border="0" alt="" align="absmiddle"> ThinkPHP管理系统登录</th></tr>
<tr><td height="3" colspan="2" class="topTd" ></td></tr>
<tr class="row" ><td class="tRight" width="25%">帐 号：</td><td><input type="text" class="medium bLeftRequire" check="Require" warning="请输入帐号" name="account"></td></tr>
<tr class="row" ><td class="tRight">密 码：</td><td><input type="password" class="medium bLeftRequire" check="Require" warning="请输入密码" name="password"></td></tr>
<tr class="row" ><td class="tRight">验证码：</td><td><input type="text" onKeyDown="keydown(event)" class="small bLeftRequire" check="Require" warning="请输入验证码" name="verify"> <img id="verifyImg" SRC="/thinkPHP/Rbac/Public/verify/" onClick="fleshVerify()" BORDER="0" ALT="点击刷新验证码" style="cursor:pointer" align="absmiddle"></td></tr>
<tr class="row" ><td class="tCenter" align="justify" colspan="2">
<input type="submit" value="登 录" class="submit medium hMargin">
</td></tr>
<tr><td height="3" colspan="2" class="bottomTd" ></td></tr>
</table>
<div class="result">测试账号(用户名/密码) 管理员：admin/admin 领导：leader/leader 员工：member/member 演示：demo/demo 本系统仅用于学习用途</div>
</div>
</form>
</body>
</html>