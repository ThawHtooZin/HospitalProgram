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
    .patientadd{
      list-style-type: square;
    }
  </style>
  <?php
  $bootstrap->csslink();
  $bootstrap->inconlink();
  ?>
  <body>
    <?php
    if($_POST){
      if(empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['email']) || empty($_POST['gender']) || empty($_POST['address']) || empty($_POST['age']) || empty($_POST['medicalhistory'])){
        if(empty($_POST['name'])){
          $nameerror = "The Name field is required";
        }
        if(empty($_POST['phone'])){
          $phoneerror = "The Phone field is required";
        }
        if(empty($_POST['email'])){
          $emailerror = "The Email field is required";
        }
        if(empty($_POST['gender'])){
          $gendererror = "The Gender field is required";
        }
        if(empty($_POST['address'])){
          $addresserror = "The Address field is required";
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
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $age = $_POST['age'];
        $medicalhistory = $_POST['medicalhistory'];
        $query->addpatient($name, $phone, $email, $gender, $address, $age, $medicalhistory);
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
          <h3>Doctor | Add Patient</h3>
          <div class="container" style="margin-top:100px;">
            <form class="form-control" action="patientadd.php" method="post">
              <h6>Add Patient</h6>
              <br>
              <label>Patient Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter Patient Name">
              <p class="text-danger"> <?php if(!empty($nameerror)){ echo $nameerror;} ?> </p>
              <label>Patient Phone</label>
              <input type="number" name="phone" class="form-control" placeholder="Enter Patient Phone">
              <p class="text-danger"> <?php if(!empty($phoneerror)){ echo $phoneerror;} ?> </p>
              <label>Patient Email</label>
              <input type="email" name="email" class="form-control" placeholder="Enter Patient Email">
              <p class="text-danger"> <?php if(!empty($emailerror)){ echo $emailerror;} ?> </p>
              <label>Gender</label>
              <br>
              <input type="radio" name="gender" value="Female">
              Female
              <input type="radio" name="gender" value="Male" class="ms-3">
              Male
              <br>
              <p class="text-danger"> <?php if(!empty($gendererror)){ echo $gendererror;} ?> </p>
              <label>Patient Address</label>
              <input type="text" name="address" class="form-control" placeholder="Enter Patient Address">
              <p class="text-danger"> <?php if(!empty($addresserror)){ echo $addresserror;} ?> </p>
              <label>Patient Age</label>
              <input type="number" name="age" class="form-control" placeholder="Enter Patient Age">
              <p class="text-danger"> <?php if(!empty($ageerror)){ echo $ageerror;} ?> </p>
              <label>Medical History</label>
              <textarea name="medicalhistory" rows="4" cols="80" class="form-control" placeholder="Enter Patient Medical History"></textarea>
              <p class="text-danger"> <?php if(!empty($medicalhistoryerror)){ echo $medicalhistoryerror;} ?> </p>
              <button type="submit" class="btn text-primary" style="border: 2px solid #0275d8 !important">Add</button>
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
