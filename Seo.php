<?php
namespace StepIt;

trait Seo {
    public $keywords;
    public function printKeywords() {
        echo $this->keywords;
    }
}