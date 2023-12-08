<?php include '../header_ad.php' ?>
<?php
require_once "../../common/connect.php";

$conn = connectDB();

if ($conn) {


        $sql = "SELECT * FROM users";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll();

} else {
    echo 'Connection failure!';
}
?>
<main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <a href="process_add_user.php" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Họ tên</th>
                            <th scope="col">Ngày sinh</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Email</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($users as $index =>$user) {
                        echo '
                        <tr>
                            <th scope="row">'.($index +1).'</th>
                            <td>'.$user["full_name"].'</td>
                            <td>'.$user["birth"].'</td>
                            <td>'.$user["phone"].'</td>
                            <td>'.$user["email"].'</td>
                            <td>
                                <a href="edit_user.php?id='.$user['id'].'"><i class="fa-solid fa-pen-to-square"></i></a>
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
    <?php include '../footer_ad.php' ?>
