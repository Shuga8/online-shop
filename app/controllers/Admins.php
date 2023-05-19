<?php

class Admins extends Controller
{

    public $adminModel;

    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
    }

    public function index()
    {
        $data = [
            'title' => 'Admin'
        ];

        $this->view('Admin/index', $data);
    }
}
