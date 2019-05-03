<?php
  session_start();
  require_once '../PASS/config.php';
  
  $_SESSION['cart'] = null;
  header('Location: cart.php');
  
 
?>