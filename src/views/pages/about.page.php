<?php

include_once "src/views/components/breadcrumps.component.php";
function aboutPage($data)
{
    $title = $data['title'];

    breadcrumps($title);
    ?>

    <h1>
        <?= $title ?>
    </h1>

    <p>
        conteúdo da página
    </p>

<?php }