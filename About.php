<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Profile Page</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Optional: Font Awesome for social media icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts for better typography -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
   
    <?php include 'externalphp/head.php'; ?>
</head>
<body class="bg-dark-green">
    <?php include 'externalphp/navbar.php'; ?>
<section class="profile-hero p-5 ">

  <div class="container-fluid modals d-md-none py-5">
       <h1 class="fw-bold display-4 z-3 p-1 text-green text-center ">MEET OUR TEAM</h1>
           <!-- Developer 1: Lito Labiano -->
    <div class="col-12">
      <div class="content-box text-center bg-yellow p-4 rounded border border-dark mb-3" data-bs-toggle="modal" data-bs-target="#modalLito" >
        <img src="Resources/profile/1.png" alt="Lito Labiano" class="img-fluid rounded-pill mb-3" style="height: 250px; object-fit: cover; cursor:pointer; object-position: center 35%;">
        <h5 class="text-dark-green fw-bold mb-1">Lito Labiano</h5>
        <p class="text-green mb-3">Front-End Developer</p>
        <div class="social-icons">
          <a href="mailto:llabianojr@kld.edu.ph" target="_blank" class="text-green mx-2"><i class="fab fa-google"></i></a>
          <a href="https://www.instagram.com/litolitsoe/" target="_blank" class="text-green mx-2"><i class="fab fa-instagram"></i></a>
          <a href="https://www.threads.com/@litolitsoe?igshid=NTc4MTIwNjQ2YQ==" target="_blank" class="text-green mx-2"><i class="fab fa-threads"></i></a>
          <a href="https://www.facebook.com/denthrifts/" target="_blank" class="text-green mx-2"><i class="fab fa-facebook"></i></a>
        </div>
      </div>
    </div>

    <!-- Developer 2: Jaren Jamero -->
    <div class="col-12">
      <div class="content-box text-center bg-yellow p-4 rounded border border-dark mb-3" data-bs-toggle="modal" data-bs-target="#modalJaren" >
        <img src="Resources/profile/2.png" alt="Jaren Jamero" class="img-fluid rounded-pill mb-3" style="height: 250px; object-fit: cover; object-position: center 10%;">
        <h5 class="text-dark-green fw-bold mb-1">Jaren Jamero</h5>
        <p class="text-green mb-3">Business Processing Manager</p>
        <div class="social-icons">
          <a href="https://x.com/Justcallme_Ja?t=WzJ-8WcH3Fuq-w-YANdlNg&s=07" target="_blank" class="text-green mx-2"><i class="fab fa-x-twitter"></i></a>
          <a href="https://www.instagram.com/__mjjamero?igsh=MWYxN2lvOHZkODhlYQ==" target="_blank" class="text-green mx-2"><i class="fab fa-instagram"></i></a>
          <a href="https://www.threads.com/@__mjjamero" target="_blank" class="text-green mx-2"><i class="fab fa-threads"></i></a>
          <a href="https://www.facebook.com/share/179m1sUU66/" target="_blank" class="text-green mx-2"><i class="fab fa-facebook"></i></a>
        </div>
      </div>
    </div>

    <!-- Developer 3: Arjay Labris -->
    <div class="col-12">
      <div class="content-box text-center bg-yellow p-4 rounded border border-dark mb-3" data-bs-toggle="modal" data-bs-target="#modalArjay" >
        <img src="Resources/profile/3.png" alt="Arjay Labris" class="img-fluid rounded-pill mb-3" style="height: 250px; object-fit: cover; object-position: center 5%;">
        <h5 class="text-dark-green fw-bold mb-1">Arjay Labris</h5>
        <p class="text-green mb-3">System Analyst</p>
        <div class="social-icons">
          <a href="mailto:arjaylabris@gmail.com" target="_blank" class="text-green mx-2"><i class="fab fa-google"></i></a>
          <a href="https://www.instagram.com/vxrjyy.cl?igsh=MXhndHkycGx0a3M5NA==" target="_blank" class="text-green mx-2"><i class="fab fa-instagram"></i></a>
          <a href="https://www.threads.com/@vxrjyy.cl" target="_blank" class="text-green mx-2"><i class="fab fa-threads"></i></a>
          <a href="https://www.facebook.com/share/18vor2TEfz/" target="_blank" class="text-green mx-2"><i class="fab fa-facebook"></i></a>
        </div>
      </div>
    </div>

    <!-- Developer 4: Ashley Jubacon -->
    <div class="col-12">
      <div class="content-box text-center bg-yellow p-4 rounded border border-dark mb-3" data-bs-toggle="modal" data-bs-target="#modalAshley" >
        <img src="Resources/profile/4.png" alt="Ashley Jubacon" class="img-fluid rounded-pill mb-3" style="height: 250px; object-fit: cover; object-position: center 30%;">
        <h5 class="text-dark-green fw-bold mb-1">Ashley Jubacon</h5>
        <p class="text-green mb-3">Back-End Developer</p>
        <div class="social-icons">
          <a href="https://twitter.com" target="_blank" class="text-green mx-2"><i class="fab fa-twitter"></i></a>
          <a href="https://www.instagram.com/sugaringflan" target="_blank" class="text-green mx-2"><i class="fab fa-instagram"></i></a>
          <a href="https://github.com/kyuingred" target="_blank" class="text-green mx-2"><i class="fab fa-github"></i></a>
          <a href="https://www.facebook.com/i4lxysha?mibextid=wwXIfr" target="_blank" class="text-green mx-2"><i class="fab fa-facebook"></i></a>
        </div>
      </div>
    </div>

    <!-- Developer 5: Mariel Lopez -->
    <div class="col-12">
      <div class="content-box text-center bg-yellow p-4 rounded border border-dark mb-3" data-bs-toggle="modal" data-bs-target="#modalMariel" >
        <img src="Resources/profile/5.png" alt="Mariel Lopez" class="img-fluid rounded-pill mb-3" style="height: 250px; object-fit: cover; object-position: center 5%;">
        <h5 class="text-dark-green fw-bold mb-1">Mariel Lopez</h5>
        <p class="text-green mb-3">Admin</p>
        <div class="social-icons">
          <a href="https://x.com/_blondelle?t=rz_qJfNBf-IEFte9Gnkfzw&s=09" target="_blank" class="text-green mx-2"><i class="fab fa-x-twitter"></i></a>
          <a href="https://www.instagram.com/04.blondelle/" target="_blank" class="text-green mx-2"><i class="fab fa-instagram"></i></a>
          <a href="https://www.linkedin.com/in/marrielle-lopez-a7122738a" target="_blank" class="text-green mx-2"><i class="fab fa-linkedin"></i></a>
          <a href="https://www.facebook.com/mariel.lalala0" target="_blank" class="text-green mx-2"><i class="fab fa-facebook"></i></a>
        </div>
      </div>
    </div>

  </div>
</div>



    <div class="content-box bg-yellow d-none d-md-block">

    <div class="container-fluid ">
            <div id="profileCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class=" captions z-3">
                    <h1 class="display-1 fw-bold text-green text-center mb-3 ">MEET OUR TEAM</h1>
                   </div>
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#profileCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#profileCarousel" data-bs-slide-to="1" class=""></button>
                    <button type="button" data-bs-target="#profileCarousel" data-bs-slide-to="2" class=""></button>
                    <button type="button" data-bs-target="#profileCarousel" data-bs-slide-to="3" class=""></button>
                    <button type="button" data-bs-target="#profileCarousel" data-bs-slide-to="4" class=""></button>
                </div>
                <div class="carousel-inner rounded  ">
                    <!-- Slide 1: Profile Picture with Overlay -->
                    <div class="carousel-item active">
                        <img src="Resources/profile/1.png" class=" rounded-pill d-block m-auto" alt="Our Profile Picture" style="height: 800px; object-fit: contain;">
                        <div class="carousel-caption d-none d-md-block" data-bs-toggle="modal" data-bs-target="#modalLito" >
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
                    <!-- Slide 2: Quote Focus -->
                    <div class="carousel-item">
                        <img src="Resources/profile/2.png" class=" rounded-pill d-block m-auto" alt="Our Profile Picture" style="height: 800px; object-fit: contain;">
                        <div class="carousel-caption d-none d-md-block" data-bs-toggle="modal" data-bs-target="#modalJaren">
                          <h1 class="text-light fw-bold h4">I am the <b class="text-success">Buisness processing Manager</b> of this Website</h1>
                            <h5>Follow me <b class="text-yellow">Jaren Jamero</b></h5>
                             <p>On this social media for more updates!</p>
                            <div class="social-icons">
                                <a href="https://x.com/Justcallme_Ja?t=WzJ-8WcH3Fuq-w-YANdlNg&s=07" target="_blank"><i class="fab fa-x-twitter"></i></a>
                                <a href="https://www.instagram.com/__mjjamero?igsh=MWYxN2lvOHZkODhlYQ==" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.threads.com/@__mjjamero" target="_blank"><i class="fab fa-threads"></i></a>
                                <a href="https://www.facebook.com/share/179m1sUU66/" target="_blank"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 3: Social Media Teaser -->
                    <div class="carousel-item">
                        <img src="Resources/profile/3.png" class="  rounded-pill d-block m-auto" alt="Our Profile Picture" style="height: 800px; object-fit: contain;">
                        <div class="carousel-caption d-none d-md-block" data-bs-toggle="modal" data-bs-target="#modalArjay">
                          <h1 class="text-Dark fw-bold h4">I am the <b class="text-success">System Analyst</b> of this Website</h1>
                            <h5>Follow me <b class="text-yellow">Arjay Labris</b></h5>
                             <p>On this social media for more updates!</p>                          <div class="social-icons">
                                <a href="arjaylabris@gmail.com" target="_blank"><i class="fab fa-google"></i></a>
                                <a href="https://www.instagram.com/vxrjyy.cl?igsh=MXhndHkycGx0a3M5NA==" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.threads.com/@vxrjyy.cl" target="_blank"><i class="fab fa-threads"></i></a>
                                <a href="https://www.facebook.com/share/18vor2TEfz/" target="_blank"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 4 -->
                    <div class="carousel-item">
                        <img src="Resources/profile/4.png" class=" rounded-pill d-block m-auto" alt="Our Profile Picture" style="height: 800px; object-fit: contain;">
                        <div class="carousel-caption d-none d-md-block" data-bs-toggle="modal" data-bs-target="#modalAshley">
                          <h1 class="text-light fw-bold h4">I am the <b class="text-success">Back-End-Developer</b> of this Website</h1>
                            <h5>Follow me <b class="text-yellow">Ashley Jubacon</b></h5>
                             <p>On this social media for more updates!</p>                         
                              <div class="social-icons">
                                <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.instagram.com/sugaringflan" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="https://github.com/kyuingred" target="_blank"><i class="fab fa-github"></i></a>
                                <a href="https://www.facebook.com/i4lxysha?mibextid=wwXIfr&rdid=xTmMP1Enpy9ft3Mq&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F17SWKqY1Uz%2F%3Fmibextid%3DwwXIfr#" target="_blank"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 5 -->
                    <div class="carousel-item">
                        <img src="Resources/profile/5.png" class=" rounded-pill d-block m-auto" alt="Our Profile Picture" style="height: 800px; object-fit: contain;">
                        <div class="carousel-caption d-none d-md-block "data-bs-toggle="modal" data-bs-target="#modalMariel">
                          <h1 class="text-light fw-bold h4">I am the <b class="text-success">Admin</b> of this Website</h1>
                            <h5>Follow me <b class="text-yellow">Mariel Lopez</b></h5>
                             <p>On this social media for more updates!</p> 
                             <div class="social-icons">
                                <a href="https://x.com/_blondelle?t=rz_qJfNBf-IEFte9Gnkfzw&s=09" target="_blank"><i class="fab fa-x-twitter"></i></a>
                                <a href="https://www.instagram.com/04.blondelle/" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.linkedin.com/in/marrielle-lopez-a7122738a?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank"><i class="fab fa-linkedin"></i></a>
                                <a href="https://www.facebook.com/mariel.lalala0" target="_blank"><i class="fab fa-facebook"></i></a>
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








    <!-- Enhanced About Section -->
    <section class="2 p-5 about-section bg-green ">
        
            
              <div class="content-box bg-dark-green">
                <h1 class="display-1 fw-bold text-yellow">About Us</h1>
                <p class="text-light">This profile page showcases our picture, inspirational quotes, and social media links in a dynamic carousel format using Bootstrap. We've enhanced the design with modern gradients, subtle animations, glassmorphism effects, and a cohesive dark theme to create an engaging and professional look. Feel free to customize the images, quotes, and social links!</p>
              </div>
            
        
    </section>

    <section id="faqs" class=" bg-dark-green m-auto p-5 ">
    <div class="container-fluid">
        <h1 class="display-1  fw-bold text-yellow">Questions & Answers</h1>
      <p class="text-light">
        Click on any question below to view the answer. We've compiled all the most common questions to help you navigate our job portal effectively.
      </p>
 
      <div class="m-auto pb-5">
    
      </div>

      <div class="ms-3 faq-list">
        <div class="faq-item">
          <input type="checkbox" id="faq1" class="faq-toggle">
          <label for="faq1" class="faq-question-bar">
            <span class="tab-label">#1</span>
            <div class="question-text">How long does the hiring process typically take?</div>
          </label>
          <div class="faq-answer">
            <div class="answer-text">It varies on the role. Usually takes 2–6 weeks from application to offer.</div>
          </div>
        </div>

        <div class="faq-item">
          <input type="checkbox" id="faq2" class="faq-toggle">
          <label for="faq2" class="faq-question-bar">
            <span class="tab-label">#2</span>
            <div class="question-text">How can I get help if I have issues or questions?</div>
          </label>
          <div class="faq-answer">
            <div class="answer-text">You can contact our support team via email or chat (link available on the footer).</div>
          </div>
        </div>

        <div class="faq-item">
          <input type="checkbox" id="faq3" class="faq-toggle">
          <label for="faq3" class="faq-question-bar">
            <span class="tab-label">#3</span>
            <div class="question-text">How can I update/edit/withdraw my application after submission?</div>
          </label>
          <div class="faq-answer">
            <div class="answer-text">Log in to your account → “My Application” → select the application → click “Edit” or “Withdraw”.</div>
          </div>
        </div>

        <div class="faq-item">
          <input type="checkbox" id="faq4" class="faq-toggle">
          <label for="faq4" class="faq-question-bar">
            <span class="tab-label">#4</span>
            <div class="question-text">How do I filter jobs by specialization (e.g. Data Analytics, UI/UX Designer)?</div>
          </label>
          <div class="faq-answer">
            <div class="answer-text">On the job board page, use the filter options or browse by category.</div>
          </div>
        </div>

        <div class="faq-item">
          <input type="checkbox" id="faq5" class="faq-toggle">
          <label for="faq5" class="faq-question-bar">
            <span class="tab-label">#5</span>
            <div class="question-text">What happens when I submit my application?</div>
          </label>
          <div class="faq-answer">
            <div class="answer-text">You’ll receive a confirmation email and, if selected, an invitation to interview.</div>
          </div>
        </div>

        <div class="faq-item">
          <input type="checkbox" id="faq6" class="faq-toggle">
          <label for="faq6" class="faq-question-bar">
            <span class="tab-label">#6</span>
            <div class="question-text">What type of employment do you offer?</div>
          </label>
          <div class="faq-answer">
            <div class="answer-text">We offer full-time, part-time, and freelance roles depending on the department.</div>
          </div>
        </div>

        <div class="faq-item">
          <input type="checkbox" id="faq7" class="faq-toggle">
          <label for="faq7" class="faq-question-bar">
            <span class="tab-label">#7</span>
            <div class="question-text">How will I know if my application has been viewed?</div>
          </label>
          <div class="faq-answer">
            <div class="answer-text">You may receive a notification or email with updates on your application status.</div>
          </div>
        </div>

        <div class="faq-item">
          <input type="checkbox" id="faq8" class="faq-toggle">
          <label for="faq8" class="faq-question-bar">
            <span class="tab-label">#8</span>
            <div class="question-text">Are there tips for job seekers on the website?</div>
          </label>
          <div class="faq-answer">
            <div class="answer-text">Yes, visit the resources page for articles and tips to improve your applications.</div>
          </div>
        </div>

        <div class="faq-item">
          <input type="checkbox" id="faq9" class="faq-toggle">
          <label for="faq9" class="faq-question-bar">
            <span class="tab-label">#9</span>
            <div class="question-text">Is my personal information safe on this website?</div>
          </label>
          <div class="faq-answer">
            <div class="answer-text">The website has strong privacy and security measures. Review our Privacy Policy for details.</div>
          </div>
        </div>

        <div class="faq-item">
          <input type="checkbox" id="faq10" class="faq-toggle">
          <label for="faq10" class="faq-question-bar">
            <span class="tab-label">#10</span>
            <div class="question-text">What is the purpose of this website?</div>
          </label>
          <div class="faq-answer">
            <div class="answer-text">This platform connects employers with job seekers for a better hiring experience.</div>
          </div>
        </div>
      </div>
  
  </div>
</section>

<section class="bg-green" id="Contact">  
   

  
    <div class="container-lg-fluid container pb-5  ">
      <h1 class="text-center pt-5 display-1 text-yellow fw-bold">Contact Us</h1>
<p class="text-center mx-auto px-3 px-md-5 col-12 col-md-10 col-lg-8">
  Feel free to reach out using the information below or by filling out the form.
</p>
      <div class="bg-dark-green content-box  ">
        <div class="">
                <h2 class="display-5 text-center text-yellow fw-bold">Send Us a Message</h2>


                <form action="https://yourwebsite.com/submit-form" method="POST" class="needs-validation" >  <!-- Replace with your actual form handler -->
                    <div class="mb-3">
                        <label for="name" class="form-label text-yellow p-2 fw-bold h5 ">Your Name:</label>
                        <input type="text" class="bg-yellow p-2 form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email"  class="form-label text-yellow p-2 fw-bold h5 ">Your Email:</label>
                        <input type="email" class="bg-yellow form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message"  class="form-label text-yellow p-2 fw-bold h5 ">Message:</label>
                        <textarea class="form-control bg-yellow" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn w-100 btn-green">Send Message</button>
                </form>
          </div>
      </div>
    </div>
    

    <!-- Bootstrap JS -->
    


</section>


<!-- ===================== -->
<!-- 👇 INDIVIDUAL MODALS -->
<!-- ===================== -->

<!-- Modal: Lito -->
<div class="modal fade" id="modalLito" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-dark text-light p-4 rounded-4">
      <div class="modal-header bg-dark-green rounded-4 border">
        <h5 class="modal-title text-yellow fw-bold">Lito Labiano — Front-End Developer</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
          <h1 class="text-yellow text-center">“Work-Hard, Play-Hard.”</h1>
          <br>
          <p class="text-center">-by William Newnham advocating earnestness in all pursuits</p>
          
                
        <div class="row">
            <hr class="border">
          <p class="text-yellow col-md-3  container h3">Skills :</p>
               <p class=" col-md-9 p-1">Growth-Oriented – Passionate about personal and professional
                <br> development, always striving to be better than before.</p>
              <hr class="border">
                </div>

        <p>I’m driven by passion and purpose—when I commit to something, I give it my all. I believe in giving 101%, learning continuously, and always striving for improvement.</p>
        <div class="social-icons mt-4 text-center">
          <a href="mailto:llabianojr@kld.edu.ph" target="_blank" class="text-light mx-2 fs-4"><i class="fab fa-google"></i></a>
          <a href="https://www.instagram.com/litolitsoe/" target="_blank" class="text-light mx-2 fs-4"><i class="fab fa-instagram"></i></a>
          <a href="https://www.threads.com/@litolitsoe" target="_blank" class="text-light mx-2 fs-4"><i class="fab fa-threads"></i></a>
          <a href="https://www.facebook.com/denthrifts/" target="_blank" class="text-light mx-2 fs-4"><i class="fab fa-facebook"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal: Jaren -->
<div class="modal fade" id="modalJaren" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-dark text-light p-4 rounded-4">
      <div class="modal-header bg-dark-green rounded-4 border">
        <h5 class="modal-title text-yellow fw-bold">Jaren Jamero — Business Processing Manager</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
          <h1 class="text-yellow text-center">"The only thing that you need in your life is to TRUST YOURSELF"</h1>
          <br>
          <p class="text-center">-sya nagsabe nyan</p>
          
                
        <div class="row">
            <hr class="border">
          <p class="text-yellow col-md-3  container h3">Skills :</p>
               <p class=" col-md-9 p-1">I can multitask and hard worker. </p>
              <hr class="border">
                </div>

        <p class="text-center">I'm good at solving problems every time I have a problem in my life.</p>
        <div class="social-icons mt-4 text-center">
          <a href="https://x.com/Justcallme_Ja" target="_blank" class="text-light mx-2 fs-4"><i class="fab fa-x-twitter"></i></a>
          <a href="https://www.instagram.com/__mjjamero" target="_blank" class="text-light mx-2 fs-4"><i class="fab fa-instagram"></i></a>
          <a href="https://www.threads.com/@__mjjamero" target="_blank" class="text-light mx-2 fs-4"><i class="fab fa-threads"></i></a>
          <a href="https://www.facebook.com/share/179m1sUU66/" target="_blank" class="text-light mx-2 fs-4"><i class="fab fa-facebook"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal: Arjay -->
<div class="modal fade" id="modalArjay" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-dark text-light p-4 rounded-4">
      <div class="modal-header bg-dark-green rounded-4 border">
         <h5 class="modal-title text-yellow fw-bold">Arjay Labris — System Analyst</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
          <h1 class="text-yellow text-center">"Code Hard, nap Hard"</h1>
          <br>
          <p class="text-center">-sya nagsabe nyan</p>
          
                
        <div class="row">
            <hr class="border">
          <p class="text-yellow col-md-3  container h3">Skills :</p>
               <p class=" col-md-9 p-1 ">Adaptability. </p>
              <hr class="border">
                </div>

        <p class="text-center"> Nonchalance</p>        
        <div class="social-icons mt-4 text-center">
          <a href="mailto:arjaylabris@gmail.com" target="_blank" class="text-light mx-2 fs-4"><i class="fab fa-google"></i></a>
          <a href="https://www.instagram.com/vxrjyy.cl" target="_blank" class="text-light mx-2 fs-4"><i class="fab fa-instagram"></i></a>
          <a href="https://www.threads.com/@vxrjyy.cl" target="_blank" class="text-light mx-2 fs-4"><i class="fab fa-threads"></i></a>
          <a href="https://www.facebook.com/share/18vor2TEfz/" target="_blank" class="text-light mx-2 fs-4"><i class="fab fa-facebook"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal: Ashley -->
<div class="modal fade" id="modalAshley" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-dark text-light p-4 rounded-4">
      <div class="modal-header bg-dark-green rounded-4 border">
        <h5 class="modal-title text-yellow fw-bold">Ashley Jubacon — Back-End Developer</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
      
          <h1 class="text-yellow">“If you think about it, it was over in no time, and that’s life”</h1>
          <br>
          <p class="text-center">-Frank Ocean</p>
          
                
        <div class="row">
            <hr class="border">
          <p class="text-yellow col-md-3  container h3">Skills :</p>
               <p class=" col-md-9 p-1">Artistic Perspective,
              Empathetic,
              good listener,
              active procrastination</p>
              <hr class="border">
                </div>

        <p>I love thrifting, being creative, and listening to music. Some of my favorite artists are Tyler, The Creator, Frank Ocean, Brent Faiyaz, and Avenoir. 
          I enjoy collecting small trinkets and spending time with my friends. I also have  an unhealthy emotional attachment to Buldak (please never stop making those noodles).
           In my free time, I like watching thriller films— Parasite deserves an honorable mention.</p>
        <div class="social-icons mt-4 text-center">
          <a href="https://twitter.com" target="_blank" class="text-light mx-2 fs-4"><i class="fab fa-twitter"></i></a>
          <a href="https://www.instagram.com/sugaringflan" target="_blank" class="text-light mx-2 fs-4"><i class="fab fa-instagram"></i></a>
          <a href="https://github.com/kyuingred" target="_blank" class="text-light mx-2 fs-4"><i class="fab fa-github"></i></a>
          <a href="https://www.facebook.com/i4lxysha" target="_blank" class="text-light mx-2 fs-4"><i class="fab fa-facebook"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal: Mariel -->
<div class="modal fade" id="modalMariel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-dark text-light p-4 rounded-4">
      <div class="modal-header bg-dark-green rounded-4 border">
        <h5 class="modal-title text-yellow fw-bold">Mariel Lopez — Admin</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
          <h1 class="text-yellow text-center">"work smarter not harder"</h1>
          <br>
          <p class="text-center">-sya nagsabe nyan</p>
          
                
        <div class="row">
            <hr class="border">
          <p class="text-yellow col-md-3  container h3">Skills :</p>
               <p class=" col-md-9 p-1 ">Multitasker. </p>
              <hr class="border">
                </div>

        <p class="text-center"> just a regular human trying to survive IS and fluent in "I'll do it later" but always gets it done on time. Professional overthinker and full time learner</p>
        <div class="social-icons mt-4 text-center">
          <a href="https://x.com/_blondelle" target="_blank" class="text-light mx-2 fs-4"><i class="fab fa-x-twitter"></i></a>
          <a href="https://www.instagram.com/04.blondelle/" target="_blank" class="text-light mx-2 fs-4"><i class="fab fa-instagram"></i></a>
          <a href="https://www.linkedin.com/in/marrielle-lopez" target="_blank" class="text-light mx-2 fs-4"><i class="fab fa-linkedin"></i></a>
          <a href="https://www.facebook.com/mariel.lalala0" target="_blank" class="text-light mx-2 fs-4"><i class="fab fa-facebook"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>


    


    <!-- Footer for Additional Decoration -->
    <?php include 'externalphp/footer.php'; ?>
 

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        </body>
</html>

