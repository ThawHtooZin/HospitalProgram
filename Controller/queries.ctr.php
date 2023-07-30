<?php

require 'connecttodb.pdo.php';
session_start();
class queries
{
  public function insert($username, $password, $email)
  {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO users(username, password, email) VALUES('$username','$password', '$email')");
    $stmt->execute();
    if($stmt){
      header('location:Index.php?error=none');
    }
  }

  public function book($specialization, $doctor, $date, $time, $user_appointed)
  {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO appointment(doctor, specialization, date, time, user_appointed) VALUES('$doctor','$specialization', '$date', '$time', '$user_appointed')");
    $stmt->execute();
    if($stmt){
      echo "<script>alert('Booked Successfully!');window.location.href='Index.php';</script>";
    }
    }

  public function register($username, $password, $email, $phone)
  {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO users(username, email, password, phone, role) VALUES('$username', '$email', '$password', '$phone', 1)");
    $stmt->execute();
    if($stmt){
      echo "<script>alert('Register Success! Please Login now');window.location.href='UserLogin.php?error=none';</script>";
    }
  }

  public function login($email, $password, $role)
  {
    global $pdo;
      if($role == 2){
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE email='$email'");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if($data['password'] == $password){
        echo "<script>alert('Login Success!'); window.location.href='admin/'</script>";
        $id = $data['id'];
        $_SESSION['userid'] = $id;
        $_SESSION['logged_in'] = true;
        $_SESSION['role'] = $role;
      }else{
        echo "<script>alert('Login Failed! Please Retry');</script>";
      }
      }
      if ($role == 1) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email='$email'");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if($data['password'] == $password){
        echo "<script>alert('Login Success!'); window.location.href='users/'</script>";
        $id = $data['id'];
        $_SESSION['userid'] = $id;
        $_SESSION['logged_in'] = true;
      }else{
        echo "<script>alert('Login Failed! Please Retry');</script>";
      }
      }
      if ($role == 3) {
        $stmt = $pdo->prepare("SELECT * FROM doctors WHERE email='$email'");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if($data['password'] == $password){
        echo "<script>alert('Login Success!'); window.location.href='doctor/'</script>";
        $id = $data['id'];
        $_SESSION['userid'] = $id;
        $_SESSION['logged_in'] = true;
        $_SESSION['role'] = $role;
      }else{
        echo "<script>alert('Login Failed! Please Retry');</script>";
      }
      }

  }

  public function selectall($table)
  {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM $table");
    $stmt->execute();
    return $stmt->fetchall();
  }

  public function select($table, $id)
  {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM $table WHERE id=$id");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectspecdoc($table, $id)
  {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM $table WHERE specialization=$id");
    $stmt->execute();
    return $stmt->fetchall();
  }

  public function selectspec($table, $specialization)
  {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM $table WHERE id=$specialization");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function update($username, $password, $email, $id)
  {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE users SET username='$username', password='$password', email='$email' WHERE id=$id");
    $stmt->execute();
    if($stmt){
      header('location:index.php?error=none');
    }
  }

  public function cancelappointmentuser($table, $id)
  {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE appointment SET status=2 WHERE id=$id");
    $stmt->execute();
    if($stmt){
      header('location:index.php?error=none');
    }
  }

  public function cancelappointmentadmin($table, $id)
  {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE appointment SET status=3 WHERE id=$id");
    $stmt->execute();
    if($stmt){
      header('location:index.php?error=none');
    }
  }

  public function delete($table, $id)
  {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM $table WHERE id=$id");
    $stmt->execute();
    if($stmt){
      echo "<script>alert('Canceled the Appointment!');window.location.href='Index.php';</script>";
    }
  }
}

?>
