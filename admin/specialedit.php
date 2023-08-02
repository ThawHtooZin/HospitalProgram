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
    .doctor{
      background-color: #0275d8 !important;
    }
  </style>
  <?php
  $bootstrap->csslink();
  $bootstrap->inconlink();
  ?>
  <body>
    <?php
    $id = $_GET['id'];
    $specdata = $query->select('specialization', $id);
    if($_POST){
      if(empty($_POST['specialization'])){
        $specerror = "The Specialization field is required";
      }else{
        $specialization = $_POST['specialization'];
        $query->updatespec($specialization, $id);
      }
    }
    ?>
    <div class="row" style="margin: 0px !important; margin-left: -12px !important;">
      <div class="col-3">
        <?php
        include 'sidebar.php';
        ?>
      </div>
      <div class="col-9">
        <div class="container mt-5">
          <h3>Admin | Doctor Specialization</h3>
          <div class="" style="margin-top:100px;">
            <form class="from-control" action="" method="post">
              <p>Edit Specialization</p>
              <label>Specialization</label>
              <input type="text" name="specialization" class="form-control" value="<?php echo $specdata['specialization']; ?>">
              <p class="text-danger"><?php if(!empty($specerror)){ echo $specerror; } ?></p>
              <button type="submit" class="btn btn-warning text-light">Edit</button>
            </form>
          </div>
        </div>
      </div>
    </div>


    <?php
    $bootstrap->javascriptlink();
    ?>
  </body>
</html>
