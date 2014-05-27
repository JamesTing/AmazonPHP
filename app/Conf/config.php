<?php
require_once './config.php';
return array(
	'SHOW_PAGE_TRACE'       => false, // 显示页面Trace信息
    /* 数据库设置 */
    'DB_TYPE'               => DBType,     // 数据库类型
    'DB_DSN'               => DBDsn, // 服务器
    'DB_PORT'               => '',        // 端口
    'DB_PREFIX'             => '',    // 数据库表前缀

    /* 错误设置 */
    'ERROR_MESSAGE'         => '页面错误！请稍后再试～',//错误显示信息,非调试模式有效
    'ERROR_PAGE'            => '',	// 错误定向页面
    'SHOW_ERROR_MSG'        => false,    // 显示错误信息
    'TRACE_EXCEPTION'       => false,   // TRACE错误信息是否抛异常 针对trace方法 

    /* 模板引擎设置 */
    'TMPL_CONTENT_TYPE'     => 'text/html', // 默认模板输出类型
    'TMPL_ACTION_ERROR'     => THINK_PATH.'Tpl/dispatch_jump.tpl', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   => THINK_PATH.'Tpl/dispatch_jump.tpl', // 默认成功跳转对应的模板文件
    'TMPL_EXCEPTION_FILE'   => THINK_PATH.'Tpl/think_exception.tpl',// 异常页面的模板文件
    'TMPL_DETECT_THEME'     => false,       // 自动侦测模板主题
    'TMPL_TEMPLATE_SUFFIX'  => '.tpl',     // 默认模板文件后缀
    'TMPL_FILE_DEPR'        =>  '/', //模板文件MODULE_NAME与ACTION_NAME之间的分割符

    /* URL设置 */
    'URL_HTML_SUFFIX'       => 'html|shmtl|xml|htm',
    'URL_CASE_INSENSITIVE'  => true,   // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'             => 2,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式，提供最好的用户体验和SEO支持
    'URL_PATHINFO_DEPR'     => '/', // PATHINFO模式下，各参数之间的分割符号
    'URL_PATHINFO_FETCH'    =>   'ORIG_PATH_INFO,REDIRECT_PATH_INFO,REDIRECT_URL', // 用于兼容判断PATH_INFO 参数的SERVER替代变量列表
    'URL_HTML_SUFFIX'       => '',  // URL伪静态后缀设置
    'URL_PARAMS_BIND'       =>  true, // URL变量绑定到Action方法参数
    'URL_404_REDIRECT'      =>  '', // 404 跳转页面 部署模式有效

    /* 路由配置 */
    'URL_ROUTER_ON'         => true, //开启路由
    'URL_ROUTE_RULES'       =>array(     
        '/^'.LetterUrl.'\/([a-z])$/'  => 'Index/letterIndex?para=:1',//匹配字母索引        
        '/^'.ListUrl.'\/(.+)$/'   => 'Index/category?para=:1',//匹配任意关键词结果       
        '/^'.DetailUrl.'\/(.+)_(.+)$/'             => 'Index/detail?title=:1&asin=:2',//匹配单个商品
        '/^update$/'        => 'Index/update',//更新关键词 
        '/^clear\/database$/'         => 'Index/clearDataBase', //清空数据表 
        '/^clear\/filecache$/'         => 'Index/clearFileCache',//清空文件缓存
    ),

    /* 静态缓存配置 */
    'HTML_CACHE_ON'=>HtmlCache,
    'HTML_FILE_SUFFIX' => '.html',
    'HTML_CACHE_RULES'=> array(
        'index:index'    => array('{:action}',IndexCache),
        'index:category' => array('{:action}/{para}', ListCache),
        'index:detail'  => array('{:action}/{asin}',DetailCache),//永久缓存  
     )
);
?>