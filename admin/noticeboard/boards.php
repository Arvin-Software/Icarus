<?php
include '../headermodl.php';
include '../../icarus.php';
include '../../classes/khatral.php';
if(isset($_POST['submit'])){
    icarus::InsertBoards($_POST['boardnm']);
    // echo 'successfully saved';
}

?>
<div id="inc1" class="" style="height: 90vh;">
    <div class="p-4 border container bg-white" style="margin-top: 2%; ">
        <div class="row">
            <div class="col-sm-4">
                <a href="../index.php" class="btn btn-outline-primary rounded-circle"><i class="far fa-arrow-alt-circle-left"></i></a>&nbsp;&nbsp;
                <?php 
                    if($_SESSION['typ'] != "2"){
                        echo '<button data-toggle="modal" data-target="#myModal" class="btn btn-outline-primary"><i class="far fa-file"></i>&nbsp;&nbsp;New board</button>';
                    }
                ?>
            </div>
            <div class="col-sm-4 text-center">
                
            </div>
            <div class="col-sm-4 text-right">
                <img src="../../images/board.svg" alt="notice" style="width: 36px;">&nbsp;&nbsp;Notice Board&nbsp;&nbsp;
            </div>    
        </div>    
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content bor-ten">
                <div class="modal-header" style="border-radius: 10px 10px 0px 0px;">
                    <h4 class="modal-title">New board</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="boards.php" method="post">
                        <div class="form-group">
                            <input type="text" name="boardnm" id="boardnm" class="form-control bor-ten" placeholder="Board Name" required="">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Save" id="submit" name="submit" class="btn btn-primary float-right">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    if($_SESSION['typ'] != "2"){
    ?>
    <div class="container border p-4" style="margin-top: 2%; height: 500px; overflow: auto;">
    <?php
    if(isset($_GET['delid'])){
        $ret = icarus::DeleteBoards($_GET['delid']);
        if($ret == "0"){
            echo '<div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong> Please delete the notices in the board before deleting the board.
          </div>';
        }else{
            echo '<div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> Notice Board Deleted.
          </div>';
        }
    }
    ?>
    <h3>My Noticeboards</h3>
        <table class="table">
            <tr class="">
                <th>Board Name</th>
                <th>Actions</th>
            </tr>
            <?php
                if($_SESSION['typ'] != "1"){
                    $ret = khatral::khquery('SELECT * FROM n_boards WHERE board_unm=:unm', array(
                        ':unm'=>$_SESSION['unme']
                    ));
                }else{
                    $ret = khatral::khquerypar('SELECT * FROM n_boards');
                }
                foreach($ret as $p){
                    $name = $p['board_nm'];
                    $res = khatral::khquery('SELECT COUNT(share_id) AS totalshare FROM share_notice WHERE share_b_hash=:hashcode', array(
                        ':hashcode'=>$p['board_hash']
                    ));
                    $icon = '';
                    foreach($res as $pi){
                        if($pi['totalshare'] >= 1){
                            $icon = '<i class="fas fa-user-friends"></i>';
                        }else{
                            $icon = '';
                        }
                    }
                    echo '<tr><td>' . $name . '&nbsp;&nbsp'  . $icon . '</td><td><a href="notice.php?noid=' . $p['board_hash'] . '&board=' . $p['board_nm'] . '">View</a>&nbsp;&nbsp;<a href="share.php?board_nm=' . $p['board_nm'] . '&hash=' . $p['board_hash'] . '&unme=' . $p['board_unm'] . '">Share</a>&nbsp;&nbsp;<a href="boards.php?delid=' . $p['board_hash'] . '" class="text-danger">Delete</a></td></tr>';
                }
            ?>
        </table>
    </div>
    <?php
    }
    if($_SESSION['typ'] != "1"){
    ?>
    <div class="container border p-4" style="margin-top: 2%; height: 500px; overflow: auto;">
    <h3>Notice Boards Shared with me&nbsp;&nbsp;<i class="fas fa-user-friends"></i></h3>
        <table class="table">
                <tr class="">
                    <th>Board Name</th>
                    <th>Actions</th>
                </tr>
                <?php
                    
                        $ret = khatral::khquery('SELECT * FROM share_notice WHERE share_b_unm=:unm', array(
                            ':unm'=>$_SESSION['unme']
                        ));
                        foreach($ret as $p){
                            $name = $p['share_b_nm'];
                            echo '<tr><td>' . $name . '</td><td><a href="notice.php?noid=' . $p['share_b_hash'] . '&board=' . $p['share_b_nm'] . '">View</a></td></tr>';
                        }
                    
                ?>
        </table>
    </div>
    <?php
    }
    ?>
</div>
