<?php 
include('pages/includes/config.php');
error_reporting(0);
ini_set('display_errors', 0);
if (isset($_POST['login'])) {
  session_start();

  $password = $_POST['password'];
  $username = $_POST['username'];

  $sqlUsername = mysqli_query($conn,"SELECT * FROM tbl_login WHERE username = '$username' AND password = '$password'");


  if (mysqli_num_rows($sqlUsername)>0) {
    $rowlog = mysqli_fetch_array($sqlUsername);
    $user_id = $rowlog['user_id'];
    $first_name = $rowlog['first_name'];
    $last_name = $rowlog['last_name'];
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['user_id'] = $user_id;
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.location.href='pages/home/?p=1';
      </SCRIPT>");
  }else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Wrong username or password!');
      window.location.href='http://localhost/pete/';
      </SCRIPT>");
  }
}
//comment
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>asd | Log in</title>
  <link rel="shortcut icon" type="image/png" href="images/andsolar.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
  .login,
  .image {
    min-height: 100vh;
  }

  .bg-image {
    background-image: url('images/clean.jpg');
    background-size: cover;
    background-position: center center;
  }
</style>
<body class="hold-transition login-page">
  <div class="container-fluid">
    <div class="row no-gutter">
      <!-- The image half -->
      <div class="col-md-6 d-none d-md-flex bg-image"></div>


      <!-- The content half -->
      <div class="col-md-6 bg-light">
        <div class="login d-flex align-items-center py-5">

          <!-- Demo content-->
          <div class="container">
            <div class="row">
              <div class="col-lg-10 col-xl-7 mx-auto">
                <p align="center"><img src="images/cleaner.png" style="width: 50%; height: 50%;" class="img-circle img-fluid" ></p>
                <!-- <h3 class="display-4">Andsolar</h3> -->
                <p class="text-muted mb-4">Start your session now!</p>
                <form method="POST">
                  <div class="form-group mb-3">
                    <input name="username" type="text" placeholder="Email address" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                  </div>
                  <div class="form-group mb-3">
                    <input name="password" type="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <label ><a href="subscription">Register Here</a></label>
                    <label class="float-right" ><a href="retrieve_password">Forgot Password?</a></label>
                  </div>
                  <button type="submit" name="login" class="btn btn-primary  text-uppercase mb-2 rounded-pill shadow-sm"><b>Sign in</b></button>
                  <a  href="registration/?code=1" class="btn btn-warning  text-uppercase mb-2 rounded-pill shadow-sm"><b>Free Trial</b></a>
                  <div class="text-center d-flex justify-content-between mt-4"><p hidden>Snippet by <a href="https://bootstrapious.com/snippets" class="font-italic text-muted"> 
                    <u>Boostrapious</u></a></p></div>
                  </form>
                </div>
              </div>
            </div><!-- End -->

          </div>
        </div><!-- End -->

      </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

  </body>
  </html>
