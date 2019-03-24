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
                <h2 class="h5 no-margin-bottom">Renew Book</h2>
            </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active"><a style="color: #585a5f" href="renew_book.php">View Renew Request</a></li>
            </ul>
        </div>
        <section class="no-padding-top">
            <form action="renew_book.php" method="post">
                <div class="container-fluid">
                    <div class="public-user-block block">
                        <div class="input-group">

                            <select name="account" id="account" class="form-control mb-3 mb-3" style=" max-width: 200px;">
                                <option selected value="BookId"> Book Id</option>
                                <option value="RollNo">Requested By</option>
                                <option value="Renew_Date">Renew Date</option>
                            </select>
                            <input type="text" class="form-control" id="title" name = "title" placeholder="Enter the details">
                            <div class="input-group-append" style="height: 100%;">
                                <button type="submit" name ="submit" class="btn btn-primary" >Search</button></form>
    </div>
    </div>
    </div>
    </div>
    <?php
    if(isset($_POST['submit']))
    {
        $s=$_POST['title'];
        $t=$_POST['account'];

        $sql="select RollNo,BookId,Date_of_Issue,Renew_Date from lms.record where $t like '$s' and Renew_Date is not null by RollNo ASC";
    }
    else
        $sql="select RollNo,BookId,Date_of_Issue,Renew_Date from lms.record where Renew_Date is not null order by RollNo ASC ";
    //echo $sql;
    $result=$conn->query($sql);
    $rowcount=mysqli_num_rows($result);
    //echo $rowcount;
    if(!($rowcount))
        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
    else
    {

        ?>
        <div class="row">

        <div class="col-lg-12">
        <div class="block">
        <!--<div class="title"><strong>Striped table with hover effect</strong></div>-->
        <div class="table-responsive">
        <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th class="text-primary">#</th>
            <th class="text-primary">Requested By</th>
            <th class="text-primary">Book Id</th>
            <th class="text-primary">Date of Request</th>
            <th class="text-primary">Renew Date</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $i=1;
        while($row=$result->fetch_assoc())
        {
            $id=$row['BookId'];
            $issued_by=$row['RollNo'];
            $idate=$row['Date_of_Issue'];
            $rdate=$row['Renew_Date'];
            ?>
            <tr>
                <td scope="row"><?php echo $i?></td>
                <td><?php echo $issued_by?></td>
                <td><?php echo $id?></td>
                <td> <?php echo $idate?></td>
                <td><?php echo $rdate?></td>

            </tr>
            <?php $i++; }}?>
    </tbody>
    </table>
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
