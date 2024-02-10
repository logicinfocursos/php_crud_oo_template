<?php

function productListItem($item)
{ ?>
    <tr>
        <th scope="row">
            <?= $item->id ?>
        </th>

        </td>
        <td>
            <?= $item->name ?>
        </td>
        <td>R$
            <?= $item->price ?>
        </td>
        <td>
            <?= $item->categoryId ?>
        </td>
        <td>
            <a href="/product?id=<?= strval($item->id) ?>" class="btn btn-primary btn-sm">editar</a>
            <a href="/product?id=<?= strval($item->id) ?>&process=delete" class="btn btn-danger btn-sm">excluir</a>
        </td>
    </tr>

<?php }