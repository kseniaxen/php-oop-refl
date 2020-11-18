<?php
/* final */ class Counter {
    private static $count = 0;
    private $unfamiliarFunctions = [];
    public function __construct()
    {
        self::$count++;
    }
    public function __destruct()
    {
        self::$count--;
    }
    public function __get($name)
    {
        return isset($this->$name) ? $this->$name : null;
    }
    public function __set($name, $value)
    {
        // echo gettype($value);
        // echo $value instanceof Closure;
        if ($value instanceof Closure) {
            $this->unfamiliarFunctions[$name] = $value;
        } else {
            $this->$name = $value;
        }
    }
    public function __call($name, $arguments)
    {
        $function = $this->unfamiliarFunctions[$name];
        if($function) {
            $function($arguments);
        } else {
            throw new Error("Function $name not exists in Counter.");
        }
    }

    /**
     * @return int
     */
    public static function getCount(): int
    {
        return self::$count;
    }
}