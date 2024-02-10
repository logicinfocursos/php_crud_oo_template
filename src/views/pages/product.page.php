<?php
include_once "src/views/components/breadcrumps.component.php";
include_once "process.php";

function productPage($data)
{
    $product = $data['product'];
    $title = $data['title'];
    $operation = $data['operation'];
    $badgeText = $operation==='add' ? 'novo' : ($operation==='update' ? 'edição' : ($operation==='delete' ? 'excluir' : ''));
    $badgeClass = $operation==='add' ? 'success' : ($operation==='update' ? 'primary' : ($operation==='delete' ? 'danger' : ''));

    echo '<pre>';
    var_dump($operation);
    echo '</pre>';
    breadcrumps($title);
    ?>

    <h3>
        <?= $title ?> <small><span class="badge rounded-pill text-bg-<?= $badgeClass ?>"><?= $badgeText ?></span></small>
    </h3>

    <form method="post" action="process.php">
        <input type="hidden" value=<?= $product["id"] ?> id="product-id" name="product-id">
        <input type="hidden" value=<?= $operation ?> id="product-operation" name="product-operation">

        <div class="mb-3">
            <label for="product-name" class="form-label">nome do produto</label>
            <input type="text" class="form-control" id="product-name" name="product-name" value="<?= $product["name"] ?>"
                <?= $operation === "delete" ? "disabled" : "" ?>>
        </div>
        <div class="mb-3">
            <label for="product-price" class="form-label">preço R$</label>
            <input type="text" class="form-control" id="product-price" name="product-price" value="<?= $product["price"] ?>"
                <?= $operation === "delete" ? "disabled" : "" ?>>
        </div>

        <a href="/home" type="button" class="btn btn-secondary">retornar</a>
        <button type="submit" class="btn btn-primary">salvar</button>

        <?php if ($operation === "delete"): ?>
            <button type="submit" class="btn btn-danger">excluir</button>
        <?php endif ?>
    </form>

<?php }