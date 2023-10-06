<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAnh sach sinh vien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    
    <div class="container">
    <?php
    include"layouts/header.php";
    ?>
        <h3>Danh sách Sinh viên</h3>
        <a href="index.php?controller=students&action=add" class="btn btn-success"><i class="bi bi-person-fill-add"></i>Thêm mới sinh viên</a>
    <table class="table">
  <thead>
    <tr>
    <th scope="col">STT</th>
    <th scope="col">Mã Sinh viên</th>
      <th scope="col">Tên Sinh Viên</th>
      <th scope="col">Email</th>
      <th scope="col">Ngày Sinh</th>
      <th scope="col">Mã Lớp</th>
      <th scope="col">Sửa</th>
      <th scope="col">Xóa</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $stt=1;
    foreach($data as $value){

    
    ?>
    <tr>
        <td><?php echo $stt;?></td>
        <td><?php echo $value['id'];?></td>
        <td><?php echo $value['tenSinhVien'];?></td>
        <td><?php echo $value['email'];?></td>
        <td><?php echo $value['ngaySinh'];?></td>
        <td><?php echo $value['idLop'];?></td>
        <td>
            <a  href="index.php?controller=students&action=edit&id=<?php echo $value['id']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
        </td>
           <td> 
            <a href="index.php?controller=students&action=delete&id=<?php echo $value['id']; ?>" title="Xóa" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không ?')"><i class="bi bi-trash3-fill"></i></a>
        </td>

    </tr>
    <?php
        $stt++;
        }   
    ?>
    
  </tbody>
</table>
    </div>
</body>
</html>