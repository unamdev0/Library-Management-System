<?php
require('dbconn.php');
?>

<?php
if ($_SESSION['RollNo']) {
    require('header.php');
    ?>
    <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Issue Book</h2>
            </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Issue Book</li>
            </ul>
        </div>
        <section class="no-padding-top">
            <div class="container-fluid">
                <div class="row">
                    <!-- Basic Form-->
                    <!--<div class="col-lg-6">
                        <div class="block">
                            <div class="title"><strong class="d-block">Basic Form</strong><span class="d-block">Lorem ipsum dolor sit amet consectetur.</span></div>
                            <div class="block-body">
                                <form>
                                    <div class="form-group">
                                        <label class="form-control-label">Email</label>
                                        <input type="email" placeholder="Email Address" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Password</label>
                                        <input type="password" placeholder="Password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Signin" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>-->
                    <!-- Horizontal Form-->
                    <div class="col-lg-12">
                        <div class="block">
                            <div class="title"><strong >Issue Book</strong>
                            </div>
                            <div class="block-body">
                                <form class="form-horizontal" action="issue_book_detials.php" method="post">
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Member Id</label>
                                        <div class="col-sm-9">
                                            <input id="inputHorizontalSuccess" type="text" name ="inputHorizontalSuccess" placeholder="Member Id" class="form-control form-control-success">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Book Id</label>
                                        <div class="col-sm-9 ">
                                            <input id="inputHorizontalWarning" type="textbox" name="inputHorizontalWarning"  placeholder="Book Id" class="form-control form-control-warning">
                                            <strong class="text-primary small" style="margin-top:20px;" id="ict"></STRONG>

                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-9 offset-sm-3">
                                            <button  type="submit" name="submit" value="Issue Book" class="btn btn-primary">Issue Book</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    $m=$_SESSION['message'];
    echo "<script type='text/javascript'>document.getElementById('ict').innerText = '$m' </script>";
    $_SESSION['message']='';
    require ('footer.php');
}
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>