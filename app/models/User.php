<?php

class User
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function check_google_id_if_exists($id)
    {

        //Query to check for id in the database
        $this->db->query("SELECT * FROM `users` WHERE `user_id` = :us_id");

        //bind prepared values
        $this->db->bind(':us_id', $id);

        //execute query
        $this->db->execute();

        //check if rowcount is greater than 0
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function check_if_email_exists($email)
    {
        //Query to check if email exists
        $this->db->query("SELECT COUNT(*) as email_count FROM `users` WHERE email = :email");

        //bind value
        $this->db->bind(':email', $email);

        //execute query
        if ($this->db->execute()) {

            if ($count = $this->db->single()->email_count) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function login_user_after_google_auth($email)
    {

        //Query to select from users
        $this->db->query("SELECT * FROM `users` WHERE email = :email");

        //bind value
        $this->db->bind(':email', $email);

        //execute query
        if ($this->db->execute()) {
            if ($user = $this->db->single()) {
                return $user;
            } else {
                return false;
            }
        }
    }

    public function sign_up_user_using_google_auth($data)
    {

        //Query to insert params for new user based on goolge auth information
        $this->db->query("INSERT INTO `users`(user_id, firstname, lastname, email, user_image) VALUES (:user_id, :firstname, :lastname, :email, :user_image)");

        //Bind values
        $this->db->bind(':user_id', $data['g_uid']);
        $this->db->bind(':firstname', $data['fname']);
        $this->db->bind(':lastname', $data['lname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':user_image', $data['uimg']);

        //execute query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Category Counts

    public function getMenCategoryCount()
    {

        $this->db->query("SELECT COUNT(*) as 
        product_count FROM `products` WHERE `product_category` = :product_category");

        //bind values
        $this->db->bind(":product_category", "men");

        //execute query

        if ($this->db->execute()) {
            if ($count = $this->db->single()->product_count) {
                return $count;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getWomenCategoryCount()
    {

        $this->db->query("SELECT COUNT(*) as 
        product_count FROM `products` WHERE `product_category` = :product_category");

        //bind values
        $this->db->bind(":product_category", "women");

        //execute query

        if ($this->db->execute()) {
            if ($count = $this->db->single()->product_count) {
                return $count;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getUnisexCategoryCount()
    {

        $this->db->query("SELECT COUNT(*) as 
        product_count FROM `products` WHERE `product_category` = :product_category");

        //bind values
        $this->db->bind(":product_category", "unisex");

        //execute query

        if ($this->db->execute()) {
            if ($count = $this->db->single()->product_count) {
                return $count;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function  getChildrenCategoryCount()
    {

        $this->db->query("SELECT COUNT(*) as 
        product_count FROM `products` WHERE `product_category` = :product_category");

        //bind values
        $this->db->bind(":product_category", "children");

        //execute query

        if ($this->db->execute()) {
            if ($count = $this->db->single()->product_count) {
                return $count;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
