<html>
<head>
  <title>Test Page</title>
</head>
<body>
<?php
class SimpleClass
{
    // property declaration
    public $var = 'a default value';
  
  
    // method declaration
    public function displayVar() 
	{
	  
        echo $this->var;
    }
}
$t = new SimpleClass();
$t ->displayVar();
?>

<?php
class A
{
    function foo()
    {
        if (isset($this)) {
            echo '$this is defined (';
            echo get_class($this);
            echo ")";
			echo "<br>";
        } else {
            echo "\$this is not defined.\n";
        }
    }
}

class B
{
    function bar()
    {
        $a = new A();
		$a->foo();
    }
}

$a = new A();
$a->foo();

$b = new B();
$b->bar();

?>


<?php

$instance = new SimpleClass();

$assigned   =  $instance;
$reference  =& $instance;

$instance->var = '$assigned will have this value';

$instance = null; // $instance and $reference become null

var_dump($instance);
var_dump($reference);
var_dump($assigned);
?>
<br>

<?php
class Test
{
    static public function getNew()
    {
        return new static;
    }
}

class Child extends Test
{}

$obj1 = new Test();
$obj2 = new $obj1;
var_dump($obj1 == $obj2);

$obj3 = Test::getNew();
var_dump($obj3 instanceof Test);

$obj4 = Child::getNew();
var_dump($obj4 instanceof Child);
?>
<br>

<?php
echo (new DateTime())->format('Y,m,d');
?>
<br>


<?php
class Foo
{
    public $bar = 'property';
    
    public function bar() {
        return 'method';
    }
}

$obj = new Foo();
echo $obj->bar, PHP_EOL, $obj->bar(), PHP_EOL;
?>
<br>

<?php
class Food
{
    public $bar;
    
    public function __construct() {
        $this->bar = function() {
            return 42;
        };
    }
}

$obj = new Food();

// as of PHP 5.3.0:
$func = $obj->bar;
echo $func(), PHP_EOL;

// alternatively, as of PHP 7.0.0:
echo ($obj->bar)(), PHP_EOL;
?>
<br>

</body>
</html>