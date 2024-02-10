<?php
include_once "src/views/components/breadcrumps.component.php";
function homePage($data)
{
    $products = $data['products'];
    $title = $data['title'];

    breadcrumps($title);
    ?>

    <h1 class="mt-3">
        <?= $title ?>
    </h1>

    <div class="card">
        <div class="card-header">
            <a href="/product?id=add" class="btn btn-success btn-sm mt-3 mb-2">criar produto</a>
        </div>

        <div style="height: 300px; overflow-y: scroll;">
            <table class="table table-hover m-2">
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
                                <a href="/product?id=<?= strval($item["id"]) ?>" class="btn btn-primary btn-sm">editar</a>
                                <a href="/product?id=<?= strval($item["id"]) ?>&process=delete"
                                    class="btn btn-danger btn-sm">excluir</a>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <a href="http://logicinfo.com.br" type="button" class="btn btn-link">powred by logicinfo</a>
        </div>

    </div>



<?php }
