<?php
session_start();
include '../../classes/khatral.php';
if($_POST['id'] == "p"){
    $res = Khatral::khquery('SELECT * FROM mtrlsales WHERE usr=:acc', array(':acc'=>$_SESSION['office']));
    // $myArr = array(2);
    $count = 1;
    foreach($res as $p){
        $count = $count + 1;
    }
    $myArr = array($count, "Please Select");
    foreach($res as $p){
    
        array_push($myArr, $p['mtrl_nm']);
    $myJSON = json_encode($myArr);
    }
    echo $myJSON;
}else if($_POST['id'] == "g"){
    if($_POST['typ'] == "inv"){
        $res  = khatral::khquery('SELECT * FROM mtrlsales WHERE usr=:acc AND mtrl_nm=:invdes', array(':acc'=>$_SESSION['office'], ':invdes'=>$_POST['elem']));
        foreach($res as $p){
            $myArr = array($p['hsncode'], $p['rate'], $p['cgst'], $p['sgst']);
            $myJSON = json_encode($myArr);
        }
        echo $myJSON;
    }
}
?>