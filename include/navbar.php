<?php require_once __DIR__ . '/session.php'; ?>
<div class=" sticky-top py-3">
  <nav class="navbar navbar-expand-lg m-auto rounded-4 navbar-yellow p-3" style="width: 99%;">
    <!-- Brand -->
    <a class="ms-5 navbar-brand fw-bold text-yellow" href="../web/index.php">
      <i class="bi bi-briefcase-fill"></i> WorkHop
    </a>

    <!-- Toggler -->
    <button class="navbar-toggler text-yellow " type="button" data-bs-toggle="collapse"
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
          <?php if (!empty($loggedIn)): ?>
          <li class="nav-item px-1 dropdown">
            <a class="nav-link fw-bold btn btn-green dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo htmlspecialchars($username); ?>
            </a>
            <ul class="dropdown-menu bg-green">
              <?php if (!empty($role) && ($role === 'admin' )): ?>
                <li><a class="dropdown-item text-yellow fw-bold" href="../web/new_dashboard.php">Dashboard</a></li>
              <?php endif; ?>
              <li><a class="dropdown-item text-yellow fw-bold" href="../web/api/a-logout.php">Logout</a></li>
            </ul>
          </li>
          <?php else: ?>
          <li class="nav-item px-1">
            <a class="nav-link btn fw-bold text-light btn-green p-2" type="button" href="../web/api/a-login.php">Log In</a>
          </li>

          <?php endif; ?>
        </ul>
    </div>
  </nav>
</div>
