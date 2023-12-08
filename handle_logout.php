<?php
session_start();
unset($_SESSION['userActive']);
header('Location: login.php');
exit();
?>