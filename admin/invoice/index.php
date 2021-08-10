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
    
    <div class="container-fluid bg-white soft-bor-ten" style="margin-top: 1%;">
        <div class="row" style="margin-top: 0%;">
            <div class="col-lg-3">
                <div class=" p-2  text-center bor-ten text-dark bg-white" style="">
                    <div class="card">
                        <div class="card-header text-left">Invoice Management</div>
                        <div class="card-body text-left">
                            <img src="../../images/invoiceadd.svg" alt="email" class="d-block mx-auto" style="width: 98px;">
                            <h6 style="margin-top: 26%;">Invoice</h6>
                            <p>You can create a new invoice, edit, print, etc with this</p>
                            <a  href="finyear.php">Go to invoice</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class=" p-2  text-center bor-ten text-dark bg-white" style="">
                    <div class="card">
                        <div class="card-header text-left">Inventory management</div>
                        <div class="card-body text-left">
                            <img src="../../images/inventory.svg" alt="email" class="d-block mx-auto" style="width: 98px;">
                            <h6 style="margin-top: 26%;">Inventory</h6>
                            <p>You can create a new inventory for your invoices with this</p>
                            <a  href="inventory.php">Go to inventory</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class=" p-2  text-center bor-ten text-dark bg-white" style="">
                    <div class="card">
                        <div class="card-header text-left">Customer management</div>
                        <div class="card-body text-left">
                            <img src="../../images/customer.svg" alt="email" class="d-block mx-auto" style="width: 98px;">
                            <h6 style="margin-top: 26%;">Customer</h6>
                            <p>You can create a new customer for your invoice with this</p>
                            <a  href="customer.php">Go to customer</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class=" p-2  text-center bor-ten text-dark bg-white" style="">
                    <div class="card">
                        <div class="card-header text-left">Settings</div>
                        <div class="card-body text-left">
                            <img src="../../images/settings.svg" alt="email" class="d-block mx-auto" style="width: 98px;">
                            <h6 style="margin-top: 26%;">Settings</h6>
                            <p>You can manage company info, invoice templates, etc with this</p>
                            <a  href="settings.php">Update settings</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    </div>
</div>
