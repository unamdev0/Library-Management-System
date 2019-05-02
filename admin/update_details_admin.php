<?php
require('dbconn.php');
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$city=$_POST['city'];
$state=$_POST['state'];
$address=$_POST['address'];
$sql1="UPDATE LMS.user SET Name='$name', EmailId='$email', MobNo='$phone' WHERE RollNo='admin'";

if($conn->query($sql1) === TRUE){
    $_SESSION['message']='Details Updated';
    $_SESSION['Name']=$name;
}
else {
    $_SESSION['message']='Update failed';
}
$url="view_details_admin.php";
header("location:".$url);
?>