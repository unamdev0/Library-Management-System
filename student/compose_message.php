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
                <h2 class="h5 no-margin-bottom">Compose Message</h2>
            </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Compose Message</li>
            </ul>
        </div>
        <section class="no-padding-top">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="block">
                            <div class="title"><strong >Send a Message</strong>
                                <div class="text-right"> <button class ="btn btn-primary" style="margin-bottom: 20px" onclick="location.href='messages.php'"  type="button">View Messages</button></div>
                            </div>
                            <div class="block-body">
                                <form class="form-horizontal" action="compose_message_details.php" method="post">
                                    <div class="form-group row">
                                        <label class="col-sm-3 fo   rm-control-label">Member Id</label>
                                        <div class="col-sm-9">
                                            <input id="inputHorizontalSuccess" type="text" name ="inputHorizontalSuccess" placeholder="Member Id" class="form-control form-control-success">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Message</label>
                                        <div class="col-sm-9">
                                            <input id="inputHorizontalWarning" type="textarea" name="inputHorizontalWarning"  placeholder="Enter Message" class="form-control form-control-warning">
                                            <strong class="text-primary small" style="margin-top:20px;" id="incorrect"></STRONG>

                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-9 offset-sm-3">
                                            <button  type="submit" name="submit" value="Send Message" class="btn btn-primary">Send Message</button>
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
    echo "<script type='text/javascript'>document.getElementById('incorrect').innerText = '$m' </script>";
    $_SESSION['message']='';

    require ('footer.php');
}
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>