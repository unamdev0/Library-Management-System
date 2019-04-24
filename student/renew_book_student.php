<?php
require('dbconn.php');
?>

<?php
if ($_SESSION['RollNo']) {
    require('header.php');
    $bookid=$_GET['id'];
    $due =$_GET['ddate'];
    $date=date_create($due);
    date_add($date,date_interval_create_from_date_string("15 days"));
    $new_due= date_format($date,"Y-m-d");
    $renew=$_GET['renew'];
    ?>
    <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Renew Book</h2>
            </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Renew Book</li>
            </ul>
        </div>
        <section class="no-padding-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block">
                            <div class="title"><strong >Renew Book</strong>
                            </div>
                            <div class="block-body">
                                <form class="form-horizontal" action="renew_book_student_details.php" method="post">
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Book Id</label>
                                        <div class="col-sm-9">
                                            <input id="inputHorizontalSuccess" readonly="readonly" type="text" name ="inputHorizontalSuccess" value="<?php echo $bookid; ?>" class="form-control form-control-success">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">New Due Date</label>
                                        <div class="col-sm-9">
                                            <input id="inputHorizontalWarning" readonly="readonly" type="text" name="inputHorizontalWarning" value="<?php echo $new_due ?>" class="form-control form-control-warning">
                                            <strong class="text-primary small" style="margin-top:20px;" id="incorrect"></STRONG>
                                        </div>
                                    </div>
                                    <div style="display:none" class="col-sm-9">
                                        <input id="renew" type="text" readonly="readonly" name="renew" value="<?php echo $renew ?>" class="form-control form-control-warning">
                                        <strong class="text-primary small" style="margin-top:20px;" id="incorrect"></STRONG>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-9 offset-sm-3">
                                            <button  type="submit" name="submit" value="Confirm Renew" class="btn btn-primary">Confirm Renew</button>
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
    require ('footer.php');
}
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>