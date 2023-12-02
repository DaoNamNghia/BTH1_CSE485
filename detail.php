<?php include 'common/header.php'  ?>
    <main class="container mt-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->


        <?php
        require_once "common/connect.php";

        $conn = connectDB();


        if ($conn) {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM baiviet  JOIN theloai ON theloai.ma_tloai = baiviet.ma_tloai  JOIN tacgia ON tacgia.ma_tgia = baiviet.ma_tgia  WHERE ma_bviet = $id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $story = $stmt->fetch();
            echo '
            
                <div class="row mb-5">
                    <div class="col-sm-4">
                        <img src="'.$story["hinhanh"].'" class="img-fluid" alt="...">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="card-title mb-2">
                            <a href="" class="text-decoration-none">'.$story["tieude"].'</a>
                        </h5>
                        <p class="card-text"><span class=" fw-bold">Bài hát: </span>'.$story["ten_bhat"].'</p>
                        <p class="card-text"><span class=" fw-bold">Thể loại: </span>'.$story["ten_tloai"].'</p>
                        <p class="card-text"><span class=" fw-bold">Tóm tắt: </span>'.$story["tomtat"].'</p>
                        <p class="card-text"><span class=" fw-bold">Nội dung: </span>'.$story["noidung"].'</p>
                        <p class="card-text"><span class=" fw-bold">Tác giả: </span>'.$story["ten_tgia"].'</p>

                    </div>          
                </div>
            ';
            }
        } else {
            echo 'Connection failure!';
        }
        ?>

    </main>
<?php include 'common/footer.php'  ?>

