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
    .doctor{
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
      if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['fee']) || empty($_POST['phone']) || empty($_POST['email'])){
        if(empty($_POST['name'])){
          $nameerror = "The Name field is required";
        }
        if(empty($_POST['address'])){
          $addresserror = "The Address field is required";
        }
        if(empty($_POST['fee'])){
          $feeerror = "The Fee field is required";
        }
        if(empty($_POST['phone'])){
          $phoneerror = "The Phone field is required";
        }
        if(empty($_POST['email'])){
          $emailerror = "The Email field is required";
        }
      }else{
        $special = $_POST['specialization'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $fee = $_POST['fee'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $query->doctoredit($special, $name, $address, $fee, $phone, $email);
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
          <h3>Admin | Edit Doctor</h3>
          <div class="container" style="margin-top:100px;">
            <form class="form-control" action="doctoradd.php" method="post">
              <label>Specialization</label>
              <select class="form-control" name="specialization">
                <?php
                $id = $_GET['id'];
                $docdata = $query->select('doctors', $id);
                $specialdatas = $query->selectall('specialization');
                foreach ($specialdatas as $specialdata) {
                  $specialdata['id'];
                  ?>
                  <option value="<?php echo $specialdata['id']; ?>" <?php if($docdata['specialization'] == $specialdata['id']){echo 'selected';} ?>><?php echo $specialdata['specialization'] ?></option>
                  <?php
                }
                ?>
              </select>
              <br>
              <label>Name</label>
              <input type="text" name="name" class="form-control" value="<?php echo $docdata['name']; ?>">
              <p class="text-danger"><?php if(!empty($nameerror)){ echo $nameerror; } ?></p>
              <label>Address</label>
              <input type="text" name="address" class="form-control" value="<?php echo $docdata['address']; ?>">
              <p class="text-danger"><?php if(!empty($addresserror)){ echo $addresserror; } ?></p>
              <label>Fees</label>
              <input type="number" name="fee" class="form-control" value="<?php echo $docdata['fees']; ?>">
              <p class="text-danger"><?php if(!empty($feeerror)){ echo $feeerror; } ?></p>
              <label>Phone Number</label>
              <input type="number" name="phone" class="form-control" value="<?php echo $docdata['contactno']; ?>">
              <p class="text-danger"><?php if(!empty($phoneerror)){ echo $phoneerror; } ?></p>
              <label>Email</label>
              <input type="email" name="email" class="form-control" value="<?php echo $docdata['email']; ?>">
              <p class="text-danger"><?php if(!empty($emailerror)){ echo $emailerror; } ?></p>
              <button type="submit" class="btn btn-warning text-light">Update</button>
            </form>
          </div>
          <br><br><br>
        </div>
      </div>
    </div>


    <?php
    $bootstrap->javascriptlink();
    ?>
  </body>
</html>
