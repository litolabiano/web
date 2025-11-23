<!-- Enhanced & Responsive Footer -->
<footer class="footer bg-green text-light shadow-lg py-5 position-relative mt-auto">
  <div class="container">
    <style>
      /* Make page a column flex layout so footer can sit at bottom when content is short.
         This is non-fixed/sticky: footer will follow content naturally but be pushed to
         the viewport bottom when there's little content. Scoped to common selectors. */
      html, body { height: 100%; }
      body { display: flex; flex-direction: column; min-height: 100%; }
      /* Ensure common large content areas can grow to fill available space */
      main, .content-box, .profile-hero, .about-section, #faqs, .container-fluid, .container { flex: 1 0 auto; }
      /* Keep header/navbar sizing natural (don't stretch) */
      header, nav, .navbar, .navbar-nav, .modal { flex: 0 0 auto; }
      /* Footer should sit at the end of the column */
      .footer { margin-top: auto; }
    </style>


    <!-- Footer Columns -->
    <div class="row text-center text-md-start g-4">
      <!-- Quick Links -->
      <div class="col-12 col-md-4">
        <h5 class="text-yellow fw-bold mb-3">Quick Links</h5>
        <ul class="nav flex-column">
          <li class="nav-item"><a href="#home" class="nav-link text-light px-0">Home</a></li>
          <li class="nav-item"><a href="#post-job" class="nav-link text-light px-0">Post a Job</a></li>
          <li class="nav-item"><a href="#available-jobs" class="nav-link text-light px-0">Available Jobs</a></li>
          <li class="nav-item"><a href="#contact" class="nav-link text-light px-0">Contact Us</a></li>
          <li class="nav-item"><a href="#data-privacy" class="nav-link text-light px-0">Data Privacy</a></li>
          <li class="nav-item"><a href="#faqs" class="nav-link text-light px-0">FAQs</a></li>
          <li class="nav-item"><a href="#about" class="nav-link text-light px-0">About</a></li>
        </ul>
      </div>

      <!-- Contact Info (compact) -->
      <div class="col-12 col-md-4">
        <h5 class="text-yellow fw-bold mb-3">Contact Us</h5>
        <p class="small mb-2"><i class="fas fa-envelope me-2 text-yellow"></i> info@workhop.com</p>
        <p class="small mb-2"><i class="fas fa-phone me-2 text-yellow"></i> +1 (123) 456-7890</p>
        <p class="small mb-3"><i class="fas fa-map-marker-alt me-2 text-yellow"></i> 123 Job Street, Career City</p>
        <p class="mb-3">Have questions about projects or hiring? Send us a message and we'll get back to you within 1 business day.</p>
        <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#contactModal">Send Us A Message</button>
      </div>

      <!-- Social & CTA -->
      <div class="col-12 col-md-4">
        <h5 class="text-yellow fw-bold mb-3">Follow Us</h5>
        <div class="d-flex justify-content-center justify-content-md-start gap-3 fs-5">
          <a href="#" class="text-light"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="text-light"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-light"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="text-light"><i class="fab fa-instagram"></i></a>
        </div>
        <p class="mt-3">Join our community for job tips and networking opportunities.</p>
        <a href="#services" class="btn btn-warning btn-sm rounded-pill fw-bold px-4">Get Started</a>
      </div>
    </div>

    <!-- Footer Bottom -->
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['csrf_token'])) {
    try { $_SESSION['csrf_token'] = bin2hex(random_bytes(16)); } catch (Exception $e) { $_SESSION['csrf_token'] = bin2hex(openssl_random_pseudo_bytes(16)); }
}
$__FOOTER_CSRF = $_SESSION['csrf_token'];
?>

</footer>

<!-- Contact Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-dark-green">
        <h5 class="modal-title" id="contactModalLabel">Send Us A Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="footerContactForm">
          <div class="mb-3">
            <label class="form-label">Your Name</label>
            <input type="text" name="name" id="cf_name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Your Email</label>
            <input type="email" name="email" id="cf_email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Recipient Email</label>
            <input type="email" name="recipient" id="cf_recipient" class="form-control" value="info@workhop.com" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea name="message" id="cf_message" class="form-control" rows="4" required></textarea>
          </div>
          <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($__FOOTER_CSRF); ?>">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" id="cf_send" class="btn btn-primary">Send Message</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const btn = document.getElementById('cf_send');
  if (!btn) return;
  btn.addEventListener('click', function () {
    const form = document.getElementById('footerContactForm');
    const data = new FormData(form);
    btn.disabled = true;
    fetch('api/contact_send.php', { method: 'POST', body: data })
      .then(r => r.json())
      .then(resp => {
        btn.disabled = false;
        if (resp && resp.success) {
          Swal.fire({ icon: 'success', title: 'Message sent', text: 'Thanks — we received your message.' });
          var modalEl = document.getElementById('contactModal');
          var modal = bootstrap.Modal.getInstance(modalEl);
          if (modal) modal.hide();
          form.reset();
        } else {
          Swal.fire({ icon: 'error', title: 'Send failed', text: resp.error || 'Unable to send message.' });
        }
      }).catch(err => {
        btn.disabled = false;
        Swal.fire({ icon: 'error', title: 'Send failed', text: 'Network or server error.' });
      });
  });
});
</script>
