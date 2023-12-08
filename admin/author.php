<?php include 'header_ad.php' ?>
<?php
require_once "../common/connect.php";

$conn = connectDB();

if ($conn) {


    $sql = "SELECT ten_tgia FROM tacgia";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $authors= $stmt->fetchAll();

} else {
    echo 'Connection failure!';
}
?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <a href="process_add_category.php" class="btn btn-success">Thêm mới</a>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên thể loại</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($authors as $index =>$author) {
                    echo '
                        <tr>
                            <th scope="row">2</th>
                            <td>'.$author["ten_tgia"].'</td>
                            <td>
                                <a href="edit_category.php?id=2"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href=""><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        
                     ';
                }
                ?>



                </tbody>
            </table>
        </div>
    </div>
</main>
<?php include 'footer_ad.php' ?>
