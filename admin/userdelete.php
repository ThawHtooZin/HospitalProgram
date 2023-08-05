<?php
include '../Controller/queries.ctr.php';
include '../Controller/position.auth.php';

$auth = new authrization();
$role = $_SESSION['role'];
$auth->checkadmin($role);
$query = new queries();

$id = $_GET['userid'];
$query->delete('users', $id);

?>
