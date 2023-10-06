<?php
class Database{
    private $hostname='localhost';
    private $username='root';
    private $pass='';
    private $dbname='quanlysinhvien';

    private $conn=NULL;
    private $result =NULL;

    public function connect(){
        $this->conn = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);
        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        } else {
            mysqli_set_charset($this->conn, 'utf8');
        }
        return $this->conn;
    }
    
    public function execute($sql){
        $this->result=$this->conn->query($sql);
        return $this->result;
    }
    public function getData(){
        
        if($this->result){
            $data= mysqli_fetch_array($this->result);
        }
        else{
            $data=0;
        }
        return $data;
    }
    public function getAllData($table){
        $sql="SELECT * FROM $table";
        $this->execute($sql);
        if($this->num_rows()==0){
            $data=0;
        }
        else{
            while($datas=$this->getData()){
                $data[]=$datas;
            }
        }
        return $data;
    }
    //sua theo id
    public function getDataID($table,$id){
        $sql="SELECT * FROM $table WHERE id=$id";
        $this->execute($sql);
        if($this->num_rows()!=0){
            $data= mysqli_fetch_array($this->result);
        }
        else{
            $data=0;
        }
        return $data;
    }
    public function num_rows(){
        if($this->result){
            $num=mysqli_num_rows($this->result);
        }
        else{
            $num=0;
        }
        return $num;
    }
    //them du lieu
    public function InsertData($tenSinhVien,$email,$ngaySinh,$idLop){
        $sql="INSERT INTO sinhvien(id,tenSinhVien,email,ngaySinh,idLop) VALUES(null,'$tenSinhVien','$email','$ngaySinh','$idLop') ";
        return $this->execute($sql);
    }
    //them du lieu lop
    public function InsertDataClass($tenLop){
        $sql="INSERT INTO lop(id,tenLop) VALUES(null,'$tenLop') ";
        return $this->execute($sql);
    }
    //sua du lieu
    public function UpdateData($id,$tenSinhVien,$email,$ngaySinh,$idLop){
        $sql="UPDATE sinhvien SET tenSinhVien='$tenSinhVien',email='$email',ngaySinh='$ngaySinh',idLop='$idLop' WHERE id=$id";
        return $this->execute($sql);
    }
    //sua du lieu lop
    public function UpdateDataClass($id,$tenLop){
        $sql="UPDATE lop SET tenLop='$tenLop' WHERE id=$id";
        return $this->execute($sql);
    }
    //xoa du lieu
    public function Delete($id,$table){
        $sql="DELETE FROM $table WHERE id=$id";
        return $this->execute($sql);
    }
   
    

}
?>