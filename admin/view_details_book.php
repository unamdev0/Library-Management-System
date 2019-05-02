<?php
require('dbconn.php');
?>

<?php
if ($_SESSION['RollNo']) {
    require('header.php');
    $no = $_GET['Id'];
    $sql = "select * from LMS.book natural join lms.author where Book.BookId='$no'";
   //echo $sql;
    $result = $conn->query($sql) or die($conn->error);
    $row = $result->fetch_assoc();
    $name = $row['Title'];
    $author=$row['Author'];
    $publisher = $row['Publisher'];
    $year = $row['Year'];
    $availability = $row['Availability'];
    ?>
<div class="page-content">
    <!-- Page Header-->
    <div class="page-header no-margin-bottom">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Book</h2>
        </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Update details</li>
        </ul>
    </div>
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong >Update details</strong>
                        </div>
                        <div class="block-body">


                            <form action="update_details_book.php" method="post">
                                <div class="form row">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-3 form-control-label ">Book Id:</label>
                                        <input readonly type="text" name="id" id="id" class="form-control" value=<?php echo $no?> >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-3 form-control-label ">Book Author:</label>
                                        <input type="text" name="author" id="author" class="form-control" value=<?php echo $author?>>
                                    </div>
                                </div>
                                <div class="form row">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-3 form-control-label ">Book Title:</label>
                                        <input type="text" name="title" id="title" class="form-control" value=<?php echo $name?>>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-3 form-control-label ">Publisher:</label>
                                        <input type="text" name="Publisher" id="Publisher" class="form-control" value=<?php echo $publisher?>>
                                    </div>
                                </div>
                                <div class="form row">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-3 form-control-label ">Year:</label>
                                        <input type="text" name="Year" id="Year" class="form-control" value=<?php echo $year?>>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-3 form-control-label ">Availability:</label>
                                        <input type="text" name="Availability" id="Availability" class="form-control" value=<?php echo $availability?>>
                                    </div>
                                </div>
                                    <div><strong class="text-primary" style="margin-top:20px;" id="incorrect"></STRONG></div>
                                    <div>
                                        <div  class="text-center">
                                            <button type="submit" name="submit" value="Update details" class="btn btn-primary">Update Details</button>
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
