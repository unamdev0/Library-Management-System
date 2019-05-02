<?php
    require('dbconn.php');
    $rollno=$_SESSION['RollNo'];
    $name=$_POST['inputHorizontalSuccess'];
    $description=$_POST['inputHorizontalWarning'];
    $sql1="insert into LMS.recommendations(RollNo,Book_Name,Description) values ('$rollno','$name','$description')";

    if($conn->query($sql1) === TRUE){
        $sql2 = "insert into LMS.notifications (RollNo,Msg) values('$rollno','Your recommendation for book $name has been sent')";
        $conn->query($sql2);
        $_SESSION['message']= 'Recommendation Sent';
    }
    else
    {//echo $conn->error;
        $_SESSION['message']= 'Error!';
    }
    echo $sql1;

$url="recommendation.php";
header("location:".$url);
?>
