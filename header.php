<?php
    session_start();
    if(isset($inst) == FALSE){
        if(isset($_SESSION['unme'])){
            if($_SESSION['hxid'] == "hxiediscd"){
            }else{
                header("Location: logout.php");    
            }
        }else{
            header("Location: logout.php");
        }
    }
    $logo;
    include 'classes/khatral.php';
    include 'icarus.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/icarus/images/icaruslogohead.png" />
    <title>Icarus<?php if(isset($server)){echo' - Server';}elseif(isset($inst)){echo' - Installation';}else{echo' - Admin';}?></title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="/icarus/js/jquery.min.js"></script>
    <link rel="stylesheet" href="/icarus/css/softview.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/0d58c98fc8.js" crossorigin="anonymous"></script>
    <style>
      
        @media (max-width: 768px) {
            .navbar-collapse {
                position: relative;
                top: 1%;
                left: 0;
                /* padding-left: 15px;
                padding-right: 15px; */
                padding-bottom: 15px;
                width: 100%;
                
                border-radius: 20px 20px 20px 20px;
            }
            .navbar-collapse.collapsing {
                
                -webkit-transition: left 0.2s ease;
                -o-transition: left 0.2s ease;
                -moz-transition: left 0.2s ease;
                transition: left 0.2s ease;
                left: -100%;
                
                z-index: 1;
                border-radius: 20px 20px 20px 20px;
            }
            .navbar-collapse.show {
                
                
                z-index: 1;
                left: 0;
                -webkit-transition: left 0.2s ease-in;
                -o-transition: left 0.2s ease-in;
                -moz-transition: left 0.2s ease-in;
                transition: left 0.2s ease-in;
                border-radius: 20px 20px 20px 20px;
            }
        }
        .bg-grad{
            background: #56ccf2; /* fallback for old browsers */
            background: -webkit-linear-gradient(to top, #56ccf2, #2f80ed); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to top, #56ccf2, #2f80ed); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        .img-info{
            background-color: #F2F2F2;
        }
        .img-info:hover{
            background-color: #C2C2C2;
        }
        .img-info:active{
            background-color: #D2D2D2;
        }
      
        .btn{
            padding-top: 8px;
            padding-bottom: 8px;
        }
        .fnt-cur{
            font: 30px 'Oleo Script', Helvetica, sans-serif;
            color: #fff;
            /* background: -webkit-linear-gradient(to right, #56ccf2, #2f80ed);
            background: linear-gradient(to right, #56ccf2, #2f80ed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent; */
            -webkit-text-stroke-width: 1px;
            -webkit-text-stroke-color: rgba(0,0,0,0.3);
            /* color: rgba(0,0,0,0.3); */
            /* padding: 8% 8% 8% 8%; */
        }
        .blink_me {
        animation: blinker 1s linear infinite;
        }

        @keyframes blinker {
        50% {
            opacity: 0;
        }
        }
        .bor-ten{
            border-radius: 10px 10px 10px 10px;
        }
        .bor-twen{
            border-radius: 20px 20px 20px 20px;
        }
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
</head>
<?php
    if(isset($inst) == FALSE){
?>
<body class="bg-white" style="" >
    <?php
        include 'primarynav.php';
    ?>
    <div class="container-fluid" >
        <?php
        }
        ?>