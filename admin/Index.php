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
      background-color: #0275d8 !important;
      color: white !important;
    }
  </style>
  <?php
  $bootstrap->csslink();
  $bootstrap->inconlink();
  ?>
  <body>
    <?php
    $usercount = $query->userrowcount();
    $doctorcount = $query->doctorrowcount();
    $appointmentcount = $query->appointmentrowcount();
    $patientcount = $query->patientsrowcount();
    $queirescount = $query->queiresrowcount();


     ?>
    <div class="row" style="margin: 0px !important; margin-left: -12px !important;">
      <div class="col-3">
        <?php
        include 'sidebar.php';
        ?>
      </div>
      <div class="col-9">
        <div class="container mt-5">
          <h3>Admin | Dashboard</h3>
          <div class="container" style="margin-top:100px;">
            <div class="row">
              <div class="col">
                <div class="card text-center p-2 mb-5">
                  <div class="card-body">
                    <a href="" class="text-light"><i class="bi bi-person-circle bg-primary ps-2 pe-2 rounded" style="font-size:40px;"></i></a>
                    <h2>Manage Users</h2>
                    <span class="text-primary">Total Users: <?php echo $usercount ?></span>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card text-center p-2 mb-5">
                  <div class="card-body">
                    <a href="" class="text-light"><i class="bi bi-people-fill bg-primary ps-2 pe-2 rounded" style="font-size:40px;"></i></a>
                    <h2>Manage Doctors</h2>
                    <span class="text-primary">Total Doctors: <?php echo $doctorcount; ?></span>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card text-center p-2 mb-5">
                  <div class="card-body">
                    <a href="" class="text-light"><i class="bi bi-journal-check bg-primary ps-2 pe-2 rounded" style="font-size:40px;"></i></a>
                    <h2>Appointments</h2>
                    <span class="text-primary">Total Appointments: <?php echo $appointmentcount; ?> </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="card text-center p-2 mb-5">
                  <div class="card-body">
                    <a href="" class="text-light"><i class="bi bi-person-circle bg-primary ps-2 pe-2 rounded" style="font-size:40px;"></i></a>
                    <h2>Manage Patients</h2>
                    <span class="text-primary">Total Patients: <?php echo $patientcount; ?></span>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card text-center p-2 mb-5">
                  <div class="card-body">
                    <a href="" class="text-light"><i class="bi bi-file-earmark-fill bg-primary ps-2 pe-2 rounded" style="font-size:40px;"></i></a>
                    <h2>New Quries</h2>
                    <span class="text-primary">Total Unread Queries: <?php echo $queirescount; ?></span>
                  </div>
                </div>
              </div>
              <div class="col">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <?php
    $bootstrap->javascriptlink();
    ?>
  </body>
</html>
