<?php
require ('dbconn.php');
$rollno=$_POST['inputHorizontalSuccess'];
$bookid=$_POST['inputHorizontalWarning'];
$sql = "select sum(dues) as due from lms.record where RollNo='$rollno'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$due=$row['due'];
$sql5="select status from lms.user where RollNo='$rollno'";
$sql3="select count(*) as count from lms.record where RollNo='$rollno' and Date_of_Return is null";
$sql4="select * from lms.book where BookId='$bookid'";
$sql6="select count(*) as ct from lms.record where BookId=$bookid and RollNo='$rollno' and Date_of_Return is null";

$result=mysqli_query($conn,$sql6);
$row=$result->fetch_assoc();
$rowcount=$row['ct'];
$result = $conn->query($sql3);
$row = $result->fetch_assoc();;
$lm=$row['count'];
$result = $conn->query($sql4);
$row = $result->fetch_assoc();
$availability=$row['Availability'];
$result = $conn->query($sql5);
$row = $result->fetch_assoc();;
$status=$row['status'];


if((int)$status==1) {
    if(!($rowcount)) {
        if ((int)$due <= 300) {
            if ((int)$lm < 6) {
                if ((int)$availability > 0) {
                    $availability = (string)((int)$availability - 1);
                    $sql1 = "insert into LMS.record (RollNo,BookId) values ('$rollno','$bookid')";
                    $sql2 = "update lms.book set Availability='$availability' where BookId='$bookid'";
                    echo $sql1;
                    echo $sql2;
                    if ($conn->query($sql1) === TRUE and $conn->query($sql2) == TRUE) {
                        $sql6 = "insert into LMS.notifications (RollNo,Msg) values('$rollno','Your book $bookid has been issued')";
                        $conn->query($sql6);
                        echo $sql6;
                        $_SESSION['message'] = "Book Id $bookid Issued to the Member Id $rollno";
                    } else {//echo $conn->error;
                        $_SESSION['message'] = "Error! Occurred";
                    }
                } else {
                    $_SESSION['message'] = "Book Id $bookid is not available in Library";
                }
            } else {
                $_SESSION['message'] = "Member Id $rollno has  requested maximum books";
            }
        } else {
            $_SESSION['message'] = "Member Id $rollno has exceeded Fine limit";
        }
    }else{
        $_SESSION['message']="Book Id $bookid is already requested by $rollno";
    }
}else{
        $_SESSION['message']="Member Id $rollno is blocked by the admin";
}
echo $_SESSION['message'];
$url="issue_form.php";
header("location:".$url);
?>