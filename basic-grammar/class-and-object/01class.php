<?php

// 创建Database抽象类
abstract class Database
{
  abstract function connect($host, $username, $pwd, $db);
  abstract function query($sql);
  abstract function fetch();
  abstract function close();
  function test()
  {
    echo 'Test';
  }
}

// 定义一个MySQL类，继承自抽象基类Database
class mysql extends Database
{
  protected $conn;
  protected $query;
  function connect($host, $username, $pwd, $db)
  {
    $this->conn = new mysqli($host, $username, $pwd, $db);
  }
  function query($sql)
  {
    return $this->conn->query($sql);
  }
  function fetch()
  {
    return $this->query->fetch();
  }
  function close()
  {
    $this->conn->close();
  }
}
