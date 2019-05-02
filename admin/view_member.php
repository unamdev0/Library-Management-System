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
            <h2 class="h5 no-margin-bottom">Member</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active"><a style="color: #585a5f" href="view_member.php">View Member</a></li>
          </ul>
        </div>
            <section class="no-padding-top">
                <form action="view_member.php" method="post">

                <div class="container-fluid">
              <div class="public-user-block block">
                  <div class="input-group">

                      <select name="account" id="account" class="form-control mb-3 mb-3" style=" max-width: 200px;">
                          <option selected value="RollNo"> Member Id</option>
                          <option value="Name">Member name</option>
                          <option value="Type">Type</option>
                          <option value="MobNo">Mobile Number</option>
                          <option value="EmailId">Email Id</option>
                          <option value="status">Status</option>
                      </select>
                      <input type="text" class="form-control" id="title" name = "title" placeholder="Enter the details">
                      <div class="input-group-append" style="height: 100%;">
                          <button type="submit" name ="submit" class="btn btn-primary" >Search</button>
                      </div>
                  </div>
                  <div><label class="text-primary" style="margin-top:20px;" id="ict" name="ict"></label></div>

              </div>

              </div>
                </form>
                <?php
                $m=$_SESSION['message'];
                //echo $m;
                echo "<script type='text/javascript'>document.getElementById('ict').innerText = '$m' </script>";
                $_SESSION['message']='';

                if(isset($_POST['submit']))
                {
                 $s=$_POST['title'];
                $t=$_POST['account'];
                if ($s="Active")
                    $s='1';
                else
                    $s='0';
                //echo $t;
                //echo $s;
                      $sql="select * from lms.user where $t like'$s' and Rollno <> 'admin'order by RollNo ASC";}
                else
                      $sql="select * from lms.user where RollNo <> 'admin'  order by RollNo ASC ";
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
                          <th class="text-primary">Member Id</th>
                            <th class="text-primary">Member Name</th>
                            <th class="text-primary">Type</th>
                          <th class="text-primary">Email Id</th>
                            <th class="text-primary">Mobile No</th>
                            <th class="text-primary">Status</th>
                            </tr>
                      </thead>
                      <tbody>
                      <?php
                      $i=1;
                      while($row=$result->fetch_assoc())
                      {
                          $id=$row['RollNo'];
                          $name=$row['Name'];
                          $type=$row['Type'];
                          $emailid=$row['EmailId'];
                          $mobno=$row['MobNo'];
                          $status=$row['status'];
                          ?>
                          <tr>
                              <td scope="row"><?php echo $i?></td>
                              <td><?php echo $id?></td>
                              <td><?php echo $name ?></td>
                              <td><?php echo $type?></td>
                              <td><?php echo $emailid?></td>
                              <td><?php echo $mobno?></td>
                              <td ><a  class="btn btn-primary btn-sm" style="color: white" href="active.php?Id=<?php echo $id; ?>" ><?php if ($status=='1') echo 'Active'; else echo 'Inactive'; ?></a></td>
                              <td><a  href="view_details_member.php?Id=<?php echo $id; ?>" class="btn btn-primary btn-sm" s>Details</a></td>
                              <td><a  href="delete_member.php?Id=<?php echo $id; ?>" name="delete" id="delete" class="btn btn-primary btn-sm";" >Delete</a></td>
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