<?php
include '../Resources/bootstrap.res.php';
include '../Controller/queries.ctr.php';

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
  .patient{
    background-color: #0275d8 !important;
  }
  </style>
  <?php
  $bootstrap->csslink();
  $bootstrap->inconlink();
  ?>
  <body>
    <?php
    $patientdatas = $query->selectall('patients');
    ?>
    <div class="row" style="margin: 0px !important; margin-left: -12px !important;">
      <div class="col-3">
        <?php
        include 'sidebar.php';
        ?>
      </div>
      <div class="col-9">
        <div class="container mt-5">
          <h3>Doctor | Manage Patient</h3>
          <div class="container" style="margin-top:100px;">
            <h6>Manage Patient</h6>
            <table class="table table-striped table-bordered table-hover">
              <tr>
                <th>#</th>
                <th>Patient Name</th>
                <th>Patient Phone Number</th>
                <th>Patient Gender</th>
                <th>Creation Date</th>
                <th>Update Date</th>
                <th>Action</th>
              </tr>
              <?php
              foreach ($patientdatas as $patientdata) {
                ?>
              <tr>
                <td><?php echo $patientdata['id']; ?></td>
                <td><?php echo $patientdata['name']; ?></td>
                <td><?php echo $patientdata['phone']; ?></td>
                <td><?php echo $patientdata['gender']; ?></td>
                <td><?php echo $patientdata['createDate']; ?></td>
                <td><?php echo $patientdata['updateDate']; ?></td>
                <td>
                  <a href="patientinfo.php?patientid=<?php echo $patientdata['id']; ?>" class="btn btn-primary">Info</a>
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
