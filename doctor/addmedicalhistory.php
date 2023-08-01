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
    if($_POST){
      if(empty($_POST['bp']) || empty($_POST['bs']) || empty($_POST['weight']) || empty($_POST['bodytemperature']) || empty($_POST['prescription'])){
        if(empty($_POST['bp'])){
          $bperror = "The Blood Preasure field is required";
        }
        if(empty($_POST['bs'])){
          $bserror = "The Blood Sugar field is required";
        }
        if(empty($_POST['weight'])){
          $weighterror = "The Weight field is required";
        }
        if(empty($_POST['bodytemerror'])){
          $bodytemerror = "The Body Temperature field is required";
        }
        if(empty($_POST['prescription'])){
          $prescriptionerror = "The Prescription field is required";
        }
      }else{
        $bp = $_POST['bp'];
        $bs = $_POST['bs'];
        $weight = $_POST['weight'];
        $bodytemperature = $_POST['bodytemperature'];
        $prescription = $_POST['prescription'];
        $docid = $_GET['docid'];
        $patientid = $_GET['patientid'];
        $query->addpatientmedicalhistory($bp, $bs, $weight, $bodytemperature, $prescription, $docid, $patientid);
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
          <h3>Doctor | Patient Medical History add</h3>
          <div class="container" style="margin-top:100px;">
            <form class="form-control" action="" method="post">
              <p>Add Medical History</p>
              <label>Blood Pressure</label>
              <input type="text" name="bp" class="form-control" placeholder="Blood Pressure">
              <p class="text-danger"><?php if(!empty($bperror)){ echo $bperror; } ?></p>
              <label>Blood Sugar</label>
              <input type="number" name="bs" class="form-control" placeholder="Blood Sugar">
              <p class="text-danger"><?php if(!empty($bserror)){ echo $bserror; } ?></p>
              <label>Weight</label>
              <input type="number" name="weight" class="form-control" placeholder="Weight">
              <p class="text-danger"><?php if(!empty($weighterror)){ echo $weighterror; } ?></p>
              <label>Body Temperature</label>
              <input type="nu8mber" name="bodytemperature" class="form-control" placeholder="Body Temperature">
              <p class="text-danger"><?php if(!empty($bodytemerror)){ echo $bodytemerror; } ?></p>
              <label>Prescription</label>
              <textarea name="prescription" rows="4" cols="80" class="form-control" class="form-control" placeholder="Prescription"></textarea>
              <p class="text-danger"><?php if(!empty($prescriptionerror)){ echo $prescriptionerror; } ?></p>
              <button type="submit" class="btn btn-primary">Submit</button>
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
