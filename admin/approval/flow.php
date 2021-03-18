<?php
$mainnav = 'flow';
include 'header.php';
if(isset($_POST['submit'])){
    icarus::InsertApprovalFlow($_POST['fnme'], $_POST['office']);
    echo 'flow inserted';
}
?>
<div class="p-4 container" style="border-radius: 0px 0px 10px 10px;">
    <button data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="far fa-file"></i>&nbsp;&nbsp;New flow group</button>
</div>
<div class="modal" id="myModal">
    <div class="modal-dialog modal-md">
        <form action="flow.php" method="post" autocomplete="off">
            <div class="modal-content bor-ten">
                <div class="modal-header" style="border-radius: 10px 10px 0px 0px;">
                    <h4 class="modal-title"><i class="fas fa-id-card-alt"></i>&nbsp;&nbsp;New flow group</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="padding: 5% 5% 5% 5%;">
                    <div class="form-group row">
                        <label for="titl" class="col-sm-1 col-form-label "><i class="far fa-user-circle"></i></label>
                        <div class="col-sm-11">
                            <input type="text" name="fnme" id="fnme" class="form-control" required="" placeholder="Flow Group Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="priori" class="col-sm-1 col-form-label"><i class="far fa-building"></i></label>
                        <div class="col-sm-11">
                            <select name="office" id="office" class="custom-select">
                                <option>None</option>
                                <?php
                                    $ret = icarus::GetOfficeWOTParm();
                                    foreach($ret as $p){
                                        echo '<option>' . $p['office_nm'] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="display: block;">
                    <div class="form-group">
                        <button type="submit" id="submit" name="submit" class="btn btn-light float-right bg-white"><i class="far fa-save"></i>&nbsp;&nbsp;Create</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="container" style="margin-top: 1%;">
    <table class="table">
        <tr class="border-bottom">
            <th>Flow name</th>
            <th>Flow hash</th>
            <th>Office</th>
            <th>Actions</th>
        </tr>
        <?php
        $ret = icarus::GetFlowWOTParm();
        foreach($ret as $p){
            echo '<tr><td>' . $p['flow_nm'] . '</td><td>' . $p['flow_hash'] . '</td><td>' . $p['flow_office'] . '</td><td><a href="addusers.php?id=' . $p['flow_hash'] . '&office=' . $p['flow_office'] . '">View</a></tr>';
        }
        ?>
    </table>
</div>
