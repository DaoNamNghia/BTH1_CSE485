<?php include 'header_ad.php' ?>
<?php
require_once "../common/connect.php";

$conn = connectDB();

if ($conn) {

// title,song name, gerne,author
    $sql = "SELECT tieude,ten_bhat,ten_tgia,ten_tloai FROM baiviet bv JOIN theloai tl ON tl.ma_tloai = bv.ma_bviet JOIN tacgia tg ON tg.ma_tgia = bv.ma_tgia";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stories= $stmt->fetchAll();

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
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Tên bài hát</th>
                    <th scope="col">Tác giả</th>
                    <th scope="col">Thể loại</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($stories as $index =>$story) {
                    echo '
                        <tr>
                            <th scope="row">2</th>
                            <td>'.$story["tieude"].'</td>
                            <td>'.$story["ten_bhat"].'</td>
                            <td>'.$story["ten_tgia"].'</td>
                            <td>'.$story["ten_tloai"].'</td>
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
