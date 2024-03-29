<?php

/* Create a class that extends the Controller class */

class Pages extends Controller
{

    public $userModel;
    public $adminModel;

    /* A constructor that loads a the model of this controller  */
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->adminModel = $this->model('Admin');
    }

    /* The method that allows us to access our index page  */
    public function index()
    {

        $featured = $this->adminModel->getFeaturedProducts();


        $data = [
            'title' => 'Home Page',
            'home-class' => 'active',
            'about-class' => '',
            'shop-class' => '',
            'cont-class' => '',
            'login-class' => '',
            'featured' => $featured
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
        $page = 1;

        if (isset($_GET['page']) && $_GET['page'] != "" && $_GET['page'] > 0) {

            if (!preg_match("/^[1-9]{1,}$/", $_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
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

        $category = $_GET['url'];

        $category = explode('/', $category);


        if (count($category) == 4 && preg_match('/^(category)$/', $category[2]) && preg_match('/^(men|women|children|unisex|jacket|round-neck|long-sleeves|polos-long&short|socks|sean-short|sumba-short)$/', $category[3])) {
            
           
             
            
             
            
            $gender = $category[3];
            $total_items = $this->adminModel->get_total_number_of_category_products($gender);

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

                header("Location: " . SITE_URL . "/pages/shop/". $category[2] ."/$gender/?page=$total_number_of_pages");

                exit(0);
            }

            $message = "";

            $products = $this->adminModel->get_category_products_by_pagination($offset, $total_items_per_page, $gender);            

            if ($products == "No products found") {
                $message = "No products found";
            } elseif ($products == false) {
                $message = "An error Occured please try again !";
            } else {
                $message = "ok";
            }
    
            $data = [
                'title' => 'Shop Page',
                'home-class' => '',
                'about-class' => '',
                'shop-class' => 'active',
                'cont-class' => '',
                'login-class' => '',
                'products' => $products,
                'page' => $page,
                'previous' => $previous_page,
                'next' => $next_page,
                'message' => $message,
                'total_num_of_pages' => $total_number_of_pages,
                'h_title' => 'Shop ' . ucwords($gender)
            ];
    
            $this->view('Pages/shop', $data);

            exit(0);
        } else {

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
            header("Location: " . SITE_URL . "/pages/shop/?page=$total_number_of_pages");
            exit(0);
        }

        //get all products from db by pagination

        $message = "";

        $products = $this->adminModel->get_all_products_by_pagination($offset, $total_items_per_page);

        if ($products == "No products found") {
            $message = "No products found";
        } elseif ($products == false) {
            $message = "An error Occured please try again !";
        } else {
            $message = "ok";
        }

        $data = [
            'title' => 'Shop Page',
            'home-class' => '',
            'about-class' => '',
            'shop-class' => 'active',
            'cont-class' => '',
            'login-class' => '',
            'products' => $products,
            'page' => $page,
            'previous' => $previous_page,
            'next' => $next_page,
            'message' => $message,
            'total_num_of_pages' => $total_number_of_pages,
            'h_title' => 'Shop All'
        ];

        $this->view('Pages/shop', $data);
        }
    }

    public function single()
    {

        $url = $_GET['url'];

        $url = explode('/', $url);

        $id = $url[2];

        $product = $this->adminModel->get_product_by_pid($id);

        $featured = $this->adminModel->getFeaturedProducts();

        $message = "";

        if($product == false){

            http_response_code(403);
            $_SESSION['flash-message'] = "Access Forbidden";
            header("Location:" . SITE_URL . "/pages/shop");
            exit(0);

        }else{
            $message = "ok";
        }

        $data = [
            'title' => $product->product_name,
            'home-class' => '',
            'about-class' => '',
            'shop-class' => 'active',
            'cont-class' => '',
            'login-class' => '',
            'message' => $message,
            'product' => $product,
            'featured' => $featured,
        ];

        $this->view('Pages/shop-single', $data);
        
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

    public function add_to_cart()
    {
        if (!isset($_SESSION['g_uid'])) {
            http_response_code(403);
            $_SESSION['flash-message'] = "You are not signed in, please sign in first";
            header("Location:" . SITE_URL . "/pages/shop");
            exit(0);
        }

        $url = $_GET['url'];

        $url = explode('/', $url);

        $id = $url[2];

        $p_id = $url[3];

        if (!preg_match('/^[0-9]{1,}$/', $id)) {
            http_response_code(403);
            $_SESSION['flash-message'] = "Item not found";
            header("Location:" . SITE_URL . "/pages/shop");
            exit(0);
        }

        $product = $this->adminModel->get_product_by_id($id);

        if (!$product) {
            $_SESSION['flash-message'] = "Product does not exists";
            header("Location:" . SITE_URL . "/pages/shop");
            exit(0);
        } else {

            $owner_id = $_SESSION['g_uid'];

            // check if product already exists
            if ($this->userModel->getCartItemByName($owner_id, $p_id)) {
                if ($this->userModel->add_cart_item_quantity($p_id, $owner_id)) {
                    $_SESSION['flash-message'] = "Updated item quantity in cart";
                    header("Location:" . SITE_URL . "/pages/shop");
                    exit(0);
                }
            }

            $quantity = 1;

            $cart_upload = [
                'user_id' => $_SESSION['g_uid'],
                'p_id' => $product->product_id,
                'id' => $product->id,
                'p_img' => $product->product_image,
                'p_name' => $product->product_name,
                'p_price' => $product->product_price,
                'p_quantity' => $quantity,
                'p_discount' => $product->product_discount,
                'p_size' => $product->product_size
            ];

            // $product->product_discount
            $cart_upload['p_total'] = ($cart_upload['p_price'] - ($cart_upload['p_price'] * $cart_upload['p_discount'] / 100)) * $cart_upload['p_quantity'];

            // add cart
            $add_to_cart = $this->userModel->add_to_cart($cart_upload);

            if ($add_to_cart) {
                $_SESSION['flash-message'] = "Product added to cart successfully!!!";
                header("Location:" . SITE_URL . "/pages/shop");
                exit(0);
            }
        }
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

    // Get products count by size
    public function getSmallProductsCount()
    {

        $count = $this->userModel->getSmallProductsCount();

        echo $count;
    }

    public function getMediumProductsCount()
    {

        $count = $this->userModel->getMediumProductsCount();

        echo $count;
    }

    public function getLargeProductsCount()
    {

        $count = $this->userModel->getLargeProductsCount();

        echo $count;
    }

    public function getExtraLargeProductsCount()
    {

        $count = $this->userModel->getExtraLargeProductsCount();

        echo $count;
    }

    // cart amount
    public function get_cart_items_count()
    {

        if (!isset($_SESSION['g_uid'])) {
            echo 0;
            exit(0);
        }

        $count = $this->userModel->get_cart_items_count($_SESSION['g_uid']);

        if (!$count) {
            echo 0;
            exit(0);
        } else {
            echo $count;
            exit(0);
        }
    }

    // Delete cart item
    public function delete()
    {

        $url = $_GET['url'];

        $url = explode("/", $url);

        $id = $url[2];

        if (!isset($id) || empty($id || !preg_match('/^[0-9]{1,}$/', $id))) {
            http_response_code(403);
            $_SESSION['flash-message'] = "Access Forbidden";
            header("Location:" . SITE_URL . "/cart");
            exit(0);
        } else {
            // Check if the product id is in the database
            $owner = $_SESSION['g_uid'];
            $checkIfCartItemExists = $this->userModel->getCartById($id, $owner);

            if (!$checkIfCartItemExists) {
                http_response_code(403);
                $_SESSION['flash-message'] = "Error! Access denied";
                header("Location:" . SITE_URL . "/cart");
                exit(0);
            } else {
                if ($this->userModel->delete_from_cart_by_id($id)) {
                    $_SESSION['flash-message'] = "Successfully deleted item from cart";
                    header("Location:" . SITE_URL . "/cart");
                    exit(0);
                } else {

                    $_SESSION['flash-message'] = "Error!";
                    header("Location:" . SITE_URL . "/cart");
                    exit(0);
                }
            }
        }
    }

}
