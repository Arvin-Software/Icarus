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
                        <div class="col-sm-11">
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
<div class="container-fluid" style="margin-top: 1%; padding-top: 1%; height: 88vh;">
<div class="container text-center border-bottom" style="margin-bottom: 2%;">
    <button data-toggle="modal" data-target="#myModal" class="btn text-primary" style="font-size: 24px; margin-bottom: 2%;"><i class="fas fa-plus"></i></button><button data-toggle="modal" data-target="#myModal2" class="btn text-primary" style="font-size: 24px; margin-bottom: 2%;"><i class="far fa-question-circle"></i></button>
</div>
<h3 class="text-center" style="font-size: 32px; margin-bottom: 5%;">My offices</h3>
    <div class="container">
        <table class="table">
            <tr class="border-bottom">
                <th>Office Name</th>
                <th>Actions</th>
            </tr>
            <?php
                $ret = icarus::GetOfficeWOTParm();
                foreach($ret as $p){
                        echo '<tr><td><img src="../images/office.svg" style="width: 24px;">&nbsp;&nbsp;' . $p['office_nm'] . '</td><td><a href="office.php?id=' . $p['office_id'] . '" class="text-danger">Delete</a></td></tr>';
                }
            ?>
        </table>
    </div>
</div>