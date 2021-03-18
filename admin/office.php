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
<div class="p-4 container" style="border-radius: 0px 0px 10px 10px;">
    <button data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="far fa-file"></i>&nbsp;&nbsp;New office</button>
</div>
<div class="modal" id="myModal">
    <div class="modal-dialog modal-md">
        <form action="office.php" method="post">
            <div class="modal-content bor-ten">
                <div class="modal-header" style="border-radius: 10px 10px 0px 0px;">
                    <h4 class="modal-title"><i class="fas fa-id-card-alt"></i>&nbsp;&nbsp;New office</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="padding: 5% 5% 5% 5%;">
                    <div class="form-group row">
                        <label for="titl" class="col-sm-1 col-form-label "><i class="far fa-building"></i></label>
                        <div class="col-sm-11">
                            <input type="text" name="unme" id="unme" class="form-control" required="" placeholder="Office Name">
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="display: block;">
                    <div class="form-group">
                        <button type="submit" id="submit" name="submit" class="btn btn-primary float-right"><i class="far fa-save"></i>&nbsp;&nbsp;Create</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="container" style="margin-top: 1%;">
    <table class="table">
        <tr class="border-bottom">
            <th>Office Name</th>
            <th>Actions</th>
        </tr>
        <?php
            $ret = icarus::GetOfficeWOTParm();
            foreach($ret as $p){
                    echo '<tr><td><img src="../images/office.svg" style="width: 32px;">&nbsp;&nbsp;' . $p['office_nm'] . '</td><td><a href="office.php?id=' . $p['office_id'] . '" class="text-danger">Delete</a></td></tr>';
            }
        ?>
    </table>
</div>