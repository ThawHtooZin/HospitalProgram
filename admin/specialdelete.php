<?php

include '../Controller/queries.ctr.php';
$query = new queries();
$id = $_GET['id'];
$query->delete('specialization', $id);


?>
