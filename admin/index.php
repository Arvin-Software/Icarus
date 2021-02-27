<?php
$mainnav = 'components';
include '../header.php';
?>
<br>
<div class="container" style="margin-top: 1%;">
    <h3>Hi ! Welcome Admin</h3><hr>
    <div class="row" style="margin-top: 1%;">
        <div class="col-lg-4">
            <div class=" p-4 border text-center bor-ten shadow trd-blue" style="margin-top: 8%;">
                <img src="../images/email.svg" alt="email" class="p-2" style="width: 88px;">
                
                <br><br>
                <a href="mail/mail.php" target="_blank" class="btn btn-outline-light">Internal mail</a>
            </div>
        </div>
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
                <a href="mail.php" class="btn btn-outline-light">Notice board</a>
            </div>
        </div>
        <div class="col-lg-4">
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
        </div>
        <div class="col-lg-4">
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
        </div>
    </div>
</div>
