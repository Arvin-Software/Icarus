<?php
$mainnav = 'components';
$curr = 'announce';
include '../header.php';
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
</style>
<div class="row">
            <div class="col-lg-2 fade-in text-black" style="background-color: #fff; padding: 0px 0px 0px 0px;">
                <?php
                include '../includenav.php';
                ?> 
            </div>
            <div class="col-lg-10 fade-in" id="" style="">
    <div class="container-fluid">
    <iframe src="invoice/index.php" frameborder="0" style="width: 100%; height:85vh;"></iframe>
        </div>
        </div>
        </div>
