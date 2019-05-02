<?php
require('dbconn.php');
if ($_SESSION['RollNo']) {
require('header.php');
?>
    <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Change Password</h2>
            </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Change Password</li>
            </ul>
        </div>
        <section class="no-padding-top">
            <div class="container-fluid">
                <div class="row">
                    <!-- Basic Form-->
                    <!-- Horizontal Form-->
                    <div class="col-lg-12">
                        <div class="block">
                            <div class="title"><strong >Change Password</strong>
                            </div>
                            <div class="block-body">
                                <form class="form-horizontal" action="change_password_details.php" method="post">
                                    <div class="form-group row">
                                        <label class="col-sm-3 fo   rm-control-label">Current Password</label>
                                        <div class="col-sm-9">
                                            <input id="inputHorizontalSuccess" type="password" name ="inputHorizontalSuccess" placeholder="Current Password" class="form-control form-control-success">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">New Password</label>
                                        <div class="col-sm-9">
                                            <input id="inputHorizontalWarning" type="password" name="inputHorizontalWarning"  placeholder="New Password" class="form-control form-control-warning">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Re-type New Password</label>
                                        <div class="col-sm-9">
                                            <input id="inputHorizontalReWarning" type="password" name="inputHorizontalReWarning"  placeholder="Re-type New Password" class="form-control form-control-warning">
                                            <strong class="text-primary small" style="margin-top:20px;" id="incorrect"></STRONG>

                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-9 offset-sm-3">
                                            <button  type="submit" name="submit" value="Reset Password" class="btn btn-primary">Reset Password</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--<script type='text/javascript'>document.getElementById('incorrect').innerText = $_SESSION['message'] </script>-->
    <?php
    $m=$_SESSION['message'];
    echo "<script type='text/javascript'>document.getElementById('incorrect').innerText = '$m' </script>";
    $_SESSION['message']='';

    require ('footer.php');
}
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>