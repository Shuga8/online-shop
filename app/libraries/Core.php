<?php

/* This is the core part of our website as that allows us to control urls and page accesses from links and actions from forms */
class Core
{

    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    /* A constructor method that allows us to controll the url and page access */
    public function __construct()
    {

        /* Get url to manipulate from our getUrl() method */
        $url = $this->getUrl();

        if (empty($url[0])) {
            $this->currentController = 'Pages';
            $this->currentMethod = 'index';
            require_once '../app/controllers/' . $this->currentController . '.php';
            $this->currentController = new $this->currentController;

            //Get parameters passed using our url 
            $this->params = $url ? array_values($url) : [];

            //call a callback of an array of our parameters
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
            exit();
        }

        /* check id url is not set */
        if ($url[0] == "index") {
            $this->currentController = 'Pages';
            $this->currentMethod = 'index';
            require_once '../app/controllers/' . $this->currentController . '.php';
            $this->currentController = new $this->currentController;

            //Get parameters passed using our url 
            $this->params = $url ? array_values($url) : [];

            //call a callback of an array of our parameters
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
            exit();
        } elseif ($url[0] == "about") {

            $this->currentController = 'Pages';
            $this->currentMethod = 'about';
            require_once '../app/controllers/' . $this->currentController . '.php';
            $this->currentController = new $this->currentController;

            //Get parameters passed using our url 
            $this->params = $url ? array_values($url) : [];

            //call a callback of an array of our parameters
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
            exit();
        } elseif ($url[0] == "cart") {

            $this->currentController = 'Users';
            $this->currentMethod = 'cart';
            require_once '../app/controllers/' . $this->currentController . '.php';
            $this->currentController = new $this->currentController;

            //Get parameters passed using our url 
            $this->params = $url ? array_values($url) : [];

            //call a callback of an array of our parameters
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
            exit();
        } elseif ($url[0] == "shop") {

            $this->currentController = 'Pages';
            $this->currentMethod = 'shop';
            require_once '../app/controllers/' . $this->currentController . '.php';
            $this->currentController = new $this->currentController;

            //Get parameters passed using our url 
            $this->params = $url ? array_values($url) : [];

            //call a callback of an array of our parameters
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
            exit();
        } elseif ($url[0] == "contact") {

            $this->currentController = 'Pages';
            $this->currentMethod = 'contact';
            require_once '../app/controllers/' . $this->currentController . '.php';
            $this->currentController = new $this->currentController;

            //Get parameters passed using our url 
            $this->params = $url ? array_values($url) : [];

            //call a callback of an array of our parameters
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
            exit();
        } elseif ($url[0] == "login") {

            $this->currentController = 'Users';
            $this->currentMethod = 'login';
            require_once '../app/controllers/' . $this->currentController . '.php';
            $this->currentController = new $this->currentController;

            //Get parameters passed using our url 
            $this->params = $url ? array_values($url) : [];

            //call a callback of an array of our parameters
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
            exit();
        } elseif ($url[0] == "logout") {

            $this->currentController = 'Users';
            $this->currentMethod = 'logout';
            require_once '../app/controllers/' . $this->currentController . '.php';
            $this->currentController = new $this->currentController;

            //Get parameters passed using our url 
            $this->params = $url ? array_values($url) : [];

            //call a callback of an array of our parameters
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
            exit();
        } else {

            /* Look into the Controllers folder for the first part of our url using ucwords for capitalized letter to check if the first letter is capital case */
            if (file_exists('../app/controllers/' . ucwords($url[0])) . '.php') {

                /* Set our current controller to the the first part of the array url */
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            }
            /* Require our controller once */
            require_once '../app/controllers/' . $this->currentController . '.php';
            /* Instantiate Our Current Controller */
            $this->currentController = new $this->currentController;


            /* Check if our url has has a second part */
            if (isset($url[1])) {
                /* Look into our controller to see if any methods matches the second part of out url */
                if (method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                }
            }

            //Get parameters passed using our url 
            $this->params = $url ? array_values($url) : [];

            //call a callback of an array of our parameters
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }
    }


    /* A method that allows us to get our url from the page */
    public function getUrl()
    {

        /* Check whether url is declared */
        if (isset($_GET['url'])) {

            /* rtrim spaces, carriage returns and other characters */
            $url = rtrim($_GET['url']);

            /* Filter and sanitize url and allow for numbers and letters */
            $url = filter_var($url, FILTER_SANITIZE_URL);

            /* Explode url into an array */
            $url = explode('/', $url);

            /* Return the array of url whenever the getUrl() method is called */
            return $url;
        }
    }
}
