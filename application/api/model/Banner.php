<?php

namespace app\api\model;

use think\Db;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\Exception;
use think\exception\DbException;
use think\Model;


class Banner extends Model
{
//    protected $table = 'Category';
    public static function getBannerById($id)
    {
//        $result= Db::query('select * from banner_item where banner_id=?',[$id]);
//        return $result;
//        $result = Db::table('banner_item')
//            ->where('banner_id', '=', $id)
//            ->select();
        //find 总数是能满足条件有很多条，也只能是显示一条。 select 返回一个记录集 update delete insert
//        where('字段名','表达式','查询条件');
//        表达式 数组法 闭包
        $result = Db::table('banner_item')  //打开SQL日志的方法：1.config.php debug true  'level' => ['sql']  2. [  db.php true  ]
//            ->fetchSql()
            ->where(function ($query) use ($id) {
                $query->where('banner_id', '=',$id);
            })
            ->select();
                //ORM Obeject Relation Mapping 对象关系映射
        return $result;

    }
}
