<nav class="navbar navbar-light navbar-expand-lg px-0 flex-row" style="">
    <button class="navbar-toggler  bg-white" type="button" data-toggle="collapse" data-target="#navbarWEX" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarWEX" style="border-radius: 20px 20px 20px 20px; padding: 0px 0px 0px 0px;">
        <div class="nav flex-md-column flex-column" style="overflow: auto;  width: 100%; padding: 0px 0px 0px 0px;">
            <a style="margin-bottom: 5%;" href="index.php" <?php if($curr == 'dash'){ echo 'class=" btn-nav-sec nav-item nav-link btn text-left btn-bb btn-col bor-five"';} else{ echo 'class=" btn-nav-sec nav-item nav-link btn text-left btn-bb bor-five"';} ?>  id="users" name="users"><img src="/icarus/images/signboard.svg" class="" style="width: 28px;">&nbsp;&nbsp;Noticeboard</a>
            <?php if($_SESSION['typ'] != "1"){ ?>
            <a href="invoice.php" style="margin-bottom: 5%;" <?php if($curr == 'announce'){ echo 'class=" btn-nav-sec nav-item nav-link btn text-left btn-bb btn-col  bor-five"';} else{ echo 'class=" btn-nav-sec nav-item nav-link btn text-left btn-bb bor-five"';} ?>  id="dash" name="dash"><img src="/icarus/images/invoice.svg" class="" style="width: 28px;">&nbsp;&nbsp;Invoice generator</a>
            <?php }else{
                ?>
                <!-- <a href="#" style="margin-bottom: 5%;" <?php if($curr == 'announce'){ echo 'class=" btn-nav-sec nav-item nav-link btn text-left btn-bb btn-col  bor-five"';} else{ echo 'class="text-dark btn-nav-sec nav-item nav-link btn text-left btn-bb bor-five"';} ?>  id="dash" name="dash"><img src="/icarus/images/invoice.svg" class="" style="width: 28px;">&nbsp;&nbsp;Invoice generator</a> -->
            <a href="website.php" style="margin-bottom: 5%;" <?php if($curr == 'mod'){ echo 'class=" btn-nav-sec nav-item nav-link btn text-left btn-bb btn-col  bor-five"';} else{ echo 'class=" btn-nav-sec nav-item nav-link btn text-left btn-bb bor-five"';} ?>  id="dash" name="dash"><img src="/icarus/images/code.svg" class="" style="width: 28px;">&nbsp;&nbsp;Website manager</a>
            <?php
            }
            ?>
            <a href="modules.php" style="margin-bottom: 5%;" <?php if($curr == 'api'){ echo 'class=" btn-nav-sec nav-item nav-link btn text-left btn-bb btn-col  bor-five"';} else{ echo 'class=" btn-nav-sec nav-item nav-link btn text-left btn-bb bor-five"';} ?>  id="dash" name="dash"><img src="/icarus/images/notes.svg" class="" style="width: 28px;">&nbsp;&nbsp;modules</a>
        </div>
    </div>
</nav>