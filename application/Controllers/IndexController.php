<?php

class IndexController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->view = new IndexView();

        $this->getModel()->setTitle(Translator::translate('home'));
    }

    public function indexAction()
    {
        if(array_key_exists(SESSION_REG_FORM_KEY, $_SESSION)) {
            unset($_SESSION[SESSION_REG_FORM_KEY]);
        }

        if(array_key_exists(SESSION_AUTH_FORM_KEY, $_SESSION)) {
            unset($_SESSION[SESSION_AUTH_FORM_KEY]);
        }

        $data = array(

        );

        $this->getModel()->setData($data);

       $this->view->render(
           'index',
           'basic-template',
           $this->getModel()->getData()
       );
    }
}