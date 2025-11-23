<?php
require_once __DIR__ . '/db_connect.php';
require_once __DIR__ . '/include/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ . '/include/head.php'; ?>
    <style>
        /* Your provided CSS, organized and cleaned up */
        :root {
            --hue: 206;
            --kld-green: #165153;   /* Main green */
            --kld-dark-green: #153b3b; /* Darker green */
            --kld-yellow: #f7bc3c;  /* Bright yellow */
            --bkg: hsl(var(--hue), 50%, 96%);
            --text: hsl(var(--hue), 70%, 9%);
            --dark: hsl(var(--hue), 70%, 3%);
        }

        /* Color utility classes */
        .bg-green { background-color: var(--kld-green) !important; }
        .text-green { color: var(--kld-green) !important; }
        .bg-dark-green { background-color: var(--kld-dark-green) !important; }
        .text-dark-green { color: var(--kld-dark-green) !important; }
        .bg-yellow { background-color: var(--kld-yellow) !important; }
        .text-yellow { color: var(--kld-yellow) !important; }

        /* Reset and base styles */
        *, *::after, *::before {
            border: 0;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            overflow-x: hidden;
            background-color: var(--bkg);
        }

        /* Navbar (your custom styles) */
        .navbar-yellow {
            background-color: var(--kld-green) !important;
            color: var(--kld-yellow) !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-yellow .nav-link,
        .navbar-yellow .navbar-brand {
            color: var(--kld-yellow) !important;
        }

        .navbar-toggler {
            width: 50px;
            height: 50px;
            padding: 0;
            border-radius: 50%;
            transition: 0.3s ease-in-out;
            flex-shrink: 0;
            background-color: var(--kld-yellow);
            border: none;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        @media screen and (max-width: 991px) {
            .navbar-collapse.collapse:not(.show) {
                display: block;
            }
            .navbar-collapse {
                position: fixed;
                top: 120px;
                right: 35px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.8);
                border-radius: 5px;
                background: var(--kld-dark-green);
                width: 350px;
                height: auto;
                z-index: -2;
                transform: translateX(405px);
                padding: 30px;
                transition: cubic-bezier(0.075, 0.82, 0.165, 1) 0.4s;
                display: block;
            }
            .navbar-collapse.show {
                transform: translateX(0px);
            }
        }

        /* Dashboard Header (adapted from your hero styles) */
        .dashboard-header {
            background: linear-gradient(135deg, var(--kld-green), var(--kld-dark-green));
            color: white;
            padding: 60px 0 40px;
            position: relative;
            overflow: hidden;
        }

        .dashboard-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>') repeat;
            opacity: 0.1;
        }

        .dashboard-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            animation: text-slide-in 1s ease-out;
            color: var(--kld-yellow);
        }

        @keyframes text-slide-in {
            0% { transform: translateX(100px); opacity: 0; }
            100% { transform: translateX(0); opacity: 1; }
        }

        /* Sidebar */
        .sidebar {
            background: linear-gradient(135deg, var(--kld-dark-green), var(--kld-green));
            color: white;
            width: 250px;
            height: 100vh;
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

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            min-height: 100vh;
        }

        /* Stats Cards (using your stats-section inspiration) */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            color: white;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 1s ease-out;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .stat-number {
            font-size: 2.5rem;
            color: var(--kld-yellow);
            font-weight: 700;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 1rem;
            opacity: 0.9;
        }

        /* Job Cards (your exact styles) */
        .job-card {
            aspect-ratio: 1 / 1;
            height: 230px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border: none;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .job-card:hover {
            transform: translateX(-10px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .job-card .card-body {
            flex-grow: 1;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .job-card .card-title {
            font-size: 1.1rem;
            font-weight: bold;
            color: var(--kld-green);
            margin-bottom: 0.5rem;
        }

        .job-card .card-text {
            font-size: 0.9rem;
            color: #666;
            flex-grow: 1;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        .job-card .card-footer {
            background: none;
            border-top: 1px solid var(--kld-green);
            padding-top: 0.5rem;
            font-size: 0.85rem;
            color: var(--kld-green);
        }

        .jobs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        /* Quick Actions Buttons (your btn-green style) */
        .btn-green {
            background-color: rgba(238, 203, 128, 0.8);
            color: var(--kld-yellow);
            border: none !important;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-green:hover {
            background-color: var(--kld-yellow);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-1px);
            color: var(--kld-dark-green);
        }

        /* Simple CSS Chart Placeholder */
        .chart-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .bar-chart {
            display: flex;
            justify-content: space-around;
            height: 200px;
            align-items: flex-end;
        }

        .bar {
            background: linear-gradient(135deg, var(--kld-green), var(--kld-yellow));
            width: 40px;
            border-radius: 5px 5px 0 0;
            transition: height 1s ease;
            position: relative;
        }

        .bar:nth-child(1) { height: 60%; }
        .bar:nth-child(2) { height: 80%; }
        .bar:nth-child(3) { height: 50%; }
        .bar:nth-child(4) { height: 70%; }

        .bar-label {
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            color: var(--kld-green);
            font-weight: bold;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .main-content {
                margin-left: 0;
            }
            .job-card {
                height: 250px;
            }
            .dashboard-header h1 {
                font-size: 2rem;
            }
            .stats-grid {
                grid-template-columns: 1fr;
            }
            .jobs-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Additional utilities from your code (overlay, forms, etc.) - adapted for dashboard if needed */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.05);
            z-index: 0;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--kld-green);
            box-shadow: 0 0 6px rgba(22, 81, 83, 0.3);
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/include/navbar.php'; ?>
    <!-- Sidebar -->
    <nav class="sidebar">
        <ul>
            <br>
            <br>
            <br>
            <li><a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="#"><i class="fas fa-briefcase"></i> Jobs</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Clients</a></li>
            <li><a href="#"><i class="fas fa-chart-bar"></i> Analytics</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
            <li><a href="api/a-logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Dashboard Header -->
        <header class="dashboard-header">
            <div class="container" style="position: relative; z-index: 2; text-align: center;">
                <h1>Welcome to KLD Agency Dashboard</h1>
                <p>Manage projects, clients, and revenue.</p>
            </div>
        </header>

        <!-- Stats Section -->
        <?php
        // Initialize fallback values
        $totalJobs = 0;
        $activeJobs = 0;
        $newClients = 0;
        $completionRate = 0;
        $recentJobs = [];
        // Dashboard analytics range (days)
        $rangeDays = isset($_SESSION['dashboard_range']) ? (int)$_SESSION['dashboard_range'] : 90;
        // Guard: ensure $conn exists
        if (isset($conn) && $conn) {
            // Total jobs
            $res = mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM jobs");
            if ($res) { $r = mysqli_fetch_assoc($res); $totalJobs = (int)$r['cnt']; mysqli_free_result($res); }

            // Active jobs (status = 'active')
            $res = mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM jobs WHERE status='active'");
            if ($res) { $r = mysqli_fetch_assoc($res); $activeJobs = (int)$r['cnt']; mysqli_free_result($res); }

            // New clients (distinct client_id if column exists) - best-effort
            $res = @mysqli_query($conn, "SELECT COUNT(DISTINCT id) AS cnt FROM users WHERE status='active' and role='user' " );
            if ($res) { $r = mysqli_fetch_assoc($res); $newClients = (int)$r['cnt']; mysqli_free_result($res); }

            // Completion rate (completed / total)
            $completed = 0;
            $res = mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM jobs WHERE status='completed'");
            if ($res) { $r = mysqli_fetch_assoc($res); $completed = (int)$r['cnt']; mysqli_free_result($res); }
            if ($totalJobs > 0) { $completionRate = round(($completed / $totalJobs) * 100); }

            // Recent jobs
            $res = mysqli_query($conn, "SELECT id, title, description, budget, posted_at FROM jobs ORDER BY id DESC LIMIT 6");
            if ($res) {
                while ($row = mysqli_fetch_assoc($res)) { $recentJobs[] = $row; }
                mysqli_free_result($res);
            }
            // Jobs per month for chart (within rangeDays)
            $jobsPerMonth = [];
            $stmt = mysqli_prepare($conn, "SELECT DATE_FORMAT(posted_at, '%Y-%m') AS ym, DATE_FORMAT(posted_at, '%b %Y') AS label, COUNT(*) AS cnt FROM jobs WHERE posted_at >= DATE_SUB(NOW(), INTERVAL ? DAY) GROUP BY ym ORDER BY ym ASC");
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'i', $rangeDays);
                mysqli_stmt_execute($stmt);
                $res = mysqli_stmt_get_result($stmt);
                if ($res) {
                    while ($r = mysqli_fetch_assoc($res)) { $jobsPerMonth[] = $r; }
                    mysqli_free_result($res);
                }
                mysqli_stmt_close($stmt);
            }

            // Top jobs by number of applicants (if table exists)
            $topApplied = [];
            $sql = "SELECT j.id, j.title, COUNT(a.id) AS applicants FROM jobs j LEFT JOIN job_applications a ON a.job_id = j.id GROUP BY j.id ORDER BY applicants DESC LIMIT 5";
            $res = @mysqli_query($conn, $sql);
            if ($res) {
                while ($r = mysqli_fetch_assoc($res)) { $topApplied[] = $r; }
                mysqli_free_result($res);
            }
        }
        ?>
        <section class="stats-grid">
            <div class="stat-card">
                <div class="stat-number"><?php echo htmlspecialchars(number_format($totalJobs)); ?></div>
                <div class="stat-label">Total jobs</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo htmlspecialchars(number_format($activeJobs)); ?></div>
                <div class="stat-label">Active jobs</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo htmlspecialchars(number_format($newClients)); ?></div>
                <div class="stat-label">Active users</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo htmlspecialchars($completionRate); ?>%</div>
                <div class="stat-label">Project Completion</div>
            </div>
        </section>

        <!-- Quick Actions -->
        <div style="margin-bottom: 40px; text-align: center;">
            <a href="post_job.php" class="btn-green" style="margin: 0 10px;"><i class="fas fa-plus"></i> New Project</a>
            <a href="jobs.php" class="btn-green" style="margin: 0 10px;"><i class="fas fa-search"></i> Search Projects</a>
            <a href="#" class="btn-green" id="exportReportBtn" style="margin: 0 10px;"><i class="fas fa-download"></i> Export Projects</a>
        </div>

        <!-- Chart Section -->
        <section class="chart-container">
            <h3 style="color: var(--kld-green); margin-bottom: 20px;">Earnings Overview (New)</h3>
            <div class="d-flex align-items-center justify-content-between mb-2">
                <div>
                    <small class="text-muted">Showing analytics for last</small>
                    <select id="analyticsRange" class="form-select form-select-sm d-inline-block" style="width:auto; margin-left:8px;">
                        <option value="30"<?php echo $rangeDays===30? ' selected' : ''; ?>>30 days</option>
                        <option value="90"<?php echo $rangeDays===90? ' selected' : ''; ?>>90 days</option>
                        <option value="365"<?php echo $rangeDays===365? ' selected' : ''; ?>>365 days</option>
                    </select>
                </div>
            </div>
            <div class="bar-chart" id="jobsBarChart">
                <?php if (!empty($jobsPerMonth)): ?>
                    <?php foreach ($jobsPerMonth as $m): ?>
                        <div class="bar" data-value="<?php echo (int)$m['cnt']; ?>"><div class="bar-label"><?php echo htmlspecialchars($m['label']); ?></div></div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="text-muted">No data for selected range.</div>
                <?php endif; ?>
            </div>
        </section>

        <!-- Analytics: top applied jobs -->
        <section class="chart-container">
            <h3 style="color: var(--kld-green); margin-bottom: 12px;">Top Applied Projects</h3>
            <?php if (!empty($topApplied)): ?>
                <ul class="list-group">
                    <?php foreach ($topApplied as $t): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div><?php echo htmlspecialchars($t['title']); ?></div>
                            <span class="badge bg-primary rounded-pill"><?php echo (int)$t['applicants']; ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <div class="text-muted">No application data available.</div>
            <?php endif; ?>
        </section>

        <!-- Recent Jobs Section -->
        <section>
            <h3 style="color: var(--kld-green); margin-bottom: 20px;">Recent Projects</h3>
            <div class="jobs-grid" id="jobsGrid">
                <?php if (!empty($recentJobs)): ?>
                    <?php foreach ($recentJobs as $job): ?>
                        <div class="job-card" data-title="<?php echo htmlspecialchars($job['title']); ?>" data-desc="<?php echo htmlspecialchars($job['description']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($job['title']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars(mb_strimwidth($job['description'], 0, 160, '...')); ?></p>
                                <div class="card-footer">
                                    <i class="fas fa-clock"></i>
                                    <?php echo isset($job['created_at']) ? date('M j, Y', strtotime($job['created_at'])) : ''; ?>
                                    <?php if (!empty($job['budget'])): ?> | <?php echo htmlspecialchars($job['budget']); ?><?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">No recent projects found.</div>
                <?php endif; ?>
            </div>
        </section>
        <?php if (isset($conn) && $conn): ?>
        <script>
            // small export example: download recent jobs CSV client-side
            document.getElementById('exportReportBtn').addEventListener('click', function (e) {
                e.preventDefault();
                const rows = [];
                <?php foreach ($recentJobs as $rj): ?>
                    rows.push([<?php echo json_encode($rj['id']); ?>, <?php echo json_encode($rj['title']); ?>, <?php echo json_encode(strip_tags($rj['description'])); ?>, <?php echo json_encode($rj['budget']); ?>, <?php echo json_encode($rj['created_at']); ?>]);
                <?php endforeach; ?>
                if (rows.length === 0) { alert('No data to export'); return; }
                let csv = 'ProjectID,Title,Description,Budget,Created\n';
                rows.forEach(r => { csv += r.map(v => '"' + String(v).replace(/"/g, '""') + '"').join(',') + '\n'; });
                const blob = new Blob([csv], {type: 'text/csv'});
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a'); a.href = url; a.download = 'recent_projects.csv'; document.body.appendChild(a); a.click(); a.remove(); URL.revokeObjectURL(url);
            });
            // Analytics range change
            const analyticsRange = document.getElementById('analyticsRange');
            if (analyticsRange) {
                analyticsRange.addEventListener('change', function () {
                    const val = parseInt(this.value, 10) || 90;
                    fetch('api/dashboard_settings.php', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                        body: 'range=' + encodeURIComponent(val)
                    }).then(r => r.json()).then(data => {
                        if (data && data.success) {
                            // reload to fetch new analytics
                            location.reload();
                        }
                    }).catch(() => { alert('Unable to save settings'); });
                });
            }
        </script>
        <?php endif; ?>
    </div>
</body>
</html>
