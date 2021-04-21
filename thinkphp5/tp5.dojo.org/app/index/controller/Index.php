<?php

namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
        // 查询所有数据
        // $result = Db::table('tp_user')->all();
        // 查询单个数据
        // $result = Db::table('tp_user')->where('id', 1)->select();
        // $result = Db::name('user')->where('id', 1)->select();
        $result = db('user')->where('id', 1)->select();
        $username = db('user')->where('id', 1)->value('username');
        echo $username . '<br>';
        $this->assign('data', $result);
        var_dump($result);
        // 关联数据
        // $age1 = array('Peter' => '35', 'Ben' => '37', 'Joe' => '43');
        // $age2['Peter'] = "35";
        // $age2['Ben'] = "37";
        // $age2['Joe'] = "43";
        // var_dump($result);
        // var_dump($age1);
        // var_dump($age2);
        return $this->fetch('index');
    }
}
