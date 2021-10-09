<?php
/**
 * Created by PhpStorm.
 * User: 七月
 * Date: 2017/2/12
 * Time: 19:44
 */

namespace app\lib\exception;

use think\exception\Handle;
use think\Log;
use think\Request;
use Exception;

/*
 * 重写Handle的render方法，实现自定义异常消息
 */
class ExceptionHandler extends Handle
{
    public function render(Exception $e)
    {
        return json('~~~~~~507');
    }

    /*
     * 将异常写入日志
     */
    private function recordErrorLog(Exception $e)
    {
        Log::init([
            'type'  =>  'File',
            'path'  =>  LOG_PATH,
            'level' => ['error']
        ]);
//        Log::record($e->getTraceAsString());
        Log::record($e->getMessage(),'error');
    }
}