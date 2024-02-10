<?php
require_once 'src/controllers/Controllers.php';
include_once 'src/views/pages/pageNotFound/pageNotFound.page.php';
class PageNotFoundController extends Controllers
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