<?php

include_once 'src/views/pages/pageNotFound.page.php';
class PageNotFoundController
{
    public function run()
    {
        $data['title'] = 'Página não encontrada - erro 404';

        $this->view($data);
    }

    public function view($data)
    {
        pageNotFound($data);
    }
}