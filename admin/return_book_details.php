<?php
require('dbconn.php');
$id=$_GET['id'];
$mid=$_GET['Mid'];
$idate=$_GET['idate'];
$fine=$_GET['fine'];
$sql4="select * from lms.book where BookId='$id'";
$result = $conn->query($sql4);
$row = $result->fetch_assoc();
$availability=$row['Availability'];
$availability=(string)((int)$availability+(int)1);
$sql2="Update lms.book set Availability='$availability' where BookId='$id'";
$sql1="UPDATE LMS.RECORD SET Date_of_Return=curdate(),Dues='$fine' where BookId='$id' and RollNo='$mid'";


if($conn->query($sql1) == TRUE and $conn->query($sql2)){
    $sql2 = "insert into LMS.notifications (RollNo,Msg) values('$mid','Your book $id has been Returned')";

    $conn->query($sql2);
    $_SESSION['message']='Book Returned';
}
else {
    $_SESSION['message']='Error! Occurred';
}
$url="issue_book.php?Id=$no";
header("location:".$url);
?>