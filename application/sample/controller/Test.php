<?php
namespace app\sample\controller;

use think\Request;

class Test
{
    public function hello(Request $request){
//        $all=Request::instance()->post();
        $all=$request->param();
        var_dump($all);

//        $id=Request::instance()->param('id');
//        $name=Request::instance()->param('name');
//        $age=Request::instance()->param('age');
//        //http://tp5cms.io/sample/test/hello
//        echo $id;
//        echo "|";
//        echo $name;
//        //http://tp5cms.io/hello/123?name=bk
//        echo "|";
//        echo $age;
//        return "nihao,DK";
    }
}

