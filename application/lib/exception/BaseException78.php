<?php
namespace app\lib\exception;
use think\Exception;

/**
 * Class BaseException
 * 自定义异常类的基类
 */
class BaseException extends Exception
{
    public $code = 400;     //http 状态码
    public $msg = '参数错误';     //具体的错误
    public $errorCode = 10000;            //  自定义的错误代码
}

