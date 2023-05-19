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

    public function new()
    {

        $data = [
            'title' => 'Add products'
        ];

        $this->view("Admin/add_products", $data);
    }

    public function store()
    {

        $data = [
            'title' => 'Add products'
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $data = [

                'title' => 'Add products',
                'p_name' => trim($_POST['product_name']),
                'p_cap' => trim($_POST['product_cap']),
                'p_price' => trim($_POST['product_price']),
                'p_category' => trim($_POST['product_category']),
                'p_size' => trim($_POST['product_size']),
                'p_quantity' => trim($_POST['product_quantity']),
            ];

            foreach ($data as $key => $value) {
                if (empty($value)) {
                    $_SESSION['error'] = "<span style='color: red;'>Error: Fields empty !!!</span>";
                    header("Location: " . SITE_URL . "/Admins/new");
                    exit(0);
                }
            }

            //Validate Floats and Integers

            if (!preg_match("/^[0-9\.]{1,}$/", $data['p_price'])) {
                $_SESSION['error'] = "<span style='color: red;'>Error: Price can only be numbers and decimal</span>";
                header("Location: " . SITE_URL . "/Admins/new");
                exit(0);
            }

            settype($data['p_price'], "float");

            echo $data['p_price'] . " " . is_float($data['p_price']);

            echo "<br>";

            echo $data['p_price'];
        }
    }
}
