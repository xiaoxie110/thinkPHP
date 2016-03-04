<?php
return array(
	/* 模板相关配置 */
    'TMPL_PARSE_STRING' =>  array( // 添加输出替换
        '__UPLOAD__'    =>  __ROOT__.'/Uploads',
    ),
    
    //应用类库不再需要使用命名空间
    'APP_USE_NAMESPACE'    =>    false,
    
);