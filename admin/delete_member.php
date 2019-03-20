<?php
require('dbconn.php');
$n=$_GET['Id'];
$sql1="DELETE from LMS.user WHERE RollNo='$n'";
echo $sql1;
if($conn->query($sql1) === TRUE){
    $_SESSION['message']="$n Member Deleted";
}
else {
    $_SESSION['message']="$n has Book Issued or Fine Dues";
}
$url="view_member.php";
header("location:".$url);
?>