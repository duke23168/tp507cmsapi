<?php
namespace app\lib\exception;
use think\Exception;

/**
 * Class BaseException
 * 自定义异常类的基类  由于用户行为导致的异常(没有通过验证器，没查询到结果)
 */
class BaseException extends Exception
{
    public $code = 400;     //http 状态码
    public $msg = '参数错误';     //具体的错误
    public $errorCode = 10000;            //  自定义的错误代码
    //
//    public $shouldToClient = true;

    public function __construct($params=[])
    {
        if(!is_array($params)){
            return;
//            throw new Exception('参数必须是数组');
        }
        if(array_key_exists('code',$params)){
            $this->code = $params['code'];
        }
        if(array_key_exists('msg',$params)){
            $this->msg = $params['msg'];
        }
        if(array_key_exists('errorCode',$params)){
            $this->errorCode = $params['errorCode'];
        }
    }
}

