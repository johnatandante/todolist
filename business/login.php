<?php

namespace business;

require_once('./model/user.php');

// use model\User;
// use utils;

class Login
{
    // handling POST variables

    private $database;

    function __construct($database) { 
        $this->database = $database;
    }

    public function get_user_info() {
        if(isset($_SESSION['user']))
            return $_SESSION['user'];
        else 
            return null;
    }

    public function check_login()
    {
        if (!isset($_SESSION['user']) && isset($_POST["username"]) && isset($_POST["password"])) {
            $_SESSION['user'] = $this->database->get_user_info($_POST["username"], $_POST["password"]);
        }
    }
}

?>