<?php
ini_set('display_errors', 1);
session_start();

if (!isset($_SESSION['userSession'])) {
 header("Location: login.php");

}


 session_destroy();
 unset($_SESSION['userSession']);
 header("Location: login.php");
