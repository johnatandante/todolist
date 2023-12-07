<?php

require_once('utils/session.php');

?>
<html>

<head>
    <title>Todo List</title>
    <link rel="stylesheet" href="css/index.css" />
</head>

    <body>
        <?php
        if (!isset($_SESSION["user"])) {
            require_once('login.php');
        } 
        if (isset($_SESSION["user"])) {
            require_once('main.php');
        }
        ?>
    </body>

</html>