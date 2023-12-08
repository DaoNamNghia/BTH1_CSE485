<?php
require_once "../common/connect.php";

$conn = connectDB();
if(isset($_POST['txtCatName'])) {
    if(isset($_POST['txtCatId'])) {
        $cateId = $_POST['txtCatId'];
    }
    $cateName = $_POST['txtCatName'];
    if ($conn) {

// title,song name, gerne,author
        if($cateId!= null) {
            $sql = "UPDATE theloai SET ten_tloai = '$cateName' WHERE ma_tloai = $cateId";
        }else {
        $sql = "INSERT INTO theloai(ten_tloai) VALUES ('$cateName')";

        }
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        session_start();
        $_SESSION['notify_category_successfully'] = "Category saved successfully.";


        header('Location: category.php');

    } else {
        echo 'Connection failure!';
    }
}


?>
