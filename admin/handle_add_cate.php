<?php
require_once "../common/connect.php";

$conn = connectDB();
if(isset($_POST['txtCatName'])) {
    $newCateName = $_POST['txtCatName'];
    if ($conn) {

// title,song name, gerne,author
        $sql = "INSERT INTO theloai(ten_tloai) VALUES ('$newCateName')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        header('Location: category.php');

    } else {
        echo 'Connection failure!';
    }
}


?>
