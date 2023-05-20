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
        $data = [
            'title' => 'Admin'
        ];

        $this->view('Admin/index', $data);
    }

    // Adding new products page
    public function new()
    {

        $data = [
            'title' => 'Add products'
        ];

        $this->view("Admin/add_products", $data);
    }

    // storing new products
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
                                $data['p_id'] = uniqid() . $data['p_name'];

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
}
