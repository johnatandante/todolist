<?php

// require_once('./utils/session.php');
require_once('./business/login.php');

?>
<html>

<head>
    <title>Todo List</title>
    <link rel="stylesheet" href="css/index.css" />
</head>

    <body>
        <?php
        if (!isset($_SESSION["user"])) {
            require_once('./view/login.php');
        } 
        if (isset($_SESSION["user"])) {
            require_once('./view/main.php');
        }
        ?>
    </body>

</html>