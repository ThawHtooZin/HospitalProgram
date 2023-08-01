<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 25%; height:100%; position:fixed;">
    <a href="/HospitalProgram/users/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="" width="40" height="32"><i class="bi bi-house-fill h3"></i></svg>
      <span class="fs-4">Doctor Dashboard</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/HospitalProgram/doctor/" class="nav-link home" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><i class="bi bi-house"></i> </svg>
          Home
        </a>
      </li>
      <li>
        <a href="/HospitalProgram/doctor/appointmenthistory.php" class="nav-link text-white appointmenthistory">
          <svg class="bi me-2" width="16" height="16"><i class="bi bi-hourglass"></i></svg>
          Appointment History
        </a>
      </li>
      <li>
        <a href="/HospitalProgram/doctor/appointmenthistory.php" class="nav-link text-white patient" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          <svg class="bi me-2" width="16" height="16"><i class="bi bi-people"></i></svg>
          Patient
        </a>
        <div class="collapse" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-2 ms-5">
            <li class="p-1 patientadd"><a href="patientadd.php" class="link-light rounded">Add Patients</a></li>
            <li class="p-1 patientmanage"><a href="patientmanage.php" class="link-light rounded">Manage Patients</a></li>
          </ul>
        </div>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <?php
        $id = $_SESSION['userid'];
        $doctordatadata = $query->select('doctors', $id);
        ?>
        <strong><?php echo $doctordatadata['name']; ?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="signout.php">Sign out</a></li>
      </ul>
    </div>
  </div>
