<?php
namespace StepIt;
echo 'Hello Namespaces!';
$localVar = 42;
define('MY_CONST', 'const value');
function StepFunc() {
    echo 'Hello Namespaces Func!';
}
interface Soundable {
    function say(): void;
}
trait LungBreath {
    function breath() {
        echo 'Breathing by lung...';
    }
}
class Cat implements Soundable {
    use LungBreath;
    public $name;
    function say(): void
    {
        echo 'Meow!';
    }
}
$localObjectVar = new Cat();