<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Icarus - Login</title>
        <link rel="icon" href="../images/icaruslogohead.png" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
        <script src="https://kit.fontawesome.com/0d58c98fc8.js" crossorigin="anonymous"></script>
        <style>
            .bor-ten{
                border-radius: 10px 10px 10px 10px;
            }
            .bor-twen{
                border-radius: 20px 20px 20px 20px;
            }
            .fnt-cur{
                font: 50px 'Oleo Script', Helvetica, sans-serif;
            }
            .bg-text{
                height: 100vh;
                z-index: 2;
                position: absolute;
                top: 0px;
            }
        </style>
    </head>
    <body class="bg-light" style="">
        <div class="" style="height: 100vh;"></div>
            <div class="container-fluid bg-text bg-light" style="">
                <div class="row" style="height: 80vh; margin-top: 3%;">
                    <div class="col-xl-4"></div>
                    <div class="col-xl-4 my-auto">      
                        <div class="container bg-white shadow bor-twen" style="height: 100%; padding: 8% 8% 8% 8%;">
                            <div class="margin-bottom: 5%;">  
                                <img src="../images/icaruslogohead.png" class="mx-auto d-block" style="width: 100px; margin: 5% 5% 5% 5%;">
                                <h1 class="text-center">Icarus</h1>
                            </div>
                            
                            <form action="login.php" method="post" autocomplete="off" style="margin-bottom: 2%; padding: 3% 3% 3% 3%;">
                                <h4 class="" style="padding-top: 10%; margin-bottom: 5%;">Enter details</h4>
                                <?php
                                    session_start();
                                    include '../classes/khatral.php';
                                    if(isset($_POST['submit'])){
                                        $ret = khatral::khquery('SELECT * FROM user WHERE user_nm=:nm', array(
                                            ':nm'=>$_POST['unme']
                                        ));
                                        $count = 0;
                                        $id;
                                        $typ;
                                        $password_hashed = '';
                                        foreach($ret as $p){
                                            $count += 1;
                                            $id=$p['user_id'];
                                            $typ = $p['user_typ'];
                                            $password_hashed = $p['user_pass'];
                                        }
                                        if($count > 0){
                                            if(password_verify($_POST['pass'], $password_hashed) == TRUE){
                                                $_SESSION['unme'] = $id ;
                                                $_SESSION['unme_real'] = $_POST['unme'];
                                                $_SESSION['hxid'] = "hxiediscd";
                                                if($typ == "0"){
                                                    $_SESSION['unme'] = $_POST['unme'];
                                                    $_SESSION['hxid'] = "hxiediscd";
                                                    $_SESSION['typ'] = "0";
                                                    header("Location: ../admin");
                                                }else if($typ == "1"){
                                                    $_SESSION['unme'] = $_POST['unme'];
                                                    $_SESSION['hxid'] = "hxiediscd";
                                                    $_SESSION['typ'] = "1";
                                                    header("Location: ../admin");
                                                }else{
                                                    $_SESSION['unme'] = $_POST['unme'];
                                                    $_SESSION['hxid'] = "hxiediscd";
                                                    $_SESSION['typ'] = "2";
                                                    header("Location: ../admin");
                                                }
                                            }
                                        }else{
                                            echo '<div class="alert alert-danger alert-dismissible fade show text-center">
                                                    <strong>Username or password wrong</strong> 
                                                    </div>';
                                        }
                                    }
                                ?>
                                <div class="form-group" style=" margin-bottom: 5%;">
                                    <input type="text" id="unme" name="unme" placeholder="Username" class="form-control bg-light" required="">
                                </div>
                                <div class="form-group" style="margin-bottom: 10%;">
                                    <input type="password" placeholder="Password" class="form-control bg-light" id="pass" name="pass" required="">
                                </div>
                                <button type="submit" id="submit" name="submit" class="btn btn-primary float-right">Login&nbsp;&nbsp;<i class="fas fa-sign-in-alt"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-4"></div>
                </div>  
                <h6 class="text-center fixed-bottom" style="">
                    <p class="text-dark">&copy; 2021 Icarus. All Rights Reserved.
                </h6>
            </div>
        </div>
    </body>
</html>