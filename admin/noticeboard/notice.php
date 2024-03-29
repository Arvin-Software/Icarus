<?php
include '../headermodl.php';
include '../../icarus.php';
include '../../classes/khatral.php';
if(isset($_POST['submit'])){
    icarus::InsertNotice($_POST['titl'], $_POST['content'], $_POST['priori'], $_GET['noid']);
    // echo 'successfully saved';
}
if(isset($_GET['id'])){
    icarus::DeleteNotice($_GET['id']);
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
<div id="inc1" class="" style="height: 100vh;">
    <div class="bg-light p-2">
        <h6 style=""><img src="../../images/signboard.svg" style="width: 28px;">&nbsp;&nbsp;Notice Board - <?php echo $_GET['board']; ?></h6>
    </div>
<div class="container-fluid bg-light" style="">
        <div class="row">
            <div class="col-sm-4">
                <!-- <a href="../index.php" class="btn btn-light"><i class="fas fa-home"></i>&nbsp;&nbsp;Home</a> -->
                <a href="boards.php" class="btn btn-light"><i class="far fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Back</a>
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
    <div class="container-fluid border" style="margin-top: 0%;">
        
        <!-- &nbsp;&nbsp;<a href="notice.php" class="btn btn-info">Refresh</a> -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-lg shadow" style="margin-top: 5%;">
                <div class="modal-content bor-ten">
                    <div class="modal-body">
                        <h4 class="text-center">New notice</h4>
                        <p class="text-center">Create a new notice and sort the priority</p>
                        <form action="notice.php?noid=<?php echo $_GET['noid']; ?>&board=<?php echo $_GET['board']; ?>" method="post" autocomplete="off">
                            <div class="form-group">
                                <!-- <label for="titl">Notice Title</label> -->
                                <input type="text" name="titl" id="titl" class="form-control" placeholder="Notice Title" required="">
                            </div>
                            <div class="form-group">
                                <!-- <label for="content">Notice Content</label> -->
                                <textarea name="content" id="content" cols="30" rows="10" class="form-control" required="" placeholder="Notice Title"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="priori">Priority</label>
                                <select name="priori" id="priori" class="custom-select">
                                    <option value="0" class="text-primary">Low</option>
                                    <option value="1" class="text-success">Medium</option>
                                    <option value="2" class="text-warning">High</option>
                                    <option value="3" class="text-danger">Urgent</option>
                                </select>
                            </div>
                            <hr>
                            <div class="form-group">
                            <button type="submit" id="submit" name="submit" class="btn float-right text-primary"><b>Save</b></button><button type="button" class="btn float-right border-right text-primary" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        $ret = khatral::khquery('SELECT COUNT(board_id) AS totalboard FROM n_boards WHERE board_hash=:hashcode', array(
            ':hashcode'=>$_GET['noid']
        ));
        foreach($ret as $p){
            if($p['totalboard'] < 1){
                echo 'Sorry board not found or not shared to you';
            }
        }
        ?>
        <div class="row">
            <div class="col-lg-3 p-2 border-right" style="">
                <h6 class="text-center p-2" style="border-left: 15px solid #dc3545;">Urgent</h6><br />
                <?php
                    $ret = khatral::khquery('SELECT * FROM notice_board WHERE notice_priori=:priori AND notice_board_id=:noid ORDER BY notice_id DESC', array(
                        ':priori'=>"3",
                        ':noid'=>$_GET['noid']
                    ));
                    foreach($ret as $p){
                        if($_SESSION['typ'] != "2"){
                            echo '<div class="card bg-danger">
                                <div class="card-header text-white">' . $p['notice_titl'] .'</div>
                                <div class="card-body bg-white">
                                ' . $p['notice_content'] . '
                                </div>
                                <div class="card-footer bg-white">Posted by : ' . $p['notice_unm'] . ' - ' . $p['notice_timestamp'] . '<a href="notice.php?id=' . $p['notice_id'] . '&noid=' . $_GET['noid'] . '&board=' . $_GET['board'] . '" class="btn btn-outline-danger float-right">Delete</a></div>
                            </div> <br>';
                        }else{
                            echo '<div class="card bg-danger">
                                <div class="card-header text-white">' . $p['notice_titl'] .'</div>
                                <div class="card-body bg-white">
                                ' . $p['notice_content'] . '
                                </div>
                                <div class="card-footer bg-white">Posted by : ' . $p['notice_unm'] . ' - ' . $p['notice_timestamp'] . '</div>
                            </div> <br>';
                        }
                    }
                    
                ?>
            </div>
            <div class="col-lg-3 p-2 border-right" style="">
                <h6 class="text-center p-2" style="border-left: 15px solid #ffc107;">High</h6><br />
                <?php
                    $ret = khatral::khquery('SELECT * FROM notice_board WHERE notice_priori=:priori AND notice_board_id=:noid ORDER BY notice_id DESC', array(
                        ':priori'=>"2",
                        ':noid'=>$_GET['noid']
                    ));
                    foreach($ret as $p){
                        if($_SESSION['typ'] != "2"){
                            echo '<div class="card bg-warning">
                                <div class="card-header">' . $p['notice_titl'] .'</div>
                                <div class="card-body bg-white">
                                ' . $p['notice_content'] . '
                                </div>
                                <div class="card-footer bg-white">Posted by : ' . $p['notice_unm'] . ' - ' . $p['notice_timestamp'] . '<a href="notice.php?id=' . $p['notice_id'] . '&noid=' . $_GET['noid'] . '&board=' . $_GET['board'] . '" class="btn btn-outline-danger float-right">Delete</a></div>
                            </div> <br>';
                        }else{
                            echo '<div class="card bg-warning">
                                <div class="card-header">' . $p['notice_titl'] .'</div>
                                <div class="card-body bg-white">
                                ' . $p['notice_content'] . '
                                </div>
                                <div class="card-footer bg-white">Posted by : ' . $p['notice_unm'] . ' - ' . $p['notice_timestamp'] . '</div>
                            </div> <br>';
                        }
                    }
                    
                ?>
            </div>
            <div class="col-lg-3 p-2 border-right" style="">
                <h6 class="text-center p-2" style="border-left: 15px solid #28a745;">Medium</h6><br />
                <?php
                    $ret = khatral::khquery('SELECT * FROM notice_board WHERE notice_priori=:priori AND notice_board_id=:noid ORDER BY notice_id DESC', array(
                        ':priori'=>"1",
                        ':noid'=>$_GET['noid']
                    ));
                    foreach($ret as $p){
                        if($_SESSION['typ'] != "2"){
                            echo '<div class="card bg-success">
                                <div class="card-header text-white">' . $p['notice_titl'] .'</div>
                                <div class="card-body bg-white">
                                ' . $p['notice_content'] . '
                                </div>
                                <div class="card-footer bg-white">Posted by : ' . $p['notice_unm'] . ' - ' . $p['notice_timestamp'] . '<a href="notice.php?id=' . $p['notice_id'] . '&noid=' . $_GET['noid'] . '&board=' . $_GET['board'] . '" class="btn btn-outline-danger float-right">Delete</a></div>
                            </div> <br>';
                        }else{
                            echo '<div class="card bg-success">
                                <div class="card-header text-white">' . $p['notice_titl'] .'</div>
                                <div class="card-body bg-white">
                                ' . $p['notice_content'] . '
                                </div>
                                <div class="card-footer bg-white">Posted by : ' . $p['notice_unm'] . ' - ' . $p['notice_timestamp'] . '</div>
                            </div> <br>';
                        }
                    }
                    
                ?>
            </div>
            <div class="col-lg-3 p-2 border-right" style="">
                <h6 class="text-center p-2" style="border-left: 15px solid #007bff;">Low</h6><br />
                <?php
                    $ret = khatral::khquery('SELECT * FROM notice_board WHERE notice_priori=:priori AND notice_board_id=:noid ORDER BY notice_id DESC', array(
                        ':priori'=>"0",
                        ':noid'=>$_GET['noid']
                    ));
                    foreach($ret as $p){
                        if($_SESSION['typ'] != "2"){
                            echo '<div class="card bg-primary">
                                <div class="card-header text-white">' . $p['notice_titl'] .'</div>
                                <div class="card-body bg-white">
                                ' . $p['notice_content'] . '
                                </div>
                                <div class="card-footer bg-white">Posted by : ' . $p['notice_unm'] . ' - ' . $p['notice_timestamp'] . '<a href="notice.php?id=' . $p['notice_id'] . '&noid=' . $_GET['noid'] . '&board=' . $_GET['board'] . '" class="btn btn-outline-danger float-right">Delete</a></div>
                            </div> <br>';
                        }else{
                            echo '<div class="card bg-primary">
                            <div class="card-header text-white">' . $p['notice_titl'] .'</div>
                            <div class="card-body bg-white">
                            ' . $p['notice_content'] . '
                            </div>
                            <div class="card-footer bg-white">Posted by : ' . $p['notice_unm'] . ' - ' . $p['notice_timestamp'] . '</div>
                        </div> <br>';
                        }
                    }
                    
                ?>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-text bg-white" style="" id="inc">
    <div class="row" style="height: 80vh; margin-top: 3%;">
        <div class="col-xl-4"></div>
        <div class="col-xl-4 my-auto">      
            <div class="container trd-blue text-center bor-ten" style="height: 100%; padding: 10% 10% 10% 10%;">
                <img class="d-block mx-auto" src="../../images/board.svg"  style="width: 150px; margin-bottom: 8%;">    
                <div class="spinner-border text-light"></div>
                <br><br>
                <br>
                <!--<label class="text-light" id="progressx" name="progressx">Loading mail...</label> -->
                <div class="progress trd-blue-alt ">
                    <div class="progress-bar prog-fore " style="width:0%" id="prog" name="prog"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4"></div>
    </div>
</div>
<script>
    // $('#inc1').hide();
    // $('#inc').show();
    $('#inc').hide();
    $('#inc1').show();
    // var myVar = setInterval(myTimer, 250);
    // var count = 0;
    // function myTimer() {
    //     count += 15;
    //     if(count >= 100){
    //         $('#inc').hide();
    //         $('#inc1').show();
    //     }else{
    //         document.getElementById("prog").style.width = count + "%";
    //         // document.getElementById("prog").innerHTML = "Loading mail...( " + count + "% )";
    //         // window.location.href = "../development.php";
    //     }
        
        
    // }
</script>
</body>