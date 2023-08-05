<?php
require "Controller/queries.ctr.php";

$query = new queries();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <body>
    <?php
    if($_POST){
      if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message'])){
        if(empty($_POST['name'])){
          $usererror = "The Name field is required";
        }
        if(empty($_POST['email'])){
          $emailerror = "The Email field is required";
        }
        if(empty($_POST['phone'])){
          $phoneerror = "The Phone field is required";
        }
        if(empty($_POST['message'])){
          $messageerror = "The Message field is required";
        }
      }else{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $query->addmessage($name, $email, $phone, $message);
      }
    }
    ?>
    <?php
    include 'navbar.php';
    ?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-4 ps-5">
          <h3 class="text-secondary">Hospital Info:</h3>
          <b>Location: </b> <span>Yangon</span><br>
          <b>Phone: </b> <span>09977221152</span><br>
          <b>Email: </b> <span>thehospital@gmail.com</span>
        </div>
        <div class="col-8">
          <form class="form-control" action="contact.php" method="post">
            <h2>Contact Us</h2>
            <label>Name</label>
            <input type="text" name="name" class="form-control">
            <p class="text-danger"><?php if(!empty($usererror)){echo $usererror; } ?></p>
            <label>Email</label>
            <input type="email" name="email" class="form-control">
            <p class="text-danger"><?php if(!empty($emailerror)){echo $emailerror; } ?></p>
            <label>Phone Number</label>
            <input type="number" name="phone" class="form-control">
            <p class="text-danger"><?php if(!empty($phoneerror)){echo $phoneerror; } ?></p>
            <label>Message</label>
            <textarea name="message" rows="5" cols="80" class="form-control"></textarea>
            <p class="text-danger"><?php if(!empty($messageerror)){echo $messageerror; } ?></p>
            <button type="submit" class="btn btn-outline-primary btn-lg">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
