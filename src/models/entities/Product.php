<?php
namespace Models\Entities;
class Product 
{
    private $id;
    private $name;
    private $price;
    private $categoryId;

    public function __construct($id, $name, $price, $categoryId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->categoryId = $categoryId;
    }
}