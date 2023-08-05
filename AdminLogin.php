<?php
require 'Resources/bootstrap.res.php';
require 'Controller/queries.ctr.php';

$query = new queries();
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
    <?php
    if($_POST){
      if(empty($_POST['email']) || empty($_POST['password'])){
        if(empty($_POST['email'])){
          $emailerror = "The Email field is required";
        }
        if(empty($_POST['password'])){
          $passerror = "The Password field is required";
        }
      }else{
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = 2;
        $ip = "";
        $query->login($email, $password, $role, $ip);
      }
    }
    ?>
    <!-- Navbar -->
    <?php
    include 'navbar.php';
    ?>
    <!-- Navbar -->
    <div class="container mt-5">
      <div class="card">
        <div class="card-header">
          <h1 class="text-center">Admin Login</h1>
        </div>
        <div class="card-body">
          <form action="AdminLogin.php" method="post">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <p class="text-danger"><?php if(!empty($emailerror)){ echo $emailerror; } ?></p>
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <p class="text-danger"><?php if(!empty($passerror)){ echo $passerror; } ?></p>
            <button type="submit" class="btn btn-primary w-100">Login</button>
          </form>
        </div>
      </div>
    </div>

  </body>
</html>
