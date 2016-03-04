<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>『ThinkPHP管理平台』By ThinkPHP <?php echo (THINK_VERSION); ?></title>
<link rel="stylesheet" type="text/css" href="/thinkPHP/Public/Css/blue.css" />
<script type="text/javascript" src="/thinkPHP/Public/Js/Base.js"></script>
<script type="text/javascript" src="/thinkPHP/Public/Js/prototype.js"></script>
<script type="text/javascript" src="/thinkPHP/Public/Js/mootools.js"></script>
<script type="text/javascript" src="/thinkPHP/Public/Js/Think/ThinkAjax.js"></script>
<script type="text/javascript" src="/thinkPHP/Public/Js/Form/CheckForm.js"></script>
<script type="text/javascript" src="/thinkPHP/Public/Js/common.js"></script>
<script language="JavaScript">
<!--
//指定当前组模块URL地址 
var URL = '/thinkPHP/Rbac/Group';
var APP	 =	 '/thinkPHP/Rbac';
var PUBLIC = '/thinkPHP/Public';
//-->
</script>
</head>

<body>
<div id="main" class="main" >
<div class="content">
<div class="title">编辑分组 [ <a href="/thinkPHP/Rbac/Group">返回列表</a> ]</div>
<form method='post' id="form1" >
<table cellpadding=3 cellspacing=3>
<tr>
	<td class="tRight" >名称：</td>
	<td class="tLeft" ><input type="text" class="medium bLeftRequire"  check='^\S+$' warning="不能为空,且不能含有空格" name="name" value="<?php echo ($vo["name"]); ?>"></td>
</tr>
<tr>
	<td class="tRight tTop">说明：</td>
	<td class="tLeft"><input type="text" class="medium bLeftRequire"  name="title" value="<?php echo ($vo["title"]); ?>"></td>
</tr>
<tr>
	<td class="tRight">显示：</td>
	<td class="tLeft"><SELECT class="small bLeft"  name="show">
	<option <?php if(($vo["status"]) == "1"): ?>selected<?php endif; ?> value="1">是</option>
	<option <?php if(($vo["status"]) == "0"): ?>selected<?php endif; ?> value="0">否</option>
	</SELECT></td>
</tr>
<tr>
	<td class="tRight">状态：</td>
	<td class="tLeft"><SELECT class="small bLeft"  name="status">
	<option <?php if(($vo["status"]) == "1"): ?>selected<?php endif; ?> value="1">启用</option>
	<option <?php if(($vo["status"]) == "0"): ?>selected<?php endif; ?> value="0">禁用</option>
	</SELECT></td>
</tr>
<tr>
	<td></td>
	<td class="center"><input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>">
	<input type="hidden" name="ajax" value="1">
	<div class="impBtn fLeft"><input type="button" value="保存" onclick="sendForm('form1','/thinkPHP/Rbac/Group/update/','tips')" class="save imgButton"></div>
	<div class="impBtn fRig"><input type="reset" class="reset imgButton" value="清空" ></div>
	</td>
</tr>
</table>
</form>
</div>
</div>