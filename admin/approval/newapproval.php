<?php
$mainnav = 'paper';
include 'header.php';
?>
<div class="container" style="margin-top: 3%;" id="inc1">
    <a href="index.php" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i>&nbsp;&nbsp;back</a>&nbsp;&nbsp;<br><br><h3>New Approval</h3>
    <div id="content" style="margin-top: 5%;">
        <form action="newapproval.php" method="post">
            <div class="form-group row">
                <label for="titl" class="col-sm-2 col-form-label ">Title</label>
                <div class="col-sm-10">
                    <input type="text" name="titl" id="titl" class="form-control" required="">
                </div>
            </div>
            <div class="form-group row">
                <label for="titl" class="col-sm-2 col-form-label ">Description</label>
                <div class="col-sm-10">
                    <textarea name="descr" id="descr" cols="30" rows="10" class="form-control" required=""></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="titl" class="col-sm-2 col-form-label ">Priority</label>
                <div class="col-sm-10">
                    <select name="priori" id="priori" class="custom-select">
                        <option value="0">Low</option>
                        <option value="1">Medium</option>
                        <option value="2">High</option>
                        <option value="3">Urgent</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="titl" class="col-sm-2 col-form-label ">Approval type</label>
                <div class="col-sm-10">
                    <select name="priori" id="priori" class="custom-select">
                        <option value="0">General</option>
                    </select>
                </div>
            </div>
            <hr>
            <h5>Custom Fields</h5>
            <button id="newrow" class="btn btn-primary float-right">Add new row</button> <br><br>
            <div id="furtherrows" class=" row form-group">
                <div class="col-sm-1">1.</div>
                <div class="col-sm-5"><input type="text" name="rec1" id="rec1" class="form-control"></div>
                <div class="col-sm-6">
                    <input type="text" name="recdes1" id="recdes1" class="form-control">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="titl" class="col-sm-2 col-form-label ">Approval flow</label>
                <div class="col-sm-10">
                    <select name="priori" id="priori" class="custom-select">
                        <option value="0">General flow</option>
                    </select>
                </div>
            </div>
            <a href="#" class="btn btn-primary">Raise Approval</a>
        </form>
        <script>
            $('#newrow')
        </script>
    </div>
</div>
