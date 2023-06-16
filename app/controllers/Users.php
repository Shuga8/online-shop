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
            echo $_SESSION['ucode'];
        } else {
            echo "not set";
        }

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

    public function auth()
    {

        print_r($_SESSION['user_arr']);
        // $data = [
        //     'g_uid' => $_SESSION['user_arr']['id'],
        //     'fname' => $_SESSION['user_arr']['givenName'],
        //     'lname' => $_SESSION['user_arr']['familyName'],
        //     'email' => $_SESSION['user_arr']['email'],
        //     'uimg' => $_SESSION['user_arr']['picture']
        // ];

        // print_r($data);

        // $emailExists = $this->userModel->check_if_email_exists($data['email']);

        // if ($emailExists == false) {

        //     // Sign Up
        //     if ($this->userModel->sign_up_user_using_google_auth($data) == true) {

        //         $_SESSION['g_uid'] = $data['g_uid'];
        //         $_SESSION['fname'] = $data['fname'];
        //         $_SESSION['lname'] = $data['lname'];
        //         $_SESSION['email'] = $data['email'];
        //         $_SESSION['uimg'] = $data['uimg'];

        //         sleep(1);

        //         header('Location: ' . SITE_URL . '/index');
        //         exit(0);
        //     } else {
        //         session_destroy();
        //         sleep(1);
        //         header('Location: ' . SITE_URL . '/login');
        //     }
        // } else {

        //     //Sign In
        //     $user = $this->userModel->login_user_after_google_auth($data['email']);
        //     if ($user == false) {
        //         session_destroy();

        //         sleep(1);
        //         header('Location: ' . SITE_URL . '/login');
        //     } else {

        //         $_SESSION['g_uid'] = $user->user_id;
        //         $_SESSION['fname'] = $user->firtname;
        //         $_SESSION['lname'] = $user->lastname;
        //         $_SESSION['email'] = $user->email;
        //         $_SESSION['uimg'] = $user->user_image;

        //         sleep(1);
        //         header('Location: ' . SITE_URL . '/index');
        //     }
        // }
    }

    public function logout()
    {
        session_destroy();
        sleep(1);
        header('Location: ' . SITE_URL . '/login');
    }

    public function cart()
    {
        $data = [
            'title' => 'Cart',
            'home-class' => '',
            'about-class' => '',
            'shop-class' => '',
            'cont-class' => '',
            'login-class' => ''
        ];

        $this->view('Users/cart', $data);
    }
}
