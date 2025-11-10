<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New KLD Dashboard</title>
    <!-- Font Awesome for icons (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts for Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
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
    <!-- Sidebar -->
    <nav class="sidebar">
        <ul>
            <li><a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="#"><i class="fas fa-briefcase"></i> Jobs</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Clients</a></li>
            <li><a href="#"><i class="fas fa-chart-bar"></i> Analytics</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Dashboard Header -->
        <header class="dashboard-header">
            <div class="container" style="position: relative; z-index: 2; text-align: center;">
                <h1>Welcome to Your New KLD Dashboard</h1>
                <p>This is a new dashboard page with the same great style.</p>
            </div>
        </header>

        <!-- Stats Section -->
        <section class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">$7,890</div>
                <div class="stat-label">Total Earnings</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">15</div>
                <div class="stat-label">Active Jobs</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">10</div>
                <div class="stat-label">New Clients</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">98%</div>
                <div class="stat-label">Completion Rate</div>
            </div>
        </section>

        <!-- Quick Actions -->
        <div style="margin-bottom: 40px; text-align: center;">
            <a href="#" class="btn-green" style="margin: 0 10px;"><i class="fas fa-plus"></i> New Job</a>
            <a href="#" class="btn-green" style="margin: 0 10px;"><i class="fas fa-search"></i> Search Clients</a>
            <a href="#" class="btn-green" style="margin: 0 10px;"><i class="fas fa-download"></i> Export Report</a>
        </div>

        <!-- Chart Section -->
        <section class="chart-container">
            <h3 style="color: var(--kld-green); margin-bottom: 20px;">Earnings Overview (New)</h3>
            <div class="bar-chart">
                <div class="bar">
                    <div class="bar-label">May</div>
                </div>
                <div class="bar">
                    <div class="bar-label">June</div>
                </div>
                <div class="bar">
                    <div class="bar-label">July</div>
                </div>
                <div class="bar">
                    <div class="bar-label">August</div>
                </div>
            </div>
        </section>

        <!-- Recent Jobs Section -->
        <section>
            <h3 style="color: var(--kld-green); margin-bottom: 20px;">New Opportunities</h3>
            <div class="jobs-grid">
                <div class="job-card">
                    <div class="card-body">
                        <h5 class="card-title">Mobile App UI/UX</h5>
                        <p class="card-text">Design a modern and intuitive user interface for a new mobile application.</p>
                        <div class="card-footer">
                            <i class="fas fa-clock"></i> Due in 5 days | $2,500
                        </div>
                    </div>
                </div>
                <div class="job-card">
                    <div class="card-body">
                        <h5 class="card-title">Database Optimization</h5>
                        <p class="card-text">Review and optimize a large-scale database for performance and scalability.</p>
                        <div class="card-footer">
                            <i class="fas fa-clock"></i> Due in 2 weeks | $3,000
                        </div>
                    </div>
                </div>
                <div class="job-card">
                    <div class="card-body">
                        <h5 class="card-title">SEO Content Writing</h5>
                        <p class="card-text">Create high-quality, SEO-friendly content for a company blog.</p>
                        <div class="card-footer">
                            <i class="fas fa-clock"></i> Ongoing | $500/month
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
