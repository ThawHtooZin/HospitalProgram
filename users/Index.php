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
      background-color: #0275d8 !important;
      color: white !important;
    }
  </style>
  <?php
  $bootstrap->csslink();
  $bootstrap->inconlink();
  ?>
  <body>

    <div class="row" style="margin: 0px !important; margin-left: -12px !important;">
      <div class="col-3">
        <?php
        include 'sidebar.php';
        ?>
      </div>
      <div class="col-9">
        <div class="container mt-5">
          <h1>HELLO</h1>
        </div>
      </div>
    </div>


    <?php
    $bootstrap->javascriptlink();
    ?>
  </body>
</html>
