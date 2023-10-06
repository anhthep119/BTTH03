<?php
include "models/DBconfig.php";
$db= new Database;
$db->connect();
if(isset($_GET['controller'])){
    $controller=$_GET['controller'];

}
else{
    $controller='';
}
switch($controller){
    case 'students':{
        require_once('controllers/students/index.php');
        break;
    }
    case 'class' :{
        require_once('controllers/class/index.php');
        break;
    }
}
?>