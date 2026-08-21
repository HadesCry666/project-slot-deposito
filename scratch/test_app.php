<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
echo "Class: " . get_class($app) . "\n";
echo "Storage Path: " . $app->storagePath() . "\n";
