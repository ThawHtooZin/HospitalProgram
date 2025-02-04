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

  public function addmessage($name, $email, $phone, $message)
  {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO contact(name, email, phone, message, status) VALUES('$name','$email', '$phone', '$message', '1')");
    $stmt->execute();
    if($stmt){
      echo "<script>alert('Thanks for the Message!!'); window.location.href='Index.php'</script>";
    }
  }

  public function addspecial($specialization)
  {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO specialization(specialization) VALUES('$specialization')");
    $stmt->execute();
    if($stmt){
      echo "<script>alert('Specialization Added Successfully!'); window.location.href='Index.php'</script>";
    }
  }

  public function addpatient($name, $phone, $email, $gender, $address, $age, $medicalhistory, $docid)
  {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO patients(name, phone, email, gender, address, age, medical_history, doctor_id) VALUES('$name', '$phone', '$email', '$gender', '$address', '$age', '$medicalhistory', '$docid')");
    $stmt->execute();
    if($stmt){
      echo "<script>alert('Patient Added Successfully!'); window.location.href='Index.php'</script>";
    }
  }

  public function doctoradd($special, $name, $address, $fee, $phone, $email, $password)
  {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO doctors(specialization, name, address, fees, contactno, email, password) VALUES('$special', '$name', '$address', '$fee', '$phone', '$email', '$password')");
    $stmt->execute();
    if($stmt){
      echo "<script>alert('Doctor Added Successfully!'); window.location.href='Index.php'</script>";
    }
  }

  public function addpatientmedicalhistory($bp, $bs, $weight, $bodytemperature, $prescription, $docid, $patientid)
  {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO medical_history(patient_id, bp, bs, weight, body_temprature, prescription, doctor_id) VALUES('$patientid', '$bp', '$bs', '$weight', '$bodytemperature', '$prescription', '$docid')");
    $stmt->execute();
    if($stmt){
      echo "<script>alert('Patient Medical History Added Successfully!'); window.location.href='Index.php?error=none'</script>";
    }
  }

  public function book($specialization, $doctor, $date, $time, $user_appointed, $status)
  {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO appointment(doctor, specialization, date, time, user_appointed, status) VALUES('$doctor','$specialization', '$date', '$time', '$user_appointed', '$status')");
    $stmt->execute();
    if($stmt){
      echo "<script>alert('Booked Successfully!');window.location.href='Index.php';</script>";
    }
    }

  public function register($username, $password, $email, $phone)
  {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO users(username, email, password, phone) VALUES('$username', '$email', '$password', '$phone')");
    $stmt->execute();
    if($stmt){
      echo "<script>alert('Register Success! Please Login now');window.location.href='UserLogin.php?error=none';</script>";
    }
  }

  public function login($email, $password, $role, $ip)
  {
    global $pdo;
      if($role == 2){
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE email='$email'");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
      if(!empty($data)){
        if($data['password'] == $password){
          echo "<script>alert('Login Success!'); window.location.href='admin/'</script>";
          $id = $data['id'];
          $_SESSION['userid'] = $id;
          $_SESSION['logged_in'] = true;
          $_SESSION['role'] = $role;
        }else{
          echo "<script>alert('Login Failed! Please Retry');</script>";
        }
      }else{
        echo "<script>alert('Login Failed! Please Retry');</script>";
      }
      }
      if ($role == 1) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email='$email'");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
      if(!empty($data)){
        if($data['password'] == $password){
          echo "<script>alert('Login Success!'); window.location.href='users/'</script>";
          $id = $data['id'];
          $_SESSION['userid'] = $id;
          $_SESSION['logged_in'] = true;
          $getuserdatastmt = $pdo->prepare("SELECT * FROM users WHERE email='$email'");
          $getuserdatastmt->execute();
          $userdatas = $getuserdatastmt->fetch(PDO::FETCH_ASSOC);
          $userid = $userdatas['id'];
          $userlogstmt = $pdo->prepare("INSERT INTO userslog(user_id, email, ip, status) VALUES('$userid','$email', '$ip', 'Success')");
          $userlogstmt->execute();
        }else{
          $getuserdatastmt = $pdo->prepare("SELECT * FROM users WHERE email='$email'");
          $getuserdatastmt->execute();
          $userdatas = $getuserdatastmt->fetch(PDO::FETCH_ASSOC);
          $userid = $userdatas['id'];
          $userlogstmt = $pdo->prepare("INSERT INTO userslog(user_id, email, ip, status) VALUES('$userid','$email', '$ip', 'Failed')");
          $userlogstmt->execute();
          echo "<script>alert('Login Failed! Please Retry');</script>";
        }
      }else{
        $userlogstmt = $pdo->prepare("INSERT INTO userslog(email, ip, status) VALUES('$email', '$ip', 'Failed')");
        $userlogstmt->execute();
        echo "<script>alert('Login Failed! Please Retry');</script>";
      }
      }
      if ($role == 3) {
        $stmt = $pdo->prepare("SELECT * FROM doctors WHERE email='$email'");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
      if(!empty($data)){
        if($data['password'] == $password){
          echo "<script>alert('Login Success!'); window.location.href='doctor/'</script>";
          $id = $data['id'];
          $_SESSION['userid'] = $id;
          $_SESSION['logged_in'] = true;
          $_SESSION['role'] = $role;
          $doctordatastmt = $pdo->prepare("SELECT * FROM doctors WHERE email='$email'");
          $doctordatastmt->execute();
          $doctordatas = $doctordatastmt->fetch(PDO::FETCH_ASSOC);
          $doctorid = $doctordatas['id'];
          $doctorlogstmt = $pdo->prepare("INSERT INTO doctorslog(doctor_id, email, ip, status) VALUES('$doctorid','$email', '$ip', 'Success')");
          $doctorlogstmt->execute();
        }else{
          $doctordatastmt = $pdo->prepare("SELECT * FROM doctors WHERE email='$email'");
          $doctordatastmt->execute();
          $doctordatas = $doctordatastmt->fetch(PDO::FETCH_ASSOC);
          $doctorid = $doctordatas['id'];
          $doctorlogstmt = $pdo->prepare("INSERT INTO doctorslog(doctor_id, email, ip, status) VALUES('$doctorid','$email', '$ip', 'Failed')");
          $doctorlogstmt->execute();
          echo "<script>alert('Login Failed! Please Retry');</script>";
        }
      }else{
        $doctorlogstmt = $pdo->prepare("INSERT INTO doctorslog(email, ip, status) VALUES('$email', '$ip', 'Failed')");
        $doctorlogstmt->execute();
        echo "<script>alert('Login Failed! Please Retry');</script>";
      }
      }

  }

  public function doctorlogout($date, $time, $id){
    global $pdo;
    $timestap = $date . " " .$time;
    $doctorlogoutstmt = $pdo->prepare("UPDATE doctorslog SET logouttime=$timestap");
    $doctorlogoutstmt->execute();
  }

  public function userlogout($date, $time){
    global $pdo;
    $timestap = $date . " " . $time;
    $doctorlogoutstmt = $pdo->prepare("UPDATE userslog SET logouttime='$timestap' ORDER BY id DESC LIMIT 1");
    $doctorlogoutstmt->execute();
  }

  public function selectall($table)
  {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM $table");
    $stmt->execute();
    return $stmt->fetchall();
  }

  public function selectbwdate($table, $fromdate, $todate)
  {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM $table WHERE createDate between '$fromdate' and '$todate'");
    $stmt->execute();
    return $stmt->fetchall();
  }

  public function selectallmedichistory($table, $patientid)
  {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM $table WHERE patient_id=$patientid");
    $stmt->execute();
    return $stmt->fetchall();
  }

  public function selectallwithuserappointed($table, $id)
  {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM $table WHERE user_appointed=$id");
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

  public function selectpatient($table, $username)
  {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM $table WHERE name='$username'");
    $stmt->execute();
    return $stmt->fetchall();
  }

  public function selectunreadmessage($table)
  {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM $table WHERE status='1'");
    $stmt->execute();
    return $stmt->fetchall();
  }

  public function selectreadmessage($table)
  {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM $table WHERE status='2'");
    $stmt->execute();
    return $stmt->fetchall();
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

  public function messageremark($remark, $id)
  {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE contact SET remark='$remark', status='2' WHERE id=$id");
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

  public function updatepatient($name, $phone, $address, $age, $medicalhistory, $date, $id)
  {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE patients SET name='$name', phone='$phone', address='$address', age='$age', medical_history='$medicalhistory', updateDate='$date' WHERE id=$id");
    $stmt->execute();
    echo "<script>alert('Updated Patient Successfully!'); window,location.href='index.php'</script>";
  }

  public function updatespec($specialization, $id)
  {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE specialization SET specialization='$specialization' WHERE id=$id");
    $stmt->execute();
    echo "<script>alert('Updated Patient Successfully!'); window,location.href='index.php'</script>";
  }

  public function delete($table, $id)
  {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM $table WHERE id=$id");
    $stmt->execute();
    if($stmt){
      echo "<script>alert('Deleted the data!');window.location.href='Index.php';</script>";
    }
  }

  public function userrowcount(){
    global $pdo;
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users");
    $stmt->execute();
    return $stmt->fetchColumn();
  }
  public function doctorrowcount(){
    global $pdo;
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM doctors");
    $stmt->execute();
    return $stmt->fetchColumn();
  }
  public function appointmentrowcount(){
    global $pdo;
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM appointment");
    $stmt->execute();
    return $stmt->fetchColumn();
  }
  public function patientsrowcount(){
    global $pdo;
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM patients");
    $stmt->execute();
    return $stmt->fetchColumn();
  }
  public function queiresrowcount(){
    global $pdo;
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM contact WHERE status=1");
    $stmt->execute();
    return $stmt->fetchColumn();
  }
  public function medicalhistoryrowcount(){
    global $pdo;
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM medical_history");
    $stmt->execute();
    return $stmt->fetchColumn();
  }
}

?>
