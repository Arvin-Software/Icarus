<?php
include '../headermodl.php';
?>
    <div id="inc1" class="bg-light" style="height: 100vh;">
        <div class="container-fluid" style="margin-top: 1%;">
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