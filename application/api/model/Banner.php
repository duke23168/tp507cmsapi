<?php

namespace app\api\model;

use think\Model;

class Banner
{
    public function items()
    {
        return $this->hasMany('BannerItem', 'banner_id', 'id');
    }
    //

    /**
     * @param $id int banner所在位置
     * @return Banner
     */
    public static function getBannerById($id)
    {
        //Todo:根据Banner ID号 获取Banner信息
        try{
            1/0;
        }
        catch (Exception $ex){
            //todo: 可以记录日志
            throw $ex;
        }
        return 'this is banner info';
    }
}
