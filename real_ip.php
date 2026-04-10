<?php

$logFile = 'ip_logs.txt';  // File log akan dibuat otomatis

// Ambil semua info yang berguna
$time       = date('Y-m-d H:i:s');
$ip         = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$realIP     = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CF_CONNECTING_IP'] ?? $ip;
$userAgent  = $_SERVER['HTTP_USER_AGENT'] ?? 'none';
$method     = $_SERVER['REQUEST_METHOD'] ?? 'none';
$uri        = $_SERVER['REQUEST_URI'] ?? 'none';
$host       = $_SERVER['HTTP_HOST'] ?? 'none';
$referer    = $_SERVER['HTTP_REFERER'] ?? 'none';

// Buat log lengkap
$log = "================================================================\n";
$log .= "Waktu     : $time\n";
$log .= "IP Asli   : $realIP\n";
$log .= "IP Server : $ip\n";
$log .= "Method    : $method\n";
$log .= "URI       : $uri\n";
$log .= "Host      : $host\n";
$log .= "User-Agent: $userAgent\n";
$log .= "Referer   : $referer\n";
$log .= "================================================================\n\n";

file_put_contents($logFile, $log, FILE_APPEND);

// Tampilkan response sederhana
header('Content-Type: text/plain');
echo "OK - IP berhasil dicatat: $realIP\n";
echo "Waktu: $time\n";
?>
