<?php
include_once "src/views/components/breadcrumps.component.php";
include_once "src/views/pages/products/productForm.component.php";


function productPage($data)
{
    $product = $data['product'];
    $categories = $data['categories'];
    $title = $data['title'];
    $operation = $data['operation'];

    $badgeText = $operation === 'add' ? 'novo' : ($operation === 'update' ? 'edição' : ($operation === 'delete' ? 'excluir' : ''));
    $badgeClass = $operation === 'add' ? 'success' : ($operation === 'update' ? 'primary' : ($operation === 'delete' ? 'danger' : ''));

    breadcrumps($title);
    ?>

    <h3>
        <?= $title ?> <small></small>
    </h3>

    <div class="card">
        <div class="card-header">
        <?= $operation !== "add" ? "#id:" . $product["id"] : "" ?> <span class="ms-2 badge rounded-pill text-bg-<?= $badgeClass ?>">
                <?= $badgeText ?>
            </span>
        </div>

     
        <?php productForm(product: $product, categories: $categories, operation: $operation); ?>

        <div class="card-footer">
        <a href="/home" type="button" class="btn btn-link">retornar</a>
        </div>
    </div>

<?php }