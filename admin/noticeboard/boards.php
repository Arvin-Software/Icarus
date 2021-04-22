<?php
include '../headermodl.php';
include '../../icarus.php';
include '../../classes/khatral.php';
if(isset($_POST['submit'])){
    icarus::InsertBoards($_POST['boardnm']);
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
    <div class="p-4 border container-fluid bg-white" style="">
        <div class="row">
            <div class="col-sm-4">
                
                
                
                
            </div>
            <div class="col-sm-4 text-center">
                <h3 style="margin-top: 2%;">Notice Board</h3>
                <div  style="margin-top: 5%;">
                <a href="../index.php" class="btn btn-outline-primary rounded-circle"><i class="far fa-arrow-alt-circle-left"></i></a>&nbsp;&nbsp;
                <?php 
                    if($_SESSION['typ'] != "2"){
                        echo '<button data-toggle="modal" data-target="#myModal" class="btn btn-outline-primary rounded-circle" style=""><i class="fas fa-plus"></i></button>&nbsp;&nbsp;';
                    }
                ?>
                <a href="#" class="btn btn-outline-primary rounded-circle"><i class="far fa-question-circle"></i></a>&nbsp;&nbsp;
                </div>
            </div>
            <div class="col-sm-4 text-right">
                
            </div>    
        </div>    
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-md shadow" style="margin-top: 10%;">
            <div class="modal-content bor-ten">
                <div class="modal-body">
                    <h4 class="text-center">New board</h4>
                    <p class="text-center">Create a new board to sort tasks and share</p>
                    <form action="boards.php" method="post" autocomplete="off">
                        <div class="form-group">
                            <input type="text" name="boardnm" id="boardnm" class="form-control" placeholder="Board Name" required="">
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" id="submit" name="submit" class="btn float-right text-primary"><b>Create</b></button><button type="button" class="btn float-right  border-right text-primary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    if($_SESSION['typ'] != "2"){
    ?>
    <div class="container-fluid p-4" style="height: 500px; overflow: auto;">
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
    <!-- <div style="margin-top: 2%;" class="container text-center">
    <h3 class="text-center">My Noticeboards</h3>
    
    </div> -->
        <div class="row" style="margin-top: 2%;">
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
                    echo '<div class="col-sm-2 folder ">';
                    echo '<a href="notice.php?noid=' . $p['board_hash'] . '&board=' . $p['board_nm'] . '" class="text-center text-dark" style="text-decoration: none;"><img class="mx-auto d-block" src="../../images/signboard.svg" style="width: 68px;">';
                    echo '<h6 class="text-center" style="margin-top: 5%;">' . $name . '&nbsp;&nbsp'  . $icon . '</h6>';
                    echo '<div class="text-center"><a href="notice.php?noid=' . $p['board_hash'] . '&board=' . $p['board_nm'] . '">View</a>&nbsp;&nbsp;<a href="share.php?board_nm=' . $p['board_nm'] . '&hash=' . $p['board_hash'] . '&unme=' . $p['board_unm'] . '">Share</a>&nbsp;&nbsp;<a href="boards.php?delid=' . $p['board_hash'] . '" class="text-danger">Delete</a></div>';
                    echo '</a></div>';
                }  
            ?>
        </div>
    </div>
    <?php
    }
    if($_SESSION['typ'] != "1"){
    ?>
    <div class="container-fluid border p-4" style="margin-top: 2%; height: 500px; overflow: auto;">
        <h3>Shared boards&nbsp;&nbsp;<i class="fas fa-user-friends"></i></h3>
        <div class="row" style="margin-top: 2%;">
                <?php        
                    $ret = khatral::khquery('SELECT * FROM share_notice WHERE share_b_unm=:unm', array(
                        ':unm'=>$_SESSION['unme']
                    ));
                    foreach($ret as $p){
                        $name = $p['share_b_nm'];
                        echo '<div class="col-sm-2">';
                        echo '<img class="mx-auto d-block" src="../../images/board.svg" style="width: 108px;">';
                        echo '<h6 class="text-center" style="margin-top: 5%;">' . $name . '</h6>';
                        echo '<div class="text-center"><a href="notice.php?noid=' . $p['share_b_hash'] . '&board=' . $p['share_b_nm'] . '">View</a></div>';
                        echo '</div>';
                    }
                
                ?>
                </div>
    </div>
    <?php
    }
    ?>
</div>
