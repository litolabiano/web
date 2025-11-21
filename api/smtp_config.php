<?php
// SMTP configuration for PHPMailer. Edit these values or set environment variables.
// For Gmail, create an App Password and use it here instead of your main password.

$smtpHost = getenv('SMTP_HOST') ?: 'smtp.gmail.com';
$smtpPort = getenv('SMTP_PORT') ?: 587;
$smtpUser = getenv('SMTP_USER') ?: 'ljlabianao@gmail.com';
$smtpPass = getenv('SMTP_PASS') ?: 'whyv hxru jola ojzh';
$smtpSecure = getenv('SMTP_SECURE') ?: 'tls'; // 'tls' or 'ssl'
$smtpFrom = getenv('SMTP_FROM') ?: $smtpUser;
$smtpFromName = getenv('SMTP_FROM_NAME') ?: 'WorkHop Verification';

// Optionally disable peer verification (not recommended for production)
$smtpAllowSelfSigned = getenv('SMTP_ALLOW_SELF_SIGNED') ?: false;

?>