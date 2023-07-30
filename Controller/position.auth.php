<?php

class authrization
{
  public function check($userid, $logged_in){
    if(empty($userid) || empty($logged_in)){
      echo "<script>window.location.href='../Index.php';</script>";
    }
  }
  public function checkadmin($role){
    if($role != 2){
      echo "<script>alert('You don\'t have permission to access this page');window.location.href='../Index.php';</script>";
    }
  }
  public function checkdoctor($role){
    if($role != 3){
      echo "<script>alert('You don\'t have permission to access this page');window.location.href='../Index.php';</script>";
    }
  }
}

?>
