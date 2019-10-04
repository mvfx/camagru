<?php

class Route {

    static public $model_path = 'application/models/';
    static public $controller_path = 'application/controllers/';

    static function start() {

        $controller = 'Main';
        $action = 'index';


        $routers = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routers[1])) {
            $controller = $routers[1];
        }


        if (!empty($routers[2]))
        {
            $action = $routers[2];
        }

        $model = $controller.'_Model';
        $controller .= '_Controller';
        $action = 'action_'.$action;

        $model_file = strtolower($model).'.php';
        $model_file_path = Route::$model_path.$model_file;

        if (file_exists($model_file_path))
        {
            include $model_file_path;
        }

//        else {
//            Route::error('NOT FOUND ' .$model_file_path);
//        }


        $controller_file = strtolower(($controller)).'.php';
        $controller_file_path = Route::$controller_path.$controller_file;


        if (file_exists($controller_file_path))
        {
            include $controller_file_path;
        } else {
            Route::error('NOT FOUND '.$controller_file_path);
        }

        $controller = new $controller;

        if (method_exists($controller, $action))
        {
            $controller->$action();
        }
        else {
            Route::error("ACTION ERROR");
        }


    }


    static function error($message) {

//        $host = 'http://'.$_SERVER['HTTP_HOST'].'/camagru';
//        header('HTTP/1.1 404 Not Found');
//        header("Status: 404 Not Found");
//        header('Location:'.$host.'404');

        echo $message;

    }
}