<?php

function connectDB() {
    $host = "localhost";
    $dbname = "btth01_cse485";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        return $conn;
    } catch (PDOException $ex) {
        echo "Connection failed: " . $ex->getMessage();
        return null;
    }
}

?>