<?php

// Forward Vercel requests to Laravel application
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

putenv('SESSION_DRIVER=file');
$_ENV['SESSION_DRIVER'] = 'file';

putenv('CACHE_STORE=file');
$_ENV['CACHE_STORE'] = 'file';

$dbPath = '/tmp/database.sqlite';
putenv('DB_CONNECTION=sqlite');
$_ENV['DB_CONNECTION'] = 'sqlite';

putenv("DB_DATABASE={$dbPath}");
$_ENV['DB_DATABASE'] = $dbPath;

if (empty($_ENV['APP_KEY']) && empty(getenv('APP_KEY'))) {
    $key = 'base64:3QuUpemEvS5zLdoPeKw/VXSqoNK/aZakhN0XKaTQcwo=';
    putenv("APP_KEY={$key}");
    $_ENV['APP_KEY'] = $key;
}

// Create required writable directories in /tmp
@mkdir('/tmp/views', 0755, true);
@mkdir('/tmp/sessions', 0755, true);
@mkdir('/tmp/cache', 0755, true);

$needSeed = !file_exists($dbPath) || @filesize($dbPath) < 100;
if (!file_exists($dbPath)) {
    @touch($dbPath);
}

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';

if ($needSeed) {
    try {
        $kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
        $kernel->call('migrate:fresh', ['--force' => true, '--seed' => true]);
    } catch (\Throwable $e) {
        // Fallback silently if artisan kernel fails on cold start
    }
}

$request = \Illuminate\Http\Request::capture();
$response = $app->handleRequest($request);
$response->send();
