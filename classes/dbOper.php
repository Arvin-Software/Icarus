<?php
error_reporting(0);
$inst = "installation";
include '../header.php';
echo '<body class="bg-light">';
echo '<div class="container-fluid" style="margin-top: 5%;">
     <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 bg-white shadow border p-4" style="border-radius: 20px 20px 20px 20px;">';
echo '<h3><img src="../images/icaruslogo1ba.png" style="width: 128px;">&nbsp;- Paperless office suite</h3>';
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error connecting to Database check configuration<br />';
    die("Connection failed: " . $conn->connect_error);
    
}

echo '<img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Database Connected successfully';
$conn = new mysqli($servername, $username, $password, "icarus");
if($conn->connect_error){
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error connecting to database. Please check error message below<br />';
    die("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Error message : " . $conn->connect_error);
}
$query = 'CREATE TABLE IF NOT EXISTS notice_board(
            notice_id           INTEGER         NOT NULL        AUTO_INCREMENT,
            notice_titl         VARCHAR(255)    NOT NULL,
            notice_content      LONGTEXT        NOT NULL,
            notice_priori       VARCHAR(2)      NOT NULL,
            notice_unm          VARCHAR(255)    NOT NULL,
            notice_timestamp    TIMESTAMP       NOT NULL,
            PRIMARY KEY(notice_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table notice_board created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table notice_board ' .$conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS user(
    user_id             INTEGER         NOT NULL        AUTO_INCREMENT,
    user_nm             VARCHAR(255)    NOT NULL,
    user_pass           VARCHAR(255)    NOT NULL,
    user_typ            VARCHAR(255)    NOT NULL,
    PRIMARY KEY(user_id))';
if($conn->query($query) == TRUE){
echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table user created successfully';
}else{
echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table user ' . $conn->error;
}

echo '<br /><br />';
echo '<a href="../installation/second.php" class="btn btn-primary bor-ten float-left">&lt; Previous</a>
<a href="../installation/admincreate.php" class="btn btn-primary bor-ten float-right">Next &gt;</a>';
echo '</div>';
echo '<div class="col-sm-4"></div>';
?>