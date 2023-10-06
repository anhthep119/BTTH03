<?php
//include"models/DBconfig.php";
if(isset($_GET['action'])){
    $action=$_GET['action'];

}
else{
    $action='';
}
$thanhcong=array();
switch($action){
    case 'add':{
        if(isset($_POST['add'])){
            $tenLop=$_POST['tenLop'];
           
            $db = new Database();
            $conn = $db->connect();
           if($db->InsertDataClass($tenLop)){
                $thanhcong='add_success';
                header('location: index.php?controller=class&action=list');
           }


        }
        require_once('views/class/add.php');
        break;
    }
    case 'edit':{
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $tbltable="lop";
            $dataID=$db->getDataID($tbltable,$id);
            
            if(isset($_POST['edit'])){
                //lay dl tu vỉew
                $tenLop=$_POST['tenLop'];
                
                //truyen sang model
                if($db->UpdateDataClass($id,$tenLop)){
                    header('location: index.php?controller=class&action=list');
                }

            }
        }
        require_once('views/class/edit.php');
        break;
    }
    case 'delete': {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $tbltable = "lop";
    
            // Bước 1: Lấy danh sách Sinh viên thuộc Lớp cần xóa
            $sqlGetStudentsInClass = "SELECT id FROM SinhVien WHERE idLop = $id";
            $result = $db->execute($sqlGetStudentsInClass);
    
            // Bước 2: Xóa tất cả các Sinh viên thuộc Lớp đó từ bảng SinhVien
            while ($row = mysqli_fetch_assoc($result)) {
                $studentId = $row['id'];
                $tbltable = "sinhvien";
                $db->Delete($studentId, $tbltable);
            }
    
            // Bước 3: Sau khi xóa tất cả các Sinh viên, bạn có thể xóa Lớp
            if($db->Delete($id, $tbltable)) {
                header('location: index.php?controller=class&action=list');
            } else {
                header('location: index.php?controller=class&action=list');
            }
        }
        break;
    }
    
    case 'list':{
        $tbltable="lop";
        $data=$db->getAllData($tbltable);
        require_once('views/class/list.php');
        break;
    }
    default:{
        require_once('views/class/list.php');
        break;
    }
}
?>