<?php

class Controller {

    protected  $model;
    protected  $view;

    public function __construct()
    {
        $this->model = new Model();
        $this->view = new View();
    }

    public function getModel()
    {
        return $this->model;
    }

    public function indexAction()
    {
    }

}

