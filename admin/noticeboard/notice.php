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
<div id="inc1" class="" style="height: 100vh;">
    <div class="shadow p-4 border-bottom  bg-danger text-white" style="">
        <img src="../../images/board.svg" alt="notice" style="width: 32px;">&nbsp;&nbsp;Notice Board - <?php echo $_GET['board']; ?><br /><br /><a href="boards.php" class="btn btn-light border border-secondary rounded-circle"><i class="far fa-arrow-alt-circle-left"></i></a>&nbsp;&nbsp;
        <?php
            if($_SESSION['typ'] != "2"){
                echo '<button data-toggle="modal" data-target="#myModal" class="btn btn-light border  border-secondary bor-ten"><i class="far fa-file"></i>&nbsp;&nbsp;New notice</button>';
            }
        ?>
    </div>
    <div class="container-fluid" style="">
        
        <!-- &nbsp;&nbsp;<a href="notice.php" class="btn btn-info">Refresh</a> -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content bor-ten">
                    <div class="modal-header" style="border-radius: 10px 10px 0px 0px;">
                        <h4 class="modal-title">New notice</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="notice.php?noid=<?php echo $_GET['noid']; ?>&board=<?php echo $_GET['board']; ?>" method="post">
                            <div class="form-group">
                                <!-- <label for="titl">Notice Title</label> -->
                                <input type="text" name="titl" id="titl" class="form-control bor-ten" placeholder="Notice Title" required="">
                            </div>
                            <div class="form-group">
                                <!-- <label for="content">Notice Content</label> -->
                                <textarea name="content" id="content" cols="30" rows="10" class="form-control bor-ten" required="" placeholder="Notice Title"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="priori">Priority</label>
                                <select name="priori" id="priori" class="custom-select bor-ten">
                                    <option value="0" class="text-primary">Low</option>
                                    <option value="1" class="text-success">Medium</option>
                                    <option value="2" class="text-warning">High</option>
                                    <option value="3" class="text-danger">Urgent</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Save" id="submit" name="submit" class="btn btn-primary float-right">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
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
                <h6 class="text-center">Urgent</h6><br />
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
                <h6 class="text-center">High</h6><br />
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
                <h6 class="text-center">Medium</h6><br />
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
                <h6 class="text-center">Low</h6><br />
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