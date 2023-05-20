<?php

class Admin
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
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
}
