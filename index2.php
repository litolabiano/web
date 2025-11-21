<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coffee Landing Page</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>.hero-section {
  position: relative;
  overflow: hidden;
}

/* Hero image */
.hero-img {
  height: 70xvh;
  object-fit: cover;
}

/* Text overlay */
.carousel-caption {
  bottom: 35%;
}

.carousel-caption h1 {
  font-size: 3.5rem;
}

@media (max-width: 768px) {
  .carousel-caption {
    bottom: 25%;
  }
  .carousel-caption h1 {
    font-size: 2.2rem;
  }
}
.wave{
    height: 100%;
    width: 50%;
    position: relative;
}
/* Wave shape */

</style>
  <!-- Custom CSS -->
</head>

<body class="bg-secondary">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">COFFEE SHOP</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto gap-3">
        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- HERO CAROUSEL -->
<section class="hero-section position-relative">

  <div id="coffeeCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <img src="Resources/1.jpg" class="d-block w-100 hero-img" alt="Coffee">
        <div class="carousel-caption text-start">
          <h5 class="text-uppercase fw-semibold">Freshly Roasted</h5>
          <h1 class="display-4 fw-bold">COFFEE</h1>
          <a href="#" class="btn btn-light px-4 py-2 fw-semibold mt-3">Shop Now</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <img src="Resources/1.jpg" class="d-block w-100 hero-img" alt="Beans">
        <div class="carousel-caption text-start">
          <h5 class="text-uppercase fw-semibold">Premium Quality</h5>
          <h1 class="display-4 fw-bold">ARABICA BEANS</h1>
          <a href="#" class="btn btn-light px-4 py-2 fw-semibold mt-3">Explore</a>
        </div>
      </div>

    </div>

    <!-- Carousel controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#coffeeCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#coffeeCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>

  </div>
<svg class="wave img-fluid" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="margin-top:-320px; width:100%; display:block;">
<path fill="#e8c9b3" d="M0,160L80,165.3C160,171,320,181,480,170.7C640,160,800,128,960,128C1120,128,1280,160,1360,176L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
</svg>
</section>

<!-- Example section below hero -->
<section class="py-5 bg-primary text-center">
  <h2 class="fw-bold mb-4">TOP CATEGORIES</h2>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>