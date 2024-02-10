<?php
require_once 'src/models/repositories/Repositories.php';
class ProductRepository extends Repositories
{
    public function __construct()
    {
        parent::__construct('http://localhost:3000/', 'products');
    }
}