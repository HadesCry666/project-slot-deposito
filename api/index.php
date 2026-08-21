<?php

// Resolve storage path untuk Vercel serverless environment
// Vercel hanya menyediakan /tmp sebagai writable directory
$_ENV['APP_STORAGE'] = '/tmp';

// Bootstrap Laravel application
require __DIR__ . '/../public/index.php';
