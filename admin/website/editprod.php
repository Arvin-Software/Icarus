<?php
include '../headermodl.php';
include '../../icarus.php';
include '../../classes/khatral.php';
if(isset($_POST['submit1'])){
    khatral::khquery('UPDATE product_page SET page_nm=:pagenm, page_path=:paths, page_prod_nm=:prodnm, page_prod_ver=:prodver, page_prod_down_link=:proddown WHERE page_hash=:hashcode', array(
        ':pagenm'=>$_POST['pagename'],
        ':paths'=>$_POST['pagepath'],
        ':prodnm'=>$_POST['prodnm'],
        ':prodver'=>$_POST['prodver'],
        ':proddown'=>$_POST['proddown'],
        ':hashcode'=>$_GET['pagehash']
    ));
}

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
            .folder{
                background: #fff;
                padding: 1% 1% 1% 1%;
                border-radius: 10px 10px 10px 10px;
            }
            .folder:hover{
                background-color: #f6f6f6;
            }
</style>
<div id="inc1" class="" style="height: 90vh;">
<div class="bg-light p-2">
        <h6 style=""><img src="../../images/signboard.svg" style="width: 28px;">&nbsp;&nbsp;Website - <?php echo $_GET['nm']; ?> - <?php echo $_GET['off']; ?></h6>
    </div>
    <div class="container-fluid bg-light" style="">
        <div class="row">
            <div class="col-sm-4">
            <a href="addpages.php?id=<?php echo $_GET['id']; ?>&hash=<?php echo $_GET['hash']; ?>&nm=<?php echo $_GET['nm']; ?>&off=<?php echo $_GET['off']; ?>&pagehash=<?php echo $_GET['pagehash']; ?>" class="btn btn-light"><i class="far fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Back</a>
                <?php 
                    if($_SESSION['typ'] != "2"){
                        // echo '<button data-toggle="collapse" data-target="#demo" class="btn btn-light" style=""><i class="fas fa-plus"></i>&nbsp;&nbsp;New</button>';
                    }
                ?>
                <a href="#" class="btn btn-light"><i class="far fa-question-circle"></i>&nbsp;&nbsp;Help</a>
                <div id="demo" class="collapse" style="margin-top: 2%;">
                    <p><b>Create page ? please select home page or product page</b></p>
                    <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-light">Home page</a>&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#myModal1" class="btn btn-light">Product page</a>
                </div>
                
                
                
                
                
            </div>
            <div class="col-sm-4 text-center">
                
            </div>
            <div class="col-sm-4 text-right">
                
            </div>    
        </div>    
    </div>
    <div class="container-fluid" style="margin-top: 1%;">
        <?php 
        $ret = khatral::khquery('SELECT * FROM product_page WHERE page_hash=:hashc', array(
            ':hashc'=>$_GET['pagehash']
        ));
        foreach($ret as $p){
            ?>
        <form action="editprod.php?id=<?php echo $_GET['id']; ?>&hash=<?php echo $_GET['hash']; ?>&nm=<?php echo $_GET['nm']; ?>&off=<?php echo $_GET['off']; ?>&pagehash=<?php echo $_GET['pagehash']; ?>" method="post" autocomplete="off">
            <div style="margin-left: 2%; margin-right: 2%;">
            <div class="form-group row border">
                <label for="unm" class="col-sm-4 col-form-label border-right">Page path</label>
                <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                    <input type="text" name="pagepath" id="pagepath" style="border: none;" class="form-control" required="" value="<?php echo $p['page_path']; ?>">
                </div>
            </div>
            <div class="form-group row border">
                <label for="unm" class="col-sm-4 col-form-label border-right">Page name</label>
                <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                    <input type="text" name="pagename" id="pagename" style="border: none;" class="form-control" required="" value="<?php echo $p['page_nm']; ?>">
                </div>
            </div>
            <div class="form-group row border">
                <label for="unm" class="col-sm-4 col-form-label border-right">Product name</label>
                <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                    <input type="text" name="prodnm" id="prodnm" style="border: none;" class="form-control" required="" value="<?php echo $p['page_prod_nm']; ?>">
                </div>
            </div>
            <div class="form-group row border">
                <label for="unm" class="col-sm-4 col-form-label border-right">Product version</label>
                <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                    <input type="text" name="prodver" id="prodver" style="border: none;" class="form-control" required="" value="<?php echo $p['page_prod_ver']; ?>">
                </div>
            </div>
            <div class="form-group row border">
                <label for="unm" class="col-sm-6 col-form-label border-right">Product Download link</label>
                <div class="col-sm-6" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                    <input type="text" name="proddown" id="proddown" style="border: none;" class="form-control" required="" value="<?php echo $p['page_prod_down_link']; ?>">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" id="submit1" name="submit1" class="btn float-right text-primary"><b>Update</b></button>
            </div>
            </div>
        </form>
        <?php
        }
        ?>
    </div>