<?php

class FilmController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->view = new FilmView();
        $this->model = new FilmModel();

        $this->model->setTitle(Translator::translate('Film Controller'));
    }

    public function indexAction()
    {

        $data = array(
            'films' => $this->model->getFilms()
        );

        $this->getModel()->setData($data);

       $this->view->render(
           'films',
           'basic-template',
           $this->getModel()->getData()
       );
    }

    public function searchAction()
    {
        $films = $this->model->getFilmsByName($_POST['str']);

        if(empty($_POST['str'])) {
            echo 'Введите название фильма';
            return;
        }

        if(is_array($films)) {
            if(count($films) > 0) {
                foreach($films as $film) {
                    $filmName = $film['name'];
                    $filmName = preg_replace("#".$_POST['str']."#ius", '<b style="color: red;">'.$_POST['str'].'</b>', $filmName);
                    echo $filmName.'<br/>';
                }
            } else {
                echo 'По вашему запросу нечего не найдено';
                return;
            }
        } else {
            echo 'Ошибка: фильмы не массив';
            return;
        }
    }
}