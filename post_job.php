<?php
include 'db_connect.php';

$error = '';
$success = '';
$uploadedImages = []; // Array to hold paths of successfully uploaded images

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $budget = trim($_POST['budget'] ?? '');
    $images = $_FILES['images'] ?? [];

    // Validate required fields
    if (!$title || !$description || !$budget) {
        $error = "Please fill in all fields.";
    } else {
        // Handle image uploads
        $uploadDir = 'uploads/'; // Directory to store images (create this folder)
        $maxFiles = 5; // Max number of images
        $maxFileSize = 2 * 1024 * 1024; // 2MB per file
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true); // Create directory if it doesn't exist
        }

        $imagePaths = [];
        if (!empty($images['name'][0])) { // Check if files were uploaded
            $fileCount = count($images['name']);
            if ($fileCount > $maxFiles) {
                $error = "You can upload a maximum of $maxFiles images.";
            } else {
                for ($i = 0; $i < $fileCount; $i++) {
                    $fileName = $images['name'][$i];
                    $fileTmp = $images['tmp_name'][$i];
                    $fileSize = $images['size'][$i];
                    $fileType = $images['type'][$i];
                    $fileError = $images['error'][$i];

                    // Validate each file
                    if ($fileError !== UPLOAD_ERR_OK) {
                        $error = "Upload error for file '$fileName'. Please try again.";
                        break;
                    }
                    if ($fileSize > $maxFileSize) {
                        $error = "File '$fileName' is too large. Maximum size is 2MB.";
                        break;
                    }
                    if (!in_array($fileType, $allowedTypes)) {
                        $error = "File '$fileName' is not a valid image type (JPG, PNG, GIF, WebP only).";
                        break;
                    }

                    // Generate unique filename and move file
                    $uniqueName = uniqid('job_', true) . '_' . basename($fileName);
                    $filePath = $uploadDir . $uniqueName;
                    if (move_uploaded_file($fileTmp, $filePath)) {
                        $imagePaths[] = $filePath; // Store relative path
                    } else {
                        $error = "Failed to upload file '$fileName'.";
                        break;
                    }
                }
            }
        }

        // If no errors, insert into DB
        if (!$error) {
            $imagesString = implode(',', $imagePaths); // Comma-separated paths
            $stmt = mysqli_prepare($conn, "INSERT INTO jobs (title, description, budget, images) VALUES (?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "ssss", $title, $description, $budget, $imagesString);
            if (mysqli_stmt_execute($stmt)) {
                $success = "Job posted successfully!";
                $uploadedImages = $imagePaths; // For displaying in success message
            } else {
                $error = "Error posting job: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Post a Job - KLD Job Marketplace</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
  <script src="js/script.js"></script>
  <?php include 'externalphp/head.php'; ?>


  <style>


  </style>
</head>
<body>
    <?php include 'externalphp/chat.php'; ?>

  <?php include 'externalphp/navbar.php'; ?>

  <main>
    <div class="container p-5">
      <h1 class="display-1 fw-bold text-yellow text-center">Post a New Job</h1>

      <div class="content-box bg-green">
        <?php if ($error): ?>
          <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php elseif ($success): ?>
          <div class="alert alert-success">
            <?= htmlspecialchars($success) ?>
            <?php if (!empty($uploadedImages)): ?>
              <br><strong>Uploaded Images:</strong>
              <ul>
                <?php foreach ($uploadedImages as $img): ?>
                  <li><a href="<?= htmlspecialchars($img) ?>" target="_blank">View Image</a></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <form method="POST" action="post_job.php" enctype="multipart/form-data" novalidate>
          <div class="mb-3">
            <label for="title" class="form-label h4 fw-bold text-yellow">Job Title</label>
            <input type="text" class="form-control bg-dark-green text-yellow" id="title" name="title" required value="<?= htmlspecialchars($_POST['title'] ?? '') ?>" />
          </div>
          <div class="mb-3">
            <label for="description" class="form-label h4 fw-bold text-yellow">Job Description</label>
            <textarea class="form-control bg-dark-green text-yellow" id="description" name="description" rows="5" required><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
          </div>
          <div class="mb-3">
            <label for="budget" class="form-label h4 fw-bold text-yellow">Budget (e.g. PHP 5000)</label>
            <input type="text" class="form-control bg-dark-green text-yellow" id="budget" name="budget" required value="<?= htmlspecialchars($_POST['budget'] ?? '') ?>" />
          </div>
          <div class="mb-3">
            <label for="images" class="form-label h4 fw-bold text-yellow">Upload Images (Optional - Max 5 images, 2MB each, JPG/PNG/GIF/WebP only)</label>
            <input type="file" class="form-control bg-dark-green text-light" id="images" name="images[]" multiple accept="image/*" />
            <small class="form-text text-muted">You can select multiple images. This helps showcase your job requirements.</small>
          </div>
          <button type="submit" class="shadow-sm rounded btn btn-green w-100">Post Job</button>
        </form>
      </div>
    </div>
  </main>

  <?php include 'externalphp/footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
