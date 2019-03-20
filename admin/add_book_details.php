<?php
require('dbconn.php');
//$no=$_POST['id'];
$title=$_POST['title'];
$author=$_POST['author'];
$publisher=$_POST['publisher'];
$year=$_POST['year'];
$availability=$_POST['availability'];
$sql="select max(BookId) as BookId from lms.book";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$no=(int)$row['BookId']+1;
$sql1="insert into LMS.book (BookId,Title,Publisher,Year,Availability) values ('$no','$title','$publisher','$year','$availability')";
$sql2="insert into LMS.author values('$no','$author')";

//echo $sql1;
if($conn->query($sql1) === TRUE and $conn->query($sql2) == TRUE){
    $_SESSION['message']='Book Added Successfully';
}
else {
    $_SESSION['message']='Error occurred';
}
$url="add_book.php";
header("location:".$url);
?>