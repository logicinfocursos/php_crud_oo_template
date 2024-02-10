<?php

include_once "src/views/components/products/productList.component.php";
function homePage($data)
{
    $products = $data['products'];
    $title = $data['title'];

    ?>

    <h1 class="mt-3">
        <?= $title ?>
    </h1>

    <div class="card">
        <div class="card-header">
            <a href="/product?id=add" class="btn btn-success btn-sm mt-3 mb-2">criar produto</a>
        </div>

        <?php productList($products) ?>

        <div class="card-footer">
            <a href="http://logicinfo.com.br" type="button" class="btn btn-link">powred by logicinfo</a>
        </div>

    </div>

<?php }
