<?php


namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule = [
        'ids' => 'require|checkIDs',
    ];
    protected $message = [
        'ids' => 'ids参数必须为以逗号分隔的多个正整数,仔细看文档啊'
    ];

    //theme?ids=:id1,id2,id3...
    protected function checkIDs($value)
    {
        $values = explode(',', $value);
        if (empty($values)) {
            return false;
        }
        foreach ($values as $id) {
            if (!$this->isPositiveInteger($id)) {   // 必须是正整数
                return false;
            }
        }
        return true;
    }
}