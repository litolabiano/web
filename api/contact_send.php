<?php
require_once __DIR__ . '/smtp_config.php';
// ensure session for CSRF
if (session_status() === PHP_SESSION_NONE) session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method not allowed']);
    exit;
}
// Basic CSRF check
if (empty($_POST['csrf_token']) || empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    http_response_code(403);
    echo json_encode(['success' => false, 'error' => 'Invalid CSRF token']);
    exit;
}
// Input validation
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$recipient = trim($_POST['recipient'] ?? '');
$message = trim($_POST['message'] ?? '');
if ($name === '' || $email === '' || $recipient === '' || $message === '') {
    http_response_code(422);
    echo json_encode(['success' => false, 'error' => 'All fields are required']);
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'error' => 'Invalid email address']);
    exit;
}

// load PHPMailer
require_once __DIR__ . '/PHPMailer-7.0.0/src/Exception.php';
require_once __DIR__ . '/PHPMailer-7.0.0/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer-7.0.0/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUser;
    $mail->Password = $smtpPass;
    if (!empty($smtpSecure) && in_array(strtolower($smtpSecure), ['ssl','tls'])) {
        $mail->SMTPSecure = strtolower($smtpSecure) === 'ssl' ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
    }
    $mail->Port = (int)$smtpPort;
    if (!empty($smtpAllowSelfSigned)) {
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ];
    }

    $from = $smtpFrom ?: $smtpUser;
    $fromName = $smtpFromName ?: 'Website Contact';

    $mail->setFrom($from, $fromName);
    $mail->addReplyTo($email, $name);
    $mail->addAddress($recipient);

    $mail->isHTML(true);
    $mail->Subject = "New message from $name";
    $body = "<h3>New message from website contact form</h3>";
    $body .= "<p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>";
    $body .= "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
    $body .= "<p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>";

    $mail->Body = $body;
    $mail->AltBody = strip_tags(str_replace(['<br>','<br/>'], "\n", $body));

    $mail->send();
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    http_response_code(500);
    error_log('Mail send error: ' . $mail->ErrorInfo);
    echo json_encode(['success' => false, 'error' => 'Unable to send email']);
}
