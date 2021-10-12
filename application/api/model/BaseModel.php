<?php

namespace app\api\model;

use think\Model;

class BaseModel extends Model
{
    protected function prefixImgUrl($value, $data)       //图片路径获取函数
    {
        $finaUrl = $value;
        if ($data['from'] == 1) {
            return config('setting.img_prefix') . $value;
        } else {
            return $value;
        }
    }
    //
}
