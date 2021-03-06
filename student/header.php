<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LIBSYS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<header class="header">
    <nav class="navbar navbar-expand-lg">

        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="navbar-header">
                <!-- Navbar Header--><a href="index.php" class="navbar-brand">
                    <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">LIB</strong><strong>SYS</strong></div>
                    <div class="brand-text brand-sm"><strong class="text-primary">L</strong><strong>S</strong></div></a>
                <!-- Sidebar Toggle Btn-->
                <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
            </div>
            <?php
                $name=$_SESSION['RollNo'];
                $sql="select count(*) as count from LMS.notifications where RollNo like '$name'";
                $result=$conn->query($sql);
                $row=$result->fetch_assoc();
                $count=$row['count'];
            ?>
            <div class="right-menu list-inline no-margin-bottom">
                <div class="list-inline-item dropdown"><a id="navbarDropdownMenuLink1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link messages-toggle"><i class="icon-email"></i><span class="badge dashbg-1"><?php echo $count?></span></a>
                    <div aria-labelledby="navbarDropdownMenuLink1" style="max-width:500px; max-height:500px; overflow: scroll" class="dropdown-menu messages">
                        <?php
                        $name=$_SESSION['RollNo'];
                        $sql="select * from LMS.notifications where RollNo like '$name' order by Date desc, Time Desc";
                        $result=$conn->query($sql);
                        while($row=$result->fetch_assoc())
                        {

                            $time=$row['Time'];
                            $msg=$row['Msg'];
                            $date=$row['Date'];
                            $rollno=$row['RollNo'];
                            ?>
                            <a href="#" class="dropdown-item message d-flex align-items-center">
                                <div class="content" style="overflow: hidden;">  <span class="d-block"><?php echo $msg?></span><small class="date d-block"><?php echo $date?></small><small class="date d-block"><?php echo $time?></small></div></a>

                        <?php } ?>
                        </div>
                <!-- Log out               -->
                <div class="list-inline-item logout">                   <a id="logout" href="logout.php" class="nav-link"> <span class="d-none d-sm-inline">Logout </span><i class="icon-logout"></i></a></div>
            </div>
        </div>
    </nav>
</header>
    <div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="img/profile.png" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
                <?php
                $sql="select * from LMS.user where RollNo like '$name'";
                $result=$conn->query($sql);
                $row=$result->fetch_assoc();
                ?>
                <h1 class="h5"><?php echo $row['Name']?></h1>
                <p><?php echo $row['Type']?></p>
            </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
            <li><a href="recommendation.php"> <i class="icon-home"></i>Recommendations</a></li>
            <li><a href="#exampledropdownDropdown1" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>My Profile</a>
                <ul id="exampledropdownDropdown1" class="collapse  list-unstyled ">
                    <li><a href="change_password.php">Change Password</a></li>
                    <li><a href="view_details_member.php">Update Details</a></li>
                    <!--<li><a href="#">Page</a></li>-->
                </ul>
            </li>
            <li><a href="#exampledropdownDropdown2" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Message</a>
                <ul id="exampledropdownDropdown2" class="collapse list-unstyled ">
                    <li><a href="compose_message.php">Compose</a></li>
                    <li><a href="messages.php">Inbox</a></li>
                    <li><a href="sent.php">Sent</a></li>
                </ul>
            </li>
            <li><a href="#exampledropdownDropdown3" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Books</a>
                <ul id="exampledropdownDropdown3" class="collapse list-unstyled ">
                    <li><a href="view_books.php">View Books</a></li>
                </ul>
            </li>
            <li><a href="#exampledropdownDropdown5" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Your Request</a>
                <ul id="exampledropdownDropdown5" class="collapse list-unstyled ">
                    <li><a href="issue_book_student.php">Requested Book</a></li>
                    <li><a href="renew_book.php" >Renewed Book</a></li>
                    <li><a href="return_book.php">Returned Book</a></li>
                </ul>
            </li>

    </nav>
