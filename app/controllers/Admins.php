<?php

class Admins extends Controller
{

    public $adminModel;

    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
    }

    // Index page method
    public function index()
    {

        if(!isset($_SESSION['admin'])){
            header("Location: " . SITE_URL . "/admins/login");
            exit();
        }

        $data = [
            'title' => 'Dashboard'
        ];


        //Check if page number variable is set

        $this->view('Admin/index', $data);
    }

    // Adding new products page
    public function new()
    {
        if(!isset($_SESSION['admin'])){
            header("Location: " . SITE_URL . "/admins/login");
            exit();
        }

        $data = [
            'title' => 'New'
        ];

        $this->view("Admin/add_products", $data);
    }

    // storing new products
    public function store()
    {

        if(!isset($_SESSION['admin'])){
            header("Location: " . SITE_URL . "/admins/login");
            exit();
        }

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

            //Check if product name already exists
            if ($this->adminModel->check_product_name($data['p_name']) == true) {
                $_SESSION['error'] = "<span style='color: red;'>Error: Product name already exists</span>";
                header("Location: " . SITE_URL . "/Admins/new");
                exit(0);
            }

            //Validate Floats and Integers

            if (!preg_match("/^[0-9\.]{1,}$/", $data['p_price'])) {
                $_SESSION['error'] = "<span style='color: red;'>Error: Price can only be numbers or decimal</span>";
                header("Location: " . SITE_URL . "/Admins/new");
                exit(0);
            }

            if (!preg_match("/^[0-9]{1,}$/", $data['p_quantity'])) {
                $_SESSION['error'] = "<span style='color: red;'>Error: Quantity can only be numbers!</span>";
                header("Location: " . SITE_URL . "/Admins/new");
                exit(0);
            }

            //Image validation

            if (isset($_FILES['product_img'])) {

                //Get all file parameters/values
                $imgName = $_FILES['product_img']['name'];
                $imgSize = $_FILES['product_img']['size'];
                $imgTmpName = $_FILES['product_img']['tmp_name'];
                $imgErr =
                    $_FILES['product_img']['error'];

                // echo $imgName . "<br>" . $imgSize . "<br>" . $imgTmpName . "<br>" . $imgErr;
                $fileTypes = ['jpg', 'png', 'jpeg'];
                $imgExtension = explode(".", $imgName);
                $imgExtension = strtolower($imgExtension[1]);

                //Check if image has an error while been uploaded
                if ($imgErr == true) {
                    $_SESSION['error'] = "<span style='color: red;'>Error: Something is wrong with this file!</span>";
                    header("Location: " . SITE_URL . "/Admins/new");
                    exit(0);
                } else {

                    //Check if image's file extension is supported
                    if (!in_array($imgExtension, $fileTypes)) {
                        $_SESSION['error'] = "<span style='color: red;'>Error: Supported image types are only 'jpg', 'jpeg', and  'png'</span>";
                        header("Location: " . SITE_URL . "/Admins/new");
                        exit(0);
                    } else {

                        //check if file exceeds maximum file size limit
                        if ($imgSize > 3000000) {  //if it exceeds 3MB
                            $_SESSION['error'] = "<span style='color: red;'>Error: Images should not exceed 3MB!!</span>";
                            header("Location: " . SITE_URL . "/Admins/new");
                            exit(0);
                        } else {

                            //Rename File
                            $newImgName = time() . $imgName;

                            //upload file to Extras folder
                            $upload = move_uploaded_file($imgTmpName, "../public/extras/" . $newImgName);

                            //Check if upload is successfull
                            if ($upload == true) {

                                $data['imageName'] = $newImgName;
                                $data['p_id'] = time() . uniqid();

                                //Call Model upload Method
                                $uploader = $this->adminModel->store_new_product($data);

                                if ($uploader == true) {
                                    $_SESSION['error'] = "<span style='color: green;'>Product added successfully &check;</span>";
                                    header("Location: " . SITE_URL . "/Admins/new");
                                    exit(0);
                                } else {
                                    $_SESSION['error'] = "<span style='color: red;'>Error: could not perform action</span>";
                                    header("Location: " . SITE_URL . "/Admins/new");
                                    exit(0);
                                }
                            } else {
                                $_SESSION['error'] = "<span style='color: red;'>Sorry an error occured,  please try again!!</span>";
                                header("Location: " . SITE_URL . "/Admins/new");
                                exit(0);
                            }
                        }
                    }
                }
            } else {

                $_SESSION['error'] = "<span style='color: red;'>Error: Please select an image!</span>";
                header("Location: " . SITE_URL . "/Admins/new");
                exit(0);
            }
        }
    }

    //manage products
    public function manage()
    {

        if(!isset($_SESSION['admin'])){
            header("Location: " . SITE_URL . "/admins/login");
            exit();
        }

        if (isset($_GET['page']) && $_GET['page'] != "" && $_GET['page'] > 0) {

            //Check if page number only consists of numbers 
            if (!preg_match("/^[1-9]{1,}$/", $_GET['page'])) {
                $page = 1;
            } else {
                $page =  $_GET['page'];
            }
        } else {
            $page = 1;
        }

        //total items that should exists per page
        $total_items_per_page = 6;

        //offset changes products shown depending on page number
        $offset = ($page - 1) * $total_items_per_page;
        $previous_page = $page - 1;
        $next_page = $page + 1;
        $adjacents = 2;
        //Get total amout of products 
        $total_items = $this->adminModel->get_total_number_of_products();


        //check items errors
        if ($total_items == false) {
            $total_items = 0;
        } else {
            $total_items = $total_items;
        }

        //total number of pages is decided by the rounded up number of the division of total number of products by total items per page

        $total_number_of_pages = ceil($total_items / $total_items_per_page);
        $second_last = $total_number_of_pages - 1;

        //check if page number passed in the url is greater than the total number of page then redirect
        if ($page > $total_number_of_pages && $total_number_of_pages != 0) {
            header("Location: " . SITE_URL . "/Admins/manage/?page=$total_number_of_pages");
            exit(0);
        }

        $message = "";

        //get all products from db by pagination
        $products = $this->adminModel->get_all_products_by_pagination($offset, $total_items_per_page);






        if ($products == "No products found") {
            $message = "No products found";
        } elseif ($products == false) {
            $message = "An error Occured please try again !";
        } else {
            $message = "ok";
        }




        $data = [
            'title' => 'Manage',
            'page' => $page,
            'products' => $products,
            'previous' => $previous_page,
            'next' => $next_page,
            'message' => $message,
            'total_num_of_pages' => $total_number_of_pages
        ];

        $this->view("Admin/manage_products", $data);
    }

    // edit product 
    public function edit(){
        if(!isset($_SESSION['admin'])){
            header("Location: " . SITE_URL . "/admins/login");
            exit();
        }

        $id = "";
        if(isset($_GET['id'])){
            $id = filter_var($_GET['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }else{
            header("Location: " . SITE_URL . "/admins/manage");
            exit();
        }

        $product = $this->adminModel->get_product_by_pid($id);

        if($product == false){
            header("Location: " . SITE_URL . "/admins/manage");
            exit();
        }else{
            $product = (array) $product;
        }



        $data = [
            'title' => 'Edit',
            'product' => $product
        ];

        $this->view('Admin/edit', $data);
    }

    public function update(){

        if(!isset($_SESSION['admin'])){
            header("Location: " . SITE_URL . "/admins/login");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $data = [

                'title' => 'Add products',
                'p_id' =>   trim($_POST['product_id']),
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
                    header("Location: " . SITE_URL . "/admins/edit/?id=". $data['p_id']);
                    exit(0);
                }
            }

            //Validate Floats and Integers

            if (!preg_match("/^[0-9\.]{1,}$/", $data['p_price'])) {
                $_SESSION['error'] = "<span style='color: red;'>Error: Price can only be numbers or decimal</span>";
                header("Location: " . SITE_URL . "/admins/edit/?id=". $data['p_id']);
                exit(0);
            }

            if (!preg_match("/^[0-9]{1,}$/", $data['p_quantity'])) {
                $_SESSION['error'] = "<span style='color: red;'>Error: Quantity can only be numbers!</span>";
                header("Location: " . SITE_URL . "/admins/edit/?id=". $data['p_id']);
                exit(0);
            }
        }else{
            header("Location: " . SITE_URL . "/admins/login");
            exit(0);
        }
    }

    // featured produts
    public function feature(){

    }

    //Add new admin
    public function add()
    {

        if(!isset($_SESSION['admin'])){
            header("Location: " . SITE_URL . "/admins/login");
            exit();
        }

        $data = [
            'title' => 'Add admin'
        ];

        $this->view('Admin/new_admin', $data);
    }

    // login admin
    public function login()
    {

        if(isset($_SESSION['admin'])){
            header("Location: " . SITE_URL . "/admins/index");
            exit();
        }

        $data = [
            'title' => 'Administrator Login'
        ];

        $this->view('Admin/login', $data);
    }

    public function auth()
    {

        if(isset($_SESSION['admin'])){
            header("Location: " . SITE_URL . "/admins/index");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['login'])) {

                $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $auth = $this->adminModel->auth($username, $password);

                $_SESSION['admin'] = [];

                if ($auth != false) {

                    array_push($_SESSION['admin'], $auth);
                    echo "continue";
                    exit();
                } else {
                    echo "Invalid Authentication";
                }
            }
        }
    }

    public function logout()
    {

        if(!isset($_SESSION['admin'])){
            header("Location: " . SITE_URL . "/admins/index");
            exit();
        }else{

            unset($_SESSION['admin']);
            header("Location: " . SITE_URL . "/admins/login");
            exit();
        }



    }
}
