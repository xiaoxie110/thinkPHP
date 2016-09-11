<?php
return array(
     //数据库配置信息
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'thinkphp', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'xxk123', // 密码
    'DB_PORT'   => '', // 端口
    'DB_PREFIX' => 'think_', // 数据库表前缀     
    
    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/static',
        '__ADDONS__' => __ROOT__ . '/Public/Addons',
        '__IMG__'    => __ROOT__ . '/Public/images',
        '__CSS__'    => __ROOT__ . '/Public/css',
        '__JS__'     => __ROOT__ . '/Public/js',
    ),
    

    'SHOW_PAGE_TRACE' =>true,
    
    //缓存
    'DATA_CACHE_TYPE'  => 'Redis', 
    'DATA_CACHE_PREFIX'=> '',
    'DATA_CACHE_TIME'  => 60,

);