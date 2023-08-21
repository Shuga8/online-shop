<?php

class Admin
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function auth($uname, $pass){

        $this->db->query("SELECT * FROM `admins` WHERE username = :username");

        $this->db->bind(":username", $uname);

        $this->db->execute();

        if($this->db->rowCount() > 0){
            
            $row = $this->db->single();

            $hashed = $row->password;

            if(password_verify($pass, $hashed)){
                return $row;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    // A public function to store newly added products
    public function store_new_product($data)
    {
        // Query to insert new product to the database
        $this->db->query("INSERT INTO products(product_id, product_name, product_caption, product_image, product_price, product_category, product_size, product_quantity) VALUES(:id, :name, :cap, :img, :price, :cat, :size, :quantity)");

        //Bind prepared valued to params
        $this->db->bind(':id', $data['p_id']);
        $this->db->bind(':name', $data['p_name']);
        $this->db->bind(':cap', $data['p_cap']);
        $this->db->bind(':img', $data['imageName']);
        $this->db->bind(':price', $data['p_price']);
        $this->db->bind(':cat', $data['p_category']);
        $this->db->bind(':size', $data['p_size']);
        $this->db->bind(':quantity', $data['p_quantity']);

        //Execute query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function check_product_name($name)
    {
        //Check database if product name already exists
        $this->db->query("SELECT * FROM products WHERE product_name = :name");

        //bind name values
        $this->db->bind(':name', $name);

        //execute query
        $this->db->execute();

        //check if rowCount is greater than 0
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_total_number_of_products()
    {
        //Query to select total number of products from database
        $this->db->query("SELECT COUNT(*) AS total_items FROM `products`");

        $this->db->execute();

        if ($row = $this->db->single()) {

            return $row->total_items;
        } else {

            return false;
        }
    }

    public function get_total_number_of_category_products($category){

        // Query to select total number of products from database
        $this->db->query("SELECT COUNT(*) AS total_items FROM `products` WHERE `product_category` = :cat");

        // bind params
        $this->db->bind(":cat", $category);

        // execute query
        $this->db->execute();

        if ($row = $this->db->single()) {

            return $row->total_items;
        } else {

            return false;
        }

    }

    public function get_all_products_by_pagination($offset, $total_items_per_page)
    {
        //select all products from database using limit and offset
        $this->db->query("SELECT * FROM `products` ORDER BY created_at DESC LIMIT :ofset, :total_items_per_page");

        //bind values
        $this->db->bind(':ofset', $offset);
        $this->db->bind(':total_items_per_page', $total_items_per_page);

        //execute query

        if ($this->db->execute()) {

            // check row count
            if ($this->db->rowCount() > 0) {

                //return all products in array
                if ($row = $this->db->resultSet()) {

                    return $row;
                } else {
                    return false;
                }
            } else {
                return "No products found";
            }
        } else {
            return false;
        }
    }

    public function get_category_products_by_pagination($offset, $total_items_per_page, $gender){
        //select all products from database using limit and offset
        $this->db->query("SELECT * FROM `products` WHERE `product_category` = :cat ORDER BY created_at DESC LIMIT :ofset, :total_items_per_page");

        //bind values
        $this->db->bind(':cat', $gender);
        $this->db->bind(':ofset', $offset);
        $this->db->bind(':total_items_per_page', $total_items_per_page);

        //execute query

        if ($this->db->execute()) {

            // check row count
            if ($this->db->rowCount() > 0) {

                //return all products in array
                if ($row = $this->db->resultSet()) {

                    return $row;
                } else {
                    return false;
                }
            } else {
                return "No products found";
            }
        } else {
            return false;
        }
    }

    public function check_admin_by_username($uname)
    {
        //query to check if admin username exists
        $this->db->query("SELECT COUNT(*) as name_count FROM `admins` WHERE username = :uname");

        //bind values
        $this->db->bind(':uname', $uname);

        //execute query
        $this->db->execute();

        if ($count = $this->db->single()->name_count) {
            if ($count > 0) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function check_admin_by_email($email)
    {

        //query to check if admin email exists
        $this->db->query("SELECT COUNT(*) as email_count FROM `admins` WHERE email = :email");

        //bind values
        $this->db->bind(':email', $email);

        //execute query
        $this->db->execute();

        if ($count = $this->db->single()->email_count) {
            if ($count > 0) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function add_new_admin($data)
    {

        //query to insert new admin
        $this->db->query("INSERT INTO `admins`(username, email, password, role) VALUES(:uname, :email, :pass, :role)");

        //bind values
        $this->db->bind(':uname', $data['uname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':pass', $data['pass']);
        $this->db->bind(':role', $data['role']);

        //check if query is successfully executed
        if ($this->db->execute()) {

            return true;
        } else {

            return false;
        }
    }

    public function update_admin_password($email, $pass)
    {
        //query to update admin's password
        $this->db->query("UPDATE `admins` SET `password` = :pass WHERE email = :email");

        //bind value
        $this->db->bind(':pass', $pass);
        $this->db->bind(':email', $email);

        //check if it is successfully executed 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function add_discount_to_all($discount)
    {

        //query to add discount to all products in the db
        $this->db->query("UPDATE `products` SET `product_discount` = :disc");

        //bind value
        $this->db->bind(':disc', $discount);

        //check if it is successfully executed 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function add_discount_to_product($product_id, $discount)
    {
        //query to add discount to product in the db
        $this->db->query("UPDATE `products` SET `product_discount` = :disc WHERE `product_id` = :p_id");

        //bind value
        $this->db->bind(':disc', $discount);
        $this->db->bind(':p_id', $product_id);

        //check if it is successfully executed 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_product_by_id($id)
    {
        // query to get product info by products id
        $this->db->query("SELECT * FROM `products` WHERE `id` = :p_id");

        // bind query
        $this->db->bind(":p_id", $id);

        // execute query
        $this->db->execute();

        // check row count
        if ($this->db->rowCount() > 0) {
            $row = $this->db->single();

            return $row;
        } else {
            return false;
        }
    }

    public function get_product_by_pid($id)
    {
        // query to get product info by products id
        $this->db->query("SELECT * FROM `products` WHERE `product_id` = :p_id LIMIT 1");

        // bind query
        $this->db->bind(":p_id", $id);

        // execute query
        $this->db->execute();

        // check row count
        if ($this->db->rowCount() > 0) {
            $row = $this->db->single();

            return $row;
        } else {
            return false;
        }
    }

    public function update_product_with_image(Array $data){
        $this->db->query("UPDATE `products` SET `product_name` = :name, `product_caption` = :cap, `product_image` =:img, `product_price` = :price, `product_category` = :category, `product_size` = :size, `product_quantity` = :quantity WHERE `product_id` = :product_id");

        $this->db->bind(":name", $data['p_name']);
        $this->db->bind(":cap", $data['p_cap']);
        $this->db->bind(":img", $data['p_img']);
        $this->db->bind(":price", $data['p_price']);
        $this->db->bind(":category", $data['p_category']);
        $this->db->bind(":size", $data['p_size']);
        $this->db->bind(":quantity", $data['p_quantity']);
        $this->db->bind(":product_id", $data['p_id']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update_product_without_image(Array $data){
        $this->db->query("UPDATE `products` SET `product_name` = :name, `product_caption` = :cap, `product_price` = :price, `product_category` = :category, `product_size` = :size, `product_quantity` = :quantity WHERE `product_id` = :product_id");

        $this->db->bind(":name", $data['p_name']);
        $this->db->bind(":cap", $data['p_cap']);
        $this->db->bind(":price", $data['p_price']);
        $this->db->bind(":category", $data['p_category']);
        $this->db->bind(":size", $data['p_size']);
        $this->db->bind(":quantity", $data['p_quantity']);
        $this->db->bind(":product_id", $data['p_id']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}
