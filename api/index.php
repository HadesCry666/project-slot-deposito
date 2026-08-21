<?php

// Forward Vercel requests to Laravel public/index.php
// Set critical environment variables for Vercel Serverless environment
putenv('APP_STORAGE=/tmp');
$_ENV['APP_STORAGE'] = '/tmp';

putenv('VIEW_COMPILED_PATH=/tmp/laravel/views');
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/laravel/views';

putenv('LOG_CHANNEL=stderr');
$_ENV['LOG_CHANNEL'] = 'stderr';

putenv('APP_DEBUG=true');
$_ENV['APP_DEBUG'] = 'true';

if (empty($_ENV['APP_KEY']) && empty(getenv('APP_KEY'))) {
    putenv('APP_KEY=base64:3QuUpemEvS5zLdoPeKw/VXSqoNK/aZakhN0XKaTQcwo=');
    $_ENV['APP_KEY'] = 'base64:3QuUpemEvS5zLdoPeKw/VXSqoNK/aZakhN0XKaTQcwo=';
}

// Create required writable directories in /tmp
@mkdir('/tmp/laravel/views', 0755, true);
@mkdir('/tmp/framework/views', 0755, true);
@mkdir('/tmp/framework/sessions', 0755, true);
@mkdir('/tmp/framework/cache', 0755, true);
@mkdir('/tmp/storage/logs', 0755, true);

// Execute Laravel entry point
require __DIR__ . '/../public/index.php';
