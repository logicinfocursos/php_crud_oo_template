<?php
require_once "src/controllers/home.controller.php";
require_once "src/controllers/about.controller.php";
require_once "src/controllers/product.controller.php";
require_once "src/controllers/pageNotFound.controller.php";
function routes($url)
{
    switch ($url) {
        case '/':
            $controller = new HomeController();
            break;

        case '/home':
            $controller = new HomeController();
            break;

        case '/about':
            $controller = new AboutController();
            break;

        case '/product':
            $controller = new ProductController();
            break;

        default:
            $controller = new PageNotFoundController();
            break;
    }

    $controller->run();
}