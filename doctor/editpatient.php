<?php
include '../Resources/bootstrap.res.php';
include '../Controller/queries.ctr.php';
include '../Controller/position.auth.php';

$auth = new authrization();
$role = $_SESSION['role'];
$auth->checkdoctor($role);
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
  .patientmanage{
    list-style-type: square;
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
    if($_POST){
      if(empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['address']) || empty($_POST['age']) || empty($_POST['medicalhistory'])){
        if(empty($_POST['name'])){
          $nameerror = "The Name field is required";
        }
        if(empty($_POST['phone'])){
          $phoneerror = "The Phone Number field is required";
        }
        if(empty($_POST['address'])){
          $addresserror = "The Adderss field is required";
        }
        if(empty($_POST['age'])){
          $ageerror = "The Age field is required";
        }
        if(empty($_POST['medicalhistory'])){
          $medicalhistoryerror = "The Medical History field is required";
        }
      }else{
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $age = $_POST['age'];
        $medicalhistory = $_POST['medicalhistory'];
        $date = date('Y/m/d');
        $query->updatepatient($name, $phone, $address, $age, $medicalhistory, $date, $id);
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
          <h3>Doctor | Edit Patient</h3>
          <div class="container" style="margin-top:100px;">
            <form class="form-control" action="" method="post">
              <h6>Edit Patient</h6>
              <label>Patient Name</label>
              <input type="text" name="name" class="form-control" value="<?php echo $patientdata['name']; ?>">
              <p class="text-danger"><?php if(!empty($nameerror)){ echo $nameerror;} ?></p>
              <label>Patient Phone Number</label>
              <input type="text" name="phone" class="form-control" value="<?php echo $patientdata['phone']; ?>">
              <p class="text-danger"><?php if(!empty($phoneerror)){ echo $phoneerror;} ?></p>
              <label>Patient Email</label>
              <input type="email" name="email" class="form-control" disabled value="<?php echo $patientdata['email']; ?>">
              <br>
              <label>Gender</label>
              <br>
              Male
              <input type="radio" name="gender" value="Male" <?php if($patientdata['gender'] == 'Male'){echo 'checked';} ?>>
              Female
              <input type="radio" name="gender" value="Female" <?php if($patientdata['gender'] == 'Female'){echo 'checked';} ?>>
              <br><br>
              <label>Patient Address</label>
              <input type="text" name="address" class="form-control" value="<?php echo $patientdata['address']; ?>">
              <p class="text-danger"><?php if(!empty($addresserror)){ echo $addresserror;} ?></p>
              <label>Patient Age</label>
              <input type="number" name="age" class="form-control" value="<?php echo $patientdata['age']; ?>">
              <p class="text-danger"><?php if(!empty($ageerror)){ echo $ageerror;} ?></p>
              <label>Medical History</label>
              <textarea name="medicalhistory" rows="3" cols="80" class="form-control" ><?php echo $patientdata['medical_history']; ?></textarea>
              <p class="text-danger"><?php if(!empty($medicalhistoryerror)){ echo $medicalhistoryerror;} ?></p>
              <label>Creation Date</label>
              <input type="date" name="date" class="form-control" disabled value="<?php echo $patientdata['createDate']; ?>">
              <br>
              <button type="submit" class="btn btn-outline-primary">Update</button>
            </form>
            <br><br><br><br><br><br>
          </div>
        </div>
      </div>
    </div>


    <?php
    $bootstrap->javascriptlink();
    ?>
  </body>
</html>
