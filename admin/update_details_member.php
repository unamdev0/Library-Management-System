<?php
require('dbconn.php');
$n=$_POST['id'];
$name=$_POST['name'];
$status=$_POST['status'];
if ($status=='Active')
    $status='1';
else
    $status='0';
$email=$_POST['emailid'];
$mobno=$_POST['mobno'];
$sql1="UPDATE LMS.user SET Name='$name', EmailId='$email', MobNo='$mobno',status='$status' WHERE RollNo='$n'";

if($conn->query($sql1) === TRUE){
    $_SESSION['message']='Details Updated';
}
else {
    $_SESSION['message']='Update failed';
}
$url="view_details_member.php?Id=$n";
header("location:".$url);
?>