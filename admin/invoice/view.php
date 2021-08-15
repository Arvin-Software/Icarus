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
    <div class="container-fluid bg-light" style="">
        <div class="row">
            <div class="col-sm-4">
            <a href="invoice.php?year=<?php echo $_GET['year']; ?>" class="btn btn-light"><i class="far fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Back</a>&nbsp;&nbsp;
            <button type="button" onclick="PrintDiv();" class="btn btn-light"><i class="fas fa-print"></i>&nbsp;&nbsp;Print</button>
            <a href="#" class="btn btn-light"><i class="far fa-question-circle"></i>&nbsp;&nbsp;Help</a>
                
                
            </div>
            <div class="col-sm-4 text-center">
                
                <!-- <button type="button" onclick="PrintDiv();" class="btn btn-outline-primary  rounded-circle"><i class="fas fa-print"></i></button>&nbsp;&nbsp;
                <a href="#" class="btn btn-outline-primary rounded-circle"><i class="far fa-question-circle"></i></a> -->
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
<?php
$filnm = '';
$ret = khatral::khquery('SELECT * FROM print_temp_so WHERE off_nm=:offnm', array(
    ':offnm'=>$_SESSION['office']
));
foreach($ret as $p){
    $filnm = $p['temp_file'];
}
?>
<iframe class="border-0" src="../../printtemp/<?php echo $filnm; ?>?id=<?php echo $_GET['id']; ?>&stat=<?php echo $_GET['stat']; ?>" id="printf" name="printf" style="height: 90vh; width: 100%; overflow: auto;"></iframe>