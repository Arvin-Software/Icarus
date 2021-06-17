<?php
include '../headermodl.php';
  include '../../classes/khatral.php';
  include '../../icarus.php';
  if(isset($_GET['typ'])){
      $dcno = '';
      $ret = khatral::khquery('SELECT * FROM dc_entry WHERE entrypo=:id AND inst=:inst', array(
          ':id'=>$_GET['id'],
          ':inst'=>$_SESSION['instnm']
      ));
      $count = 0;
      foreach($ret as $p){
          $dcno = $p['dc_no'];
          $count+= 1;
      }
      if($count == 0){
        $ret = khatral::khquery('SELECT * FROM itemsso WHERE entrypo=:id', array(
            ':id'=>$_GET['id']
        ));
        date_default_timezone_set('Asia/Kolkata');
        $date1 = date('dmYhis', time());
        khatral::khquery('INSERT INTO dc_entry VALUES(NULL, :dcno, :entrypo, :inst)', array(
            ':dcno'=>'DC' . $date1,
            ':entrypo'=>$_GET['id'],
            ':inst'=>$_SESSION['instnm']
        ));
        foreach($ret as $p){
            
            inventor::updateSalesSRBMinus($p['itemnm'], $p['quant'], 1);
        }
    }else{
        header('Location: viewdc.php?id=' . $_GET['id'] . '&stat=Delivery Challan&no=' . $dcno);
    }
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
    <div class="p-4 container-fluid bg-white" style="">
        <div class="row">
            <div class="col-sm-4">
                
                
                
                
            </div>
            <div class="col-sm-4 text-center">
                <img src="../../images/invoiceadd.svg" alt="inventory" style="width: 48px;">
                <h3 style="margin-top: 2%;">New Invoice</h3><br>
                <a href="../index.php" class="btn btn-outline-primary rounded-circle"><i class="fas fa-home"></i></a>&nbsp;&nbsp;
                <a href="finyear.php" class="btn btn-outline-primary rounded-circle"><i class="far fa-arrow-alt-circle-left"></i></a>&nbsp;&nbsp;
                <?php 
                    if($_SESSION['typ'] != "2" && $_SESSION['typ'] != '1'){
                        echo '<a href="new.php?year=' . $_GET['year'] . '" class="btn btn-outline-primary rounded-circle" style=""><i class="fas fa-plus"></i></a>&nbsp;&nbsp;';
                    }
                ?>
                <a href="#" class="btn btn-outline-primary rounded-circle"><i class="far fa-question-circle"></i></a>
            </div>
            <div class="col-sm-4 text-right">
                
            </div>    
        </div>    
    </div>
<body class="bg-light">
    <div class="container bor-none" style="padding-top: 2%; width: 98vw; background-color: #FFFFFF;">
        <!-- <h4><i class="fas fa-file-invoice"></i>&nbsp;Sales Order</h4> -->
        
        <div class="bg-white table-responsive" style="padding: 0% 0% 0% 0%;">
        
        <table class="table table-borderless border">
            <tr class="bg-primary text-white" style="background-color: rgba(255, 247, 224, 1);">
                <th>SL.NO</th>
                <th>Date</th>
                <th>Customer Name</th>
                <th>Invoice Number</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            
            <?php
                $ret = khatral::khquery('SELECT * FROM entryso WHERE inst=:inst AND fin_year_id=:yearsz', array(':inst'=>$_SESSION['office'], ':yearsz'=>$_GET['year']));
                $count = 0;
                foreach($ret as $p){
                    $count = $count + 1;
                    echo ' <tr class="border-bottom">
                    <td>' . $count . '</td>
                    <td class="">' . $p['dt'] . '</td>
                    <td class="">' . $p['custnm'] . '</td>';
                    if($p['stat'] != 'Invoice'){
                        echo'<td class="">' . $p['sono'] . '</td>';
                    }else{
                        echo'<td class="">' . $p['invno'] . '</td>';
                    }
                    echo '<td><h4><span class="badge badge-warning">' . $p['stat'] . '</span></h4></td>';
                    if($p['stat'] == "Invoice"){
                        echo '<td class=""><a href="edit.php?id=' . $p['entryid'] . '&stat=' . $p['stat'] . '" style="" class="btn btn-outline-dark rounded-circle"><i class="far fa-edit"></i></a>&nbsp;&nbsp;<a href="view.php?id=' . $p['entryid'] . '&stat=' . $p['stat'] . '&year=' . $_GET['year'] . '" style="" class="btn btn-outline-dark rounded-circle"><i class="far fa-eye"></i></a></td>';
                    }else{
                    echo '<td class=""><a href="edit.php?id=' . $p['entryid'] . '&stat=' . $p['stat'] . '" style="" class="btn btn-outline-dark rounded-circle"><i class="far fa-edit"></i></a>&nbsp;&nbsp;<a href="view.php?id=' . $p['entryid'] . '&stat=' . $p['stat'] . '&year=' . $_GET['year'] . '" style="" class="btn btn-outline-dark rounded-circle"><i class="far fa-eye"></i></a></td>';
                    }
                    echo '</tr>';
                }
            ?>        
        </table>
        </div>
    </div>
</body>