<?php

require_once 'src/controllers/Controllers.php';
include_once 'src/views/pages/about/about.page.php';
class AboutController extends Controllers
{
    public function run()
    {

        $data['title'] = 'Página sobre';
        $data['openingHours'] =  isset($_SESSION["configurations"])  ? $_SESSION["configurations"]->basicInfo->openingHours : "não encontrado";
        
        $this->view($data);
    }

    public function view($data)
    {
        aboutPage($data);
    }
}