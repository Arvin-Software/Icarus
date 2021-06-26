<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/icaruslogohead.png" />
    <title>Icarus</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/softview.css">
    <style>
        .image {
            -webkit-animation:spin 4s linear infinite;
            -moz-animation:spin 4s linear infinite;
            animation:spin 4s linear infinite;
        }
        @-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
        @-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
        @keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }
    </style>
</head>
<body class="bg-white">
    <div class="text-center" style="margin-top: 15%;">
    <img class="d-block mx-auto" src="images/icaruslogo1ba.png"  style="width: 100px; margin-bottom: 0%;">
        <div id="inc" style="margin-top: 2%;">
        
        <div class="spinner-border text-primary"></div><br><br>Loading...
        </div>
        <div id="inc1">
        <!-- <h1 class="text-center text-primary">Hi</h1> -->
        redirecting...
        <!-- Click <a href="loginhandle/login.php">here</a> to login -->
        </div>
    </div>
    <?php
        // include 'classes/khatral.php';
        // try{
        //     khatral::khquerypar('SELECT * FROM stat');
        // }catch(exception $ex){
        //     header('Location: installation');
        // }
    ?>
    <script>
        document.getElementById("inc1").style.visibility = "hidden";
        document.getElementById("inc").style.visibility = "visible";
        var myVar = setInterval(myTimer, 1000);
        function myTimer() {
            document.getElementById("inc").style.visibility = "hidden";
            document.getElementById("inc1").style.visibility = "visible";
            window.location.href = "loginhandle/login.php";
        }
    </script>
</body>