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
            <h2 class="h5 no-margin-bottom">Books</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active"><a style="color: #585a5f" href="view_books.php">View Books</a></li>
          </ul>
        </div>
            <section class="no-padding-top">
                <form action="view_books.php" method="post">

                <div class="container-fluid">
              <div class="public-user-block block">
                  <div class="input-group">

                      <select name="account" id="account" class="form-control mb-3 mb-3" style=" max-width: 200px;">
                          <option selected value="BookId"> Book Id</option>
                          <option value="Title">Book Title</option>
                          <option value="Author">Book Author</option>
                          <option value="Publisher">Book Publisher</option>
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
                //echo $t;
                //echo $s;
                      $sql="select * from lms.book natural join lms.author where $t like'$s'order by BookId ASC";}
                else
                      $sql="select * from lms.book natural join lms.author order by BookId ASC ";
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
                            <th class="text-primary">Book Title</th>
                            <th class="text-primary">Author</th>
                            <th class="text-primary">Publisher</th>
                          <th class="text-primary">Year</th>
                            <th class="text-primary">Availability</th>
                            </tr>
                      </thead>
                      <tbody>
                      <?php
                      $i=1;
                      while($row=$result->fetch_assoc())
                      {
                          $id=$row['BookId'];
                          $title=$row['Title'];
                          $author=$row['Author'];
                          $publisher=$row['Publisher'];
                          $year=$row['Year'];
                          $availability=$row['Availability'];
                          ?>
                          <tr>
                              <td scope="row"><?php echo $i?></td>
                              <td><?php echo $id?></td>
                              <td><?php echo $title?></td>
                              <td><?php echo $author?></td>
                              <td><?php echo $publisher?></td>
                              <td><?php echo $year?></td>
                              <td><?php echo $availability?></td>
                              <td><a  href="view_details_book.php?Id=<?php echo $id; ?>" name="details" id="details" class="btn btn-primary btn-sm" >Details</a></td>
                              <td><a  href="delete_book.php?Id=<?php echo $id; ?>" name="delete" id="delete"  class="btn btn-primary btn-sm" ;" >Delete</a></td>
                          </tr>
                      <?php $i++; }}?>
                      </tbody>
                    </table>
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