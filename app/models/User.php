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

    public function getSmallProductsCount()
    {

        $this->db->query("SELECT COUNT(*) as 
        product_count FROM `products` WHERE `product_size` = :product_size");

        //bind values
        $this->db->bind(":product_size", "small");

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

    public function getMediumProductsCount()
    {

        $this->db->query("SELECT COUNT(*) as 
        product_count FROM `products` WHERE `product_size` = :product_size");

        //bind values
        $this->db->bind(":product_size", "medium");

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

    public function getLargeProductsCount()
    {

        $this->db->query("SELECT COUNT(*) as 
        product_count FROM `products` WHERE `product_size` = :product_size");

        //bind values
        $this->db->bind(":product_size", "large");

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

    public function getExtraLargeProductsCount()
    {

        $this->db->query("SELECT COUNT(*) as 
        product_count FROM `products` WHERE `product_size` = :product_size");

        //bind values
        $this->db->bind(":product_size", "extra large");

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

    // Cart
    public function add_to_cart($cart)
    {

        // query to insert into cart
        $this->db->query("INSERT INTO `cart`(`user_id`, `product_id`, `product_image`, `product_name`, `product_price`, `product_quantity`, `product_size`, `product_total`) VALUES(:u_id, :p_id, :p_img, :p_name, :p_price, :p_quantity, :p_size, :p_total)");

        // bind values in order
        $this->db->bind(':u_id', $cart['user_id']);
        $this->db->bind(':p_id', $cart['p_id']);
        $this->db->bind(':p_img', $cart['p_img']);
        $this->db->bind(':p_name', $cart['p_name']);
        $this->db->bind(':p_price', $cart['p_price']);
        $this->db->bind(':p_quantity', $cart['p_quantity']);
        $this->db->bind(':p_size', $cart['p_size']);
        $this->db->bind(':p_total', $cart['p_total']);

        // execute query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getCartItemByName($owner, $product){
        $this->db->query("SELECT * FROM `cart` WHERE `user_id` = :u_id AND `product_id` = :p_id");

        $this->db->bind(":u_id", $owner);
        $this->db->bind(":p_id", $product);

        $this->db->execute();

        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }


    public function get_cart_items_count($uid)
    {
        // query to get cart items count from db
        $this->db->query("SELECT COUNT(*) as items_count FROM `cart` WHERE `user_id` = :u_id");

        // bind params
        $this->db->bind(":u_id", $uid);

        // execute query
        if ($this->db->execute()) {
            if ($count = $this->db->single()->items_count) {
                return $count;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getCart($uid)
    {
        $this->db->query("SELECT * FROM `cart` WHERE `user_id` = :u_id");

        $this->db->bind(":u_id", $uid);

        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            if ($row = $this->db->resultSet()) {
                return $row;
            }
        } else {
            return false;
        }
    }

    public function getCartById($id, $owner)
    {
        $this->db->query("SELECT * FROM `cart` WHERE `id` = :id AND `user_id` = :owner");

        $this->db->bind(":id", $id);
        $this->db->bind(":owner", $owner);

        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_from_cart_by_id($id){
        $this->db->query("DELETE FROM `cart` WHERE `id` = :id");

        $this->db->bind(":id", $id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function add_cart_item_quantity($id, $owner, $quantity = 1){

        $this->db->query("UPDATE `cart` SET `product_quantity` = `product_quantity` + :quantity WHERE `product_id` = :id AND `user_id` = :u_id");

        $this->db->bind(":quantity", $quantity);
        $this->db->bind(":id", $id);
        $this->db->bind(":u_id", $owner);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }
}