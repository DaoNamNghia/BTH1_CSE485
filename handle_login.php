<?php
session_start();
require_once "common/connect.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $uname = $_POST['username'];
    $pw = $_POST['password'];

    $conn = connectDB();

    if ($conn) {
        $sql = "SELECT * FROM users WHERE username = :uname";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':uname', $uname);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user != false) {
            if (password_verify($pw, $user['password'])) {

                $_SESSION['userActive'] = $user;
                if($user['role']=== 'ADMIN') {

                header("Location: admin/index.php");

                }else {

                    header("Location: index.php");
                }

                exit();
            } else {
               $_SESSION['notifyFailure']  = "Password is incorrect!";
                header("Location: login.php");

            }
        } else {
            $_SESSION['notifyFailure']  = "Username not exist!";
            header("Location: login.php");

        }
    } else {
        echo 'Connection failure!';
    }
}
?>