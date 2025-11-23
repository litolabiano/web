<?php 
include 'include/session.php';
include 'db_connect.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Privacy Act - WorkHop</title>
  <?php include __DIR__ . '/include/head.php'; ?>

  <style>
      .dashboard-header {
          background: linear-gradient(135deg, var(--kld-green), var(--kld-dark-green));
          color: white;
          padding: 60px 0 40px;
          position: relative;
          overflow: hidden;
      }

      .dashboard-header h1 {
          font-size: 2.5rem;
          font-weight: 700;
          color: var(--kld-yellow);
      }

      /* Sidebar */
         .sidebar {
            background: linear-gradient(135deg, var(--kld-dark-green), var(--kld-green));
            color: white;
            width: 250px;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px 0;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .sidebar ul {
            list-style: none;
            padding: 20px;
        }

        .sidebar li {
            margin-bottom: 15px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: var(--kld-yellow);
            color: var(--kld-dark-green);
            transform: translateX(5px);
        }

        .sidebar i {
            margin-right: 10px;
            width: 20px;
        }

      .main-content {
          margin-left: 250px;
          padding: 20px;
      }

      .page-section {
          display: none;
      }

      .page-section.active {
          display: block;
      }
  </style>
</head>

<body>

<?php include __DIR__ . '/include/navbar.php'; ?>

<!-- Sidebar -->
<nav class="sidebar">
  <ul class="nav flex-column mt-5 pt-4">
    <br>
    <li><a href="#" class="side-link active" data-target="section-1"><i class="fas fa-home"></i> Overview</a></li>
    <li><a href="#" class="side-link" data-target="section-2"><i class="fas fa-database"></i> Purpose</a></li>
    <li><a href="#" class="side-link" data-target="section-3"><i class="fas fa-lock"></i> Protection</a></li>
    <li><a href="#" class="side-link" data-target="section-4"><i class="fas fa-user-shield"></i> User Rights</a></li>
  </ul>
</nav>

<!-- MAIN CONTENT -->
<div class="main-content">
<div class="card p-4 mt-3">

  <h2 class="text-center mb-4">Data Privacy Act of 2012 (RA 10173)</h2>

  <!-- SECTION 1 -->
<section id="section-1" class="page-section active">
  <h5>1. Collection of Personal Information</h5>
  <p>
    WorkHop collects only the personal data necessary to operate the platform effectively.
    This includes information such as your full name, email address, contact number,
    educational background, employment history, skills, uploaded documents, and activity logs.
    These details allow the system to create accurate profiles, support job-matching algorithms,
    and maintain the security and integrity of the platform.
  </p>
  <p>
    Additional information may also be collected when you interact with features like messaging,
    job applications, employer verification, and community networking tools. All data collected
    is limited to what is required to deliver WorkHop’s core services and enhance your experience.
  </p>
</section>


  <!-- SECTION 2 -->
<section id="section-2" class="page-section">
  <h5>2. Purpose of Data Processing</h5>
  <ul>
    <li>
      Managing user accounts and enabling personalized WorkHop features such as profile creation,
      activity tracking, and customizable job preferences.
    </li>
    <li>
      Matching job seekers with opportunities using WorkHop's smart job-matching system,
      which evaluates skills, experiences, and preferences to recommend suitable roles.
    </li>
    <li>
      Facilitating communication between applicants and employers through secure messaging,
      application updates, and platform notifications.
    </li>
    <li>
      Verifying the legitimacy of employers, job postings, and user activities to prevent scams,
      identity misuse, or other fraudulent behavior within the community.
    </li>
    <li>
      Improving the platform by analyzing usage trends, user feedback, and system performance
      to enhance accessibility, speed, and user satisfaction.
    </li>
    <li>
      Supporting community and networking features that help users connect, collaborate,
      and participate in WorkHop events and skill-building activities.
    </li>
  </ul>
</section>


  <!-- SECTION 3 -->
<section id="section-3" class="page-section">
  <h5>3. Data Protection & Security</h5>
  <p>
    WorkHop implements strict security measures to protect user information from unauthorized
    access, loss, or misuse. This includes the use of encrypted communication channels,
    protected databases, and secure servers that follow industry-standard security protocols.
  </p>
  <p>
    Only authorized personnel with verified roles have access to sensitive information needed
    for system maintenance, employer validation, and user support. WorkHop also uses
    session-based authentication, activity monitoring, and automated threat detection to keep
    your data safe.
  </p>
  <p>
    Continuous security audits, system updates, and vulnerability assessments are part of
    WorkHop's commitment to maintaining a trusted and reliable platform.
  </p>
</section>


  <!-- SECTION 4 -->
<section id="section-4" class="page-section">
  <h5>4. User Rights</h5>
  <ul>
    <li>
      Request access to the personal data stored in your WorkHop account, including your
      profile details, submitted documents, and activity records.
    </li>
    <li>
      Correct or update any inaccurate or outdated information to ensure your profile remains
      reliable for job-matching and employer review.
    </li>
    <li>
      Withdraw consent for specific processes where applicable, such as communication preferences
      or certain optional data inputs.
    </li>
    <li>
      Request deletion of your data, subject to legal and operational constraints. This includes
      the permanent removal of your account and associated records when permissible.
    </li>
    <li>
      Know exactly how your information is collected, used, stored, and protected through clear
      and accessible data privacy guidelines.
    </li>
    <li>
      Raise concerns or inquiries regarding your data, and receive assistance from WorkHop’s
      support team about privacy, security, or account-related issues.
    </li>
  </ul>
</section>


</div>
</div>

  <?php include __DIR__ . '/include/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Sidebar Navigation Logic
document.querySelectorAll('.side-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();

        // Remove active from all sidebar links
        document.querySelectorAll('.side-link').forEach(l => l.classList.remove('active'));
        this.classList.add('active');

        // Hide all sections
        document.querySelectorAll('.page-section').forEach(sec => sec.classList.remove('active'));

        // Show selected section
        document.getElementById(this.dataset.target).classList.add('active');
    });
});
</script>

</body>
</html>
