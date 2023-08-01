<?php
include '../Resources/bootstrap.res.php';
include '../Controller/queries.ctr.php';
include '../Controller/position.auth.php';

$auth = new authrization();
$userid = $_SESSION['userid'];
$logged_in = $_SESSION['logged_in'];
$auth->check($userid, $logged_in);
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
    .medicalhistroy{
      background-color: #0275d8 !important;
    }
  </style>
  <?php
  $bootstrap->csslink();
  $bootstrap->inconlink();
  ?>
  <body>
    <?php
    $id = $_SESSION['userid'];
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
            <h3>User | Medical Histroy</h3>
          <div style="margin-top:100px;">
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
              $patientid = $_SESSION['userid'];
              $medicdatas = $query->selectallmedichistory('medical_history', $patientid)
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


    <?php
    $bootstrap->javascriptlink();
    ?>
  </body>
</html>
