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

        $banner =BannerModel::with(['items','items.img'])->find($id);       //模型的静态方式调用    get, find (有返回数据), all, select
        //如果是多模型关联，那么with(['items','xxx'])  在Banner 模型里，就再添加多一个模型xxx.
//        $banner =new BannerModel();         //实例化再调用
//        $banner =$banner->get($id);
//        $banner = BannerModel::getBannerByID($id);
        if (!$banner) {
            //throw new Exception('内部错误');    //BannerMissException 走自定义的内部错误    Exception 走TP的内部错误
            throw new BannerMissException();
        }
//        return json($banner);
        return $banner;


    }
}