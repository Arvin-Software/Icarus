<?php
$mainnav = 'flow';
include 'header.php';
if(isset($_POST['submit'])){
    icarus::InsertFlowUser($_POST['unme'], $_GET['id'], $_GET['office']);
    echo 'user inserted';
}
?>
<div class="p-4 container" style="border-radius: 0px 0px 10px 10px;">
    <button data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="far fa-file"></i>&nbsp;&nbsp;Add users</button>
</div>
<div class="modal" id="myModal">
    <div class="modal-dialog modal-md">
        <form action="addusers.php?id=<?php echo $_GET['id']; ?>&office=<?php echo $_GET['office']; ?>" method="post" autocomplete="off">
            <div class="modal-content bor-ten">
                <div class="modal-header" style="border-radius: 10px 10px 0px 0px;">
                    <h4 class="modal-title"><i class="fas fa-id-card-alt"></i>&nbsp;&nbsp;Add users</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="padding: 5% 5% 5% 5%;">
                    
                    <div class="form-group row">
                        <label for="priori" class="col-sm-1 col-form-label"><i class="far fa-building"></i></label>
                        <div class="col-sm-11">
                            <select name="unme" id="unme" class="custom-select">
                                <?php
                                    $ret = khatral::khquery('SELECT * FROM user WHERE user_office=:office', array(
                                        ':office'=>$_GET['office']
                                    ));
                                    foreach($ret as $p){
                                        echo '<option>' . $p['user_nm'] . '</option>';
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
            <th>User Name</th>
            <th>Actions</th>
        </tr>
        <?php
        $ret = icarus::GetFlowUsers($_GET['id'], $_GET['office']);
        foreach($ret as $p){
            echo '<tr><td>' . $p['user_nm'] . '</td></tr>';
        }
        ?>
    </table>
</div>
