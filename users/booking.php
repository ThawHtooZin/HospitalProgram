<?php
include '../Resources/bootstrap.res.php';

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
      background-color: none;
      color: white !important;
    }
    .booking{
      background-color: #0275d8 !important;
    }
  </style>
  <?php
  $bootstrap->csslink();
  $bootstrap->inconlink();
  ?>
  <body>
    <?php
    include 'sidebar.php';
    ?>



    <?php
    $bootstrap->javascriptlink();
    ?>
  </body>
</html>
