<?php

namespace view;

require_once('./model/user.php');
require_once('./business/login.php');
require_once('./business/database.php');

use model\User;
use business\Login;
use business\Database;

$database = new Database();
$login = new Login($database);
$login->check_login();

$user = $login->get_user_info();

?>
<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/menu.css" />
<script src="js/menu.js" type="text/javascript"></script>

<!-- Top Navigation Menu -->
<div class="topnav">
  <div class="banner">
    <div class="logo">
      <a href="#home" class="menu"><img class="logo" src="resources/imgs/logo.png" /></a>
    </div>
    <?php
      if($user != null ) {
        echo '<div class="userLoggeg"> Benvenuto <span class bold> ' . $user->fullname .
            '</span> (' . $user->username . ')</div>';
      }
    ?>
  </div>

  <!-- Navigation links (hidden by default) -->
  <div id="myLinks">
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
  </div>
  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
  <a href="javascript:void(0);" class="icon" onclick="alert('this do nothing')">
    <i class="fa fa-bars"></i>
  </a>
</div>