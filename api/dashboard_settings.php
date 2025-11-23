<?php
require_once __DIR__ . '/../db_connect.php';
require_once __DIR__ . '/../include/session.php';
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}
$range = isset($_POST['range']) ? (int)$_POST['range'] : 90;
if ($range <= 0) $range = 90;
// save to session
$_SESSION['dashboard_range'] = $range;
echo json_encode(['success' => true, 'range' => $range]);
