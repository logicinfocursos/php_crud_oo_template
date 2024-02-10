<?php
include_once "src/views/components/layout/navbar.component.php";
function htmlTop()
{ 
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=  $_SESSION["siteTitle"]  ?></title>

        <?php 
        include "styleBundlers.php";
        ?>

       
    </head>

    <body>
        <main class="container">
            <header>

                <?php navbar(); ?>

            </header>
        <?php }

