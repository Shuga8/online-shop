<?php

/* Create a class that extends the Controller class */

class Pages extends Controller
{

    public $userModel;

    /* A constructor that loads a the model of this controller  */
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    /* The method that allows us to access our index page  */
    public function index()
    {

        $data = [
            'title' => 'Home Page',
            'home-class' => 'active',
            'about-class' => '',
            'shop-class' => '',
            'cont-class' => ''
        ];

        $this->view('Pages/index', $data);
    }

    public function about()
    {

        $data = [
            'title' => 'About Page',
            'home-class' => '',
            'about-class' => 'active',
            'shop-class' => '',
            'cont-class' => ''
        ];

        $this->view('Pages/about', $data);
    }

    public function shop()
    {

        $data = [
            'title' => 'Shop Page',
            'home-class' => '',
            'about-class' => '',
            'shop-class' => 'active',
            'cont-class' => ''
        ];

        $this->view('Pages/shop', $data);
    }

    public function contact()
    {

        $data = [
            'title' => 'Contact Page',
            'home-class' => '',
            'about-class' => '',
            'shop-class' => '',
            'cont-class' => 'active'
        ];

        $this->view('Pages/contact', $data);
    }
}
