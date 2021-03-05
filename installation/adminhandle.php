<?php
include '../classes/khatral.php';
include '../valai.php';
if(isset($_POST['submit'])){
    $nm = $_POST['unme'];
    $pass = $_POST['pass'];
    $role = "2";
    $ret = valai::InsertUsers($nm, $pass, $role);
    if($ret == '1'){
        echo 'admin account already created<br />';
        echo '<a href="complete.php">continue</a>';
    }else{
        header("Location: complete.php");
    }
    
}
?>