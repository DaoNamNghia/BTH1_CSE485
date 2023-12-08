<?php include 'header_ad.php' ?>
<?php
require_once "../common/connect.php";

$conn = connectDB();

if ($conn) {


        $sql = "SELECT * FROM theloai";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll();

} else {
    echo 'Connection failure!';
}
?>
<main class="container mt-5 mb-5">
    <?php
    if (isset($_SESSION['notify_category_successfully'])) {
        echo '
    <div class="alert alert-success text-center" role="alert">
        ' . $_SESSION['notify_category_successfully'] . '
    </div>';
        unset($_SESSION['notify_category_successfully']);
    }

    if (isset($_SESSION['notify_category_violation'])) {
        echo '
    <div class="alert alert-danger text-center" role="alert">
        ' . $_SESSION['notify_category_violation'] . '
    </div>';
        unset($_SESSION['notify_category_violation']);
    }
    ?>
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
                    foreach ($categories as $index =>$category) {
                        echo '
                        <tr>
                            <th scope="row">'.($index +1).'</th>
                            <td>'.$category["ten_tloai"].'</td>
                            <td>
                                <a href="edit_category.php?id='.$category["ma_tloai"].'"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a class="btn-delete" href="delete_category.php?id='.$category["ma_tloai"].'" cat-name = "'.$category["ten_tloai"].'"><i class="fa-solid fa-trash"></i></a>
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
        <?php
        include '../common/common_file.php';
        include 'footer_ad.php' ;

        ?>


<script>
    $(document).ready(function () {
        $('.btn-delete').on('click', function (e) {
            e.preventDefault();

            var link = $(this).attr("href");
            var catName = $(this).attr("cat-name");
            var modalTitle = "Xác nhận";
            var modalContent = "Bạn có muốn xóa thể loại: " + catName + " không?";

            // Update modal content
            $('#modal_yes_no .modal-title').text(modalTitle);
            $('#modal_yes_no .modal-body').text(modalContent);

            // Show the modal
            $('#modal_yes_no').modal('show');

            $('#btn-confirm').on('click', function () {
                $(this).attr("href",link);
            });
        });
    });
</script>