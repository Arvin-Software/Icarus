<?php
include '../headermodl.php';
include '../../icarus.php';
include '../../classes/khatral.php';
if(isset($_POST['submit'])){
    icarus::InsertNotice($_POST['titl'], $_POST['content'], $_POST['priori']);
    echo 'successfully saved';
}
?>
<div id="inc1" class="" style="height: 100vh;">
    <div class="container-fluid" style="margin-top: 1%;">
        <button data-toggle="modal" data-target="#myModal" class="btn btn-primary">New notice</button>
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-header bg-primary text-white">
                    <h4 class="modal-title">New notice</h4>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="notice.php" method="post">
                        <div class="form-group">
                            <label for="titl">Notice Title</label>
                            <input type="text" name="titl" id="titl" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="content">Notice Content</label>
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control" required=""></textarea>
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
                        <div class="form-group">
                            <input type="submit" value="Save" id="submit" name="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>

                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-lg-3" style="">
                <div class="card bg-primary">
                    <div class="card-header text-white">Header</div>
                    <div class="card-body text-center bg-white">
                    <p class="card-text">Some text inside the first card</p>
                    </div>
                    <div class="card-footer text-white">Footer</div>
                </div>
                
            </div>
            <div class="col-lg-3" style="">
                <div class="card bg-success">
                    <div class="card-header text-white">Header</div>
                    <div class="card-body text-center bg-white">
                    <p class="card-text">Some text inside the first card</p>
                    </div>
                    <div class="card-footer text-white">Footer</div>
                </div>
                
            </div>
            <div class="col-lg-3" style="">
                <div class="card bg-warning">
                    <div class="card-header">Header</div>
                    <div class="card-body text-center bg-white">
                    <p class="card-text">Some text inside the first card</p>
                    </div>
                    <div class="card-footer">Footer</div>
                </div>
                
            </div>
            <div class="col-lg-3" style="">
                <div class="card bg-danger">
                    <div class="card-header text-white">Header</div>
                    <div class="card-body text-center bg-white">
                    <p class="card-text">Some text inside the first card</p>
                    </div>
                    <div class="card-footer text-white">Footer</div>
                </div>
                
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
    $('#inc1').hide();
    $('#inc').show();
    var myVar = setInterval(myTimer, 250);
    var count = 0;
    function myTimer() {
        count += 15;
        if(count >= 100){
            $('#inc').hide();
            $('#inc1').show();
        }else{
            document.getElementById("prog").style.width = count + "%";
            // document.getElementById("prog").innerHTML = "Loading mail...( " + count + "% )";
            // window.location.href = "../development.php";
        }
        
        
    }
</script>
</body>