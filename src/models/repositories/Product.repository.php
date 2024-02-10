<?php


require_once 'src/models/repositories/Repositories.php';
require_once 'src/models/entities/Product.php';


class ProductRepository extends Repositories
{
    public function __construct()
    {
        parent::__construct('products');
    }

    protected function mapToItem($data)
    {
        return $this->mapToProduct($data);
    }
    public function mapToProduct($data)
    {
        return new Product($data['id'], $data['name'], $data['price'], $data['categoryId']);
    }
}