<?php
    require('dbconn.php');
    $SNo=$_SESSION['RollNo'];
    $rollno=$_POST['inputHorizontalSuccess'];
    $message=$_POST['inputHorizontalWarning'];
    $sql1="insert into LMS.message (RNo,SNo,Msg,Date,Time) values ('$rollno','$SNo','$message',curdate(),curtime())";

    if($conn->query($sql1) === TRUE){
        $_SESSION['message']= 'Message Sent';
    }
    else
    {//echo $conn->error;
        $_SESSION['message']= 'Invalid Member Id';
    }
    echo $sql1;

$url="compose_message.php";
header("location:".$url);
?>
