<?php
require_once 'src/models/repositories/Product.repository.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productRepo = new ProductRepository();

    $productId = $_POST['product-id'];
    $operation = $_POST['product-operation'];

    echo "<pre>";
    var_dump($_POST['product-name']);
    echo "</pre>";
    // Operação de inclusão ou atualização
    if ($operation === 'add' || $operation === 'update') {
        $productName = $_POST['product-name'];
        $productPrice = $_POST['product-price'];

        $data = [
            'name' => $productName,
            'price' => $productPrice,
        ];

        if ($operation === 'add') {
            // Adicionar um novo produto
            $productRepo->add($data);
        } elseif ($operation === 'update') {
            // Atualizar um produto existente
            $productRepo->update($productId, $data);
        }

        // Redirecionar para a página inicial ou exibir mensagem de sucesso
        header('Location: /home');
        exit();
    }

    // Operação de exclusão
    if ($operation === 'delete') {
        // Excluir o produto
        $productRepo->delete($productId);

        // Redirecionar para a página inicial ou exibir mensagem de sucesso
        header('Location: /home');
        exit();
    }
}
