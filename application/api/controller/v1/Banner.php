<?php


namespace app\api\controller\v1;

use app\api\controller\BaseController;
use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\BannerMissException;


class Banner
{

    public function getBanner($id)  // //注意APi post 的用Get方式  http://tp5cms.io/banner/1
    {
        (new IDMustBePositiveInt())->goCheck();

        $banner = BannerModel::getBannerByID($id);
        if (!$banner) {
            throw new BannerMissException();
        }
        return json($banner);
    }
}