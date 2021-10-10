<?php

namespace app\index\controller;
use think\Config;
class Index
{
    public function index()
    {
        dump(Config::get());
        return 'hello';
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
