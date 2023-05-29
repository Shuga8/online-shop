<?php

class User
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
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
        $this->db->bind(':user_id', $data['uid']);
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':user_image', $data['uimg']);

        //execute query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
