<?php 
include_once '../config/Config.php';
$con = new Config();
if($con->auth()){
    switch (@$_GET['mod']){
        case 'joki':
            include_once 'controller/joki.php';
            break;
        default:
        include_once 'controller/home.php';
    }
}else{
    include_once 'controller/login.php';
}
?>