<?php include 'header_ad.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
</head>
<body>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm tác giả</h3>
                <form action="handle_add_author.php" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblFullName">Họ tên tác giả</span>
                        <input type="text" class="form-control" name="txtFullNameAuthor">
                    </div>
                    <div class="form-group float-end">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="author.php" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include 'footer_ad.php'; ?>
</body>
</html>
