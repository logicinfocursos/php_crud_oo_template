<?php 


function productForm($product, $categories, $operation)
{
    include_once "process.php";

    ?>

    <div class="card-body row p-3">
        <form method="post" action="process.php" class="row">
            <input type="hidden" value=<?= $product->id ?> id="product-id" name="product-id">
            <input type="hidden" value=<?= $operation ?> id="product-operation" name="product-operation">

            <div class="mb-3">
                <label for="product-name" class="form-label">nome do produto</label>
                <input type="text" class="form-control" id="product-name" name="product-name"
                    value="<?= $product->name ?>" <?= $operation === "delete" ? "disabled" : "" ?>>
            </div>

            <div class="form-group col-md-6">
                <label for="product-categoryId" class="form-label">categorias</label>

                <select id="product-categoryId" name="product-categoryId" class="form-select" value="<?= $product->categoryId ?>">
                    <option value=<?= null ?> >selecionar...</option>

                    <?php foreach ($categories as $item): ?>

                        <option value="<?= $item->id ?>" <?= isset($product->categoryId) ? $item->id === $product->categoryId ? 'selected' : '' : '' ?>>
                            <?= $item->name ?>
                        </option>

                    <?php endforeach; ?>

                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="product-price" class="form-label">preço R$</label>
                <input type="text" class="form-control" id="product-price" name="product-price"
                    value="<?= $product->price ?>" <?= $operation === "delete" ? "disabled" : "" ?>>
            </div>

            <div class="form-group mt-5">
                <?php if ($operation !== "delete"): ?>
                    <button type="submit" class="btn btn-primary">salvar</button>
                <?php endif ?>

                <?php if ($operation === "delete"): ?>
                    <button type="submit" class="btn btn-danger">excluir</button>
                <?php endif ?>
            </div>

        </form>
    </div>

<?php }