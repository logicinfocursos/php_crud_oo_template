<?php
 require_once 'src/models/repositories/Product.repository.php';
 include_once 'src/views/pages/home/home.page.php';
class HomeController
{
    public function run()
    {

        $productRepository = new ProductRepository();
        $products = $productRepository->getAll();

       
        $data['title'] = 'Página Inicial';
        $data['products'] = $products;

        $this->view($data);
    }

    public function view($data)
    {
        homePage($data);
    }
}