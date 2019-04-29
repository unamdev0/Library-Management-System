<?php
require('dbconn.php');
$no=$_SESSION['RollNo'];
$book=$_REQUEST['inputHorizontalSuccess'];
$new=$_POST['inputHorizontalWarning'];
$renew=$_POST['renew'];
$renew=(int)$renew-1;
$sql5="select status from lms.user where RollNo='$no'";
$result = $conn->query($sql5);
$row = $result->fetch_assoc();;
$status=$row['status'];
if((int)$status==1) {
//$sql1="insert into LMS.renew (RollNo,BookId) values ('$no','$book')";
    $sql = "Update lms.record  set Due_Date='$new',Renew_Date=current_timestamp,Renewals_left=$renew where (RollNo='$no' and BookId='$book' )";
//echo $sql;
    $result = $conn->query($sql);
    if ($result === TRUE) {
        $sql2 = "insert into LMS.notifications (RollNo,Msg) values('$no','Your Book $book has been renewed')";
        $conn->query($sql2);
        $_SESSION['message'] = 'Book Renewed';
    } else {//echo $conn->error;
        $_SESSION['message'] = 'Book Not renewed';
    }
}else{
        $_SESSION['message']="You are blocked by the admin to use this facility";
}
//echo $_SESSION['message'];
//echo $_SESSION['message'];
$url="issue_book_student.php";
header("location:".$url);
?>
