<?php
require_once 'src/models/repositories/Repositories.php';

class CategoryRepository extends Repositories
{
    public function __construct()
    {
        parent::__construct('http://localhost:3000/', 'categories');
    }
}