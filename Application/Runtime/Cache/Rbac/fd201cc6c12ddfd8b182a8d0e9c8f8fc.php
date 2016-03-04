<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改密码</title>
<link rel="stylesheet" type="text/css" href="/thinkPHP/Public/Css/blue.css" />
<script type="text/javascript" src="/thinkPHP/Public/Js/Base.js"></script>
<script type="text/javascript" src="/thinkPHP/Public/Js/prototype.js"></script>
<script type="text/javascript" src="/thinkPHP/Public/Js/mootools.js"></script>
<script type="text/javascript" src="/thinkPHP/Public/Js/Ajax/ThinkAjax.js"></script>
<script type="text/javascript" src="/thinkPHP/Public/Js/Form/CheckForm.js"></script>
<script type="text/javascript" src="/thinkPHP/Public/Js/common.js"></script>
<script language="JavaScript">
<!--
function fleshVerify(){
//重载验证码
var timenow = new Date().getTime();
$('verifyImg').src= '/thinkPHP/Rbac/Public/verify/'+timenow;
}	
//-->
</script>
</head>

<body onLoad="document.login.oldpassword.focus()" >
<form method='post' name="login" action="/thinkPHP/Rbac/Public/changePwd/">
<div class="tCenter hMargin">
<table id="checkList" class="login" cellpadding=0 cellspacing=0 >
<tr><td height="3" colspan="2" class="topTd" ></td></tr>
<tr class="row" ><Th colspan="2" class="tCenter space">  修改密码</th></tr>
<tr><td height="3" colspan="2" class="topTd" ></td></tr>
<tr class="row" ><td class="tRight">旧密码：</td><td><input type="password" class="medium bLeftRequire" name="oldpassword"></td></tr>
<tr class="row" ><td class="tRight">新密码：</td><td><input type="password" class="medium bLeftRequire" name="password"></td></tr>
<tr class="row" ><td class="tRight">确认新密码：</td><td><input type="password" class="medium bLeftRequire" name="repassword"></td></tr>
<tr class="row" ><td class="tRight">验证码：</td><td><input type="text" class="small bLeftRequire" name="verify"> <img SRC="/thinkPHP/Rbac/Public/verify/" BORDER="0" ALT="点击刷新验证码" id="verifyImg" onClick="fleshVerify()" style="cursor:pointer" align="absmiddle"></td></tr>
<tr class="row" ><td class="tCenter" align="justify" colspan="2">
<input  type="submit" class="hMargin submit small" value="确 认" alt="确认" />
<input  type="button" onClick="history.back()" class="hMargin submit small" value="取 消" alt="取消" />
</td></tr>
<tr><td height="3" colspan="2" class="bottomTd" ></td></tr>
</table>
</div>
</form>
</body>
</html>