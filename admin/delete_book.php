<?php
require('dbconn.php');
$no=$_GET['Id'];
$sql2="Delete from lms.author where BookId='$no'";
$sql1="DELETE from LMS.book WHERE BookId='$no'";
//echo $sql1;
if($conn->query($sql2) === TRUE and $conn->query($sql1) === TRUE){
    $_SESSION['message']="Book Id $no is Deleted";
}
else {
    $_SESSION['message']="Book Id $no has Dependency";
}
$url="view_books.php";
header("location:".$url);
?>