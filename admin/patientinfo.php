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
    $id = $_GET['patientid'];
    $patientdata = $query->select('patients', $id);
    ?>
    <div class="row" style="margin: 0px !important; margin-left: -12px !important;">
      <div class="col-3">
        <?php
        include 'sidebar.php';
        ?>
      </div>
      <div class="col-9">
        <div class="container mt-5">
          <h3>Doctor | Patient Info</h3>
          <div class="container" style="margin-top:100px;">
            <table class="table table-striped table-bordered">
              <tr>
                <td colspan="4">
                  <h3 class="text-center">Patient Data</h3>
                </td>
              </tr>
              <tr>
                <th>Patient Name</th>
                <td><?php echo $patientdata['name']; ?></td>
                <th>Patient Email</th>
                <td><?php echo $patientdata['email']; ?></td>
              </tr>
              <tr>
                <th>Patient Phone Number</th>
                <td><?php echo $patientdata['phone']; ?></td>
                <th>Patient Address</th>
                <td><?php echo $patientdata['address'] ?></td>
              </tr>
              <tr>
                <th>Patient Gender</th>
                <td><?php echo $patientdata['gender']; ?></td>
                <th>Patient Age</th>
                <td><?php echo $patientdata['age']; ?></td>
              </tr>
              <tr>
                <th>Patient Medical History(if any)</th>
                <td><?php echo $patientdata['medical_history']; ?></td>
                <th>Patient Reg Date</th>
                <td><?php echo $patientdata['createDate']; ?></td>
              </tr>
            </table>
          </div>
          <div class="container" style="margin-top:100px;">
            <table class="table table-striped table-bordered">
              <tr>
                <td colspan="7">Medical History</td>
              </tr>
              <tr>
                <th>#</th>
                <th>Blood Pressure</th>
                <th>Blood Sugar</th>
                <th>Weight</th>
                <th>Body Tempurature</th>
                <th>Medical Prescription</th>
                <th>Visit Date</th>
              </tr>
              <?php
              $medicdatas = $query->selectall('medical_history')
              ?>
              <?php foreach ($medicdatas as $medicdata) { ?>
              <tr>
                <td><?php echo $medicdata['id']; ?></td>
                <td><?php echo $medicdata['bp']; ?></td>
                <td><?php echo $medicdata['bs']; ?></td>
                <td><?php echo $medicdata['weight']; ?></td>
                <td><?php echo $medicdata['body_temprature']; ?></td>
                <td><?php echo $medicdata['prescription']; ?></td>
                <td><?php echo $medicdata['visitDate']; ?></td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
    <br><br><br><br><br><br>

    <?php
    $bootstrap->javascriptlink();
    ?>
  </body>
</html>
