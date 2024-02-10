<?php


require_once 'src/models/repositories/Repositories.php';
require_once 'src/models/entities/Category.php';


class CategoryRepository extends Repositories
{
    public function __construct()
    {
        parent::__construct('categories');
    }

    protected function mapToItem($data)
    {
        return $this->mapToCategory($data);
    }
    public function mapToCategory($data)
    {
        return new Category($data['id'], $data['name']);
    }
}