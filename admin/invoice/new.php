<?php
  include '../../classes/khatral.php';
  include '../../icarus.php';
  include '../headermodl.php';
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
</head>
<div id="inc1" class="" style="height: 90vh;">
    <div class="p-4 container-fluid border bg-white" style="">
        <div class="row">
            <div class="col-sm-4">
                
                
                
                
            </div>
            <div class="col-sm-4 text-center">
                <!-- <img src="../../images/invoiceadd.svg" alt="inventory" style="width: 48px;"> -->
                <h3 style="margin-top: 2%;">New invoice</h3><br>
                <a href="invoice.php?year=<?php echo $_GET['year']; ?>" class="btn btn-outline-primary rounded-circle"><i class="far fa-arrow-alt-circle-left"></i></a>&nbsp;&nbsp;
                <a href="#" class="btn btn-outline-primary rounded-circle"><i class="far fa-question-circle"></i></a>
            </div>
            <div class="col-sm-4 text-right">
                
            </div>    
        </div>    
    </div>
<div class="bg-light" style="overflow: auto; height: 80vh; padding-top: 2%; padding-bottom: 5%;">


    <?php
      date_default_timezone_set('Asia/Kolkata');
      $date1 = date('dmYhis', time());
          if(isset($_POST['submit'])){
            // inventor::insertGIN($_POST['ginno'], $_POST['dt'], $_POST['grsno'], $_POST['dept']);
            if($_POST['stat'] == "Sales Order"){
                icarus::insertEntrySo($_POST['dt'], $_GET['year'], $_POST['dept'], $_POST['pono'], '', $_POST['valid'], $_POST['stat']);
            }else if($_POST['stat'] == "Invoice"){
                icarus::insertEntrySo($_POST['dt'], $_GET['year'], $_POST['dept'], '', $_POST['pono'], $_POST['valid'], $_POST['stat']);
            }else{
                icarus::insertEntrySo($_POST['dt'], $_GET['year'], $_POST['dept'], $_POST['pono'], '', $_POST['valid'], $_POST['stat']);
            }
            
            // icarus::insertdet($_POST['dt'], $_POST['supnm'], $_POST['invno'], $_POST['dcno'], $_SESSION['instnm']);
            $ret = khatral::khquery('SELECT * FROM entryso WHERE inst=:usr ORDER BY entryid DESC LIMIT 1', array(':usr'=>$_SESSION['office']));
            $val = '';
            foreach($ret as $p){
                $val = $p['entryid'];
            }
            $loopval = $_POST['num'];
            for($i = 0; $i <= $loopval; $i++){
                if(isset($_POST['prod' . $i])){
                    // echo "Exists " . $i . '<br />';
                            
                    icarus::insertItemsSo($_POST['prod' . $i], $_POST['hsn' . $i], $_POST['dt' . $i], $_POST['rt' . $i], $_POST['cgstper' . $i], $_POST['sgstper' . $i], $_POST['amt' . $i], $val);
                           
                }else{
                    // echo "Not Exists " . $i . '<br />';
                }
            }
            icarus::insertSotxTot($_POST['fri'], $_POST['dis'], $_POST['terms'], $val);
            echo '<div class="container"><div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> Sales Order created successfully. click <a href="invoice.php">here</a> to go back home
          </div></div>';
        //   header("Location: invoice.php");
        }
    ?>
    <div class="container bor-ten p-4 border" style="padding-top: 2%; width: 97vw; background-color: #FFFFFF;">

        <h2 class="float-right">Total : <input type="text" id="totl" name="totl" class="" disabled="" style="font-size: 32px; text-align: right; width: 10em;background-color: #fff; border:none;" value="0.0"></h2><br> <br>
        <form action="new.php?year=<?php echo $_GET['year']; ?>" method="post" class="bg-white bor-ten " style="" autocomplete="off">
        <div class="container" style="padding: 2% 2% 2% 2%;">
            <div class="form-group row border">
                <label for="unm" class="col-sm-4 col-form-label border-right">Date</label>
                <div class="col-sm-4" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                    <input type="date" name="dt" id="dt" style="border: none;" class="form-control" required="">
                </div>
            </div>
            <div class="form-group row border">
                <label for="unm" class="col-sm-4 col-form-label border-right">Quote / Order / Invoice Number</label>
                <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                    <input type="text" name="pono" id="pono" style="border: none;" class="form-control" required="">
                </div>
            </div>
            <div class="form-group row border">
                <label for="unm" class="col-sm-4 col-form-label border-right">Type</label>
                <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                    <select name="stat" id="stat" class="custom-select" style="border: none;">
                        <option>Quote</option>
                        <option>Sales Order</option>
                        <option>Invoice</option>
                    </select>
                </div>
            </div>
            <div class="form-group row border">
                <label for="unm" class="col-sm-4 col-form-label border-right">Valid upto</label>
                <div class="col-sm-4" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                    <input type="date" name="valid" id="valid" style="border: none;" class="form-control" required="">
                </div>
            </div>
            <div class="form-group row border">
                <label for="unm" class="col-sm-4 col-form-label border-right">Customer Name</label>
                <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                    <select name="dept" id="dept" class="custom-select" style="border: none;">
                        <?php
                            date_default_timezone_set('Asia/Kolkata');
                            $date1 = date('dmYhis', time());
                            $ret = khatral::khquery('SELECT * FROM cont_list WHERE typ=:typ AND acc=:inst', array(
                                ':typ'=>"c",
                                ':inst'=>$_SESSION['office']
                            ));
                            foreach($ret as $p){
                                echo '<option>' . $p['cont_nm'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
            <hr>
            <h5 class="text-center">Other charges</h5>
            <div class="form-group row border">
                    <label for="unm" class="col-sm-4 col-form-label border-right">Freight Cost</label>
                    <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                        <input type="text" name="fri" id="fri" style="border: none;" class="form-control" required="">
                    </div>
                </div>
                <div class="form-group row border">
                    <label for="unm" class="col-sm-4 col-form-label border-right">Discount</label>
                    <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                        <input type="text" name="dis" id="dis" style="border: none;" class="form-control" required="">
                    </div>
                </div>
                <hr>
                <h5 class="text-center">Other details</h5>
            <div class="form-group row border" style="">
                <label for="unm" class="col-sm-4 col-form-label border-right">Terms and Conditions</label>
                <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                    <textarea name="terms" id="terms" cols="20" rows="5" class="form-control" required=""  style="border: none;"></textarea>
                </div>
            </div>
            <div class="form-group" style="display: none;">
                Total Products
                <input type="text" name="num" id="num" value="0" class="form-control" required="" >
            </div>
            </div>
            <div class="">
            <div class="table-responsive">
            <table class="border table table-bordered" id="here_table">
                <a href="#" class="btn btn-outline-primary float-right" id="addbut" name="addbut">Add row</a><br />
                <tr class="bg-primary text-white">
                    <th style="width: 250px;">Item Details</th>
                    <th>HSN Code</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>CGST %</th>
                    <th>SGST %</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>  
                
            </table>
            </div>
                
            <input type="submit" value="Save" class="btn btn-primary" id="submit" name="submit" style="margin-top: 20px;">
            
        </form>
    </div>
         <script src="interface.js"></script>
</body>