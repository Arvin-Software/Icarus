<?php
$mainnav = 'components';
include '../header.php';
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
</style>
    <div class="container bg-white border shadow soft-bor-ten" style="margin-top: 2%; padding: 5% 5% 5% 5%;" id="inc1">
        <h3 class="text-center" style="margin-bottom: 5%;">Hi ! Welcome <?php echo $_SESSION['unme']; ?></h3>
        <hr>
        <div class="row" style="margin-top: 0%;">
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
                <div class=" p-4  text-center bor-ten bg-white" style="margin-top: 8%;">
                    <a href="noticeboard/boards.php" class="btn text-primary bor-ten text-dark"><img src="../images/signboard.svg" alt="email" class="p-4" style="width: 108px;">
                    <br>
                    Notice board</a>
                </div>
            </div>
            <!-- <div class="col-lg-4">
                <div class=" p-4  text-center bor-ten text-dark bg-white bg-warning" style="margin-top: 8%;">
                    <img src="../images/board.svg" alt="email" class="p-4" style="width: 108px;">
                    <br>
                    <a href="noticeboard/notice.php" class="btn text-dark">Discussion board</a>
                </div>
            </div> -->
            <?php
            if($_SESSION['typ'] != "1"){
            ?>
            <div class="col-lg-4">
                <div class=" p-4  text-center bor-ten text-dark bg-white" style="margin-top: 8%;">
                    <a href="invoice/index.php" class="btn text-primary bor-ten text-dark"><img src="../images/invoice.svg" alt="email" class="p-4" style="width: 108px;">
                    <br>
                    Invoice generator</a>
                </div>
            </div>
            <?php
            }else{
                ?>
                <div class="col-lg-4" style="opacity: 0.5;">
                    <div class=" p-4  text-center bor-ten text-dark bg-white" style="margin-top: 8%;">
                        <a href="#" class="btn text-primary bor-ten text-dark"><img src="../images/invoice.svg" alt="email" class="p-4" style="width: 108px;">
                        <br>
                        Invoice generator</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class=" p-4  text-center bor-ten text-dark bg-white" style="margin-top: 8%;">
                        <a href="website" class="btn text-primary bor-ten text-dark"><img src="../images/code.svg" alt="email" class="p-4" style="width: 108px;">
                        <br>
                        Website manager</a>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="col-lg-4">
                <div class="p-4  text-center bor-ten text-dark bg-white" style="margin-top: 8%;">
                    <a href="mail.php" class="btn text-primary bor-ten text-dark"><img src="../images/notes.svg" alt="email" class="p-4" style="width: 108px;">
                    <br>
                    My notepad</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4  text-center bor-ten text-dark bg-white" style="margin-top: 8%;">
                    <a href="mail.php" class="btn text-primary bor-ten text-dark"><img src="../images/notes.svg" alt="email" class="p-4" style="width: 108px;">
                    <br>
                    Custom sheets</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4  text-center bor-ten text-dark bg-white" style="margin-top: 8%;">
                    <a href="approval/index.php" class="btn text-primary bor-ten text-dark"><img src="../images/approvalpapers.svg" alt="email" class="p-4" style="width: 108px;">
                    <br>
                    Approval papers</a>
                </div>
            </div>
            <!--<div class="col-lg-4">
                <div class="p-4  text-center bor-ten bg-white trd-blue" style="margin-top: 8%;">
                    <img src="../images/appointmentbook.svg" alt="email" class="p-2" style="width: 88px;">
                    <br>
                    <a href="mail.php" class="btn text-light">My appointments</a>
                </div>
            </div> -->
        </div>
    </div>
<div class="container-fluid bg-text bg-light" style="margin-top: 1%;" id="inc">
        <div class="row" style="height: 90vh; margin-top: 0%;">
            <div class="col-md-4"></div>
            <div class="col-md-4 my-auto">      
                <div class="container bg-white shadow text-center bor-ten" style="height: 100%; padding: 10% 10% 10% 10%;">
                    <img class="d-block mx-auto" src="../images/icaruslogo1ba.png"  style="width: 20%; margin-bottom: 8%;">    
                    <!-- <div class="spinner-border text-primary"></div> -->
                    <!-- <br><br>
                    <br> -->
                    <!--<label class="text-light" id="progressx" name="progressx">Loading mail...</label> -->
                    <div class="progress bg-light">
                        <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" style="width:100%" id="prog" name="prog"></div>
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