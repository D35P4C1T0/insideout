<?php

class Stack
{

    private $arr;

    public function __construct()
    {
        $arr = array();
    }

    public function push($s)
    {
        $this->arr[] = $s;
    }

    public function pop()
    {
        return array_pop($this->arr);
    }

    public function peek()
    {
        return end(array_values($this->arr));
    }

    public function isempty()
    {
        return empty($this->arr);
    }

    public function shuffle()
    {
        return shuffle($arr);
    }

    public function import($import)
    {
        $this->arr = $import;
    }

}
