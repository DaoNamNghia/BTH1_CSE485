<?php include 'common/header.php'  ?>

?>

<main class="container-fluid mt-3">



        <h3 class="text-center text-uppercase mb-3 text-primary">TOP bài hát yêu thích</h3>
        <div class="row">
            <?php
            require_once "common/connect.php";

            $conn = connectDB();

            if ($conn) {
                $sql = "SELECT * FROM baiviet";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $stories = $stmt->fetchAll();

                foreach ($stories as $story) {
                    echo '
                        <div class="col-sm-3 mb-5">
                            <div class="card mb-2" style="width: 100%;">
                                <img src="' . $story["hinhanh"] . '" class="card-img-top" style="max-height: 295px" alt="...">
                                <div class="card-body" style="background-color: #fff">
                                    <h5 class="card-title text-center">
                                        <a href="detail.php?id=' .$story["ma_bviet"].'" class="text-decoration-none">' . $story["tieude"] . '</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    ';

                }
            } else {
                echo 'Connection failure!';
            }
            ?>

        </div>
    </main>
    <?php include 'common/footer.php'  ?>
