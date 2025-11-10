<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Bootstrap Carousel Landing Page</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Minimal custom CSS for landing page hero height (Bootstrap handles responsiveness) */
        .carousel-item {
            height: 60vh; /* Adjust as needed; responsive via viewport */
            background-size: cover;
            background-position: center;
        }
        @media (max-width: 768px) {
            .carousel-item {
                height: 50vh;
            }
        }
        @media (max-width: 480px) {
            .carousel-item {
                height: 40vh;
            }
        }
    </style>
</head>
<body class="bg-success">
    <!-- Bootstrap Carousel for Landing Page Hero -->
    <div id="landingCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="hover">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#landingCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#landingCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#landingCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('https://via.placeholder.com/1920x600/FF6B6B/FFFFFF?text=Slide+1');">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="carousel-caption d-none d-md-block text-center text-white">
                        <h2 class="display-4 fw-bold">Welcome to Our Landing Page</h2>
                        <p class="lead">Discover amazing features with our responsive design.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('https://via.placeholder.com/1920x600/4ECDC4/FFFFFF?text=Slide+2');">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="carousel-caption d-none d-md-block text-center text-white">
                        <h2 class="display-4 fw-bold">Feature Highlight</h2>
                        <p class="lead">Seamless and modern user experience.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('https://via.placeholder.com/1920x600/45B7D1/FFFFFF?text=Slide+3');">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="carousel-caption d-none d-md-block text-center text-white">
                        <h2 class="display-4 fw-bold">Get Started Today</h2>
                        <p class="lead">Join thousands of satisfied users.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#landingCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#landingCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Bootstrap 5 JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
