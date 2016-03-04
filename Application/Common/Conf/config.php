<?php
return array(
     //数据库配置信息
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'thinkphp', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '123456', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => '', // 数据库表前缀     
    
    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/static',
        '__ADDONS__' => __ROOT__ . '/Public/' .'Addons',
        '__IMG__'    => __ROOT__ . '/Public/' .'images',
        '__CSS__'    => __ROOT__ . '/Public/' .'css',
        '__JS__'     => __ROOT__ . '/Public/' .'js',
    ),
    
    //应用类库不再需要使用命名空间
    'APP_USE_NAMESPACE'    =>    false,
    'SHOW_PAGE_TRACE' =>true,
);