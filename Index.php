<?php
include 'Resources/bootstrap.res.php';

$bootstrap = new bootstrap();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <?php
  $bootstrap->csslink();
  ?>
  <body>

  <!-- Navbar -->
  <?php
  include 'navbar.php';
  ?>
  <!-- Navbar -->
  <div class="container">
    <h1 class="text-center mt-5">Welcome From The Hospital</h1>
    <div class="row mt-5">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4>Users</h4>
          </div>
          <div class="card-body">
            <p>If you are a user from the hospital just login here!</p>
            <a href="UserLogin.php">UserLogin</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4>Admin</h4>
          </div>
          <div class="card-body">
            <p>If you are a Admin from the hospital system just login here!</p>
            <a href="AdminLogin.php">AdminLogin</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4>Doctors</h4>
          </div>
          <div class="card-body">
            <p>If you are a Doctor from the hospital just login here!</p>
            <a href="DoctorLogin.php">DoctorLogin</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </body>
</html>
