<?php
session_start();
unset($_SESSION['user_name']);
unset($_SESSION['brand_id']);
session_unset();
session_destroy();
header('Location: index.php');
?>