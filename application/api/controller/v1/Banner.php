<?php


namespace app\api\controller\v1;

use app\api\controller\BaseController;
use app\api\validate\IDMustBePositiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\BannerMissException;
use think\Exception;


class Banner
{

    public function getBanner($id)  // http://tp5cms.io/banner/1
    {

        (new IDMustBePositiveInt())->goCheck();
        $banner = BannerModel::getBannerByID($id);
        if(!$banner){
            throw new Exception('内部错误');    //BannerMissException 走自定义的内部错误    Exception 走TP的内部错误
        }
        return $banner;
        // vaalidate 有2种用法。 1.独立验证  2.验证器
//        try {
//            $banner = BannerModel::getBannerByID($id);
//        }
//        catch (Excegtion $ex) {
//            $err = [
//                'error_code' => 10001,
//                'msg' => $ex->getMessage()
//            ];
//            return json($err, 400);
//        }
//        return $banner;


    }
}