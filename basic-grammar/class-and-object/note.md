#### PHP7面向对象基础

**类与对象**

- 面向对象编程就是要把需要解决的问题抽象为类
- 类在使用前需要声明，声明一个类使用关键词 `class`
- 声明类之后，如果要使用类中的方法，一般需要先实例化这个类，这个实例就是类中的对象，也叫对象实例
- 创建一个类的实例需要使用关键词 `new`，一个类可以实例化多个对象，每个对象都是独立的，操作其中一个对象，不会影响到其他对象
- 如果是在类内部创建实例，可以使用 `new self` 来创建新对象
- 实例化一个类后，可使用符号 `->` 访问类中的成员

**例子**

```
// 声明一个Car对象
class Car {
  private $brand = '卡迪拉克';
  public function getBrand() {
    echo $this->brand;
  }
}

// 实例化对象
$car = new Car();

// 调用类中方法或属性
$car->getBrand();
```

> 在对象方法执行的时候会自动定义一个 `$this` 的特殊变量，表示对象本身的引用。通过 `$this->` 形式可引用该对象的方法和属性，其作用就是完成对象内部成员之间的访问

- 访问对象的成员有时还可使用 `::` 符号。使用这种方式一般有三种情况：
  1. parent::父类成员，这种形式的访问可调用父类的成员变量常量和方法。
  2. self::自身成员，这种形式的访问可调用当前类中的静态成员和常量。
  3. 类名::成员，这种形式的访问可调用类中的变量常量和方法。

**例子**

```
<?php
// 声明一个Car对象
class Car {
  private $brand = '卡迪拉克';
  const COLOR = '珍珠白'; // 在类中使用const定义常量

  // 使用static修饰的的方法成为静态方法
  public static function getColor() {
    echo self::COLOR; // self 访问常量color
  }

  public function getBrand() {
    // $this->getColor(); // 静态方法在类中不能以$this->的形式访问
    self::getColor(); // self 访问静态方法
    echo $this->brand;
  }
}

// 实例化对象
$car = new Car();

// 调用类中方法或属性
$car->getBrand();
// Car::getBrand(); // 非静态方法不能用访问静态方法方式访问
Car::getColor(); // 没有实例化类，使用"::"访问类中方法
```

**静态属性和静态方法**

- 在PHP中，通过 `static` 关键词修饰的成员属性和方法称为静态属性和静态方法
- **静态属性和静态方法可在不被实例化的情况下直接使用**
- 静态属性和常规属性不一样的是，静态属性属于类本身，不属于任何实例，因此静态属性也叫类属性，用来区分对象属性
- 静态属性在类外部使用"类名::静态属性名"的方式访问
- 静态属性在类内部使用"self::静态属性名"的方式访问

**例子**
```
<?php
// 声明一个Car对象
class Car {
  static $chejiahao = 'ABDJK123-9123132AAA-BBB';
  public function getChejiahao() {
    echo self::$chejiahao; // 类内部访问
  }
}

// 实例化对象
$car = new Car();
$car->getChejiahao();

// 在类外部访问
echo Car::$chejiahao;
```

- 和静态属性相似，使用 `static` 修饰的方法称为静态方法，也可在不被实例化的情况下使用
- 静态方法属于类而不是被限制到任何一个特定的对象实例, 因此 `$this` 在静态方法中不可使用
- 在对象实例中通过 `$this->静态方法名` 的形式调用静态方法
- 在类内部需要使用 `self::静态方法名` 的形式访问

**例子**
```
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
```

**构造方法和析构方法**