<?php
$mainnav = 'access';
include '../header.php';
if(isset($_POST['submit'])){
    $ret = icarus::InsertUsers($_POST['unme'], $_POST['pass'], $_POST['role'], $_POST['office']);
    if($ret == "0"){
      echo 'User inserted';
    }else{
      echo 'User already exists';
    }
}
if(isset($_GET['id'])){
    $ret = icarus::DeleteUsers($_GET['id']);
    if($ret == "1"){
        echo 'user deleted';
    }
}
?>
<div class="container bg-light">
    <button data-toggle="modal" data-target="#myModal" class="btn btn-light" style=""><i class="fas fa-plus"></i>&nbsp;&nbsp;New</button><button data-toggle="modal" data-target="#myModal2" class="btn btn-light" style=""><i class="far fa-question-circle"></i>&nbsp;&nbsp;Help</button>
</div>
<div class="modal" id="myModal">
    <div class="modal-dialog modal-md">
        <form action="accontrol.php" method="post" autocomplete="off">
            <div class="modal-content bor-ten">
                <div class="modal-header" style="border-radius: 10px 10px 0px 0px;">
                    <h4 class="modal-title"><i class="fas fa-id-card-alt"></i>&nbsp;&nbsp;New user</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="padding: 5% 5% 5% 5%;">
                    <div class="form-group row">
                        <label for="titl" class="col-sm-1 col-form-label "><i class="far fa-user-circle"></i></label>
                        <div class="col-sm-11">
                            <input type="text" name="unme" id="unme" class="form-control" required="" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="titl" class="col-sm-1 col-form-label "><i class="fas fa-key"></i></label>
                        <div class="col-sm-11">
                            <input type="password" name="pass" id="pass" class="form-control" required="" placeholder="Password">
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
                    <div class="form-group row">
                        <label for="priori" class="col-sm-1 col-form-label"><i class="fas fa-user-lock"></i></label>
                        <div class="col-sm-11">
                            <select name="role" id="role" class="custom-select">
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                                <option value="2">Viewer</option>
                                <option value="3">Common Person</option>
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
    <table class="table table-bordered">
        <tr class="bg-light">
            <th>Username</th>
            <th>Office</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        <?php
            $ret = khatral::khquerypar('SELECT * FROM user');
            foreach($ret as $p){
                $role = $p['user_typ'];
                $role_human;
                if($role == "0"){
                    $role_human = "User";
                }else if($role == "1"){
                    $role_human = "Admin";
                }else if($role == "2"){
                    $role_human = "Visitor";
                }else{
                    $role_human = "Common person";
                }
                if($role != "1"){
                    echo '<tr><td><img src="../images/userfair.svg" style="width: 18px;">&nbsp;&nbsp;' . $p['user_nm'] . '</td><td>' . $p['user_office'] . '</td><td>' . $role_human . '</td><td><a href="accontrol.php?id=' . $p['user_id'] . '" class="text-danger">Delete</a></td></tr>';
                }else{
                    echo '<tr><td><img src="../images/userfair.svg" style="width: 18px;">&nbsp;&nbsp;' . $p['user_nm'] . '</td><td>' . $p['user_office'] . '</td><td>' . $role_human . '</td></tr>';
                }
            }
        ?>
    </table>
</div>