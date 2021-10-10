<?php


namespace app\api\controller\v1;

use app\api\controller\BaseController;
use app\api\validate\IDMustBePositiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\BannerMissException;
use think\Exception;


class Banner
{

    public function getBanner($id)  // //注意APi post 的用Get方式  http://tp5cms.io/banner/1
    {

        (new IDMustBePositiveInt())->goCheck();
        $banner = BannerModel::getBannerByID($id);
        if(!$banner){
            //throw new Exception('内部错误');    //BannerMissException 走自定义的内部错误    Exception 走TP的内部错误
            throw new BannerMissException();
        }
        return json($banner);


    }
}