<?php
require('dbconn.php');
?>

<?php
if ($_SESSION['RollNo']) {
    require('header.php');
    $no = $_GET['Id'];
    $sql = "select * from LMS.user where RollNo='$no'";
    $result = $conn->query($sql); //or die($conn->error);
    //echo $sql;
    $row = $result->fetch_assoc();
    $status=$row['status'];
    $name=$row['Name'];
    $type=$row['Type'];
    $emailid = $row['EmailId'];
    $mobno = $row['MobNo'];
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


                            <form action="update_details_member.php" method="post">
                                <div class="form row">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-3 form-control-label ">Member Id:</label>
                                        <input readonly type="text" name="id" id="id" class="form-control" value=<?php echo $no?> >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-3 form-control-label ">Type:</label>
                                        <input readonly type="text" name="type" id="type" class="form-control" value=<?php echo $type?>>
                                    </div>
                                </div>
                                <div class="form row">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-3 form-control-label ">Name:</label>
                                        <input type="text" name="name" id="name" class="form-control" value=<?php echo $name?>>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-3 form-control-label ">Status</label>
                                        <!--<select name="status" id="status" class="form-control mb-3" >
                                            <option  value="Inactive">Inactive</option>
                                            <option  value="Active">Active</option>
                                        </select>-->
                                        <input type="text" name="status" id="status" class="form-control" value=<?php if ($status =='1') echo 'Active'; else echo 'Inactive'?>>
                                    </div>
                                </div>
                                <div class="form row">
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-3 form-control-label ">Email Id:</label>
                                        <input type="text" name="emailid" id="emailid" class="form-control" value=<?php echo $emailid?>>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-sm-3 form-control-label ">Mobile No:</label>
                                        <input type="text" name="mobno" id="mobno" class="form-control" value=<?php echo $mobno?>>
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
    /*if(isset($_POST['submit']))
     {
         $title=$_POST['title'];
         $publisher=$_POST['Publisher'];
         $year=$_POST['Year'];
         $availability=$_POST['Availability'];
         $sql1="UPDATE LMS.book SET TItle='$title', Publisher='$publisher', Year='$year',Availability='$availability' WHERE BookId='$no'";
         echo $sql1;
         if($conn->query($sql1) === TRUE){
             echo "<script type='text/javascript'>document.getElementById('incorrect').innerText = 'Details Updated' </script>";
         }
         else
         {//echo $conn->error;
             echo "<script type='text/javascript'>document.getElementById('incorrect').innerText = 'Update failed'</script>";
         }

     }*/
    require ('footer.php');
    }
    else {
        echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
    } ?>
