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
    .appointmenthistory{
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
    $datas = $query->selectallwithuserappointed('appointment', $id);
    ?>
    <div class="row" style="margin: 0px !important; margin-left: -12px !important;">
      <div class="col-3">
        <?php
        include 'sidebar.php';
        ?>
      </div>
      <div class="col-9">
        <div class="container mt-5">
          <h3>User | Appointment History</h3>
          <div class="container" style="margin-top:100px;">
            <table class="table table-stripe table-bordered table-hover">
              <tr>
                <th>Id</th>
                <th>Doctor Name</th>
                <th>Doctor Specialization</th>
                <th>Treatment Fee</th>
                <th>Appointment Date & Time</th>
                <th>Appointment Creation Date</th>
                <th>Current Status</th>
                <th>Action</th>
              </tr>
              <?php
              foreach ($datas as $data) {
                $docid = $data['doctor'];
                $docname = $query->select('doctors', $docid);
                $specid = $data['specialization'];
                $docspec = $query->select('specialization', $specid);
                ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td>Dr. <?php echo $docname['name']; ?></td>
                <td><?php echo $docspec['specialization']; ?></td>
                <td><?php echo $docname['fees']; ?>ks</td>
                <td><?php echo $data['date'] . " / " . $data['time'];?></td>
                <td><?php echo $data['create_date']; ?></td>
                <td><?php if($data['status'] == 1){ echo "Active"; }elseif($data['status'] == 2){ echo "Canceled by Me";}else{ echo "Canceled by Doctor";} ?></td>
                <td><button type="button" onclick="return confirm('Are you sure to cancel the appointment?') " class="btn btn-warning" <?php if($data['status'] != 1){echo "disabled";} ?>><a href="cancelappointment.php?id=<?php echo $data['id']; ?>" style="text-decoration:none; color:white;">Cancel</a></button></td>
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
