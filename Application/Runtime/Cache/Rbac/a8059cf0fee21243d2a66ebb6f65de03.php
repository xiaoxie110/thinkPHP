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
var URL = '/thinkPHP/Rbac/Form';
var APP	 =	 '/thinkPHP/Rbac';
var PUBLIC = '/thinkPHP/Public';
//-->
</script>
</head>

<body>
<div id="main" class="main" >
<div class="content">
<script type="text/javascript" charset="utf-8" src="/thinkPHP/Public/Js/editor/kindeditor.js"></script>
<script type="text/javascript">
    KE.show({
        id : 'content_1' //TEXTAREA输入框的ID
   });
</script>
<div class="title">编辑数据 [ <a href="/thinkPHP/Rbac/Form">返回列表</a> ]</div>
<div class="fRig"><?php if(($vo["image"]) != ""): ?><img src="/thinkPHP/Public/Uploads/<?php echo ($vo["image"]); ?>"  width="160" height="120" style="border:1px solid silver;padding:1px" /><?php endif; ?></div>
<div id="result" class="result none"></div>
<form method='post' id="form1" name="form1"action="/thinkPHP/Rbac/Form/update"  enctype="multipart/form-data">
<table cellpadding=3 cellspacing=3 >
<tr>
	<td class="tRight" width="10%">标题：</td>
	<td class="tLeft" ><input type="text" class="huge bLeftRequire" name="title" value="<?php echo ($vo["title"]); ?>"></td>
</tr>
<tr>
	<td class="tRight tTop">内容：</td>
	<td><textarea id="content_1" name="content" style="width:700px;height:300px;"><?php echo ($vo["content"]); ?></textarea>
	</td>
</tr>

<tr>
	<td></td>
	<td class="center"><div style="width:85%;margin:5px">
	<input type="hidden" class="huge bLeftRequire" name="id" value="<?php echo ($vo["id"]); ?>">
	<input type="submit" value="更 新" class="button medium">
	</div></td>
</tr>
</table>
</form>
</div>
</div>