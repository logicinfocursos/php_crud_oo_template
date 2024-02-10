<?php

class Product 
{
    public $id;
    public $name;
    public $price;
    public $categoryId;

    public function __construct($id = '', $name = '', $price = '', $categoryId = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->categoryId = $categoryId;
    }
}