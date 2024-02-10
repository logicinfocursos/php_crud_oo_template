<?php
require_once "src/routes.php";
include_once "src/views/components/htmlTop.component.php";              
include_once "src/views/components/htmlBottom.component.php";

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

htmlTop();
routes($url);
htmlBottom();






















?>