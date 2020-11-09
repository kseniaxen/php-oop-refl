<?php
class MathComplex {
    public $re, $im;
    function add(float $re, float $im): void{
        $this->re += $re;
        $this->im += $im;
    }
}

$mc1 = new MathComplex;
$mc1->add(2, 3);
$mc1->add(1, 1);
// var_dump($mc1);
echo $mc1;