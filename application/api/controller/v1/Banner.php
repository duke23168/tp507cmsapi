<?php


namespace app\api\controller\v1;

use app\api\validate\TestValidate;
use think\Validate;

class Banner
{
    /**
     * 获取Banner信息
     * @url     /banner/:id
     * @http    get
     * @param int $id banner id
     * @return  array of banner item , code 200
     * @throws  MissException
     */
    public function getBanner($id)  // http://tp5cms.io/banner/1
    {
        // vaalidate 有2种用法。 1.独立验证  2.验证器

        (new IDMustBePositiveInt())->goCheck();
        $banner = BannerModel::getBannerByID($id);
        return $banner;

    }
}