<?php
// 声明一个Car对象
class Car {
  static $chejiahao = 'ABDJK123-9123132AAA-BBB';
  static function getChejiahao() {
    echo self::$chejiahao . '<br/>'; // 类内部访问
  }
  public function test() {
    self:: getChejiahao();
  }
}

// 实例化对象
$car = new Car();
$car->getChejiahao();
$car->test();

// 在类外部访问
Car::getChejiahao();