<?php
include '../Resources/bootstrap.res.php';
include '../Controller/queries.ctr.php';
include '../Controller/position.auth.php';

$auth = new authrization();
$role = $_SESSION['role'];
$auth->checkadmin($role);
$query = new queries();
$bootstrap = new bootstrap();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style media="screen">
    .home{
        color: white !important;
    }
    .message{
      background-color: #0275d8 !important;
    }
  </style>
  <?php
  $bootstrap->csslink();
  $bootstrap->inconlink();
  ?>
  <body>
    <?php
    if(!empty($_GET['viewpage'])){
      if($_GET['viewpage'] == 'unread'){
        include 'unread.php';
      }elseif($_GET['viewpage'] == 'read'){
        include 'read.php';
      }
    }else{
      header('location:Index.php');
    }
    ?>


    <?php
    $bootstrap->javascriptlink();
    ?>
  </body>
</html>
