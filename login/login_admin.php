<?php 
session_start();

if (isset($_SESSION['status']) && $_SESSION['status'] === 'login') {
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] === 'superadmin') {
            header("Location: superadmin/superadminpanel.php");
            exit();
        } elseif ($_SESSION['role'] === 'admin') {
            header("Location: admin/adminpanel.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Museum Bekasi - Login</title>
  <link href="../assets/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/ruang-admin.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-login">
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" action="login_process.php" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control" id="exampleInputEmail" name="email" aria-describedby="emailHelp"
                        placeholder="Enter Email Address" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                  </form>
                  <hr>
                  <?php
                  if (isset($_GET['success'])) {
                      echo '<div class="alert alert-success">'.htmlspecialchars($_GET['success']).'</div>';
                  }
                  
                  if (isset($_GET['pesan'])) {
                      $message = "";
                      switch ($_GET['pesan']) {
                          case "gagal":
                              $message = "Login failed! Wrong email or password";
                              break;
                          case "logout":
                              $message = "You have successfully logged out";
                              break;
                          case "belum_login":
                              $message = "Please login first";
                              break;
                          default:
                              $message = "Unknown error";
                      }
                      echo '<div class="alert alert-danger">'.$message.'</div>';
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/jquery.easing.min.js"></script>
  <script src="../assets/js/ruang-admin.min.js"></script>
</body>

</html>