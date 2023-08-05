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
    .patientsearch{
      background-color: #0275d8 !important;
    }
  </style>
  <?php
  $bootstrap->csslink();
  $bootstrap->inconlink();
  ?>
  <body>
    <?php
    if($_POST){
      if(empty($_POST['username'])){
        $usererror = "The Username field is required";
      }else{
        $username = $_POST['username'];
        $userdatas = $query->selectpatient('patients', $username);
        $hideform = true;
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
          <h3>Admin | Search Patient</h3>
          <div class="container" style="margin-top:100px;">
            <form action="searchpatient.php" method="post" style="<?php if(!empty($hideform)){echo 'display:none;';} ?>">
              <p>Patients Report</p>
              <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="Username">
              <p class="text-danger"><?php if(!empty($usererror)){ echo $usererror; } ?></p>
              <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>
          </div>
          <div class="container" style="<?php if(!empty($hideform)){echo 'display:block;';}else{ echo 'display:none;'; } ?>">
            <b>Patients Report</b>
            <table class="table table-striped table-hover table-bordered">
              <tr>
                <th>Id</th>
                <th>Patient Name</th>
                <th>Patient Phone</th>
                <th>Patinet Gender</th>
                <th>Creation Date</th>
                <th>Update Date</th>
                <th>Action</th>
              </tr>
              <?php
              foreach ($userdatas as $userdata) {
              ?>
              <tr>
                <td><?php echo $userdata['id']; ?></td>
                <td><?php echo $userdata['name']; ?></td>
                <td><?php echo $userdata['phone']; ?></td>
                <td><?php echo $userdata['gender']; ?></td>
                <td><?php echo $userdata['createDate']; ?></td>
                <td><?php echo $userdata['updateDate']; ?></td>
                <td>
                  <a href="patientinfo.php?patientid=<?php echo $bwdata['id']; ?>" class="btn btn-primary">Info</a>
                </td>
              </tr>
              <?php
              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>


    <?php
    $bootstrap->javascriptlink();
    ?>
  </body>
</html>
