<?php
include '../headermodl.php';
include '../../icarus.php';
include '../../classes/khatral.php';
if(isset($_POST['submit'])){
    icarus::insertmtrlsales($_POST['matcd'], $_POST['matnm'], $_POST['hsn'], $_POST['rte'], $_POST["cgst"], $_POST["sgst"], $_POST['quant'], $_POST["loc"]);
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> Sales Inventory created successfully.
          </div>';
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
                <img src="../../images/inventory.svg" alt="inventory" style="width: 48px;">
                <h3 style="margin-top: 2%;">Inventory</h3><br>
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
                    <form action="inventory.php" method="post" autocomplete="off">
                        <div style="margin-left: 2%; margin-right: 2%;">
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Material Code</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="matcd" id="matcd" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Product Name</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="matnm" id="matnm" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">HSN Code</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="hsn" id="hsn" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Rate</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="rte" id="rte" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">CGST / IGST</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="cgst" id="cgst" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">SGST</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="sgst" id="sgst" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Opening Quantity</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="quant" id="quant" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Location in store</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="loc" id="loc" style="border: none;" class="form-control" required="">
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
        <table class="table border table-borderless" id="table" style="">
            <thead>
                <tr class="bg-primary text-white">
                    <!-- <th style="width: 50px;">Sl.no</th> -->
                    <th>Code</th>
                    <th>Product name</th>
                    <th>Rate</th>
                    <th>CSGT / IGST</th>
                    <th>SGST</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = 0;
                    if($_SESSION['typ'] != "1"){
                    $ret = khatral::khquery('SELECT * FROM mtrlsales WHERE usr=:usr', array(':usr'=>$_SESSION['office']));
                    $count = 0;
                    foreach($ret as $p){
                        $count= $count + 1;
                        echo '<tr><td>' . $p['code'] . '</td><td>' . $p['mtrl_nm'] . '</td><td>&#8377;&nbsp;' . $p['rate'] . '</td><td>' . $p['cgst'] . ' %</td><td>' . $p['sgst'] . ' %</td><td style="text-align: center;"><a href="mtrl.php?id=' . $p['mtrl_id'] . '&nm=' . $p['mtrl_nm'] . '" class="btn btn-outline-danger  rounded-circle" style=""><i class="far fa-trash-alt"></i></a></td></tr>';
                    }
                    }else{
                        $ret = khatral::khquerypar('SELECT * FROM mtrlsales');
                        $count = 0;
                        foreach($ret as $p){
                            $count= $count + 1;
                            echo '<tr><td>' . $p['code'] . '</td><td>' . $p['mtrl_nm'] . '</td><td>&#8377;&nbsp;' . $p['rate'] . '</td><td>' . $p['cgst'] . ' %</td><td>' . $p['sgst'] . ' %</td><td style="text-align: center;"><a href="mtrl.php?id=' . $p['mtrl_id'] . '&nm=' . $p['mtrl_nm'] . '" class="btn btn-outline-danger  rounded-circle" style=""><i class="far fa-trash-alt"></i></a></td><td>' . $p['usr'] . '</td></tr>';
                        }
                    }
                    
                ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
