<?php
echo '<div class="trd-blue shadow">';
echo '<div class=" container">';
echo '<nav class="navbar navbar-expand-lg navbar-light">
  <!-- Brand -->
  <img src="/icarus/images/icaruslogohead.png" class="mx-auto d-block rounded-circle p-1" style="background-color: #fff; width: 48px;" alt="logo">
  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar" style="padding-left: 2%; ">
    <ul class="navbar-nav">';
    echo '<li class="nav-item">';
      if($mainnav=="inbox"){
        echo '<a class="btn text-left btn-light  bor-none" href="index.php"><img src="/icarus/images/email.svg" class="" style="width: 28px;">&nbsp;&nbsp;My inbox</a>';
      }else{
        echo '<a class="btn text-left text-light bor-none" href="index.php"><img src="/icarus/images/email.svg" class="" style="width: 28px;">&nbsp;&nbsp;My inbox</a>';
      }
      echo '</li><li class="nav-item">';
        if($mainnav=="comp"){
            echo '<a class="btn text-left btn-light  bor-none" href="company.php"><img src="/icarus/images/newemail.svg" class="" style="width: 28px;">&nbsp;&nbsp;Compose New email</a>';
        }else{
            echo '<a class="btn text-left text-light btn-bb bor-none" href="company.php"><img src="/icarus/images/newemail.svg" class="" style="width: 28px;">&nbsp;&nbsp;Compose New email</a>';
        }
      echo '</li><li class="nav-item">';
      if($mainnav=="access"){
        echo '<a class="btn text-left btn-light  bor-none" href="pursoft.php"><img src="/icarus/images/settings.svg" class="" style="width: 28px;">&nbsp;&nbsp;Email Settings</a>';
      }else{
        echo '<a class="btn text-left text-light bor-none" href="pursoft.php"><img src="/icarus/images/settings.svg" class="" style="width: 28px;">&nbsp;&nbsp;Email Settings</a>';
      }
      echo '</li>
    </ul>
  </div>
</nav>';
echo '</div>';
echo '</div>';
?>