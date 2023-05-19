<?php

/* Our Base Controller File that loads the model and view since this is an mvc framework */

class Controller
{

    /* A method that allows us to access our model files */
    public function model($model)
    {
        /* Require the model file */
        require_once '../app/models/' . $model . '.php';

        /* return an instantiated required model */
        return new $model;
    }

    /* Loads the view and cghecks for the view file */
    public function view($view, $data = [])
    {

        /* Check if file exists then require it else write a die function */
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('View does not exist');
        }
    }
}
