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
                <h2 class="h5 no-margin-bottom">Renewed Books</h2>
            </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active"><a style="color: #585a5f" href="renewed_book_student.php">View Renewed books</a></li>
            </ul>
        </div>
        <section class="no-padding-top">
            <form action="renewed_book_student.php" method="post">
                <div class="container-fluid">
                    <div class="public-user-block block">
                        <div class="input-group">

                            <select name="account" id="account" class="form-control mb-3 mb-3" style=" max-width: 200px;">
                                <option selected value="BookId"> Book Id</option>
                                <option value="Date_of_Issue">Request Date</option>
                                <option value="Due_Date">Due Date</option>
                            </select>
                            <input type="text" class="form-control" id="title" name = "title" placeholder="Enter the details">
                            <div class="input-group-append" style="height: 100%;">
                                <button type="submit" name ="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
            if(isset($_POST['submit']))
            {
                $s=$_POST['title'];
                $t=$_POST['account'];
                $d=$_SESSION['RollNo'];

                $sql="select BookId,Renewals_left,Date_of_Issue,Due_Date,DATEDIFF(curdate(),Due_Date) as diff from lms.record where $t like '$s' AND Date_of_Issue IS NOT NULL AND Date_of_Return IS NULL And RollNo='$d' AND Renew_Date IS NOT NULL order by BookId ASC";
            }
            else
                $d=$_SESSION['RollNo'];
            $sql="select BookId,Renewals_left,RollNo,Date_of_Issue,Due_Date,DATEDIFF(curdate(),Due_Date) as diff from lms.record where Date_of_Issue IS NOT NULL AND Date_of_Return IS NULL And RollNo='$d' AND Renew_Date IS NOT NULL order by BookId ASC";
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
                                    <th class="text-primary">Book Id</th>
                                    <th class="text-primary">Request Date</th>
                                    <th class="text-primary">Due Date</th>
                                    <th class="text-primary">Fine</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=1;
                                while($row=$result->fetch_assoc())
                                {
                                    $id=$row['BookId'];
                                    $renew=$row['Renewals_left'];
                                    $issue_date=$row['Date_of_Issue'];
                                    $due=$row['Due_Date'];
                                    $fine=$row['diff'];
                                    ?>
                                    <tr>
                                        <td scope="row"><?php echo $i?></td>
                                        <td><?php echo $id?></td>
                                        <td><?php echo $issue_date?></td>
                                        <td><?php echo $due?></td>
                                        <?php if($fine===NULL or (int)$fine <=0){ ?>
                                            <td>0</td>
                                        <?php } else { ?>
                                            <td><?php echo $fine ?></td>
                                        <?php } ?>
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
