<?php
include '../headermodl.php';
include '../../icarus.php';
include '../../classes/khatral.php';
if(isset($_POST['submit'])){
    icarus::InsertBoards($_POST['boardnm']);
    // echo 'successfully saved';
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
    <div class="p-4 border container-fluid bg-white" style="">
        <div class="row">
            <div class="col-sm-4">
                
                
                
                
            </div>
            <div class="col-sm-4 text-center">
            <img src="../../images/invoice.svg" alt="inventory" style="width: 48px;">
                <h3 style="margin-top: 2%;">Invoice generator</h3><br>
                <a href="../index.php" class="btn btn-outline-primary rounded-circle"><i class="far fa-arrow-alt-circle-left"></i></a>&nbsp;&nbsp;
                <a href="#" class="btn btn-outline-primary rounded-circle"><i class="far fa-question-circle"></i></a>
            </div>
            <div class="col-sm-4 text-right">
                
            </div>    
        </div>    
    </div>
    <div class="container">
        <div class="row" style="margin-top: 0%;">
            <div class="col-lg-4">
                <div class=" p-4  text-center bor-ten text-dark bg-white" style="">
                    <a href="invoice/index.php" class="btn text-primary bor-ten text-dark"><img src="../../images/invoiceadd.svg" alt="email" class="p-4" style="width: 128px;">
                    <br>
                    New Invoice</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class=" p-4  text-center bor-ten text-dark bg-white" style="">
                    <a href="inventory.php" class="btn text-primary bor-ten text-dark"><img src="../../images/inventory.svg" alt="email" class="p-4" style="width: 128px;">
                    <br>
                    Inventory</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class=" p-4  text-center bor-ten text-dark bg-white" style="">
                    <a href="customer.php" class="btn text-primary bor-ten text-dark"><img src="../../images/customer.svg" alt="email" class="p-4" style="width: 128px;">
                    <br>
                    Customers</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class=" p-4  text-center bor-ten text-dark bg-white" style="">
                    <a href="invoice/index.php" class="btn text-primary bor-ten text-dark"><img src="../../images/settings.svg" alt="email" class="p-4" style="width: 128px;">
                    <br>
                    Settings</a>
                </div>
            </div>
            
        </div>
    </div>
    </div>
</div>
