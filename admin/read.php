<?php
$id = $_GET['id'];
$data = $query->select('contact', $id);
if($_POST){
  if(empty($_POST['remark'])){
    $remarkerror = "The Remark is Required";
  }else{
    $remark = $_POST['remark'];
    $query->messageremark($remark, $id);
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
      <h3>Admin | Mange Unread Message</h3>
      <div class="container" style="margin-top:100px;">
        <p>Manage Query Details</p>
        <table class="table table-stripe table-bordered table-hover">
          <tr>
            <td>Full Name</td>
            <td><?php echo $data['name'] ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><?php echo $data['email'] ?></td>
          </tr>
          <tr>
            <td>Phone Number</td>
            <td><?php echo $data['phone'] ?></td>
          </tr>
          <tr>
            <td>Message</td>
            <td><?php echo $data['message'] ?></td>
          </tr>
          <form class="" action="" method="post">
            <tr>
              <td>Admin Remark</td>
              <td>
                <?php echo $data['remark']; ?>
              </td>

            </tr>
          </form>
        </table>
      </div>
    </div>
  </div>
</div>
