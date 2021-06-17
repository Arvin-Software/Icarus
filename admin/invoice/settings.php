<?php
include '../headermodl.php';
include '../../icarus.php';
include '../../classes/khatral.php';
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
    <div class="p-4 container-fluid bg-white" style="">
        <div class="row">
            <div class="col-sm-4">
                
                
                
                
            </div>
            <div class="col-sm-4 text-center">
                <img src="../../images/settings.svg" alt="inventory" style="width: 48px;">
                <h3 style="margin-top: 2%;">Settings</h3><br>
                <a href="../index.php" class="btn btn-outline-primary rounded-circle"><i class="fas fa-home"></i></a>&nbsp;&nbsp;
                <a href="index.php" class="btn btn-outline-primary rounded-circle"><i class="far fa-arrow-alt-circle-left"></i></a>&nbsp;&nbsp;
                <a href="#" class="btn btn-outline-primary rounded-circle"><i class="far fa-question-circle"></i></a>
            </div>
            <div class="col-sm-4 text-right">
                
            </div>    
        </div>    
    </div>
<div class="container">
    <?php
    if(isset($_POST['submit'])){
        date_default_timezone_set('Asia/Kolkata');
        $date = date('dmYhis', time());
        $date1 = date('d/m/Y h:i:s', time());
        khatral::khquery('INSERT INTO comp_info VALUES(NULL, :ref_id, :mail_nm, :finyearfr, :finyearto, :gstno,
        :addr, :country, :stat, :city, :pin, :curr,
        :email, :phno, :web, :typofb, :logo)', array(
            ':ref_id'=>$_POST['refid'],
            ':mail_nm'=>$_POST['nm'],
            ':finyearfr' =>"",
            ':finyearto'=>"",
            ':gstno'=>$_POST['gst'],
            ':addr'=>$_POST['addr'],
            ':country'=>$_POST['count'],
            ':stat'=>$_POST['stat'],
            ':city'=>$_POST['city'],
            ':pin'=>$_POST['pin'],
            ':curr'=>$_POST['curr'],
            ':email'=>$_POST['email'],
            ':phno'=>$_POST['phno'],
            ':web'=>$_POST['web'],
            ':typofb'=>$_SESSION['office'],
            ':logo'=>'',
        ));
        echo 'Company details saved';
    }
    $ret = khatral::khquery('SELECT * FROM comp_info WHERE typofb=:office', array(':office'=>$_SESSION['office']));
    $nm = '';
    $finyear = '';
    $finyearend = '';
    $gst = '';
    $addr = '';
    $country = '';
    $state = '';
    $city ='';
    $pin = '';
    $curr ='';
    $email = '';
    $phno = '';
    $web = '';
    foreach($ret as $p){
        $nm = $p['mail_nm'];
        $finyear = $p['finyearfrom'];
        $finyearend = $p['finyearto'];
        $gst = $p['gstno'];
        $addr = $p['addr'];
        $country = $p['country'];
        $state = $p['stat'];
        $city = $p['city'];
        $pin = $p['pin'];
        $curr = $p['curr'];
        $email = $p['email'];
        $phno = $p['phno'];
        $web = $p['web'];
    }
    ?>
    <form action="settings.php" method="post" autocomplete="off">
        <?php
            $res = khatral::khquery('SELECT * FROM office WHERE office_nm=:nm', array(
                ':nm'=>$_SESSION['office']
            ));
            $refid = 0;
            foreach($res as $p){
                $refid = $p['office_id'];
            }
        ?>
        <input type="text" name="refid" id="refid" style="display: none;" value="<?php echo $refid; ?>">
        <input type="text" name="refnm" id="refnm" style="display: none;" value="<?php echo $_SESSION['office']; ?>">
        <div class="form-group row border">
            <label for="unm" class="col-sm-4 col-form-label border-right">Mailing name</label>
            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                <input type="text" name="nm" id="nm" style="border: none;" class="form-control" required="" value="<?php echo $_SESSION['office']; ?>">
            </div>
        </div>
        <!-- <div class="form-group row border">
            <label for="unm" class="col-sm-4 col-form-label border-right">Financial year start</label>
            <div class="col-sm-4" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                <input type="date" name="dt" id="dt" style="border: none;" class="form-control" required="" value="<?php echo $finyear; ?>">
            </div>
        </div>
        <div class="form-group row border">
            <label for="unm" class="col-sm-4 col-form-label border-right">Financial year start</label>
            <div class="col-sm-4" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                <input type="date" name="dtend" id="dtend" style="border: none;" class="form-control" required="" value="<?php echo $finyearend; ?>">
            </div>
        </div> -->
        <div class="form-group row border">
            <label for="unm" class="col-sm-4 col-form-label border-right">GST number</label>
            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                <input type="text" name="gst" id="gst" style="border: none;" class="form-control" required=""   value="<?php echo $gst; ?>">
            </div>
        </div>
        <div class="form-group row border">
            <label for="unm" class="col-sm-4 col-form-label border-right">Address</label>
            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
            <textarea name="addr" id="addr" cols="10" rows="10" style="border: none;" class="form-control" required=""><?php echo $addr; ?></textarea>
            </div>
        </div>
        <div class="form-group row border">
            <label for="unm" class="col-sm-4 col-form-label border-right">Country</label>
            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
            <select name="count" id="count" class="custom-select" style="border: none;" required="" value="<?php echo $country; ?>">
                <option>India</option>
            </select>
            </div>
        </div>
        <div class="form-group row border">
            <label for="unm" class="col-sm-4 col-form-label border-right">State</label>
            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                <select name="stat" id="stat" class="custom-select" style="border: none;" required="" text="<?php echo $state; ?>">
                    <option>Andaman and Nicobar Islands</option>
                    <option>Andra Pradesh</option>
                    <option>Arunachal Pradesh</option>
                    <option>Assam</option>
                    <option>Bihar</option>
                    <option>Chandigarh</option>
                    <option>Chhattisgarh</option>
                    <option>Dadra and Nagar Haveli</option>
                    <option>Daman and Diu</option>
                    <option>Delhi</option>
                    <option>Goa</option>
                    <option>Gujarat</option>
                    <option>Haryana</option>
                    <option>Himachal Pradesh</option>
                    <option>Jammu and Kashmir</option>
                    <option>Jharkhand</option>
                    <option>Karnataka</option>
                    <option>Kerala</option>
                    <option>Ladakh</option>
                    <option>Lakshadweep</option>
                    <option>Madhya Pradesh</option>
                    <option>Maharashtra</option>
                    <option>Manipur</option>
                    <option>Meghalaya</option>
                    <option>Mizoram</option>
                    <option>Nagaland</option>
                    <option>Odisha</option>
                    <option>Puducherry</option>
                    <option>Punjab</option>
                    <option>Rajasthan</option>
                    <option>Sikkim</option>
                    <option>Tamil Nadu</option>
                    <option>Telangana</option>
                    <option>Tripura</option>
                    <option>Uttar Pradesh</option>
                    <option>Uttarakhand</option>
                    <option>West Bengal</option>
                </select>
            </div>
        </div>
        <div class="form-group row border">
            <label for="unm" class="col-sm-4 col-form-label border-right">City</label>
            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                <input type="text" name="city" id="city" style="border: none;" class="form-control" required="" value="<?php echo $city; ?>">
            </div>
        </div>
        <div class="form-group row border">
            <label for="unm" class="col-sm-4 col-form-label border-right">Pincode/Zip Code</label>
            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                <input type="text" name="pin" id="pin" style="border: none;" class="form-control" required="" value="<?php echo $pin; ?>">
            </div>
        </div>
        <div class="form-group row border">
            <label for="unm" class="col-sm-4 col-form-label border-right">Currency</label>
            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
            <select name="curr" id="curr" class="custom-select bor-ten" style="border: none;" value="<?php echo $curr; ?>">
                    <option value="inr">&#8377; Rupee</option>
                    <option value="doll">$ Dollar</option>
                </select>
            </div>
        </div>
        <div class="form-group row border">
            <label for="unm" class="col-sm-4 col-form-label border-right">Email</label>
            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                <input type="email" name="email" id="email" style="border: none;" class="form-control" required="" value="<?php echo $email; ?>">
            </div>
        </div>
        <div class="form-group row border">
            <label for="unm" class="col-sm-4 col-form-label border-right">Phone number</label>
            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                <input type="text" name="phno" id="phno" style="border: none;" class="form-control" required="" value="<?php echo $phno; ?>">
            </div>
        </div>
        <div class="form-group row border">
            <label for="unm" class="col-sm-4 col-form-label border-right">Website</label>
            <div class="col-sm-8" style="padding-right: 0px; padding-left:0px; border-radius: 0px 0px 0px 0px;">
                <input type="text" name="web" id="web" style="border: none;" class="form-control" required="" value="<?php echo $web; ?>">
            </div>
        </div>
        <input type="submit" value="Save details" id="submit" name="submit" class="btn btn-outline-primary">
        </div>
        </div>
        </div>
    </form>
</div>