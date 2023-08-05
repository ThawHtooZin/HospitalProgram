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
    .loginlog{
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
          <h3>Admin | Mange Doctor Log</h3>
          <div class="container" style="margin-top:100px;">
            <table class="table table-stripe table-bordered table-hover">
              <tr>
                <th>Id</th>
                <th>Doctor</th>
                <th>Email</th>
                <th>IP Address</th>
                <th>Login Time</th>
                <th>Logout Time</th>
                <th>Status</th>
              </tr>
              <?php
              $datas = $query->selectall('doctorslog');
              foreach ($datas as $data) {
                $docdata = $query->select('doctors', $data['doctor_id']);
                ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $docdata['name']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['ip']; ?></td>
                <td><?php echo $data['logintime']; ?></td>
                <td><?php echo $data['logouttime']; ?></td>
                <td><?php echo $data['status']; ?></td>
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
