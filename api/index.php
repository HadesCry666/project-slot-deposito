<?php

// Forward Vercel requests to Laravel public/index.php
define('LARAVEL_START', microtime(true));

// Set writable directories in Vercel serverless environment
$_ENV['APP_STORAGE'] = '/tmp';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/laravel/views';

// Create required storage subdirectories in /tmp if not exist
@mkdir('/tmp/laravel/views', 0755, true);
@mkdir('/tmp/framework/views', 0755, true);
@mkdir('/tmp/framework/sessions', 0755, true);
@mkdir('/tmp/framework/cache', 0755, true);

// Execute Laravel entry point
require __DIR__ . '/../public/index.php';
