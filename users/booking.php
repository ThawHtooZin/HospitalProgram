<?php
include '../Resources/bootstrap.res.php';
include '../Controller/queries.ctr.php';
include '../Controller/position.auth.php';

$auth = new authrization();
$userid = $_SESSION['userid'];
$logged_in = $_SESSION['logged_in'];
$auth->check($userid, $logged_in);
$bootstrap = new bootstrap();
$query = new queries();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <?php
  $firststep = "";
  $secondstep = "";
  if(isset($_POST['firststep'])){
    if(empty($_POST['specialization'])){
      $speerror = "The Specialization field is required";
    }else{
      $_SESSION['specialization'] = $_POST['specialization'];
      $specialization = $_SESSION['specialization'];
      $firststep = "done";
      $docdatas = $query->selectspecdoc("doctors", $specialization);
      $spec = $query->selectspec("specialization", $specialization);
    }
  }
  if(isset($_POST['secondstep'])){
    if(empty($_POST['doctor'])){
      $doctorerror = "The Doctor field is requried";
    }else{
      $specialization = $_SESSION['specialization'];
      $secondstep = "done";
      $docdata = $query->selectspec("doctors", $specialization);
      $_SESSION['doctor'] = $_POST['doctor'];
    }
  }
  if(isset($_POST['thirdstep'])){
    if(empty($_POST['date']) || empty($_POST['time'])){
      if(empty($_POST['date'])){
        $dateerror = "The Date field is requried";
      }
      if(empty($_POST['time'])){
        $timeerror = "The Time field is required";
      }
    }else{
      $specialization = $_SESSION['specialization'];
      $doctor = $_SESSION['doctor'];
      $date = $_POST['date'];
      $time = $_POST['time'];
      $status = 1;
      $user_appointed = $_SESSION['userid'];

      $query->book($specialization, $doctor, $date, $time, $user_appointed, $status);
    }
  }


  ?>
  <style media="screen">
    .home{
      background-color: none;
      color: white !important;
    }
    .booking{
      background-color: #0275d8 !important;
    }
    <?php
    if($firststep == "done" || $secondstep == "done"){
      echo ".firststep{ display:none; }";
    }else{
      echo ".firststep{ display:block;}";
    }
    ?>
    <?php
    if($firststep == "done"){
      echo ".secondstep{ display:block; }";
    }else{
      echo ".secondstep{ display:none; }";
    }
    ?>
    <?php
    if($secondstep == "done"){
      echo ".thirdstep{ display:block; }";
    }else{
      echo ".thirdstep{ display:none; }";
    }
    ?>
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
          <h3>User | Book a Appointment</h3>
          <div style="margin-top:100px;">
            <h4>Book Appointment</h4>
            <form class="firststep" action="booking.php" method="post">
              <br>
              <label>Doctor Specialization</label>
              <select class="form-control" name="specialization">
                <option value="">Select Specialization</option>
                <?php
                $datas = $query->selectall("specialization");
                foreach ($datas as $data) {
                  ?>
                  <option value="<?php echo $data['id']; ?>"><?php echo $data['specialization']; ?></option>
                <?php
              }
              ?>
              </select>
              <p class="text-danger"><?php if(!empty($speerror)){ echo $speerror; } ?></p>
              <br>
              <button type="submit" name="firststep" class="btn btn-success">Next Step</button>
            </form>

            <!-- Second Step -->
            <form class="secondstep" action="booking.php" method="post">
              <br>
              <label>Doctor of <?php echo $spec['specialization']; ?> Specialization</label>
              <select class="form-control" name="doctor">
                <option value="">Select Doctor</option>
                <?php
                foreach ($docdatas as $docdata) {
                  ?>
                  <option value="<?php echo $docdata['id']; ?>"><?php echo $docdata['name']; ?></option>
                <?php
              }
              ?>
              </select>
              <p class="text-danger"><?php if(!empty($speerror)){ echo $speerror; } ?></p>
              <br>
              <button type="submit" name="secondstep" class="btn btn-success">Next Step</button>
            </form>

            <!-- Third Step -->
            <form class="thirdstep" action="booking.php" method="post">
              <br>
              <label>Doctor Fee</label>
              <input type="text" value="<?php echo $docdata['fees']; ?>ks" disabled class="form-control">
              <label>Date</label>
              <input type="date" name="date" class="form-control">
              <p class="text-danger"><?php if(!empty($dateerror)){ echo $dateerror; } ?></p>
              <label>Time</label>
              <input type="time" name="time" class="form-control">
              <p class="text-danger"><?php if(!empty($timeerror)){ echo $timeerror; } ?></p>
              <br>
              <button type="submit" name="thirdstep" class="btn btn-success">Next Step</button>
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
