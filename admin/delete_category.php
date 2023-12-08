<?php require_once "../common/connect.php";
$conn = connectDB();
    if(isset($_GET['id'])) {
        $catId = $_GET['id'];
        $sql = "DELETE from theloai WHERE ma_tloai = $catId";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        session_start();
        $_SESSION['notify_category_successfully'] = "Category saved successfully.";
        header("Location: category.php");
        exit();

    }

?>
