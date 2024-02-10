<?php

require_once "src/controllers/IControllers.php";



abstract class Controllers implements IControllers {
    protected $data;

    public function __construct() {
        $this->data = [];
    }
}