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

        if (isset($_SESSION['ucode'])) {
            header("Location: " . SITE_URL . "/users/auth");
            exit(0);
        } else {


            $clientID = "730276081884-42andi1o9vp5hvrnjgpgnhkhcnoaqr20.apps.googleusercontent.com";
            $clientSecret = "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";


            // Google API Client
            $gclient = new Google_Client();

            // Set the ClientID
            $gclient->setClientId($clientID);
            // Set the ClientSecret
            $gclient->setClientSecret($clientSecret);
            // Set the Redirect URL after successful Login
            $gclient->setRedirectUri(SITE_URL . '/login');

            // Adding the Scope
            $gclient->addScope('email');
            $gclient->addScope('profile');

            if (isset($_GET['code'])) {
                // Get Token
                $token = $gclient->fetchAccessTokenWithAuthCode($_GET['code']);



                // Check if fetching token did not return any errors
                if (!isset($token['error'])) {
                    // Setting Access token
                    $gclient->setAccessToken($token['access_token']);

                    // store access token
                    $_SESSION['access_token'] = $token['access_token'];

                    // Get Account Profile using Google Service
                    $gservice = new Google_Service_Oauth2($gclient);

                    // Get User Data
                    $udata = $gservice->userinfo->get();

                    $_SESSION['user_arr'] = [];

                    foreach ($udata as $k => $v) {
                        $_SESSION['login_' . $k] = $v;
                        array_push($_SESSION['user_arr'], $k);
                        $_SESSION['user_arr'][$k] = $v;
                    }
                    $_SESSION['ucode'] = $_GET['code'];

                    header("Location: " . SITE_URL . "/users/auth");
                    exit(0);
                }
            }


            $data = [
                'title' => 'Login',
                'home-class' => '',
                'about-class' => '',
                'shop-class' => '',
                'cont-class' => '',
                'login-class' => 'active',
                'gclient' => $gclient
            ];

            $this->view('Users/sign_in', $data);
        }
    }

    public function auth()
    {

        $data = [
            'g_uid' => $_SESSION['user_arr']['id'],
            'fname' => $_SESSION['user_arr']['givenName'],
            'lname' => $_SESSION['user_arr']['familyName'],
            'email' => $_SESSION['user_arr']['email'],
            'uimg' => $_SESSION['user_arr']['picture']
        ];


        $google_id_exits = $this->userModel->check_google_id_if_exists($data['g_uid']);

        if ($google_id_exits == false) {
            // Sign user up first
            $sign_up_user = $this->sign_up($data);

            //if sign up was not successful
            if (!$sign_up_user) {
                session_unset($_SESSION['ucode']);
                http_response_code(401);
                $_SESSION['error_message'] =  "Error: please try again";
                header("Location: " . SITE_URL);
                exit(0);
            } else {

                //if user successfully sign's up then sign in
                $user = $this->sign_in($data['email']);

                if ($user ==  false) {
                    session_unset($_SESSION['ucode']);
                    http_response_code(403);
                    $_SESSION['error_message'] =  "Access Forbidden";
                    header("Location: " . SITE_URL);
                    exit(0);
                } else {

                    $_SESSION['g_uid'] = $user->user_id;
                    $_SESSION['g_fname'] = $user->firstname;
                    $_SESSION['g_lname'] = $user->lastname;
                    $_SESSION['g_email'] = $user->email;
                    $_SESSION['g_img'] = $user->user_image;

                    header('Location: ' . SITE_URL . '/index');
                    $_SESSION['flash-message'] = "You have successfully logged in";
                    exit(0);
                }
            }
        } else {
            //directly login if google user id is found in the database
            $user = $this->sign_in($data['email']);

            if ($user ==  false) {
                session_unset($_SESSION['ucode']);
                http_response_code(403);
                $_SESSION['error_message'] =  "Access Forbidden";
                header("Location: " . SITE_URL . "/index");
                exit(0);
            } else {

                $_SESSION['g_uid'] = $user->user_id;
                $_SESSION['g_fname'] = $user->firstname;
                $_SESSION['g_lname'] = $user->lastname;
                $_SESSION['g_email'] = $user->email;
                $_SESSION['g_img'] = $user->user_image;

                $_SESSION['flash-message'] = "<span style='text-transform: capitalize'>Welcome back " . $_SESSION['g_fname'] . "</span>";

                header('Location: ' . SITE_URL . '/index');
                exit(0);
            }
        }
    }

    public function sign_in($email)
    {

        if (!$this->userModel->login_user_after_google_auth($email)) {
            return false;
        } else {
            $user = $this->userModel->login_user_after_google_auth($email);

            return $user;
        }
    }

    public function sign_up($data)
    {
        if (!$this->userModel->sign_up_user_using_google_auth($data)) {
            return false;
        } else {
            return true;
        }
    }

    public function logout()
    {
        session_destroy();
        sleep(1);
        header('Location: ' . SITE_URL . '/login');
    }

    public function cart()
    {

        if (!isset($_SESSION['g_uid'])) {
            http_response_code(403);
            $_SESSION['flash-message'] =  "Please login first !!!";
            header("Location: " . SITE_URL . "/login");
            exit(0);
        }
        $cart = $this->userModel->getCart($_SESSION['g_uid']);
        $count = $this->userModel->get_cart_items_count($_SESSION['g_uid']);
        $cartCount = 0;

        if (!$count) {
            $cartCount = 0;
        } else {
            $cartCount = $count;
        }
        $data = [
            'title' => 'Cart',
            'home-class' => '',
            'about-class' => '',
            'shop-class' => '',
            'cont-class' => '',
            'login-class' => '',
            'cart' => $cart,
            'count' => $cartCount
        ];

        $this->view('Users/cart', $data);
    }
}
