<?php
$mainnav = 'about';
include '../header.php';
?>
<br>
<br>
<div class="container text-center" style="">
<h1 class=""><img src="../images/icaruslogo1ba.png" alt="Valai Logo" style="width: 48px;"> + <img src="../images/logo.svg" alt="logo" style="width: 50px;">&nbsp;Clerkly books lite</h1>
<br>
<div class="container text-left">
<h5>Components of Icarus</h5>
<table class="table table-bordered" style="">
    <tr>
        <th>Component</th>
        <th>Version</th>
    </tr>
    <tr>
        <td>Version</td>
        <td><?php echo icarus::DisplayVersion(); ?></td>
    </tr>
    <tr>
        <td>Bootstrap</td>
        <td>v4.0</td>
    </tr>
    <tr>
        <td>Icarus Server</td>
        <td><?php icarus::DisplayVerBuild(); ?></td>
    </tr>
    <tr>
        <td>Clerkly books lite</td>
        <!-- <td>v1.0 build 29042021034920am</td> -->
        <td><?php icarus::DisplayVerClerkBuild(); ?></td>
    </tr>
    <tr>
        <td>Softview CSS</td>
        <td>v2.0-r65</td>
    </tr>
    <tr>
        <td>Khatral-DB Connector and classes</td>
        <!-- <td>0.0.3-r552</td> -->
        <td><?php icarus::DisplayKhatralVersion();?></td>
    </tr>
    <tr>
        <td>Change Log for the latest build</td>
        <td>View GitHub Page</td>
    </tr>
    <tr>
        <td>Known Bugs in latest build</td>
        <td>View GitHub Page</td>
    </tr>
</table>
</div>
<h3>License GNU GPL v3.0</h3>
<iframe src="../LICENSE" frameborder="0" class="border bg-white" style="width: 100%; height: 40vh;"></iframe>
<br><br>
<p class="">Icarus is a open source software which is licensed under GNU GPL v3 License
<br />Icons are open source and can be downloaded and modified and released under GNU GPL v3 License
<br />Icarus Logo, Icarus Name, Softview Name, Khatral name are the properties of Arvin Soft.
<br />Clerklybooks Logo, Clerklybooks Name are the properties of Arvin Soft.
<br />Components like bootstrap, jquery and other products used in this project are the copyright of the respective owners.
<br />&copy; 2021 Icarus Project. All Rights Reserved.</p>
</div>
