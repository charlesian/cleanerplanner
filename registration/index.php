<?php include('function.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>asd | Log in</title>
  <link rel="shortcut icon" type="image/png" href="../../images/cleaner.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
  .login,
  .image {
    min-height: 100vh;
  }

  .bg-image {
    background-image: url('../images/clean.jpg');
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
                <!-- <h3 class="display-4">Andsolar</h3> -->
                <p class="text-muted mb-4" align="center">Registration</p>
                <form method="POST">
                  <div class="form-group mb-3">
                    <input name="first_name" type="text" placeholder="First Name" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                  </div>
                  <div class="form-group mb-3">
                    <input name="last_name" type="text" placeholder="Last Name" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                  </div>
                  <div class="form-group mb-3">
                    <input name="username" type="text" placeholder="Email address - this will be your username" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                  </div>
                  <div class="form-group mb-3">
                    <input name="password" type="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                  </div>
                  <button type="submit" name="login" class="btn btn-success  text-uppercase mb-2 rounded-pill shadow-sm"><b>Submit</b></button>
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
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>

  </body>
  </html>
