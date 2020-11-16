<?php
namespace StepIt;

class Page {
    use Seo;
    public $content;
    public function __construct($content = '')
    {
        $this->content = $content;
    }
}