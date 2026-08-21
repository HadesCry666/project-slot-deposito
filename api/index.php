<?php

// Forward Vercel requests to Laravel public/index.php
// Set critical environment variables for Vercel Serverless environment
putenv('APP_ENV=production');
$_ENV['APP_ENV'] = 'production';

putenv('APP_DEBUG=false');
$_ENV['APP_DEBUG'] = 'false';

putenv('APP_STORAGE=/tmp');
$_ENV['APP_STORAGE'] = '/tmp';

putenv('VIEW_COMPILED_PATH=/tmp/views');
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/views';

putenv('APP_SERVICES_CACHE=/tmp/services.php');
$_ENV['APP_SERVICES_CACHE'] = '/tmp/services.php';

putenv('APP_PACKAGES_CACHE=/tmp/packages.php');
$_ENV['APP_PACKAGES_CACHE'] = '/tmp/packages.php';

putenv('APP_ROUTES_CACHE=/tmp/routes.php');
$_ENV['APP_ROUTES_CACHE'] = '/tmp/routes.php';

putenv('APP_CONFIG_CACHE=/tmp/config.php');
$_ENV['APP_CONFIG_CACHE'] = '/tmp/config.php';

putenv('APP_EVENTS_CACHE=/tmp/events.php');
$_ENV['APP_EVENTS_CACHE'] = '/tmp/events.php';

putenv('LOG_CHANNEL=stderr');
$_ENV['LOG_CHANNEL'] = 'stderr';

putenv('SESSION_DRIVER=array');
$_ENV['SESSION_DRIVER'] = 'array';

putenv('CACHE_STORE=array');
$_ENV['CACHE_STORE'] = 'array';

putenv('DB_CONNECTION=sqlite');
$_ENV['DB_CONNECTION'] = 'sqlite';

putenv('DB_DATABASE=:memory:');
$_ENV['DB_DATABASE'] = ':memory:';

if (empty($_ENV['APP_KEY']) && empty(getenv('APP_KEY'))) {
    $key = 'base64:3QuUpemEvS5zLdoPeKw/VXSqoNK/aZakhN0XKaTQcwo=';
    putenv("APP_KEY={$key}");
    $_ENV['APP_KEY'] = $key;
}

// Create required writable directories in /tmp
@mkdir('/tmp/views', 0755, true);
@mkdir('/tmp/sessions', 0755, true);
@mkdir('/tmp/cache', 0755, true);

// Execute Laravel entry point
require __DIR__ . '/../public/index.php';
