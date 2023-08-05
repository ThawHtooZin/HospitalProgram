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
  .user{
    background-color: #0275d8 !important;
  }
  </style>
  <?php
  $bootstrap->csslink();
  $bootstrap->inconlink();
  ?>
  <body>
    <?php
    $userdatas = $query->selectall('users');
    ?>
    <div class="row" style="margin: 0px !important; margin-left: -12px !important;">
      <div class="col-3">
        <?php
        include 'sidebar.php';
        ?>
      </div>
      <div class="col-9">
        <div class="container mt-5">
          <h3>Doctor | Manage User</h3>
          <div class="container" style="margin-top:100px;">
            <h6>Manage Users</h6>
            <table class="table table-striped table-bordered table-hover">
              <tr>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
              </tr>
              <?php
              foreach ($userdatas as $userdata) {
                ?>
              <tr>
                <td><?php echo $userdata['id']; ?></td>
                <td><?php echo $userdata['username']; ?></td>
                <td><?php echo $userdata['email']; ?></td>
                <td><?php echo $userdata['phone']; ?></td>
                <td>
                  <a href="userdelete.php?userid=<?php echo $userdata['id']; ?>" class="btn btn-danger">Delete</a>
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
