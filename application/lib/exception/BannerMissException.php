<?php
/**
 * Created by 七月.
 * User: 七月
 * Date: 2017/2/14 我去，情人节，886214
 * Time: 1:03
 */

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