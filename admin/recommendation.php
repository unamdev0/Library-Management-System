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
            <h2 class="h5 no-margin-bottom">Recommendations</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active"><a style="color: #585a5f" href="recommendation.php">View Recommendations</a></li>
          </ul>
        </div>
            <section class="no-padding-top">
                <form action="recommendation.php" method="post">

                <div class="container-fluid">
              <div class="public-user-block block">
                  <div class="input-group">

                      <select name="account" id="account" class="form-control mb-3 mb-3" style=" max-width: 200px;">
                          <option selected value="rollno">Member Id</option>
                          <option value="name">Member Name</option>
                          <option value="Book_Name">Book Name</option>
                      </select>
                      <input type="text" class="form-control" id="title" name = "title" placeholder="Enter the MemberId or Name">
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
                //echo $t;
                //echo $s;
                      $sql="select * from lms.recommendations r natural join lms.user u where $t like'$s'order by  RollNo DESC";}
                else
                      $sql="select * from lms.recommendations r natural join lms.user u order by RollNo DESC";
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
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th class="text-primary">#</th>
                          <th class="text-primary">Member Id</th>
                            <th class="text-primary">Member Name</th>
                            <th class="text-primary">Book Name</th>
                          <th class="text-primary">Description</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $i=1;
                      while($row=$result->fetch_assoc())
                      {
                          $bname=$row['Book_Name'];
                          $desc=$row['Description'];
                          $name=$row['Name'];
                          $rollno=$row['RollNo'];
                          ?>
                          <tr>
                              <td scope="row"><?php echo $i?></td>
                              <td><?php echo $rollno?></td>
                              <td><?php echo $name?></td>
                              <td><?php echo $bname?></td>
                              <td><?php echo $desc?></td>
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