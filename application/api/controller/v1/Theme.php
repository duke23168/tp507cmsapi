<?php

namespace app\api\controller\v1;

use app\api\model\Theme as ThemeModel;
use app\api\validate\IDCollection;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ThemeException;

class Theme
{

    /**
     * @url     /theme?ids=:id1,id2,id3...
     * @return  array of theme
     * @throws  ThemeException
     * @note 实体查询分单一和列表查询，可以只设计一个接收列表接口，
     *       单一查询也需要传入一个元素的数组
     *       对于传递多个数组的id可以选用post传递、
     *       多个id+分隔符或者将多个id序列化成json并在query中传递
     */
    public function getSimpleList($ids = '')   // http://z.cn/api/v1/theme?ids=l,2,3

    {
        (new IDCollection())->goCheck();
        $ids = explode(',', $ids);
        $result = ThemeModel::with('topicImg,headImg')->select($ids);
        if ($result->isEmpty()) {
            throw new ThemeException();
        }
        return Json($result);
    }

    public function getComplexOne($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $theme = ThemeModel::getThemeWithProducts($id);
        if ($theme->isEmpty()) {
            throw new ThemeException();
        }
        return $theme;
//        return $theme->hidden(['products.summary'])->toArray();
    }
}
