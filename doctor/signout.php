<?php
session_start();
session_destroy();

include '../Controller/queries.ctr.php';
include '../Controller/position.auth.php';

$auth = new authrization();
$role = $_SESSION['role'];
$auth->checkdoctor($role);
$query = new queries();

$date = date("Y/m/d");
$time = date("h:i:sa");
$query->doctorlogout($date, $time);

header('location:../Index.php');

?>
