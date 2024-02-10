<?php

include_once 'src/views/pages/about/about.page.php';
class AboutController
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