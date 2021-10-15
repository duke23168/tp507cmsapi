<?php
/**
 * Created by 七月
 * User: 七月
 * Date: 2017/2/14
 * Time: 12:16
 */

namespace app\api\validate;

use app\api\service\Token;
use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\ParameterException;
use app\lib\exception\TokenException;
use think\Request;
use think\Validate;


class BaseValidate extends Validate
{
    public function goCheck()
    {
        //必须设置contetn-type:application/json
        $request = Request::instance();
        $params = $request->param();
        $result=$this->batch()->check($params);
        if (!$result) {
            $e = new ParameterException([
                // $this->error有一个问题，并不是一定返回数组，需要判断
                'msg' =>  $this->error,
            ]);
            throw $e;
        }
        return true;
    }

    protected function isPositiveInteger($value, $rule='', $data='', $field='')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        }
        return false;
//        return $field . '必须是正整数';
    }

    protected function isNotEmpty($value, $rule='', $data='', $field='')
    {
        if (empty($value)) {
            return false;
//            return $field . '不允许为空';
        } else {
            return true;
        }
    }
    

}