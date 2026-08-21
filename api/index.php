<?php

try {
    // 1. Set environment variables for Vercel Serverless environment
    putenv('APP_ENV=production');
    $_ENV['APP_ENV'] = 'production';

    putenv('APP_DEBUG=true');
    $_ENV['APP_DEBUG'] = 'true';

    putenv('APP_STORAGE=/tmp');
    $_ENV['APP_STORAGE'] = '/tmp';

    putenv('VIEW_COMPILED_PATH=/tmp/views');
    $_ENV['VIEW_COMPILED_PATH'] = '/tmp/views';

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

    // 2. Create required directories in /tmp
    @mkdir('/tmp/views', 0755, true);
    @mkdir('/tmp/sessions', 0755, true);
    @mkdir('/tmp/cache', 0755, true);

    // 3. Execute Laravel entry point
    require __DIR__ . '/../public/index.php';

} catch (\Throwable $e) {
    http_response_code(200);
    header('Content-Type: text/html; charset=utf-8');
    echo '<h1>Laravel Deployment Diagnostic</h1>';
    echo '<p><b>Error:</b> ' . htmlspecialchars($e->getMessage()) . '</p>';
    echo '<p><b>File:</b> ' . htmlspecialchars($e->getFile()) . ' on line ' . $e->getLine() . '</p>';
    echo '<pre>' . htmlspecialchars($e->getTraceAsString()) . '</pre>';
}
