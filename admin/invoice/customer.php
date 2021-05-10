<?php
include '../headermodl.php';
include '../../icarus.php';
include '../../classes/khatral.php';
if(isset($_POST['submit'])){
    if(isset($_POST['submit'])){
        Khatral::khquery('INSERT INTO cont_list VALUES(\'\', :contnm, :contemail, :contphone, :contaddr, :contgst, :stcd, :consnm, :consemail, :consphone, :consaddr,:consgst, :conscd, :banknm, :ifsc, :otherbnk, :acc, :typ)', array(
            ':contnm'=>$_POST['connm'],
            ':contemail'=>$_POST['email'],
            ':contphone'=>$_POST['phno'],
            ':contaddr'=>$_POST['addr'],
            ':contgst'=>$_POST['contgst'],
            ':stcd'=>$_POST['stcd'],
            ':consnm'=>$_POST['consnm'],
            ':consemail'=>$_POST['consemail'],
            ':consphone'=>$_POST['consphno'],
            ':consaddr'=>$_POST['consaddr'],
            ':consgst'=>$_POST['consgst'],
            ':conscd'=>$_POST['conscd'],
            ':banknm'=>$_POST['banknm'],
            ':ifsc'=>$_POST['ifsc'],
            ':otherbnk'=>$_POST['bankdet'],
            ':acc'=>$_SESSION['office'],
            ':typ'=>"c"
    ));
    echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Customer successfully deleted.
      </div>';
    }
}

?>
<style>
    textarea:focus, 
            textarea.form-control:focus, 
            input.form-control:focus, 
            input[type=text]:focus, 
            input[type=password]:focus, 
            input[type=email]:focus, 
            input[type=number]:focus, 
            .custom-select:focus,
            .btn:focus,
            [type=text].form-control:focus, 
            [type=password].form-control:focus, 
            [type=email].form-control:focus, 
            [type=tel].form-control:focus, 
            [contenteditable].form-control:focus {
            box-shadow: inset 0 -1px 0 #fff;
            background-color: #f6f6f6;
            }
            .form-control:hover{
                background-color: #f6f6f6;
            }
            .folder{
                background: #fff;
                padding: 1% 1% 1% 1%;
                border-radius: 10px 10px 10px 10px;
            }
            .folder:hover{
                background-color: #f6f6f6;
            }
</style>
<div id="inc1" class="" style="height: 90vh;">
    <div class="p-4 container-fluid bg-white" style="">
        <div class="row">
            <div class="col-sm-4">
                
                
                
                
            </div>
            <div class="col-sm-4 text-center">
                <img src="../../images/customer.svg" alt="inventory" style="width: 48px;">
                <h3 style="margin-top: 2%;">Customers</h3><br>
                <a href="../index.php" class="btn btn-outline-primary rounded-circle"><i class="fas fa-home"></i></a>&nbsp;&nbsp;
                <a href="index.php" class="btn btn-outline-primary rounded-circle"><i class="far fa-arrow-alt-circle-left"></i></a>&nbsp;&nbsp;
                <?php 
                    if($_SESSION['typ'] != "2" && $_SESSION['typ'] != '1'){
                        echo '<button data-toggle="modal" data-target="#myModal" class="btn btn-outline-primary rounded-circle" style=""><i class="fas fa-plus"></i></button>&nbsp;&nbsp;';
                    }
                ?>
                <a href="#" class="btn btn-outline-primary rounded-circle"><i class="far fa-question-circle"></i></a>
            </div>
            <div class="col-sm-4 text-right">
                
            </div>    
        </div>    
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg shadow" style="margin-top: 5%;">
            <div class="modal-content bor-ten">
                <div class="modal-body">
                    <h4 class="text-center">New inventory</h4>
                    <p class="text-center">Create a new inventory to create invoice</p>
                    <form action="customer.php" method="post" autocomplete="off">
                        <div style="margin-left: 2%; margin-right: 2%;">
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Name</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="connm" id="connm" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Email</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="email" id="email" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Phone number</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="phno" id="phno" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Address</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <textarea name="addr" id="addr" cols="30" rows="4" style="border: none;" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">GSTIN</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="contgst" id="contgst" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">State Code</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="stcd" id="stcd" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Consignee Name</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="consnm" id="consnm" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Consignee Email</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="consemail" id="consemail" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Consignee Phone number</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="consphno" id="consphno" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Consignee Address</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <textarea name="consaddr" id="consaddr" cols="30" rows="4" style="border: none;" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Consignee GSTIN</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="consgst" id="consgst" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Consignee State Code</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="conscd" id="conscd" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Bank Name</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="banknm" id="banknm" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">IFSC Code</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="ifsc" id="ifsc" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Other bank details</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <textarea name="bankdet" id="bankdet" cols="30" rows="4" style="border: none;" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="submit" name="submit" class="btn float-right text-primary"><b>Create</b></button><button type="button" class="btn float-right  border-right text-primary" data-dismiss="modal">Cancel</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 2%;">
    <table class="table table-borderless border" id="tablex" style="border-collapse: separate; border-spacing: 0px;">
    <thead>
                <tr class="bg-primary text-white">
                    <!-- <th style="width: 50px;">Sl.no</th> -->
                    <th>Customer Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($_SESSION['typ'] != "1"){
                   $ret = khatral::khquery('SELECT * FROM cont_list WHERE acc=:inst AND typ=:typ', array(
                       ':inst'=>$_SESSION['office'],
                       ':typ'=>'c'
                   ));
                   foreach($ret as $p){
                       echo '<tr><td>' . $p['cont_nm'] . '</td><td><a href="#" class="btn btn-outline-danger  rounded-circle" style=""><i class="far fa-trash-alt"></i></a></td></tr>';
                   }
                }else{
                    $ret = khatral::khquery('SELECT * FROM cont_list WHERE typ=:typ', array(
                        ':typ'=>'c'
                    ));
                    foreach($ret as $p){
                        echo '<tr><td>' . $p['cont_nm'] . '</td><td><a href="#" class="btn btn-outline-danger  rounded-circle" style=""><i class="far fa-trash-alt"></i></a></td></tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
