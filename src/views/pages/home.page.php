<?php
include_once "src/views/components/breadcrumps.component.php";
function homePage($data)
{
    $products = $data['products'];
    $title = $data['title'];

    breadcrumps($title);
    ?>

    <h1 class="mt-5">
        <?= $title ?>
    </h1>

    <a href="/product?id=add" class="btn btn-success mt-3 mb-2">criar produto</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">nome</th>
                <th scope="col">preço</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $item) { ?>

                <tr>
                    <th scope="row">
                        <?= $item["id"] ?>
                    </th>

                    </td>
                    <td>
                        <?= $item["name"] ?>
                    </td>
                    <td>R$
                        <?= $item["price"] ?>
                    </td>
                    <td>
                        <a href="/product?id=<?= strval($item["id"]) ?>" class="btn btn-primary">editar</a>
                        <a href="/product?id=<?= strval($item["id"]) ?>&process=delete" class="btn btn-danger">excluir</a>
                </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>

<?php }
