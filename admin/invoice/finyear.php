<?php
include '../headermodl.php';
include '../../classes/khatral.php';
include '../../icarus.php';
if(isset($_POST['submit'])){
    $from_to = $_POST['from_dt'] . " - " . $_POST['to_dt'];
    $inst = $_SESSION['office'];
    icarus::insertFinYear($from_to, $inst);
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
<div id="inc1" class="" style="">
    <div class="container-fluid bg-light" style="">
        <div class="row">
            <div class="col-sm-4">
            <a href="index.php" class="btn btn-light"><i class="far fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Back</a>&nbsp;&nbsp;
                <?php 
                    if($_SESSION['typ'] != "2" && $_SESSION['typ'] != '1'){
                        echo '<button data-toggle="modal" data-target="#myModal" class="btn btn-light" style=""><i class="fas fa-plus"></i>&nbsp;&nbsp;New</button>&nbsp;&nbsp;';
                    }
                ?>
                <a href="#" class="btn btn-light"><i class="far fa-question-circle"></i>&nbsp;&nbsp;Help</a>
                
                
                
            </div>
            <div class="col-sm-4 text-center">
                <!-- <img src="../../images/invoiceadd.svg" alt="inventory" style="width: 48px;">
                <h3 style="margin-top: 2%;">New Financial Year</h3><br> -->
                <!-- <a href="../index.php" class="btn btn-outline-primary rounded-circle"><i class="fas fa-home"></i></a>&nbsp;&nbsp; -->
                
            </div>
            <div class="col-sm-4 text-right">
                
            </div>    
        </div>    
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg shadow" style="margin-top: 5%;">
            <div class="modal-content bor-ten">
                <div class="modal-body">
                    <h4 class="text-center">New Financial Year</h4>
                    <p class="text-center">Create a new financial year to categorize invoices</p>
                    <form action="finyear.php" method="post" autocomplete="off">
                        <div style="margin-left: 2%; margin-right: 2%;">
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Date From</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="date" name="from_dt" id="from_dt" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Date To</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="date" name="to_dt" id="to_dt" style="border: none;" class="form-control" required="">
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
<body class="bg-light">
    <div class="container-fluid bor-none" style="padding-top: 1%; width: 98vw; background-color: #FFFFFF;">
        <!-- <h4><i class="fas fa-file-invoice"></i>&nbsp;Sales Order</h4> -->
        
        <div class="bg-white table-responsive" style="padding: 0% 0% 0% 0%;">
        
        <table class="table table-borderless border">
            <tr class="bg-light" style="background-color: rgba(255, 247, 224, 1);">
                <th>SL.NO</th>
                <th>Financial Year</th>
                <!-- <th>Number of invoices</th> -->
                <th>Actions</th>
            </tr>
            
            <?php
                $ret = khatral::khquery('SELECT * FROM fin_year WHERE year_inst=:inst', array(':inst'=>$_SESSION['office']));
                $count = 0;
                foreach($ret as $p){
                    $count = $count + 1;
                    echo ' <tr class="border-bottom">
                    <td>' . $count . '</td>
                    <td class="">' . $p['year_from_to'] . '</td>';
                    echo '<td><a href="invoice.php?year=' . $p['year_from_to'] . '" class="btn btn-outline-dark rounded-circle" style=""><i class="far fa-eye"></i></td>';
                    echo '</tr>';
                }
            ?>        
        </table>
        </div>
    </div>
</body>