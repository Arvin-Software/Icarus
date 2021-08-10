<?php
include '../headermodl.php';
include '../../icarus.php';
include '../../classes/khatral.php';
if(isset($_POST['submit'])){
    icarus::InsertShareNotice($_POST['boardnm'], $_POST['unme'], $_POST['hashcode']);
    // echo 'successfully saved';
}
if(isset($_GET['id'])){
    icarus::DeleteShare($_GET['id']);
}
?>
<div id="inc1 bg-light" class="" style="height: 90vh;">
    <div class="bg-primary text-white p-2">
        <h6 style=""><img src="../../images/signboard.svg" style="width: 28px;">&nbsp;&nbsp;Share Notice Board</h6>
    </div>
<div class="container-fluid bg-light" style="">
        <div class="row">
            <div class="col-sm-4">
                <!-- <a href="../index.php" class="btn btn-light"><i class="fas fa-home"></i>&nbsp;&nbsp;Home</a> -->
                <a href="boards.php" class="btn btn-light"><i class="far fa-arrow-alt-circle-left">&nbsp;&nbsp;Back</i></a>
                <?php 
                    if($_SESSION['typ'] != "2"){
                        echo '<button data-toggle="modal" data-target="#myModal" class="btn btn-light" style=""><i class="fas fa-plus"></i>&nbsp;&nbsp;New</button>';
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
        <div class="modal-dialog modal-md">
            <div class="modal-content bor-ten">
                <div class="modal-header bg-primary text-white" style="border-radius: 10px 10px 0px 0px;">
                    <h4 class="modal-title">New share</h4>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="share.php?board_nm=<?php echo $_GET['board_nm']; ?>&hash=<?php echo $_GET['hash']; ?>&unme=<?php echo $_GET['unme']; ?>" method="post">
                        <div class="form-group">
                            <input type="text" name="boardnm" id="boardnm" class="form-control bor-ten" style="display: none;" placeholder="Board Name" required="" value="<?php echo $_GET['board_nm']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="hashcode" id="hashcode" class="form-control bor-ten" style="display: none;" value="<?php echo $_GET['hash']; ?>">
                        </div>
                        <div class="form-group">
                            <select name="unme" id="unme" class="custom-select">
                                <?php
                                $ret = khatral::khquery('SELECT * FROM user WHERE user_office = :office', array(':office'=>$_SESSION['office']));
                                foreach($ret as $p){
                                    if($p['user_typ'] != '1' && $p['user_nm'] != $_SESSION['unme'] && $p['user_nm'] != $_GET['unme']){
                                        echo '<option>' . $p['user_nm'] . '</option>';
                                    }
                                }

                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Save" id="submit" name="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="padding: 0px;">
<table class="table table-bordered border">
        <tr class="">
            <th>Username</th>
            <th>Actions</th>
        </tr>
        <?php
            $ret = khatral::khquery('SELECT * FROM share_notice WHERE share_b_hash=:hashcode', array(
                ':hashcode'=>$_GET['hash']
            ));
            foreach($ret as $p){
                $name = $p['share_b_nm'];
                $unme = $p['share_b_unm'];
                echo '<tr><td>' . $unme . '</td><td><a href="share.php?id=' . $p['share_id'] . '&board_nm=' . $_GET['board_nm'] . '&hash=' . $_GET['hash'] . '&unme=' . $_GET['unme'] . '" class="btn btn-outline-danger  rounded-circle"><i class="far fa-trash-alt"></i></a></td></tr>';
            }
        ?>
</table>
</div>
</div>
