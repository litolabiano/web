<?php
require_once __DIR__ . '/include/session.php';
require_once __DIR__ . '/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
  
  <?php include 'include/head.php'; ?>
</head>


<body >
    <?php include 'include/navbar.php'; ?>
      <?php include 'include/chat.php'; ?>

    <header>
<!-- --------------------------------------------------------------
     HERO SECTION (single reusable component)
--------------------------------------------------------------- -->
<section class="hero-section position-relative">
  <div id="landingCarousel" class="carousel slide" data-bs-ride="carousel">

    <!-- ====================  INDICATORS  ==================== -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#landingCarousel" data-bs-slide-to="0"
              class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#landingCarousel" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#landingCarousel" data-bs-slide-to="2"
              aria-label="Slide 3"></button>
    </div>

    <!-- ====================  SLIDES  ==================== -->
    <div class="carousel-inner">

      <!-- ----------  Slide 1  ---------- -->
      <div class="carousel-item active">
        <div class="hero-bg">
          <div class="overlay"></div>
                    <img src="Resources/photo-1552664730-d307ca884978.avif" alt="">


 
        </div>
      </div>

      <!-- ----------  Slide 2  ---------- -->
      <div class="carousel-item">
        <div class="hero-bg">
          <div class="overlay"></div>
                    <img src="Resources/photo-1522202176988-66273c2fd55f.avif" alt="">


  
        </div>
      </div>

      <!-- ----------  Slide 3  ---------- -->
    <div class="carousel-item">
        <div class="hero-bg">
          <div class="overlay"></div>
                    <img src="Resources/photo-1552664730-d307ca884978.avif" alt="">

        </div>
      </div>
        <!-- Single overlay search box (shared across slides) -->
         <div class="hero-overlay ">
                <?php if ($loggedIn): ?>
              <p class="lead text-start mt-2">Welcome back, <?php echo htmlspecialchars($username); ?>.</p>
            <?php endif; ?>
    <h1 class="hero-title display-5 text-start fw-bold">
              Turn Your Ideas Into Reality <br> Fast, Easy, and Free.
            </h1>
    <div class="search-box p-3 rounded-4 shadow-lg">
      <div class="mb-3 text-end">
        <?php if ($loggedIn): ?>
          <a href="new_dashboard.php" class="btn btn-warning fw-semibold">Go to Dashboard</a>
          <a href="api/a-logout.php" class="btn btn-outline-light ms-2">Log out</a>
        <?php else: ?>
          <a href="api/a-login.php" class="btn btn-light fw-semibold me-2">Login</a>
          <a href="api/a-registration.php" class="btn btn-dark text-white fw-semibold">Sign up</a>
        <?php endif; ?>
      </div>
      <div class="btn-group d-flex justify-content-center mb-3" role="group">
        <button type="button" class="btn btn-light px-4 fw-semibold active" data-mode="talent">Find talent</button>
        <button type="button" class="btn btn-dark px-4 fw-semibold" data-mode="jobs">Browse jobs</button>
      </div>

      <div class="input-group">
        <input type="text" class="form-control py-3" placeholder="Search by role, skills, or keywords">
        <button class="btn btn-success px-4 fw-bold">Search</button>
      </div>
    </div>
  </div>
  

    </div> <!-- /.carousel-inner -->

    <!-- ====================  CONTROLS  ==================== -->
    <button class="carousel-control-prev opacity-0" type="button"
            data-bs-target="#landingCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually‑hidden">Previous</span>
    </button>

    <button class="carousel-control-next opacity-0" type="button"
            data-bs-target="#landingCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually‑hidden">Next</span>
    </button>

  </div> <!-- /#landingCarousel -->



</section>



    </header>


  <section class="bg-green w-100 ">
    <div class="container-fluid p-5">
    <div class=" row ">
      <div class="col-lg-6 p-5 ">
      <div class=" p-2 ">
      <h1 class="h1 fw-bold text-yellow ">Connect with Skilled Freelancers Anytime, Anywhere</h1>
      <p class="h4 text-light">Find the perfect talent for your project — whether it’s web design, content writing, or digital marketing. Our platform brings together freelancers and clients in one easy-to-use space, helping you get work done efficiently and affordably.</p> 
    </div>
      </div>
      <div class="col-lg-6 p-2">
      <div class="content-box p-4 ">
       <img src="Resources/2.png" class=" w-100 rounded d-block m-auto" style="  height: 300px;  object-fit: cover;">
      </div>
      </div>
    </div>
    </div>
  <div class="bg-dark-green container-fluid p-5">
      <div class=" row ">
            
        <div class="col-lg-6 p-2">
        <div class="content-box p-4 ">
        <img src="Resources/3.png" class=" w-100 rounded d-block m-auto" style="  height: 300px;  object-fit: cover;">
        </div>
        </div>
        <div class="col-lg-6 p-5 ">
        <div class=" p-2 ">
          <h1 class="h1 fw-bold text-yellow ">Showcase Your Skills and Earn </h1>
        <p class="h4 text-light">Turn your talent into income! Create your profile, post your services, and start receiving job offers from clients around the world. Work on your own terms and build your freelance career with flexible opportunities that fit your schedule.</p>  
        </div>
        </div>
      </div>
  </div>
      </section>
      
   
    <section class="features p-5">

    <div class="container-fluid content-box text-yellow">
      <div class="row text-center mb-5">
        <div class="col-lg-8 mx-auto">
          <h2 class=" mb-3">Why Choose WorkHop?</h2>
          <p class="text-light">We make job hunting simple, fast, and rewarding.</p>
        </div>
      </div>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="text-center">
            <i class="bi bi-search feature-icon"></i>
            <h4 >Easy Search</h4>
            <p class="text-light">Find jobs that match your skills with our advanced search tools.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="text-center">
            <i class="bi bi-shield-check feature-icon"></i>
            <h4 >Secure & Trusted</h4>
            <p class="text-light">Verified employers and secure transactions every time.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="text-center">
            <i class="bi bi-clock feature-icon"></i>
            <h4 >Quick Matches</h4>
            <p class="text-light">Get personalized job recommendations in seconds.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

    <?php include 'include/footer.php'; ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

