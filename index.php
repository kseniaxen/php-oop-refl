<?php

/* use StepIt\Cat;

require_once 'count.php';
require_once 'step_it.php'; */

/* use StepIt\Page;
require_once 'Seo.php';
require_once 'Page.php'; */

/* function __autoload($classname) {
    echo $classname . "\n";
    require_once (__DIR__ . "/$classname.php");
} */

use \StepIt\Page;

spl_autoload_register(
    function ($classname) {
        if (!strstr($classname, '\\')) {
            echo $classname . '(1)' . "\n";
            require_once (__DIR__ . "/$classname.php");
        }
    }
);

spl_autoload_register(
    function ($classname) {
        if (strstr($classname, '\\')) {
            // echo $classname . "\n";
            $classnameArray = preg_split("/[\\\]+/", $classname);
            $classname = $classnameArray[count($classnameArray) - 1];
            echo $classname . '(2)' . "\n";
            require_once (__DIR__ . "/$classname.php");
        }
    }
);

class MathComplex {

    public $re, $im;

    /* function add(float $re, float $im): void {
        $this->re += $re;
        $this->im += $im;
    }
    function add(MathComplex $mc): void {
        $this->re += $mc->re;
        $this->im += $mc->im;
    } */
    function add(...$args): void {
        // var_dump($args);
        if (count($args) === 1 && $args[0] instanceof MathComplex) {
            $this->re += $args[0]->re;
            $this->im += $args[0]->im;
        } else if(floatval($args[0]) !== false && floatval($args[1]) !== false) {
            $this->re += $args[0];
            $this->im += $args[1];
        }
        /*$this->re += $re;
        $this->im += $im;*/
    }
    public function __toString()
    {
        return "re = $this->re; im = $this->im\n";
    }
}

/* $mc1 = new MathComplex;
// $mc1->re = 2;
// $mc1->im = 3;
$mc1->add(2, 0);

$mc2 = new MathComplex;
$mc2->re = 1;
$mc2->im = 1;
// $mc2->add(1, 1);
$mc1->add($mc2);

// $mc1->add(1, 1);
// var_dump($mc1);
// echo $mc1;

$mc1->e = 2.71;
// echo $mc1->e;

$mc1->subtract = function (...$args) {
    if (count($args) === 1 && $args[0] instanceof MathComplex) {
        $this->re -= $args[0]->re;
        $this->im -= $args[0]->im;
    } else if(floatval($args[0]) !== false && floatval($args[1]) !== false) {
        $this->re -= $args[0];
        $this->im -= $args[1];
    }
}; */

/*$sub = $mc1->subtract;
var_dump($sub);
$sub($mc2); */

/* echo Counter::getCount()."\n";
$counters = [];
for ($i = 0; $i < 10; $i++) {
    $counters[] = new Counter();
}
echo Counter::getCount()."\n";
$counters[2] = null;
echo Counter::getCount()."\n";
var_dump($counters);
echo 'The End!'; */

/* $c = new Counter();
$c->undef = 'data';
$c->sum = ['amount'=>100, 'currency'=>'grn'];
$c->foo = function () {
    extract(array('this' => function ()
    {
        foreach(debug_backtrace(true) as $stack){
            if(isset($stack['object'])){
                return $stack['object'];
            }
        }
    }));
    echo "Hello Function from $this";
};
// var_dump($c->undef);
// var_dump($c);
// $c->foo();
var_dump($c->sum);
$c1 = clone $c;
var_dump($c1->sum);
$c1->sum['amount']++;
var_dump($c->sum);
var_dump($c1->sum); */

/* class A {
    function foo() {
        return 'SMTH';
    }
}

class B extends A {
    function foo() {
        return parent::foo() . ' Else...';
    }
}
// echo (new B())->foo();
function outerFoo (A $a) : void {
    echo $a->foo();
}

outerFoo(new B()); */

/* $cat1 = new Cat();
$cat1->name = 'Red';
var_dump($cat1);
var_dump(MY_CONST);
var_dump($localVar);
var_dump($localObjectVar); */

function errorHandler($errNo, $msg, $file, $line){
    echo "Error #$errNo: $msg, file $file, line $line";
}

set_error_handler("errorHandler", E_ALL);

$p1 = new Page('Demo content.');
// $p1->printKeywords();
//var_dump($p1);
// $p1 = $p1 ?:-) 'abc'; // PHP Parse error:  syntax error, unexpected ')'
// $p1 = $p1 ?:- 'abc'; // It's Right
echo $p1; // PHP Recoverable fatal error:  Object of class StepIt\Page could not be converted to string
// $abc1 = new ABC(); // PHP Fatal error:  require_once(): Failed opening required '/home/yurii/PhpstormProjects/oop/ABC.php' (include_path='.:/usr/share/php')

echo "Normal End";
