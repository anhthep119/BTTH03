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
        <h3>Danh sách Lớp</h3>
        <a href="index.php?controller=class&action=add" class="btn btn-success"><i class="bi bi-person-fill-add"></i>Thêm mới Lớp</a>
    <table class="table">
  <thead>
    <tr>
    <th scope="col">STT</th>
    <th scope="col">Mã Lớp</th>
      <th scope="col">Tên Lớp</th>
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
        <td><?php echo $value['tenLop'];?></td>
        
        <td>
            <a  href="index.php?controller=class&action=edit&id=<?php echo $value['id']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
        </td>
           <td> 
            <a href="index.php?controller=class&action=delete&id=<?php echo $value['id']; ?>" title="Xóa" class="btn btn-danger" onclick="return confirm('Nếu bạn xóa lớp này, tất cả sinh viên thuộc lớp sẽ bị Xóa, sau đó bạn mới có thể xóa Lớp, bạn có chắc không ? ?')"><i class="bi bi-trash3-fill"></i></a>
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