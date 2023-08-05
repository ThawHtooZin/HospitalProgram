<?php
session_start();
session_destroy();

include '../Controller/queries.ctr.php';

$query = new queries();

$date = date("Y/m/d");
$time = date("h:i:sa");
$query->userlogout($date, $time);


header('location:../Index.php');
?>
