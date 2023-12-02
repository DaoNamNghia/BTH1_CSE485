<?php
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
                echo '<script>alert("Login successful!");</script>';

                if($user['role']=== 'ADMIN') {
                header("Location: admin/index.php");

                }else {

                    header("Location: index.php");
                }

                exit();
            } else {
                echo '<script>alert("Password is incorrect!");</script>';

            }
        } else {
            echo '<script>alert("Username not exist!");</script>';
        }
    } else {
        echo 'Connection failure!';
    }
}
?>