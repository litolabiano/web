<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
        <?php include 'externalphp/head.php'; ?>
</head>
<body>

    <section class="profile-hero p-5 another">
    <h1 class="display-1 fw-bold text-yellow">MEET OUR TEAM</h1>
    <div class="container-fluid ">
        <div class="content-box bg-yellow" >
            <div id="profileCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#profileCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#profileCarousel" data-bs-slide-to="1" class=""></button>
                    <button type="button" data-bs-target="#profileCarousel" data-bs-slide-to="2" class=""></button>
                    <button type="button" data-bs-target="#profileCarousel" data-bs-slide-to="3" class=""></button>
                    <button type="button" data-bs-target="#profileCarousel" data-bs-slide-to="4" class=""></button>
                </div>
                <div class="carousel-inner rounded h-auto  ">
                    <!-- Slide 1: Profile Picture with Overlay -->
                    <div class="carousel-item active">
                      <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <img src="Resources/profile/1.png" class=" imd-fluid rounded-pill d-block m-auto" alt="Our Profile Picture" style="height: 800px; object-fit: contain;">
                            </div>
                         
                            <div class=" z-1  col-lg-6 col-md-12 p-5 m-auto d-sm-block d-none">
                                <div class="content-box  captions  ">
                          <h1 class="text-light fw-bold h4">I am the <b class="text-success">Front-End-Developer</b> of this Website</h1>
                            <h5>Follow me <b class="text-yellow">Lito Labiano</b></h5>
                             <p>On this social media for more updates!</p>
                            <div class="social-icons">
                                <a href="llabianojr@kld.edu.ph" target="_blank"><i class="fab fa-google"></i></a>
                                <a href="https://www.instagram.com/litolitsoe/" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.threads.com/@litolitsoe?igshid=NTc4MTIwNjQ2YQ==" target="_blank"><i class="fab fa-threads"></i></a>
                                <a href="https://www.facebook.com/denthrifts/" target="_blank"><i class="fab fa-facebook"></i></a>
                                        </div>
                                </div>
                            </div>
                       

                      </div>

                    </div>
                    <!-- Slide 2: Quote Focus -->
                   <div class="carousel-item ">
                      <div class="row ">
                        <div class="col-lg-6">
                         <img src="Resources/profile/2.png" class=" rounded-pill d-block m-auto" alt="Our Profile Picture" style="height: 800px; object-fit: contain;">
                                </div>
                         
                            <div class=" z-1  col-lg-6 col-md-12 p-5 d-sm-block d-none m-auto">
                                <div class="content-box  captions   ">
                                      <h5>jaren jaemro</h5>
                                      <p><strong>Quote:</strong> "Code is poetry in motion; let's build something beautiful together."</p>
                                      <p><strong>Skills:</strong> Web Development, PHP, HTML/CSS, JavaScript, Bootstrap, Responsive Design, UI/UX</p>
                                          <div class="social-icons">
                                              <a href="llabianojr@kld.edu.ph" target="_blank"><i class="fab fa-google"></i></a>
                                              <a href="https://www.instagram.com/litolitsoe/" target="_blank"><i class="fab fa-instagram"></i></a>
                                              <a href="https://www.threads.com/@litolitsoe?igshid=NTc4MTIwNjQ2YQ==" target="_blank"><i class="fab fa-threads"></i></a>
                                              <a href="https://www.facebook.com/denthrifts/" target="_blank"><i class="fab fa-facebook"></i></a>
                                          </div>
                                    </div>
                         </div>

                      </div>

                    </div>
         

                </div>

                
                <button class="carousel-control-prev" type="button" data-bs-target="#profileCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#profileCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    </section>
     

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Optional: Simple JS for Enhanced Animations -->


  
</body>
</html>