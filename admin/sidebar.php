<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 25%; height:100%; position:fixed;">
    <a href="/HospitalProgram/users/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="" width="40" height="32"><i class="bi bi-house-fill h3"></i></svg>
      <span class="fs-4">Admin Dashboard</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/HospitalProgram/admin/" class="nav-link home" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><i class="bi bi-house"></i> </svg>
          Home
        </a>
      </li>
      <li>
        <a href="/HospitalProgram/admin/appointmenthistory.php" class="nav-link text-white doctor" data-bs-toggle="collapse" data-bs-target="#doc-collapse" aria-expanded="true">
          <svg class="bi me-2" width="16" height="16"><i class="bi bi-people"></i></svg>
          Doctor
        </a>
        <div class="collapse" id="doc-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-2 ms-5">
            <li class="p-1 "><a href="doctorspecial.php" class="link-light rounded">Doctor Specialization</a></li>
            <li class="p-1 "><a href="doctoradd.php" class="link-light rounded">Add Doctor</a></li>
            <li class="p-1 "><a href="managedoctor.php" class="link-light rounded">Manage Doctors</a></li>
          </ul>
        </div>
      </li>
      <li>
        <a href="/HospitalProgram/admin/appointmenthistory.php" class="nav-link text-white user" data-bs-toggle="collapse" data-bs-target="#user-collapse" aria-expanded="true">
          <svg class="bi me-2" width="16" height="16"><i class="bi bi-people"></i></svg>
          Users
        </a>
        <div class="collapse" id="user-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-2 ms-5">
            <li class="p-1"><a href="usermanage.php" class="link-light rounded">Manage Users</a></li>
          </ul>
        </div>
      </li>
      <li>
        <a href="/HospitalProgram/admin/appointmenthistory.php" class="nav-link text-white patient" data-bs-toggle="collapse" data-bs-target="#patient-collapse" aria-expanded="true">
          <svg class="bi me-2" width="16" height="16"><i class="bi bi-people"></i></svg>
          Patient
        </a>
        <div class="collapse" id="patient-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-2 ms-5">
            <li class="p-1 "><a href="patientmanage.php" class="link-light rounded">Manage Patients</a></li>
          </ul>
        </div>
      </li>
      <li>
        <a href="/HospitalProgram/admin/appointmenthistory.php" class="nav-link text-white appointmenthistory">
          <svg class="bi me-2" width="16" height="16"><i class="bi bi-hourglass"></i></svg>
          Appointment History
        </a>
      </li>
      <li>
        <a href="/HospitalProgram/admin/message.php" class="nav-link text-white message" data-bs-toggle="collapse" data-bs-target="#queires-collapse" aria-expanded="true">
          <svg class="bi me-2" width="16" height="16"><i class="bi bi-box"></i></svg>
          Contact Queries
        </a>
        <div class="collapse" id="queires-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-2 ms-5">
            <li class="p-1 "><a href="unreadmessage.php" class="link-light rounded">Unread Message</a></li>
            <li class="p-1 "><a href="readmessage.php" class="link-light rounded">Read Message</a></li>
          </ul>
        </div>
      </li>
      <li>
        <a href="/HospitalProgram/admin/message.php" class="nav-link text-white loginlog" data-bs-toggle="collapse" data-bs-target="#lock-collapse" aria-expanded="true">
          <svg class="bi me-2" width="16" height="16"><i class="bi bi-lock"></i></svg>
          Log Of Logins
        </a>
        <div class="collapse" id="lock-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-2 ms-5">
            <li class="p-1 "><a href="userlogs.php" class="link-light rounded">User Logs</a></li>
            <li class="p-1 "><a href="doctorlogs.php" class="link-light rounded">Doctor Logs</a></li>
          </ul>
        </div>
      </li>
      <li>
        <a href="/HospitalProgram/admin/bwreport.php" class="nav-link text-white betweendatereport">
          <svg class="bi me-2" width="16" height="16"><i class="bi bi-file-earmark"></i></svg>
          Between Date reports
        </a>
      </li>
      <li>
        <a href="/HospitalProgram/admin/searchpatient.php" class="nav-link text-white patientsearch">
          <svg class="bi me-2" width="16" height="16"><i class="bi bi-file-earmark"></i></svg>
          Search Patient
        </a>
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
