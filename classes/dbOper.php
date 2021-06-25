<?php
error_reporting(0);
$inst = "installation";
include '../header.php';
echo '<body class="bg-light">';
echo '<div class="container-fluid" style="margin-top: 5%;">
     <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 bg-white shadow border" style="border-radius: 20px 20px 20px 20px; padding: 2% 2% 2% 2%;">';
echo '<img src="../images/icaruslogo1ba.png" class="d-block mx-auto" style="width: 128px; margin-bottom: 5%;">';
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

echo '<img src="../images/tick.svg" style="width: 22px;">&nbsp;&nbsp;Database Connected successfully';
$conn = new mysqli($servername, $username, $password, "icarus");
if($conn->connect_error){
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error connecting to database. Please check error message below<br />';
    die("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Error message : " . $conn->connect_error);
}
$query = 'CREATE TABLE IF NOT EXISTS n_boards(
            board_id            INTEGER         NOT NULL        AUTO_INCREMENT,
            board_nm            VARCHAR(255)    NOT NULL,
            board_unm           VARCHAR(255)    NOT NULL,
            board_hash          VARCHAR(255)    NOT NULL,
            board_office        VARCHAR(255)    NOT NULL,
            board_timestamp     TIMESTAMP       NOT NULL,
            PRIMARY KEY(board_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.svg" style="width: 22px;">&nbsp;&nbsp;Table n_boards created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table n_boards ' .$conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS notice_board(
            notice_id           INTEGER         NOT NULL        AUTO_INCREMENT,
            notice_titl         VARCHAR(255)    NOT NULL,
            notice_content      LONGTEXT        NOT NULL,
            notice_priori       VARCHAR(2)      NOT NULL,
            notice_unm          VARCHAR(255)    NOT NULL,
            notice_timestamp    TIMESTAMP       NOT NULL,
            notice_board_id     VARCHAR(255)    NOT NULL,
            PRIMARY KEY(notice_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.svg" style="width: 22px;">&nbsp;&nbsp;Table notice_board created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table notice_board ' .$conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS share_notice(
            share_id            INTEGER         NOT NULL        AUTO_INCREMENT,
            share_b_nm          VARCHAR(255)    NOT NULL,
            share_b_unm         VARCHAR(255)    NOT NULL,
            share_b_hash        VARCHAR(255)    NOT NULL,
            share_timestamp     TIMESTAMP       NOT NULL,
            PRIMARY KEY(share_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.svg" style="width: 22px;">&nbsp;&nbsp;Table share_notice created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table share_notice ' .$conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS office(
            office_id           INTEGER         NOT NULL        AUTO_INCREMENT,
            office_nm           VARCHAR(255)    NOT NULL,
            office_timestamp    TIMESTAMP       NOT NULL,
            PRIMARY KEY(office_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.svg" style="width: 22px;">&nbsp;&nbsp;Table office created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table office ' .$conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS user(
    user_id             INTEGER         NOT NULL        AUTO_INCREMENT,
    user_nm             VARCHAR(255)    NOT NULL,
    user_pass           VARCHAR(255)    NOT NULL,
    user_typ            VARCHAR(255)    NOT NULL,
    user_office         VARCHAR(255)    NOT NULL,
    PRIMARY KEY(user_id))';
if($conn->query($query) == TRUE){
echo '<br /><img src="../images/tick.svg" style="width: 22px;">&nbsp;&nbsp;Table user created successfully';
}else{
echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table user ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS approval_flow(
            flow_id         INTEGER         NOT NULL        AUTO_INCREMENT,
            flow_nm         VARCHAR(255)    NOT NULL,
            flow_office     VARCHAR(255)    NOT NULL,
            flow_hash       VARCHAR(255)    NOT NULL,
            flow_timestamp  TIMESTAMP       NOT NULL,
            PRIMARY KEY(flow_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.svg" style="width: 22px;">&nbsp;&nbsp;Table approval_flow created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table approval_flow ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS flow_user(
            user_id         INTEGER         NOT NULL        AUTO_INCREMENT,
            user_nm         VARCHAR(255)    NOT NULL,
            user_flow       VARCHAR(255)    NOT NULL,
            user_office     VARCHAR(255)    NOT NULL,
            PRIMARY KEY(user_id))
            ';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.svg" style="width: 22px;">&nbsp;&nbsp;Table flow_user created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table flow_user ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS fin_year(
            year_id         INTEGER         NOT NULL    AUTO_INCREMENT,
            year_from_to    VARCHAR(255)    NOT NULL,
            year_inst       VARCHAR(255)    NOT NULL,
            PRIMARY KEY(year_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.svg" style="width: 22px;">&nbsp;&nbsp;Table fin_year created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table fin_year ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS entryso(
    entryid             INTEGER         NOT NULL            AUTO_INCREMENT,
    fin_year_id         VARCHAR(255)    NOT NULL,
    dt                  DATE            NOT NULL,
    custnm              VARCHAR(255)    NOT NULL,
    sono                VARCHAR(255)    NOT NULL,
    invno               VARCHAR(255)    NOT NULL,
    validity            VARCHAR(255)    NOT NULL,
    stat                VARCHAR(255)    NOT NULL,
    inst                VARCHAR(255)    NOT NULL,
    PRIMARY KEY(entryid))
    ';
if($conn->query($query) == TRUE){
echo '<br /><img src="../images/tick.svg" style="width: 22px;">&nbsp;&nbsp;Table entryso created successfully';
}else{
echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table entryso ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS itemsso(
    itemid              INTEGER             NOT NULL        AUTO_INCREMENT,
    itemnm              VARCHAR(255)        NOT NULL,
    hsn                 VARCHAR(255)        NOT NULL,
    quant               VARCHAR(255)        NOT NULL,
    rte                 VARCHAR(255)        NOT NULL,
    cgst                VARCHAR(255)        NOT NULL,
    sgst                VARCHAR(255)        NOT NULL,
    tot                 VARCHAR(255)        NOT NULL,
    entrypo             VARCHAR(255)        NOT NULL,
    PRIMARY KEY(itemid))';
if($conn->query($query) == TRUE){
echo '<br /><img src="../images/tick.svg" style="width: 22px;">&nbsp;&nbsp;Table itemsso created successfully';
}else{
echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table itemsso ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS totandtaxso(
    totid           INTEGER         NOT NULL        AUTO_INCREMENT,
    fright          VARCHAR(255)    NOT NULL,
    discounts       VARCHAR(255)    NOT NULL,
    terms           VARCHAR(255)    NOT NULL,
    poid            VARCHAR(255)    NOT NULL,
    PRIMARY KEY(totid))';
if($conn->query($query) == TRUE){
echo '<br /><img src="../images/tick.svg" style="width: 22px;">&nbsp;&nbsp;Table totandtaxso created successfully';
}else{
echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table totandtaxso ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS print_temp_so(
            temp_id         INTEGER         NOT NULL        AUTO_INCREMENT,
            temp_file       VARCHAR(255)    NOT NULL,
            off_nm          VARCHAR(255)    NOT NULL,
            PRIMARY KEY(temp_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.svg" style="width: 22px;">&nbsp;&nbsp;Table print_temp_so created successfully';
    }else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table print_temp_so ' . $conn->error;
    }
$query = 'CREATE TABLE IF NOT EXISTS mtrlsales(
    mtrl_id			INTEGER			NOT NULL			AUTO_INCREMENT,
    code            VARCHAR(255)    NOT NULL,
    mtrl_nm			VARCHAR(255)	NOT NULL,
    hsncode         VARCHAR(255)    NOT NULL,
    rate            VARCHAR(255)    NOT NULL,
    cgst            VARCHAR(255)    NOT NULL,
    sgst            VARCHAR(255)    NOT NULL,
    open_bal        VARCHAR(255)    NOT NULL,
    loc             VARCHAR(255)    NOT NULL,
    usr				VARCHAR(255)	NOT NULL,
    PRIMARY KEY(mtrl_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.svg" style="width: 22px;">&nbsp;&nbsp;Table mtrlsales created successfully';
    }else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table mtrlsales ' . $conn->error;
    }
$query = 'CREATE TABLE IF NOT EXISTS cont_list(
    listid          INTEGER         NOT NULL    AUTO_INCREMENT,
    cont_nm         VARCHAR(255)    NOT NULL,
    cont_email      VARCHAR(255)    NOT NULL,
    cont_phone      VARCHAR(255)    NOT NULL,
    cont_addr       VARCHAR(255)    NOT NULL,
    cont_gst        VARCHAR(255)    NOT NULL,
    stcd			VARCHAR(255)	NOT NULL,
    cons_nm         VARCHAR(255)    NOT NULL,
    cons_email      VARCHAR(255)    NOT NULL,
    cons_phone      VARCHAR(255)    NOT NULL,
    cons_addr       VARCHAR(255)    NOT NULL,
    cons_gst        VARCHAR(255)    NOT NULL,
    conscd			VARCHAR(255)	NOT NULL,
    bankdet         VARCHAR(255)    NOT NULL,
    bankifsc        VARCHAR(255)    NOT NULL,
    otherbankdet    LONGTEXT        NOT NULL,
    acc             VARCHAR(255)    NOT NULL,
    typ             VARCHAR(255)    NOT NULL,
    PRIMARY KEY(listid))';
if($conn->query($query) == TRUE){
echo '<br /><img src="../images/tick.svg" style="width: 22px;">&nbsp;&nbsp;Table cont_list created successfully';
}else{
echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table cont_list ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS comp_info(
    id              INTEGER             NOT NULL        AUTO_INCREMENT,
    ref_id          INTEGER             NOT NULL,
    mail_nm         VARCHAR(255)        NOT NULL,
    finyearfrom     DATE                NOT NULL,
    finyearto       DATE                NOT NULL,
    gstno           VARCHAR(255)        NOT NULL,
    addr            VARCHAR(255)        NOT NULL,
    country         VARCHAR(255)        NOT NULL,
    stat            VARCHAR(255)        NOT NULL,
    city            VARCHAR(255)        NOT NULL,
    pin             VARCHAR(255)        NOT NULL,
    curr            VARCHAR(255)        NOT NULL,
    email           VARCHAR(255)        NOT NULL,
    phno            VARCHAR(255)        NOT NULL,
    web             VARCHAR(255)        NOT NULL,
    typofb          VARCHAR(255)        NOT NULL,
    logo            VARCHAR(255)        NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(ref_id) REFERENCES office(office_id)
    )';
if($conn->query($query) == TRUE){
echo '<br /><img src="../images/tick.svg" style="width: 22px;">&nbsp;&nbsp;Table comp_info created successfully';
}else{
echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table comp_info ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS website(
            web_id          INTEGER         NOT NULL        AUTO_INCREMENT,
            web_hash        VARCHAR(255)    NOT NULL,
            web_nm          VARCHAR(255)    NOT NULL,
            web_unm         VARCHAR(255)    NOT NULL,
            web_inst        VARCHAR(255)    NOT NULL,
            PRIMARY KEY(web_id))';
if($conn->query($query) == TRUE){
echo '<br /><img src="../images/tick.svg" style="width: 22px;">&nbsp;&nbsp;Table website created successfully';
}else{
echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table website ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS home_page(
            page_id         INTEGER         NOT NULL        AUTO_INCREMENT,
            page_nm         VARCHAR(255)    NOT NULL,
            page_hash       VARCHAR(255)    NOT NULL,
            page_path       VARCHAR(255)    NOT NULL,
            page_web_hash   VARCHAR(255)    NOT NULL,
            PRIMARY KEY(page_id))';
if($conn->query($query) == TRUE){
echo '<br /><img src="../images/tick.svg" style="width: 22px;">&nbsp;&nbsp;Table home_page created successfully';
}else{
echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table home_page ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS product_page(
    page_id             INTEGER         NOT NULL        AUTO_INCREMENT,
    page_nm             VARCHAR(255)    NOT NULL,
    page_hash           VARCHAR(255)    NOT NULL,
    page_path           VARCHAR(255)    NOT NULL,
    page_web_hash       VARCHAR(255)    NOT NULL,
    page_prod_nm        VARCHAR(255)    NOT NULL,
    page_prod_ver       VARCHAR(255)    NOT NULL,
    page_prod_down_link VARCHAR(255)    NOT NULL,
    PRIMARY KEY(page_id))';
if($conn->query($query) == TRUE){
echo '<br /><img src="../images/tick.svg" style="width: 22px;">&nbsp;&nbsp;Table product_page created successfully';
}else{
echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table product_page ' . $conn->error;
}
echo '<br /><br />';
echo '<a href="../installation/second.php" class="btn btn-primary bor-ten float-left">&lt; Previous</a>
<a href="../installation/admincreate.php" class="btn btn-primary bor-ten float-right">Next &gt;</a>';
echo '</div>';
echo '<div class="col-sm-4"></div>';
?>