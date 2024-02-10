<?php

function breadcrumps($title)
{ ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">home</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <?= $title ?>
            </li>
        </ol>
    </nav>

<?php }