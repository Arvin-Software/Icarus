<?php
$mainnav = 'office';
include '../header.php';
if(isset($_POST['submit'])){
    $ret = icarus::InsertOffice($_POST['unme']);
    if($ret == "0"){
      echo 'Office created';
    }else{
      echo 'Office already exists';
    }
}
if(isset($_GET['id'])){
    $ret = icarus::DeleteUsers($_GET['id']);
    if($ret == "1"){
        echo 'user deleted';
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
</style>
<div class="modal" id="myModal">
    <div class="modal-dialog modal-md shadow" style="margin-top: 10%;">
        <form action="office.php" method="post" autocomplete="off">
            <div class="modal-content bor-ten">
                <div class="modal-body">
                    <h4 class="text-center">New office</h4>
                    <p class="text-center">Create a new office inside your company</p>
                    <div  style="padding-left: 10%; padding-right: 10%;">
                    <div class="form-group row border" >
                        
                        <label for="titl" class="col-sm-1 col-form-label "><i class="far fa-building"></i></label>
                        <div class="col-sm-11" style=" padding-right: 0px;">
                            <input type="text" name="unme" id="unme" class="form-control" style="border: none;" required="" placeholder="Office Name">
                        </div>
                    </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" id="submit" name="submit" class="btn float-right text-primary"><b>Create</b></button><button type="button" class="btn float-right  border-right text-primary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="container bg-light">
    <button data-toggle="modal" data-target="#myModal" class="btn btn-light" style=""><i class="fas fa-plus"></i>&nbsp;&nbsp;New</button><button data-toggle="modal" data-target="#myModal2" class="btn btn-light" style=""><i class="far fa-question-circle"></i>&nbsp;&nbsp;Help</button>
</div>
<div class="container" style="margin-top: 0%; padding-top: 1%;">
        <table class="table table-bordered">
            <tr class="bg-light">
                <th>Office Name</th>
                <th>Actions</th>
            </tr>
            <?php
                $ret = icarus::GetOfficeWOTParm();
                foreach($ret as $p){
                        echo '<tr><td><img src="../images/enterprise.svg" style="width: 18px;">&nbsp;&nbsp;' . $p['office_nm'] . '</td><td><a href="office.php?id=' . $p['office_id'] . '" class="text-danger">Delete</a></td></tr>';
                }
            ?>
        </table>
</div>