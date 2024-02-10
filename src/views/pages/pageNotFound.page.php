<?php

function pageNotFound($data)
{
    $title = $data['title'];

    ?>

    <h1>
        <?= $title ?>
    </h1>

<?php }