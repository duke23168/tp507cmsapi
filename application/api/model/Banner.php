<?php

namespace app\api\model;


class Banner extends BaseModel
{
    protected $hidden=['delete_time','update_time'];
    public function items()
    {
        return $this->hasMany('BannerItem', 'banner_id', 'id');   //通过BannerItem模型的banner_id,与id关联
    }

    public static function getBannerById($id)
    {
        $banner = self::with(['items', 'items.img'])
            ->find($id);
        return $banner;
    }
}
