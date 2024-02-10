<?php

if(isset($_SESSION)) {
    session_start();   
}

$url = "./src/configurations/setup.json";
$json = file_get_contents($url);
$data = json_decode($json);
$_SESSION["configurations"] = $data;
$_SESSION["siteTitle"] = "logicinfo template";

require_once "src/routes.php";
include_once "src/views/components/htmlTop.component.php";              
include_once "src/views/components/htmlBottom.component.php";

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


htmlTop();
routes($url);
htmlBottom();






















?>