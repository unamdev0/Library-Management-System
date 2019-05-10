<?php
require('dbconn.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LIBSYS LOGIN</title>
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
      <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
      <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body style="background-image: url("../login/background.jpg")">
    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <H1 class="brand-text brand-big visible text-uppercase"><strong style="color: BLACK">LIB</strong><strong>SYS</strong></H1>
                  </div>
                  <H3>LIBRARAY MANAGEMENT SYSTEM</H3>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form method="post" action="login.php" class="form-validate mb-4">
                    <div class="form-group">
                      <input id="login-username" type="text" name="loginUsername" required data-msg="Please enter your username" class="input-material">
                      <label for="login-username" class="label-material">User Name</label>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="loginPassword" required data-msg="Please enter your password" class="input-material">
                      <label for="login-password" class="label-material">Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="signin">Login</button>
                  </form><!--<a href="#" class="forgot-pass">Forgot Password?</a>-->
                  <label class="text-primary" id="incorrect" style="display : none">Incorrect Username or Password</label><small>Do not have an account? </small><a href="register.php" class="signup">Signup</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Design by <strong class="text-primary" >| Udit |</strong></p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
      </div>
    </div>
  <?php
  if(isset($_POST['signin'])) {
      $u = $_POST['loginUsername'];
      $p = $_POST['loginPassword'];
      $c = $_POST['Category'];

      $sql = "select * from LMS.user where RollNo='$u'";

      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $name=$row['Name'];
      $x = $row['Password'];
      $y = $row['Type'];
      if (strcasecmp($x, $p) == 0 && !empty($u) && !empty($p)) {//echo "Login Successful";
          $_SESSION['RollNo'] = $u;
          $_SESSION['Name']=$name;
          $_SESSION['Type']=$y;
          $_SESSION['message']='';

          if ($y == 'Admin')
              header('location:admin/index.php');
          else
              header('location:student/index.php');

      }
      else {
          echo "<script type='text/javascript'>document.getElementById('incorrect').style.display = 'block'</script>";
      }
  }
  ?>
    <!-- JavaScript files-->
  <script>
      $(".info-item .btn").click(function(){
          $(".container").toggleClass("log-in");
      });
      $(".container-form .btn").click(function(){
          $(".container").addClass("active");
      });
  </script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>