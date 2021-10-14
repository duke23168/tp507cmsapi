<?php


namespace app\api\controller\v2;

use app\api\controller\BaseController;


class Banner
{

    public function getBanner($id)  // //注意APi post 的用Get方式  http://tp5cms.io/banner/1
    {

        return 'This is V2 Version';
    }
}