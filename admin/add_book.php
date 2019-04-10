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
                <h2 class="h5 no-margin-bottom">Book</h2>
            </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Book</li>
            </ul>
        </div>
        <section class="no-padding-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block">
                            <div class="title"><strong >Add a book</strong>
                                <div class="text-right"> <button class ="btn btn-primary" style="margin-bottom: 20px" onclick="location.href='view_books.php'"  type="button">View Books</button></div>
                            </div>
                            <div class="block-body">
                                <form class="form-horizontal" action="add_book_details.php" method="post">
                                    <div class="form-group row">
                                        <label class="col-sm-3 fo   form-control-label">Book Title</label>
                                        <div class="col-sm-9">
                                            <input id="title" type="text" name ="title" placeholder="Book title" class="form-control form-control-success">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 fo   form-control-label">Book Author</label>
                                        <div class="col-sm-9">
                                            <input id="title" type="author" name ="author" placeholder="Book Author" class="form-control form-control-success">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Book Publisher</label>
                                        <div class="col-sm-9">
                                            <input id="publisher" type="text" name="publisher"  placeholder="Publisher" class="form-control form-control-warning">


                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Year</label>
                                        <div class="col-sm-9">
                                            <input id="year" type="textbox" name="year"  placeholder="Year of Publish" class="form-control form-control-warning">


                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Availability</label>
                                        <div class="col-sm-9">
                                            <input id="availability" type="text" name="availability"  placeholder="Availability" class="form-control form-control-warning">
                                        </div>
                                        <strong class="col-sm-3 text-primary sm" style="margin-top:20px; " id="incorrect"></STRONG>

                                    </div>
                                    <div class="text-left">
                                        <div class="col-sm-9 offset-sm-3">
                                            <button  type="submit" name="submit" value="Send Message" class="btn btn-primary">Add book</button>
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