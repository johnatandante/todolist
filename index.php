<?php
namespace index;

use utils;
use business\Database;
use business\Login;

require_once('./utils/utility.php');
require_once('./utils/session.php');
require_once('./business/database.php');
require_once('./business/login.php');

$database = new Database();
$login = new Login($database);
$login->check_login();

$user = $login->get_user_info();

?>
<html>

<head>
    <title>Todo List</title>
    <link rel="stylesheet" href="css/index.css" />
</head>

    <body>
        <?php
        if ($user == null) {
            require_once('./view/login.php');
        } 
        if ($user != null) {
            require_once('./view/main.php');
        }
        ?>
    </body>

</html>