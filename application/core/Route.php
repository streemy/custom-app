<?php

class Route
{
    public static function start()
    {
        $controllerName = 'index';
        $actionName = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if($_GET['lang']) {
            $routes = array_diff($routes, array('?lang='.$_GET['lang']));
        }

        if ( !empty($routes[1]) )
        {
            $controllerName = $routes[1];
        }

        if ( !empty($routes[2]) )
        {
            $actionName = $routes[2];
        }

        if($routes[1] == 404) {
            include_once "application/Controllers/PageNotFoundController.php";
            include_once "application/Views/PageNotFoundView.php";

            $controller = new PageNotFoundController();

            $controller->indexAction();

            die;
        }

        $modelName = ucfirst($controllerName).'Model';
        $viewName = ucfirst($controllerName).'View';
        $controllerName = ucfirst($controllerName).'Controller';
        $actionName = $actionName.'Action';

        $modelFile = $modelName.'.php';
        $modelPath = "application/Models/".$modelFile;
        if(file_exists($modelPath))
        {
            include $modelPath;
        }

        $viewFile = $viewName.'.php';
        $viewPath = "application/Views/".$viewFile;
        if(file_exists($viewPath))
        {
            include $viewPath;
        }

        $controllerFile = $controllerName.'.php';
        $controllerPath = "application/Controllers/".$controllerFile;
        if(file_exists($controllerPath))
        {
            include $controllerPath;
        }
        else
        {
            Route::ErrorPage404();
        }

        $controller = new $controllerName();
        $action = $actionName;

        if(method_exists($controller, $action))
        {
            $controller->$action();
        }
        else
        {
            Route::ErrorPage404();
        }

    }

    public function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}

