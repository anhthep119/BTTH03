<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới Sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <?php
    include"layouts/header.php";
    ?>
        <h3 class="my-4">Thêm mới Sinh viên</h3>
        
        <form action="" method="post">
            <div class="mb-3">
                <label for="tenSinhVien" class="form-label">Tên Sinh viên</label>
                <input type="text" class="form-control" name="tenSinhVien" id="tenSinhVien">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="ngaySinh" class="form-label">Ngày Sinh</label>
                <input type="text" class="form-control" name="ngaySinh" id="ngaySinh">
            </div>
            <div class="mb-3">
                <label for="idLop" class="form-label">Mã Lớp</label>
                <select class="form-select" name="idLop" id="idLop">
        <?php
        $db = new Database();
        $conn = $db->connect();
        
        $sql = "SELECT id, tenLop FROM Lop";
        $result = $db->execute($sql);
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='{$row['id']}'>{$row['tenLop']}</option>";
        }
        ?>
                </select>
        </div>
            <button type="submit" name="add" class="btn btn-success">Thêm mới</button>
            <a href="index.php?controller=students&action=list" class="btn btn-danger">Quay Lại</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
