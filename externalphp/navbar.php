<div class="container-fluid sticky-top py-3">
  <nav class="navbar navbar-expand-lg m-auto rounded-4 navbar-yellow p-3" style="width: 97%;">
    <!-- Brand -->
    <a class="ms-5 navbar-brand fw-bold text-yellow" href="../web/index.php">
      <i class="bi bi-briefcase-fill"></i> WorkHop
    </a>

    <!-- Toggler -->
    <button class="navbar-toggler text-yellow me-2 mb-2 " type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible Content -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Search Bar -->
      <div class="ms-auto px-1 d-flex">
        <form class="d-flex w-100">
          <input type="text" class="form-control bg-green border-light text-light me-2" placeholder="Search" >
          <button type="submit" class="btn btn-outline-light">
            <i class="fa fa-search" aria-hidden="true"></i>
          </button>
        </form>
      </div>
  
        <!-- Navbar Links -->
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item px-1 active">
            <a class="nav-link fw-bold" href="../web/index.php">Home</a>
          </li>
  
          <!-- Services Dropdown -->
          <li class="nav-item px-1 dropdown">
            <a class="nav-link fw-bold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Services
            </a>
            <ul class="dropdown-menu bg-green">
              <li><a class="dropdown-item text-yellow fw-bold" href="../web/post_job.php">Post Jobs</a></li>
              <li><a class="dropdown-item text-yellow fw-bold" href="../web/jobs.php">Available Jobs</a></li>
            </ul>
          </li>
  
          <!-- About Us Dropdown -->
          <li class="nav-item px-1 dropdown">
            <a class="nav-link fw-bold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              About Us
            </a>
            <ul class="dropdown-menu bg-green">
              <li><a class="dropdown-item text-yellow fw-bold" href="../web/dapage.php" target="_blank">Data Privacy</a></li>
              <li><a class="dropdown-item text-yellow fw-bold" href="../web/About.php#faqs">FAQs</a></li>
              <li><a class="dropdown-item text-yellow fw-bold" href="../web/About.php#Contact">Contact Us</a></li>
            </ul>
          </li>
  
          <!-- Auth Buttons -->
          <li class="nav-item px-1">
            <a class="nav-link btn fw-bold text-light btn-green p-2" type="button" href="../web/api/a-registration.php">Sign Up</a>
          </li>
          <li class="nav-item px-1">
            <a class="nav-link  fw-bold text-secondary btn-green p-2" type="button"  href="../web/api/a-logout.php">Logout</a>
          </li>
        </ul>
    </div>
  </nav>
</div>
