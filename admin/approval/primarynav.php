<?php
echo '<div class="bg-white shadow">';
echo '<div class=" container">';
echo '<nav class="navbar navbar-expand-lg navbar-light">
  <!-- Brand -->
  <img src="/icarus/images/icaruslogo1ba.png" class="mx-auto d-block" style="background-color: #fff; width: 126px;" alt="logo">
  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar" style="padding-left: 2%; ">
    <ul class="navbar-nav">';
    echo '<li class="nav-item">';
    
    if($mainnav=="paper"){
        echo '<a class="btn text-left btn-outline-primary  bor-none" href="index.php"><img src="/icarus/images/newfile.svg" class="" style="width: 20px;">&nbsp;&nbsp;Approval papers</a>';
    }else{
        echo '<a class="btn text-left text-dark bor-none" href="index.php"><img src="/icarus/images/newfile.svg" class="" style="width: 20px;">&nbsp;&nbsp;Approval papers</a>';
    }
    echo '</li>';
    if($_SESSION['typ'] == "1"){
        echo '<li class="nav-item">';
        if($mainnav=="flow"){
            echo '<a class="btn text-left btn-outline-primary  bor-none" href="flow.php"><img src="/icarus/images/flow.svg" class="" style="width: 20px;">&nbsp;&nbsp;Flowgroups and flow</a>';
        }else{
            echo '<a class="btn text-left text-dark btn-bb bor-none" href="flow.php"><img src="/icarus/images/flow.svg" class="" style="width: 20px;">&nbsp;&nbsp;Flowgroups and flow</a>';
        }
    }
    echo '</li><li class="nav-item"><a class="btn text-left text-dark bor-none" href="../index.php"><img src="/icarus/images/undo.svg" class="" style="width: 20px;">&nbsp;&nbsp;Back</a>';
    echo '</li>
    </ul>
  </div>
</nav>';
echo '</div>';
echo '</div>';
?>