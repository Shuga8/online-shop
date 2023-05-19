<?php

/* Create a class that extends the Controller class */

class Users extends Controller
{

    public $userModel;

    /* A constructor that loads a the model of this controller  */
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function login()
    {

        $data = [
            'title' => 'Login',
            'home-class' => '',
            'about-class' => '',
            'shop-class' => '',
            'cont-class' => ''
        ];

        $this->view('Users/sign_in', $data);
    }

    public function cart()
    {
        $data = [
            'title' => 'Cart',
            'home-class' => '',
            'about-class' => '',
            'shop-class' => '',
            'cont-class' => ''
        ];

        $this->view('Users/cart', $data);
    }
}
