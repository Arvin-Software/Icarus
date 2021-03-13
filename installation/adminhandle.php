<?php
include '../classes/khatral.php';
include '../icarus.php';
if(isset($_POST['submit'])){
    $nm = $_POST['unme'];
    $pass = $_POST['pass'];
    $role = "1";
    $ret = icarus::InsertUsers($nm, $pass, $role);
    if($ret == '1'){
        echo 'admin account already created<br />';
        echo '<a href="complete.php">continue</a>';
    }else{
        header("Location: complete.php");
    }
    
}
?>