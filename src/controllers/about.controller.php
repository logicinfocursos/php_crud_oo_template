<?php

include_once 'src/views/pages/about.page.php';
class AboutController
{
    public function run()
    {
        $data['title'] = 'Página sobre';

        $this->view($data);
    }

    public function view($data)
    {
        aboutPage($data);
    }
}