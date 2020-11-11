<?php
class Counter {
    private static $count = 0;
    public function __construct()
    {
        self::$count++;
    }
    public function __destruct()
    {
        self::$count--;
    }
    /**
     * @return int
     */
    public static function getCount(): int
    {
        return self::$count;
    }
}