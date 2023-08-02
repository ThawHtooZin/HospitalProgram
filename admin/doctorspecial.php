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

    <div class="row" style="margin: 0px !important; margin-left: -12px !important;">
      <div class="col-3">
        <?php
        include 'sidebar.php';
        ?>
      </div>
      <div class="col-9">
        <div class="container mt-5">
          <h3>Admin | Doctor Specialization</h3>
          <div class="" style="margin-top:100px;">
            <a href="addspecial.php" class="btn btn-primary">Add</a>
            <table class="table table-striped table-hover table-bordered">
              <tr>
                <th>Id</th>
                <th>Specialization</th>
                <th>Action</th>
              </tr>
              <?php
              $specdatas = $query->selectall('specialization');
              foreach ($specdatas as $specdata) {
                ?>
                <tr>
                  <td><?php echo $specdata['id']; ?></td>
                  <td><?php echo $specdata['specialization']; ?></td>
                  <td>
                    <a href="specialedit.php?id=<?php echo $specdata['id']; ?>" class="btn btn-warning">Update</a>
                    <a href="specialdelete.php?id=<?php echo $specdata['id']; ?>" class="btn btn-danger" onclick="return confirm('are you sure to delete?')">Delete</a>
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
