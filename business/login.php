<?php

require_once('./model/user.php');
require_once('./utils/session.php');
require_once('./business/database.php');

// handling POST variables

if(!isset( $_SESSION['user']) && isset($_POST["username"]) && isset($_POST["password"])){
    echo "checking user";
    $_SESSION['user'] = get_user_info($_POST["username"], $_POST["password"]);
}

?>