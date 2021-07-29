<?php
echo '<div class="bg-light border-bottom" style="">';
echo '<div class=" container-fluid">';
if($_SESSION['typ'] != "1"){
  echo '<nav class="navbar navbar-expand-lg navbar-light" style="padding-bottom: 3px; margin-left: 35%;">';
}else{
  echo '<nav class="navbar navbar-expand-lg navbar-light" style="padding-bottom: 3px; margin-left: 25%;">';
}
echo '
  <!-- Brand -->
  <img src="/icarus/images/icaruslogo1ba.png" class="mx-auto d-block" style="width: 38px;" alt="logo">
  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar" style="padding-left: 1%; ">
    <ul class="navbar-nav">';
    echo '<li class="nav-item">';
      if($mainnav=="components"){
        echo '<a class="btn text-left" style="border-bottom: 3px solid #007bff;  border-radius: 0px;" href="index.php"><img src="/icarus/images/modules.svg" class="" style="width: 28px;">&nbsp;&nbsp;Components</a>';
      }else{
        echo '<a class="btn text-left text-dark" style="border-radius: 0px;" href="index.php"><img src="/icarus/images/modules.svg" class="" style="width: 28px;">&nbsp;&nbsp;Components</a>';
      }
      echo '</li>';
      if($_SESSION['typ'] == "1"){
        echo '<li class="nav-item">';
        if($mainnav=="office"){
            echo '<a class="btn text-left"  style="border-bottom: 3px solid #007bff;  border-radius: 0px;" href="office.php"><img src="/icarus/images/enterprise.svg" class="" style="width: 28px;">&nbsp;&nbsp;Office details</a>';
        }else{
            echo '<a class="btn text-left text-dark" style="border-radius: 0px;" href="office.php"><img src="/icarus/images/enterprise.svg" class="" style="width: 28px;">&nbsp;&nbsp;Office details</a>';
        }
        echo '</li><li class="nav-item">';
        if($mainnav=="access"){
          echo '<a class="btn text-left"  style="border-bottom: 3px solid #007bff;  border-radius: 0px;" href="accontrol.php"><img src="/icarus/images/customer.svg" class="" style="width: 28px;">&nbsp;&nbsp;Access control</a>';
        }else{
          echo '<a class="btn text-left text-dark" style="border-radius: 0px;" href="accontrol.php"><img src="/icarus/images/customer.svg" class="" style="width: 28px;">&nbsp;&nbsp;Access control</a>';
        }
        echo '</li>';
      }
      echo '<li class="nav-item">';
      if($mainnav=="about"){
        echo '<a class="btn text-left"  style="border-bottom: 3px solid #007bff;  border-radius: 0px;" href="about.php"><img src="/icarus/images/information.svg" class="" style="width: 28px;">&nbsp;&nbsp;About Icarus</a>';
      }else{
        echo '<a class="btn text-left text-dark" style="border-radius: 0px;" href="about.php"><img src="/icarus/images/information.svg" class="" style="width: 28px;">&nbsp;&nbsp;About Icarus</a>';
      }
      echo '</li><li class="nav-item">';
      if($mainnav=="logout"){
        echo '<a class="btn text-left"  style="border-bottom: 3px solid #007bff;  border-radius: 0px;" href="../loginhandle/logout.php"><img src="/icarus/images/logout.svg" class="" style="width: 24px;">&nbsp;&nbsp;Logout session</a>';
      }else{
        echo '<a class="btn text-left text-dark" style="border-radius: 0px;" href="../loginhandle/logout.php"><img src="/icarus/images/logout.svg" class="" style="width: 24px;">&nbsp;&nbsp;Logout session</a>';
      }
      echo '</li>
    </ul>
  </div>
</nav>';
echo '</div>';
echo '</div>';
?>