<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
//在config.php 里设置
//// 是否开启路由
//'url_route_on'           => true,
//    // 路由使用完整匹配
//    'route_complete_match'   => false,
//    // 路由配置文件（支持配置多个）
//    'route_config_file'      => ['route'],
//    // 是否强制使用路由
//    'url_route_must'         => false,
//Route::rule('路由表达式','路由地址','请求类型','路由参数(数组) ', '变量规则(数组) ');


use think\Route;
//Route::rule('hello', 'sample/Test/hello',"get",["https"=>false]);
//Route::rule('hello', 'sample/Test/hello',"get|post",["https"=>false]);
//Route::post( 'hello/:id','sample/Test/hello');
//Route::post();
//Route::any();
//Route::get( 'api/v1/banner/:id','api/v1.Banner/getBanner');
Route::get('api/:version/banner/:id', 'api/:version.Banner/getBanner');     //注意APi post 的用Get方式

