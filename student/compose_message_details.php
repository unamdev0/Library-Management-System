<?php
    require('dbconn.php');
    $SNo=$_SESSION['RollNo'];
    $rollno=$_POST['inputHorizontalSuccess'];
    $message=$_POST['inputHorizontalWarning'];
    $sql1="insert into LMS.message (RNo,SNo,Msg,Date,Time) values ('$rollno','$SNo','$message',curdate(),curtime())";

    if($conn->query($sql1) === TRUE){
        $sql2 = "insert into LMS.notifications (RollNo,Msg) values('$SNo','Your message to $rollno has been sent')";
        $sql3 = "insert into LMS.notifications (RollNo,Msg) values('$rollno','A message is received from $SNo ')";
        $conn->query($sql3);
        $conn->query($sql2);
        $_SESSION['message']= 'Message Sent';
    }
    else
    {//echo $conn->error;
        $_SESSION['message']= 'Invalid Member Id';
    }
    echo $sql1;
//echo $_SESSION['message'];
$url="compose_message.php";
header("location:".$url);
?>
