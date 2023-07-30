<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 25%; height:100%; position:absolute;">
    <a href="/HospitalProgram/users/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="" width="40" height="32"><i class="bi bi-house-fill h3"></i></svg>
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/HospitalProgram/users/" class="nav-link home" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><i class="bi bi-house"></i> </svg>
          Home
        </a>
      </li>
      <li>
        <a href="/HospitalProgram/users/booking.php" class="nav-link text-white booking">
          <svg class="bi me-2" width="16" height="16"><i class="bi bi-bookmark"></i></svg>
          Book Appointment
        </a>
      </li>
      <li>
        <a href="/HospitalProgram/users/appointmenthistory.php" class="nav-link text-white appointmenthistory">
          <svg class="bi me-2" width="16" height="16"><i class="bi bi-hourglass"></i></svg>
          Appointment History
        </a>
      </li>
      <li>
        <a href="/HospitalProgram/users/medicalhistory.php" class="nav-link text-white medicalhistory">
          <svg class="bi me-2" width="16" height="16"><i class="bi bi-heart-pulse"></i></svg>
          Medical History
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <?php
        $id = $_SESSION['userid'];
        $userdata = $query->select('users', $id);
        ?>
        <strong><?php echo $userdata['username']; ?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="signout.php">Sign out</a></li>
      </ul>
    </div>
  </div>
