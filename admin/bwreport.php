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
    .betweendatereport{
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
      if(empty($_POST['fromdate']) || empty($_POST['todate'])){
        if(empty($_POST['fromdate'])){
          $fderror = "The From Date field is required";
        }
        if(empty($_POST['todate'])){
          $tderror = "The To Date field is required";
        }
      }else{
        $fromdate = $_POST['fromdate'];
        $todate = $_POST['todate'];

        $bwdatas = $query->selectbwdate('patients', $fromdate, $todate);
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
          <h3>Admin | Search Between Date Report</h3>
          <div class="container" style="margin-top:100px;">
            <form action="bwreport.php" method="post" style="<?php if(!empty($hideform)){echo 'display:none;';} ?>">
              <p>Between Dates Report</p>
              <label>From Date:</label>
              <input type="date" name="fromdate" class="form-control">
              <p class="text-danger"><?php if(!empty($fderror)){ echo $fderror; } ?></p>
              <label>To Date:</label>
              <input type="date" name="todate" class="form-control">
              <p class="text-danger"><?php if(!empty($tderror)){ echo $tderror; } ?></p>
              <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>
          </div>
          <div class="container" style="<?php if(!empty($hideform)){echo 'display:block;';}else{ echo 'display:none;'; } ?>">
            <b>Between Date Report</b>
            <h6 class="text-center text-primary">Reports from <?php echo $fromdate; ?> to <?php echo $todate; ?></h6>
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
              foreach ($bwdatas as $bwdata) {
              ?>
              <tr>
                <td><?php echo $bwdata['id']; ?></td>
                <td><?php echo $bwdata['name']; ?></td>
                <td><?php echo $bwdata['phone']; ?></td>
                <td><?php echo $bwdata['gender']; ?></td>
                <td><?php echo $bwdata['createDate']; ?></td>
                <td><?php echo $bwdata['updateDate']; ?></td>
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
