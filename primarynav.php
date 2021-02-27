<?php
echo '<div class="bg-white shadow">';
echo '<div class=" container">';
echo '<nav class="navbar navbar-expand-lg navbar-light">
  <!-- Brand -->
  <img src="/icarus/images/icaruslogo1ba.png" class="mx-auto d-block" style="background-color: #fff; width: 128px;" alt="logo">
  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar" style="padding-left: 2%; ">
    <ul class="navbar-nav">';
    echo '<li class="nav-item">';
      if($mainnav=="components"){
        echo '<a class="btn-nav nav-item nav-link btn text-left bor-five btn-outline-primary  bor-none text-primary" href="index.php"><img src="/icarus/images/modules.svg" class="" style="width: 28px;">&nbsp;&nbsp;Components</a>';
      }else{
        echo '<a class="btn-nav nav-item nav-link btn text-left bor-five text-dark bor-none" href="index.php"><img src="/icarus/images/modules.svg" class="" style="width: 28px;">&nbsp;&nbsp;Components</a>';
      }
      echo '</li><li class="nav-item">';
        if($mainnav=="comp"){
            echo '<a class="btn-nav nav-item nav-link btn text-left bor-five btn-outline-primary  bor-none text-primary" href="company.php"><img src="/icarus/images/enterprise.svg" class="" style="width: 28px;">&nbsp;&nbsp;My Office Details</a>';
        }else{
            echo '<a class="btn-nav nav-item nav-link btn text-left bor-five text-dark btn-bb bor-none" href="company.php"><img src="/icarus/images/enterprise.svg" class="" style="width: 28px;">&nbsp;&nbsp;My Office Details</a>';
        }
      echo '</li><li class="nav-item">';
      if($mainnav=="access"){
        echo '<a class="btn-nav nav-item nav-link btn text-left bor-five btn-outline-primary  bor-none text-primary" href="pursoft.php"><img src="/icarus/images/connection.svg" class="" style="width: 28px;">&nbsp;&nbsp;Access control</a>';
      }else{
        echo '<a class="btn-nav nav-item nav-link btn text-left bor-five text-dark bor-none" href="pursoft.php"><img src="/icarus/images/connection.svg" class="" style="width: 28px;">&nbsp;&nbsp;Access control</a>';
      }
      
      echo '</li><li class="nav-item">';
      if($mainnav=="about"){
        echo '<a class="btn-nav nav-item nav-link btn text-left bor-five btn-outline-primary  bor-none text-primary" href="about.php"><img src="/valainet/images/info.svg" class="" style="width: 28px;">&nbsp;&nbsp;About Icarus</a>';
      }else{
        echo '<a class="btn-nav nav-item nav-link btn text-left bor-five text-dark bor-none" href="about.php"><img src="/valainet/images/info.svg" class="" style="width: 28px;">&nbsp;&nbsp;About Icarus</a>';
      }
      echo '</li><li class="nav-item">';
      if($mainnav=="logout"){
        echo '<a class="btn-nav nav-item nav-link btn text-left bor-five btn-outline-primary  bor-none text-primary" href="../loginhandle/logout.php"><img src="/valainet/images/logout.svg" class=" bg-white bor-twen p-1" style="width: 28px;">&nbsp;&nbsp;Logout session</a>';
      }else{
        echo '<a class="btn-nav nav-item nav-link btn text-left bor-five text-dark bor-none" href="../loginhandle/logout.php"><img src="/valainet/images/logout.svg" class=" bg-white bor-twen p-1" style="width: 28px;">&nbsp;&nbsp;Logout session</a>';
      }
      echo '</li>
    </ul>
  </div>
</nav>';
echo '</div>';
echo '</div>';
?>