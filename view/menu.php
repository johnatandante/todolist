<?php

require_once('./model/user.php');
require_once('./utils/session.php');

$user = $_SESSION['user'];

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
        echo '<div class="userLoggeg"> Benvenuto <span class bold> ' . $user->fullname . 
            '</span> (' . $user->username . ')';
        echo '</div>';
    ?>
    </div>

  <!-- Navigation links (hidden by default) -->
  <div id="myLinks">
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
  </div
  >
  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
