<?php
$mainnav = 'components';
include '../header.php';
?>
    <div class="container" style="margin-top: 3%;" id="inc1">
        <h3>Hi ! Welcome Admin</h3><hr>
        <div class="row" style="margin-top: 1%;">
            <!-- <div class="col-lg-4">
                <div class=" p-4 border text-center bor-ten shadow trd-blue" style="margin-top: 8%;">
                    <img src="../images/email.svg" alt="email" class="p-2" style="width: 88px;">
                    
                    <br><br>
                    <a href="mail/mail.php" class="btn btn-outline-light">Internal mail</a>
                </div>
            </div> -->
            <script>
                function setIframe(){
                    document.getElementById('mailframe').src="mail.php";
                }
                
            </script>
            <div class="modal" id="myModal">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                    <!-- Modal body -->
                    <div class="modal-body trd-blue">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <iframe src="mail.php" id="mailframe" name="mailframe" frameborder="0" style="margin-top: 2%; width: 100%; height: 80vh;"></iframe>
                    </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class=" p-4 border text-center bor-ten shadow bg-danger" style="margin-top: 8%;">
                    <img src="../images/board.svg" alt="email" class="p-2" style="width: 88px;">
                    <br><br>
                    <a href="noticeboard/notice.php" class="btn btn-outline-light">Notice board</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class=" p-4 border text-center bor-ten shadow bg-warning" style="margin-top: 8%;">
                    <img src="../images/board.svg" alt="email" class="p-2" style="width: 88px;">
                    <br><br>
                    <a href="noticeboard/notice.php" class="btn btn-outline-dark">Discussion board</a>
                </div>
            </div>
            <!-- <div class="col-lg-4">
                <div class=" p-4 border text-center bor-ten shadow bg-info" style="margin-top: 8%;">
                    <img src="../images/spreadsheet.svg" alt="email" class="p-2" style="width: 88px;">
                    <br><br>
                    <a href="mail.php" class="btn btn-outline-light">Custom sheet</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 border text-center bor-ten shadow bg-success" style="margin-top: 8%;">
                    <img src="../images/notes.svg" alt="email" class="p-2" style="width: 88px;">
                    <br><br>
                    <a href="mail.php" class="btn btn-outline-light">My notepad</a>
                </div>
            </div> -->
            <!-- <div class="col-lg-4">
                <div class="p-4 border text-center bor-ten shadow bg-warning" style="margin-top: 8%;">
                    <img src="../images/approve.svg" alt="email" class="p-2" style="width: 88px;">
                    <br><br>
                    <a href="mail.php" class="btn btn-outline-dark">Approval papers</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 border text-center bor-ten shadow trd-blue" style="margin-top: 8%;">
                    <img src="../images/appointmentbook.svg" alt="email" class="p-2" style="width: 88px;">
                    <br><br>
                    <a href="mail.php" class="btn btn-outline-light">My appointments</a>
                </div>
            </div> -->
        </div>
    </div>
<div class="container-fluid bg-text bg-light" style="margin-top: 1%;" id="inc">
        <div class="row" style="height: 90vh; margin-top: 0%;">
            <div class="col-md-4"></div>
            <div class="col-md-4 my-auto">      
                <div class="container bg-white shadow text-center bor-ten" style="height: 100%; padding: 10% 10% 10% 10%;">
                    <img class="d-block mx-auto" src="../images/icaruslogo1ba.png"  style="width: 50%; margin-bottom: 8%;">    
                    <!-- <div class="spinner-border text-primary"></div> -->
                    <!-- <br><br>
                    <br> -->
                    <!--<label class="text-light" id="progressx" name="progressx">Loading mail...</label> -->
                    <div class="progress bg-light">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:100%" id="prog" name="prog"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <script>
        $('#inc1').hide();
        $('#inc').show();
        var myVar = setInterval(myTimer, 5);
        var count = 0;
        function myTimer() {
            count += 1;
            if(count >= 50){
                document.getElementById("prog").style.width = "100%";
                $('#inc').hide();
                $('#inc1').show();
            }else{
                // document.getElementById("prog").style.width = count + "%";
                // document.getElementById("prog").innerHTML = "Loading mail...( " + count + "% )";
            }    
        }
    </script>