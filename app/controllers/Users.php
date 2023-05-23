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
            'cont-class' => '',
            'login-class' => 'active'
        ];

        $this->view('Users/sign_in', $data);
    }

    public function auth()
    {

        //cl id => 921814142092-gssil3ab8mghrjd2qje235q5voqivs53.apps.googleusercontent.com
        // cl secret => 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

        echo "continue";
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
