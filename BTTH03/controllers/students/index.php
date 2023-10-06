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
            $tenSinhVien=$_POST['tenSinhVien'];
            $email=$_POST['email'];
            $ngaySinh=$_POST['ngaySinh'];
            $idLop=$_POST['idLop'];
            $db = new Database();
            $conn = $db->connect();
           if($db->InsertData($tenSinhVien,$email,$ngaySinh,$idLop)){
                $thanhcong='add_success';
                header('location: index.php?controller=students&action=list');
           }


        }
        require_once('views/students/add.php');
        break;
    }
    case 'edit':{
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $tbltable="sinhvien";
            $dataID=$db->getDataID($tbltable,$id);
            
            if(isset($_POST['edit'])){
                //lay dl tu vỉew
                $tenSinhVien=$_POST['tenSinhVien'];
                $email=$_POST['email'];
                $ngaySinh=$_POST['ngaySinh'];
                $idLop=$_POST['idLop'];
                //truyen sang model
                if($db->UpdateData($id,$tenSinhVien,$email,$ngaySinh,$idLop)){
                    header('location: index.php?controller=students&action=list');
                }

            }
        }
        require_once('views/students/edit.php');
        break;
    }
    case 'delete':{
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $tbltable="sinhvien";
            if($db->Delete($id,$tbltable)){
                header('location: index.php?controller=students&action=list');
            }
            else{
                header('location: index.php?controller=students&action=list');
            }
        }
        //require_once('views/students/delete.php');
        break;
    }
    case 'list':{
        $tbltable="sinhvien";
        $data=$db->getAllData($tbltable);
        require_once('views/students/list.php');
        break;
    }
    default:{
        require_once('views/students/list.php');
        break;
    }
}
?>