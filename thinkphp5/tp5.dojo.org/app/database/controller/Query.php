<?php

namespace app\database\controller;

use think\Controller;
use think\Db;

class Query extends Controller
{
  // 查询构造器
  public function index()
  {
    // 使用find查询单条数据
    $result1 = Db::table('tp_user')->where('id', 1)->find();
    // 找不到数据抛出错误
    $result2 = Db::table('tp_user')->where('id', 1)->findOrFail();
    // 找不到数据返回空数组而不是Null
    $result3 = Db::table('tp_user')->where('id', 1)->findOrEmpty();
    // 查询数据集用select方法
    $result4 = Db::table('tp_user')->where('id', 1)->select();
    var_dump($result1) . '<br>';
    var_dump($result2) . '<br>';
    var_dump($result3) . '<br>';
    var_dump($result4) . '<br>';
  }

  // 写入数据
  public function insert()
  {
    $data = [
      'username' => '樱木花道',
      'password' => '123456',
      'gender' => '男',
      'email' => 'yingmuhuadao@gmail.com',
      'price' => '250',
      'details' => '灌篮高手男主角',
    ];
    // 方法一
    // Db::name('user')->insert($data);
    // 方法二
    Db::name('user')
      ->data($data)
      ->insert();
    return 'fdafasd';
  }
}
