<?php
class Math {
    public static function mySqrt(int $a): int {
        if ($a < 0) {
            throw new Exception("Argument must be greater than 0");
        }
        return sqrt($a);
    }
}