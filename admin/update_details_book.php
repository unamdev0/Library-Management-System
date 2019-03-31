<?php
require('dbconn.php');
$no=$_POST['id'];
$title=$_POST['title'];
$author=$_POST['author'];
//echo $author;
$publisher=$_POST['Publisher'];
$year=$_POST['Year'];
$availability=$_POST['Availability'];
$sql1="UPDATE LMS.book SET TItle='$title', Publisher='$publisher', Year='$year',Availability='$availability' WHERE BookId='$no'";
$sql2="UPDATE LMS.AUTHOR SET AUTHOR='$author' where BookId='$no'";
//echo $sql1;
if($conn->query($sql1) === TRUE and $conn->query($sql2)== TRUE){
    $_SESSION['message']='Details Updated';
}
else {
    $_SESSION['message']='Update failed';
}
$url="view_details_book.php?Id=$no";
header("location:".$url);
?>