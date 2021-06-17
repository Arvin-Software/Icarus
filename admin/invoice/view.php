<?php
include '../headermodl.php';
include '../../icarus.php';
include '../../classes/khatral.php';
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
                <img src="../../images/invoice.svg" alt="inventory" style="width: 48px;">
                <h3 style="margin-top: 2%;">View/Print</h3><br>
                <a href="invoice.php?year=<?php echo $_GET['year']; ?>" class="btn btn-outline-primary rounded-circle"><i class="far fa-arrow-alt-circle-left"></i></a>&nbsp;&nbsp;
                <button type="button" onclick="PrintDiv();" class="btn btn-outline-primary  rounded-circle"><i class="fas fa-print"></i></button>&nbsp;&nbsp;
                <a href="#" class="btn btn-outline-primary rounded-circle"><i class="far fa-question-circle"></i></a>
            </div>
            <div class="col-sm-4 text-right">
                
            </div>    
        </div>    
    </div>
<script type="text/javascript">
        function PrintDiv() {
            document.getElementById("printf").contentWindow.print();
        }
    </script>
<div class="container-fluid" style="width: 98vw; background-color: #FFFFFF;">
<iframe class="border-0" src="print.php?id=<?php echo $_GET['id']; ?>&stat=<?php echo $_GET['stat']; ?>" id="printf" name="printf" style="height: 75vh; width: 100%; overflow: auto;"></iframe>