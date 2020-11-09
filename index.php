<?php
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
        return "re = $this->re; im = $this->im";
    }
}

$mc1 = new MathComplex;
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
echo $mc1;