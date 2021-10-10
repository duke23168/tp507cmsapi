<?php


namespace app\lib\exception;

/**
 * 404时抛出此异常
 */
class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = '你请求的Banner不存在！';
    public $errorCode = 400000;
}