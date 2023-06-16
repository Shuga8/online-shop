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
            'cont-class' => '',
            'login-class' => ''
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
            'cont-class' => '',
            'login-class' => ''
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
            'cont-class' => '',
            'login-class' => ''
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
            'cont-class' => 'active',
            'login-class' => ''
        ];

        $this->view('Pages/contact', $data);
    }

    // In here we are going to get all products by pagination without filtering them out by any type of identity
    public function getAllProductsByPagination()
    {
    }

    //category counts
    public function getMenCategoryCount()
    {

        $count = $this->userModel->getMenCategoryCount();

        echo $count;
    }

    public function getWomenCategoryCount()
    {

        $count = $this->userModel->getWomenCategoryCount();

        echo $count;
    }

    public function getUnisexCategoryCount()
    {

        $count = $this->userModel->getUnisexCategoryCount();

        echo $count;
    }

    public function getChildrenCategoryCount()
    {

        $count = $this->userModel->getChildrenCategoryCount();

        echo $count;
    }
}
