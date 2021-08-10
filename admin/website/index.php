<?php
include '../headermodl.php';
include '../../icarus.php';
include '../../classes/khatral.php';
if(isset($_POST['submit'])){
    icarus::insertWebsite($_POST['webnm'], $_POST['offnm']);
    // echo 'successfully saved';
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
                <?php 
                    if($_SESSION['typ'] != "2"){
                        echo '<button data-toggle="modal" data-target="#myModal" class="btn btn-light" style=""><i class="fas fa-plus"></i>&nbsp;&nbsp;New</button>&nbsp;&nbsp;';
                    }
                ?>
                <a href="#" class="btn btn-light"><i class="far fa-question-circle"></i>&nbsp;&nbsp;Help</a>
            </div>
            <div class="col-sm-4 text-center">
            </div>
            <div class="col-sm-4 text-right">
                
            </div>    
        </div>    
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-md shadow" style="margin-top: 5%;">
            <div class="modal-content bor-ten">
                <div class="modal-body">
                    <h4 class="text-center">New Website</h4>
                    <p class="text-center">Create a new website to manage</p>
                    <form action="index.php" method="post" autocomplete="off">
                        <div style="margin-left: 2%; margin-right: 2%;">
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Website Name</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <input type="text" name="webnm" id="webnm" style="border: none;" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group row border">
                            <label for="unm" class="col-sm-4 col-form-label border-right">Office Name</label>
                            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                                <select name="offnm" id="offnm" style="border: none;" class="custom-select" required="">
                                    <?php
                                    $ret = icarus::GetOfficeWOTParm();
                                    foreach($ret as $p){
                                        echo '<option>'. $p['office_nm'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="submit" name="submit" class="btn float-right text-primary"><b>Create</b></button><button type="button" class="btn float-right  border-right text-primary" data-dismiss="modal">Cancel</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="margin-top: 2%;">
        <table class="table border">
            <tr class="border-bottom bg-light">
                <th>Website name</th>
                <th>Office name</th>
                <th>Actions</th>
            </tr>
            <?php
                $ret = icarus::GetWebsite();
                foreach($ret as $p){
                        echo '<tr><td><img src="../../images/code.svg" style="width: 24px;">&nbsp;&nbsp;' . $p['web_nm'] . '</td><td>' . $p['web_inst'] . '</td><td><a href="addpages.php?id=' . $p['web_id'] . '&hash=' . $p['web_hash'] . '&nm=' . $p['web_nm'] . '&off=' . $p['web_inst'] . '" style="" class="btn btn-outline-dark rounded-circle"><i class="far fa-eye"></i></a>&nbsp;&nbsp;<a href="office.php?id=' . $p['web_id'] . '" class="btn btn-outline-danger rounded-circle"><i class="far fa-trash-alt"></i></a></td></tr>';
                }
            ?>
        </table>
    </div>
</div>