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
  1. `parent::` 父类成员，这种形式的访问可调用父类的成员变量常量和方法。
  2. `self::` 自身成员，这种形式的访问可调用当前类中的静态成员和常量。
  3. `类名::` 成员，这种形式的访问可调用类中的变量常量和方法。

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

- **构造方法** 是在创建对象时自动调用的方法
- **析构方法** 是在对象销毁时自动调用的方法
- 构造方法常用的场景是在创建对象时用来给变量赋值，构造方法使用 `__construct` 定义

**例子**

```
<?php
// 声明一个Car对象
class Car {
  public $name;
  public $price;
  // 使用构造函数初始化赋值
  function __construct($name, $price)
  {
    $this->name = $name;
    $this->price = $price;
  }
  function get($key) {
    echo $this->$key . "<br/>";
  }
}

// 实例化对象
$car = new Car("凯迪拉克", "360000");

$car->get('name');
$car->get('price');
```

- 析构方法和构造方法正好相反，析构方法是在对象被销毁前自动执行的方法。析构方法使用 `__desctruct` 定义

**例子**

```
<?php
// 声明一个Car对象
class Car {
  public $name;
  public $price;
  // 使用构造函数初始化赋值
  function __construct($name, $price)
  {
    $this->name = $name;
    $this->price = $price;
  }
  function get($key) {
    echo $this->$key . "<br/>";
  }

  // 使用析构方法监听对象被销毁
  function __destruct()
  {
    echo "execute automatically";
  }
}

// 实例化对象
$car = new Car("凯迪拉克", "360000");

$car->get('name');
$car->get('price');
```

- 在 `PHP` 中有一种垃圾回收机制，可以自动清除不再使用的对象，释放内存。析构方法在垃圾回收程序执行之前被执行

#### 封装和继承

- 面向对象的封装特性就是将类中的成员属性和方法内容细节尽可能地隐藏起来，确保类外部代码不能随意访问类中的内容
- 面向对象的继承特性使得子类可继承父类中的属性和方法，提高类代码的复用性

**封装特性**

- 可使用 `public`、`protected`、`private` 来修饰对象的属性和方法
- 使用 `public` 修饰的属性和方法可以在任何地方调用，如果在类中的属性和方法前面没有修饰符，则默认修饰符为 `public`
- 使用 `protected` 修饰的属性和方法可在本类和子类中被调用，在其他地方调用将会报错
- 使用 `private` 修饰的属性和方法只能在本类中被访问

**例子**

```
```

**继承特性**

- 把一个类作为公共基类，其他的类继承自这个基类，则其他类中都具有这个基类的属性和方法，其他类也可各自额外定义自己不同的属性和方法
- 类的继承使用关键词 `extends`, 在子类中可使用 `parent` 访问父类的方法, 在子类中可重写父类的方法

**例子**

```
```

**通过继承实现多态**

- 多态通过继承复用代码而实现，可编写出健壮可扩展的代码，减少流程控制语句（if else）的使用

**例子**

```
```

#### 魔术方法

- `PHP` 中提供了内置的拦截器，也称为魔术方法，它可以 `拦截` 发送到未定义方法和属性的消息
- 魔术方法通常以两个下划线 `__` 开始。

#### 抽象类和接口

> 抽象类和接口都是不能被实例化的特殊类，可以在抽象类和接口中保留公共的方法，将抽象类和接口作为公共的基类。

- 创建一个抽象类需要使用关键词 `abstract`，语法格式如下：

```
abstract class BaseClass
{
  abstract public function foo(arg1, arg2);
  abstract public function bar(arg1, arg2);
}
```
- 一个抽象类必须至少包含一个抽象方法
- 抽象类中的方法不能被定义为私有的（`private`），因为抽象类中的方法需要被子类覆盖
- 抽象类中的方法也不能用 `final` 修饰，因为其需要被子类继承
- 抽象类中的抽象方法不包含方法实体
- 如果一个类中包含了一个抽象方法，那么这个类也必须声明为抽象类。

比如我们定义一个数据库抽象类，有很多种数据库，比如 `MySQL`、`Oracle`、`MSSQL`等，虽然每种数据库都有不同的使用方法，但是对于数据库来说都有一些共同的操作部分，比如建立数据库链接、查询数据、关闭数据库链接等。这样我们就能抽象出可适用于不同数据库操作的抽象基类。

如下示例定义一个抽象Database类：

```
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
```
- 抽象类中的抽象方法必须被子类实现（除非该抽象类的子类也为抽象类），否则会报错
- 抽象类中的非抽象方法可不被子类实现（如示例中的test()方法）
- 非抽象方法必须包含实体，抽象方法不能包含实体