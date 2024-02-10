<?php
 require_once 'src/models/repositories/Product.repository.php';
 include_once 'src/views/pages/product.page.php';
class ProductController
{
    public function run()
    {
        $id = $_GET["id"];
        $process = isset($_GET["process"]) ? $_GET["process"] : null;
        $operation = $id === 'add' ? "add" : "update";

        if(isset($process) && $process==="delete") $operation = "delete";

        if ( $operation === "update" || $operation === "delete"){
            $productRepository = new ProductRepository();
            $product = $productRepository->getByKey($id);
        }else{
            $product = [
                'id' => '',
                'name' => '',
                'price' => '',   
                'status' => '',               
            ];
        }
       

        $data['title'] = 'produto';
        $data['operation'] = $operation;
        $data['product'] = $product;

        $this->view($data);
    }

    public function view($data)
    {
        productPage($data);
    }
}