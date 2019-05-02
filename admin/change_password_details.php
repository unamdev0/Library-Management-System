<?php
require('dbconn.php');
$no=$_SESSION['RollNo'];
$c=$_POST['inputHorizontalSuccess'];
$n=$_POST['inputHorizontalWarning'];
$rn=$_POST['inputHorizontalReWarning'];

if(strcasecmp($n,$rn)==0 && !empty($n) && !empty($rn)) {
    $sql = "select * from LMS.user where RollNo='$no'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $x = $row['Password'];
    //echo"$x";
    //echo "$sql";
    if (strcasecmp($x, $c) == 0 && strcasecmp($x,$n)!= 0 && !empty($x) && !empty($c)) {
        $sql1 = "update LMS.user set Password ='$n' where RollNo='$no'";
        //echo "$sql1";
        if ($conn->query($sql1) === TRUE) {
            //$_SESSION['message']='Password Updated Successfully';
            //header('location:change_password.php');
            $_SESSION['message']= 'Password Updated Successfully';
        }
        else {//echo $conn->error;
            $_SESSION['message']='Error! Try again';
        }
    }
    else{
        $_SESSION['message']= 'Incorrect Current Password';
    }
}
else{
    $_SESSION['message']= 'New Password and Re-typed Password does not match';
}

$url="change_password.php";
header("location:".$url);
?>
