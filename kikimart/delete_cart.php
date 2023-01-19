<?php
//File      : delete_cart.php
session_start(); //inisialisasi session
if (isset($_SESSION['cart'])){
    unset($_SESSION['cart']);
}
header('Location: show_cart.php');
?>
