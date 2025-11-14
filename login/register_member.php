<?php 
session_start();

if (isset($_SESSION['status']) && $_SESSION['status'] === 'login') {
    if ($_SESSION['role'] === 'member') {
        header("Location: ../pages/booking.php");
        exit();
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
  <title>Museum Bekasi - Member Registration</title>
  <link href="../assets/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/ruang-admin.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-login">
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Create Member Account</h1>
                  </div>
                  <form class="user" action="register_member_process.php" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control" id="memberName" name="member_name" 
                        placeholder="Full Name" required>
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control" id="memberEmail" name="member_email" 
                        placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                      <select class="form-control" id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" id="address" name="address" rows="3" 
                        placeholder="Address" required></textarea>
                    </div>
                    <div class="form-group">
                      <input type="tel" class="form-control" id="phoneNumber" name="phone_number" 
                        placeholder="Phone Number" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="password" name="password" 
                        placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="confirmPassword" name="confirm_password" 
                        placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Register Account</button>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="login_member.php">Already have an account? Login!</a>
                  </div>
                  <hr>
                  <?php
                  if (isset($_GET['pesan'])) {
                      $message = "";
                      $alert_type = "danger";
                      
                      switch ($_GET['pesan']) {
                          case "email_exists":
                              $message = "Email already registered! Please use a different email.";
                              break;
                          case "password_mismatch":
                              $message = "Passwords do not match!";
                              break;
                          case "error":
                              $message = "Registration failed! Please try again.";
                              break;
                          default:
                              $message = "Unknown error";
                      }
                      echo '<div class="alert alert-'.$alert_type.'">'.$message.'</div>';
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
  
  <script>
  document.querySelector('form').addEventListener('submit', function(e) {
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirmPassword').value;
      
      if (password !== confirmPassword) {
          e.preventDefault();
          alert('Passwords do not match!');
          return false;
      }
      
      if (password.length < 4) {
          e.preventDefault();
          alert('Password must be at least 4 characters long!');
          return false;
      }
  });
  </script>
</body>

</html>