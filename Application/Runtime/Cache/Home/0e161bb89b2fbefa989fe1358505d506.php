<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>thinkphp</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <table>
        <?php if(is_array($userArr)): foreach($userArr as $key=>$vo): ?><tr><td><?php echo ($vo["accounts"]); ?></td><td><?php echo ($vo["name"]); ?></td></tr><?php endforeach; endif; ?>
    </table>
</body>
</html>