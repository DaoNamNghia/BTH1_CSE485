<?php
require_once "../common/connect.php";

$conn = connectDB();
if (isset($_POST['txtFullNameAuthor'])) {
    if (isset($_POST['txtCatId'])) {
        $authorId = $_POST['txtauthorId'];
    }
    $authorName = $_POST['txtFullNameAuthor'];
    if ($conn) {
        session_start();
        if ($authorId != null) {

            $sql = "UPDATE tacgia SET ten_tgia = '$authorName' WHERE ma_tgia = $authorId";
        } else {
            $sql = "INSERT INTO tacgia(ten_tgia) VALUES ('$authorName')";
        }
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $_SESSION['notify_authors_successfully'] = "authors saved successfully.";

        header('Location: author.php');
        exit();
    } else {
        echo 'Connection failure!';
    }
}
?>
