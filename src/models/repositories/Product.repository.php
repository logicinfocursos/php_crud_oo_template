<?php
namespace Models\Repositories;

require_once 'src/models/repositories/Repositories.php';
class ProductRepository extends Repositories
{
    public function __construct()
    {
        parent::__construct('products');
    }
}