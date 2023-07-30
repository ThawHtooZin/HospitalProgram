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
      if(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['username']) || empty($_POST['phone'])){
        if(empty($_POST['email'])){
          $emailerror = "The Email field is required";
        }
        if(empty($_POST['password'])){
          $passerror = "The Password field is required";
        }
        if(empty($_POST['username'])){
          $usererror = "The Username field is required";
        }
        if(empty($_POST['phone'])){
          $phoneerror = "The Phone Number field is required";
        }
      }else{
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];

        $query->register($username, $password, $email, $phone);
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
          <h1 class="text-center">User Register</h1>
        </div>
        <div class="card-body">
          <form action="UserRegister.php" method="post">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username" required>
            <p class="text-danger"><?php if(!empty($emailerror)){ echo $emailerror; } ?></p>
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <p class="text-danger"><?php if(!empty($emailerror)){ echo $emailerror; } ?></p>
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <p class="text-danger"><?php if(!empty($passerror)){ echo $passerror; } ?></p>
            <label>Phone Number</label>
            <input type="number" name="phone" class="form-control" placeholder="Phone" required>
            <p class="text-danger"><?php if(!empty($phoneerror)){ echo $phoneerror; } ?></p>
            <button type="submit" class="btn btn-primary w-100">Register</button>
          </form>
        </div>
        <div class="card-footer">
          <a href="UserLogin.php">Login to an Account</a>
        </div>
      </div>
    </div>

  </body>
</html>
