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
            <h2 class="h5 no-margin-bottom">Messages</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active"><a style="color: #585a5f" href="sent.php">Sent</a></li>
          </ul>
        </div>
            <section class="no-padding-top">
                <form action="sent.php" method="post">

                <div class="container-fluid">
              <div class="public-user-block block">
                  <div class="input-group">

                      <select name="account" id="account" class="form-control mb-3 mb-3" style=" max-width: 200px;">
                          <option selected value="RNo">Member Id</option>
                          <option value="name">Member Name</option>
                          <option value="date">Date</option>
                          <option value="time">Time</option>
                      </select>
                      <input type="text" class="form-control" id="title" name = "title" placeholder="Enter the MemberId or Name">
                      <div class="input-group-append" style="height: 100%;">
                          <button type="submit" name ="submit" class="btn btn-primary" >Search</button></form>
                          <form style="display: inline" action="compose_message.php" method="get">
                              <button type="submit"  style="margin-left: 10px" class="btn btn-primary">Compose Message</button>
                          </form>
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
                      $sql="select * from lms.message m  join lms.user u on m.RNo=u.RollNo where SNo='$name' and $t like'$s'order by Date DESC,Time DESC";}
                else
                      $sql="select * from lms.message m  join lms.user u on m.RNo=u.RollNo where SNo='$name' order by Date DESC,Time DESC";
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
                            <th class="text-primary">Message</th>
                          <th class="text-primary">Date</th>
                            <th class="text-primary">Time</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $i=1;
                      while($row=$result->fetch_assoc())
                      {
                          $time=$row['Time'];
                          $msg=$row['Msg'];
                          $name=$row['Name'];
                          $date=$row['Date'];
                          $rollno=$row['RNo'];
                          ?>
                          <tr>
                              <td scope="row"><?php echo $i?></td>
                              <td><?php echo $rollno?></td>
                              <td><?php echo $name?></td>
                              <td><?php echo $msg?></td>
                              <td><?php echo $date?></td>
                              <td><?php echo $time?></td>
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