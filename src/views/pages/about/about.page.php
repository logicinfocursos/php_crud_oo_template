<?php

include_once "src/views/components/breadcrumps.component.php";
function aboutPage($data)
{
    $title = $data['title'];
    $openingHours = $data['openingHours'];

    breadcrumps($title);
    ?>

    <h1>
        <?= $title ?>
    </h1>

    <p>
        horário de funcionamento: <?= $openingHours ?>
    </p>

<?php }