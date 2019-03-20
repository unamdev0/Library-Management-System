<?php
require('dbconn.php');
$no = $_GET['Id'];
$sql = "select * from LMS.user where RollNo='$no'";
$result = $conn->query($sql); //or die($conn->error);
//echo $sql;
$row = $result->fetch_assoc();
$status=$row['status'];
if ($status=='0')
    $status='1';
else
    $status='0';
//echo $status;
$sql1="UPDATE LMS.user SET status='$status' WHERE RollNo='$no'";
//echo $sql1;
if($conn->query($sql1) === TRUE){
    $sql2="insert into lms.notifications (RollNo,Msg) values ('$no','Your Status has been updated by admin')";
    $conn->query($sql2);
    $_SESSION['message']='Member Status updated';
}
else {
    $_SESSION['message']='Update failed';
}
$url="view_member.php?Id=$n";
header("location:".$url);
?>