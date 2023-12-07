<?php
class User
{
    public $id;
    public $username;
    public $fullname;
    public $is_admin;

    function __construct($username = "", $fullname = "", $is_admin = false)
    {
        $this->username = $username;
        $this->fullname = $fullname;
        $this->is_admin = $is_admin;
    }
    
}

?>