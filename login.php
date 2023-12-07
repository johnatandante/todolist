<?php

require_once('utils/session.php');
require_once('business/database.php');

// handling POST variables

if(!isset( $_SESSION['user']) && isset($_POST["username"]) && isset($_POST["password"])){
    echo "checking user";
    $_SESSION['user'] = get_user_info($_POST["username"], $_POST["password"]);
}

if (isset($_SESSION['user'])) {

    echo "user exists user";
    $user = $_SESSION['user'];
    echo '<div class="userLoggeg"> Benvenuto <span class bold> '. $user->fullname.'</span> (' . $user->username  . ')';
    echo '</div>';
    exit;
}
?>
<div id="myDIV" class="header">
    <h2>Login</h2>
</div>
<div class="main">
    <form action="./index.php" id="loginForm" method="post">
        <input type="text" id="username" name="username" placeholder="Please insert username" />
        <input type="password" id="password" name="password" placeholder="Please insert password" />
        <input type="submit" value="Login"></input>
    </form>
</div>