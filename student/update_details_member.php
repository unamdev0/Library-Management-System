<?php
require('dbconn.php');
$n=$_SESSION['RollNo'];
$name=$_POST['name'];
$email=$_POST['emailid'];
$mobno=$_POST['mobno'];
$sql1="UPDATE LMS.user SET Name='$name', EmailId='$email', MobNo='$mobno' WHERE RollNo='$n'";
//echo $sql1;
if($conn->query($sql1) === TRUE){
    $sql2 = "insert into LMS.notifications (RollNo,Msg) values('$n','Your Details has been updated')";
    $conn->query($sql2);
    $_SESSION['message']='Details Updated';
    $_SESSION['name']=$name;
}
else {
    $_SESSION['message']='Update failed';
}
$url="view_details_member.php?Id=$n";
header("location:".$url);
?>