<?php include '../header_ad.php';
require_once "../../common/connect.php";
if (isset($_POST['id'])) {
    $userId = $_POST['id'];
}
$conn = connectDB();
$sql = "SELECT * FROM users WHERE id = '$userId'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetch();

?>

<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Thông tin thể loại</h3>
            <form action="handle_add_cate.php" method="post">
                <?php if ($userId != null) {
                    echo '
                     <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Mã người dùng</span>
                        <input type="text" class="form-control" name="txtUserIdss" readonly value="<?=$cate["ma_tloai"] ?>">
                    </div>
                    ';
                }

                ?>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên thể loại</span>
                    <input type="text" class="form-control" name="txtCatName" value="<?= $cate['ten_tloai'] ?>">
                </div>

                <div class="form-group  float-end ">
                    <input type="submit" value="Lưu lại" class="btn btn-success">
                    <a href="category.php" class="btn btn-warning ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php include '../footer_ad.php' ?>

