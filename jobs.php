<?php
include 'db_connect.php';

$id = $_GET['id'] ?? null;

if ($id) {
    // Show job details
    $stmt = mysqli_prepare($conn, "SELECT * FROM jobs WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $job = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if (!$job) {
        die("Job not found.");
    }

    // Parse images (comma-separated string to array)
    $job['images'] = !empty($job['images']) ? explode(',', $job['images']) : [];
} else {
    // Show all jobs
    $sql = "SELECT * FROM jobs ORDER BY posted_at DESC";
    $result = mysqli_query($conn, $sql);

    $jobs = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Parse images for each job
            $row['images'] = !empty($row['images']) ? explode(',', $row['images']) : [];
            $jobs[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Browse Jobs - KLD Job Marketplace</title>
  <?php include 'externalphp/head.php'; ?>
  <!-- Bootstrap JS (moved here to load before chat script) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- Bootstrap Icons (added for chat widget) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
  <?php include 'externalphp/chat.php'; ?>
  <?php include 'externalphp/navbar.php'; ?>

  <?php if ($id): ?>
    <!-- Detailed view -->
    <div class="container">
      <div class="content-box m-5 p-5">
        <h1 class="display-5 fw-bold text-yellow"><?= htmlspecialchars($job['title']) ?></h1>
        <hr class="border">
        <p class="display-6"><strong class="fw-bold">Salary:</strong> <?= htmlspecialchars($job['budget']) ?></p>
        <p class="display-6"><strong class="fw-bold">Posted at:</strong> <?= htmlspecialchars($job['posted_at']) ?></p>
        <hr class="border">
        <p><?= nl2br(htmlspecialchars($job['description'])) ?></p>
        <hr class="border">

        <!-- Display Images if available -->
        <?php if (!empty($job['images'])): ?>
          <h3 class="text-yellow">Job Images</h3>
          <div class="row g-3">
            <?php foreach ($job['images'] as $image): ?>
              <div class="col-md-4 col-sm-6">
                <div class="text-center">
                  <img src="<?= htmlspecialchars($image) ?>" alt="Job Image" class="img-fluid img-thumbnail mb-2" style="max-height: 200px;" onerror="this.src='path/to/placeholder.jpg'; this.alt='Image not available';" onclick="showImage('<?= htmlspecialchars($image) ?>')" data-bs-toggle="modal" data-bs-target="#imageModal">
                  <br>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <hr class="border">
        <?php endif; ?>

        <a href="jobs.php" class="btn w-100 mt-2 btn-green shadow-sm rounded">Back to Jobs</a>
      </div>
    </div>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="imageModalLabel">Full Image View</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <img id="modalImage" src="" alt="Full Job Image" class="img-fluid" onerror="this.src='path/to/placeholder.jpg'; this.alt='Image not available';">
          </div>
        </div>
      </div>
    </div>
  <?php else: ?>
    <!-- List view -->
    <div class="container-fluid text-yellow p-5 rounded">
      <h1 class="fw-bold display-1 text-center">Available Jobs</h1>
      <?php if (count($jobs) === 0): ?>
        <h2 class="fw-bold display-1 text-center">No jobs available at the moment</h2>
      <?php else: ?>
        <div class="row content-box">
          <?php foreach ($jobs as $job): ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="text-dark-green p-3 rounded">
                <a href="jobs.php?id=<?= htmlspecialchars($job['id']) ?>" class="p-2 shadow-md card border-light bg-dark-green text-decoration-none">
                  <div class="card job-card">
                    <div class="card-body">
                      <!-- Show first image as thumbnail if available -->
                  
                      <h5 class="card-title"><?= htmlspecialchars($job['title']) ?></h5>
                      <p class="card-text"><?= nl2br(htmlspecialchars(substr($job['description'], 0, 100))) ?>...</p>
                    </div>
                    <div class="card-footer">
                      <small>Budget: <?= htmlspecialchars($job['budget']) ?> | Posted: <?= date('M j, Y', strtotime($job['posted_at'])) ?></small>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <?php include 'externalphp/footer.php'; ?>

  <script>
    function showImage(src) {
      document.getElementById('modalImage').src = src;
    }
  </script>
</body>
</html>