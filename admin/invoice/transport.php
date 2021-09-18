<?php
include '../headermodl.php';
include '../../icarus.php';
include '../../classes/khatral.php';
if(isset($_POST['submit'])){
    $entrypo = $_POST['entrypo'];
    $vehdet = $_POST['vehdet'];
    $dsupp = $_POST['dsupply'];
    $psupp = $_POST['psupply'];
    $othdet = '';
    icarus::insertTransport($entrypo, $vehdet, $dsupp, $psupp, $othdet);
    echo 'Saved';
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
    <div class="container-fluid bg-light" style="">
        <div class="row">
            <div class="col-sm-4">
            <a href="invoice.php?year=<?php echo $_GET['year']; ?>" class="btn btn-light"><i class="far fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Back</a>&nbsp;&nbsp;
            <!-- <a href="tran" class="btn btn-light"><i class="fas fa-print"></i>&nbsp;&nbsp;Save</a> -->
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
<div class="container-fluid" style="margin-top: 2%;">
<h3>Transport Details for invoice no : <?php echo $_GET['inv']; ?></h3>
    <form action="transport.php?id=<?php echo $_GET['id']; ?>&inv=<?php echo $_GET['inv']; ?>&year=<?php echo $_GET['year']; ?>" method="post">
    <?php
    $vehdet = '';
    $dsupp = '';
    $psupp = '';
    $ret = khatral::khquery('SELECT * FROM transport_sales WHERE entry_po=:id', array(
        ':id'=>$_GET['id']
    ));
    foreach($ret as $p){
        $vehdet = $p['veh_det'];
        $dsupp = $p['date_supp'];
        $psupp = $p['place_supp'];
    };
    ?>
        <input type="text" name="entrypo" id="entrypo" value="<?php echo $_GET['id']; ?>" style="display:none;">
        <div class="form-group row border">
            <label for="unm" class="col-sm-4 col-form-label border-right">Vehicle Details</label>
            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                <input type="text" name="vehdet" id="vehdet" style="border: none;" class="form-control" required="" value="<?php echo $vehdet; ?>">
            </div>
        </div>
        <div class="form-group row border">
            <label for="unm" class="col-sm-4 col-form-label border-right">Date of Supply</label>
            <div class="col-sm-4" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                <input type="date" name="dsupply" id="dsupply" style="border: none;" class="form-control" required=""  value="<?php echo $dsupp; ?>">
            </div>
        </div>
        <div class="form-group row border">
            <label for="unm" class="col-sm-4 col-form-label border-right">Place of supply</label>
            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                <input type="text" name="psupply" id="psupply" style="border: none;" class="form-control" required=""  value="<?php echo $psupp; ?>">
            </div>
        </div>
        <button type="submit" id="submit" name="submit" class="btn btn-primary border">Save</button>
    </form>
</div>
