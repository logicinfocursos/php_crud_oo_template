<?php
require_once 'src/models/repositories/Product.repository.php';
require_once 'src/models/repositories/Category.repository.php';

include_once 'src/views/pages/products/product.page.php';

use Models\Repositories\ProductRepository;
use Models\Repositories\CategoryRepository;
class ProductController
{
    public function run()
    {
        $id = $_GET["id"];
        $process = isset($_GET["process"]) ? $_GET["process"] : null;
        $operation = $id === 'add' ? "add" : "update";

        $categoryRepository = new CategoryRepository();
        $categories = $categoryRepository->getAll();

   

        if (isset($process) && $process === "delete")
            $operation = "delete";

        if ($operation === "update" || $operation === "delete") {

            $productRepository = new ProductRepository();
            $product = $productRepository->getByKey($id);

        } else {
            $product = [
                'id' => '',
                'name' => '',
                'price' => '',
                'categoryid' => '',
                'status' => '',
            ];
        }

        $data['title'] = 'produto';
        $data['operation'] = $operation;
        $data['product'] = $product;
        $data['categories'] = $categories;

        $this->view($data);
    }

    public function view($data)
    {
        productPage($data);
    }
}