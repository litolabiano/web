<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Privacy Act - WorkHop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
          <?php include 'externalphp/head.php'; ?>

  <style>
    body {
      height: 100vh;
      margin: 0;
      font-family: 'Poppins', sans-serif;
      animation: gradientMove 12s ease infinite;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
      position: relative;
    }



    .card {
      width: 75%;
      max-width: 1000px;
      background: #fff9e6;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
      padding: 30px;
      z-index: 1;
    }

    .title {
      color: #e6b800;
      text-shadow: 0px 0px 6px rgba(230, 184, 0, 0.6);
      font-weight: bold;
    }

    .btn-warning {
      background-color: #f9d71c;
      border: none;
      color: #000;
      border-radius: 5px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-warning:hover {
      background-color: #f1c40f;
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }


  </style>
</head>
<body >
  <div class=""></div>
  <div class="card text-center w-100">
    <h2 class="title mb-3">Data Privacy Act of 2012 (RA 10173)</h2>
    <p class="text-muted">
      The Data Privacy Act of 2012 protects individual personal information in information and communication systems in both government and private sectors.  
      It ensures that all data collected, processed, and stored are safeguarded and used only for legitimate purposes.
    </p>
    <p class="text-muted">
      By using the WorkHop platform, you consent to the collection and processing of your personal data in accordance with our privacy policy and the provisions of this law.  
      We commit to handle all information with the highest level of confidentiality and security.  MAKE THIS LONG
    </p>

  
    <p class="fw-bold text-success">
      Your trust and privacy are important to us.
    </p>
    <a  onclick="window.close()"  class="btn btn-warning mt-3"><i class="bi bi-arrow-left-circle me-1"></i> I Understand</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>