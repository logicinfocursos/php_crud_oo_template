<?php
//require_once 'autoload.php';

require_once 'src/models/repositories/Product.repository.php';
require_once 'src/controllers/Controllers.php';
include_once 'src/views/pages/home/home.page.php';


class HomeController extends Controllers
{
    public function run()
    {

        $productRepository = new ProductRepository();
        $products = $productRepository->getAll();

        $data['title'] = 'página inicial';
        $data['products'] = $products;

        $this->view($data);
    }

    public function view($data)
    {
        homePage($data);
    }
}