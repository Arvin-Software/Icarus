<?php
$inst = "installation";
include '../header.php';
?>
<body class="" style="background-color: #FFFFFF;">
<div class="container-fluid" style="margin-top: 10%;">
     <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 bg-white shadow border p-4 text-center bor-twen">
        <img src="../images/icaruslogo1ba.png" alt="valai" style="width: 128px;" class="mx-auto d-block">
        <br>
        <h4>Icarus - Admin Creation</h4>
        <form action="adminhandle.php" method="post" class="text-left">
            <div class="form-group">
                <label for="unme">Username</label>
                <input type="text" name="unme" id="unme" class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" class="form-control" required="">
            </div>
            <div class="form-group">
                <input type="submit" value="Save and continue" id="submit" name="submit" class="btn btn-primary">
            </div>
        </form>
        </div>
        <div class="col-sm-4"></div>
     </div>