<?php

namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
        $result = Db::table('tp_user')->all();
        $this->assign('data', $result);
        return $this->fetch('index');
    }
}
