<?php

// Forward Vercel requests to Laravel application
// Set critical environment variables for Vercel Serverless environment
putenv('APP_ENV=production');
$_ENV['APP_ENV'] = 'production';

putenv('APP_DEBUG=true');
$_ENV['APP_DEBUG'] = 'true';

putenv('APP_STORAGE=/tmp');
$_ENV['APP_STORAGE'] = '/tmp';

putenv('VIEW_COMPILED_PATH=/tmp/framework/views');
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/framework/views';

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

// HTTPS and Proxy headers for Vercel
putenv('HTTPS=on');
$_ENV['HTTPS'] = 'on';
$_SERVER['HTTPS'] = 'on';
$_SERVER['HTTP_X_FORWARDED_PROTO'] = 'https';
$_SERVER['VERCEL'] = '1';

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

// Create all required writable storage subdirectories in /tmp
@mkdir('/tmp/framework/views', 0755, true);
@mkdir('/tmp/framework/sessions', 0755, true);
@mkdir('/tmp/framework/cache/data', 0755, true);
@mkdir('/tmp/logs', 0755, true);

// Fast PDO SQLite Auto-Initializer for Serverless Cold Start
try {
    $pdo = new PDO("sqlite:{$dbPath}");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("PRAGMA busy_timeout = 5000;");

    // Create tables if not exist
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            email TEXT NOT NULL UNIQUE,
            email_verified_at DATETIME,
            password TEXT NOT NULL,
            role TEXT DEFAULT 'user',
            remember_token TEXT,
            created_at DATETIME,
            updated_at DATETIME
        );

        CREATE TABLE IF NOT EXISTS site_contents (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            key TEXT NOT NULL UNIQUE,
            label TEXT NOT NULL,
            value TEXT,
            type TEXT DEFAULT 'text',
            section TEXT DEFAULT 'general',
            created_at DATETIME,
            updated_at DATETIME
        );

        CREATE TABLE IF NOT EXISTS sessions (
            id TEXT PRIMARY KEY,
            user_id INTEGER,
            ip_address TEXT,
            user_agent TEXT,
            payload TEXT NOT NULL,
            last_activity INTEGER NOT NULL
        );
    ");

    // Check if seeded
    $stmt = $pdo->query("SELECT COUNT(*) FROM users");
    $userCount = $stmt->fetchColumn();

    if ($userCount == 0) {
        $now = date('Y-m-d H:i:s');
        // Default password hash for 'password' (bcrypt cost 12)
        $hashedPassword = password_hash('password', PASSWORD_BCRYPT);

        $insertUser = $pdo->prepare("INSERT INTO users (name, email, password, role, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)");
        $insertUser->execute(['Administrator', 'admin@example.com', $hashedPassword, 'admin', $now, $now]);
        $insertUser->execute(['User Demo', 'user@example.com', $hashedPassword, 'user', $now, $now]);

        $contents = [
            ['hero_title', 'Judul Utama Hero', 'Slot atau Deposito?', 'text', 'hero'],
            ['hero_subtitle', 'Subjudul Hero', 'Bandingkan hasil keuangan dari kebiasaan main slot judi online versus menyimpan uang di deposito bank secara obyektif, terukur, dan rasional.', 'textarea', 'hero'],
            ['hero_badge', 'Badge Hero', 'Edukasi & Literasi Keuangan', 'text', 'hero'],
            ['hero_cta_button', 'Teks Tombol CTA Hero', 'Buka Simulator', 'text', 'hero'],
            ['slot_title', 'Judul Panel Slot', 'Risiko Tinggi & Hampir Pasti Rugi', 'text', 'slot'],
            ['slot_description', 'Deskripsi Panel Slot', 'Judi online dirancang dengan algoritma House Edge yang menguntungkan bandar. Kebanyakan pemain mengalami kekalahan total (rungkat).', 'textarea', 'slot'],
            ['slot_fact_1', 'Fakta Slot 1', 'Algoritma diatur oleh sistem bandar', 'text', 'slot'],
            ['slot_fact_2', 'Fakta Slot 2', 'Kemenangan awal hanyalah umpan', 'text', 'slot'],
            ['slot_fact_3', 'Fakta Slot 3', 'Makin lama main, makin habis saldo', 'text', 'slot'],
            ['deposit_title', 'Judul Panel Deposito', 'Pertumbuhan Pasti & Aman', 'text', 'deposito'],
            ['deposit_description', 'Deskripsi Panel Deposito', 'Deposito bank dijamin oleh LPS (Lembaga Penjamin Simpanan) dengan bunga pasti setiap bulan tanpa risiko kehilangan modal.', 'textarea', 'deposito'],
            ['deposit_advantage_1', 'Keunggulan Deposito 1', 'Bunga pasti cair tiap bulan', 'text', 'deposito'],
            ['deposit_advantage_2', 'Keunggulan Deposito 2', 'Modal awal 100% utuh & dijamin', 'text', 'deposito'],
            ['deposit_advantage_3', 'Keunggulan Deposito 3', 'Bebas dari stress & rungkat', 'text', 'deposito'],
            ['quote_1', 'Kutipan Nasihat 1', '"Tidak ada orang yang kaya dari judi online, tapi sudah tak terhitung berapa banyak yang hancur karenanya."', 'textarea', 'nasihat'],
            ['quote_1_author', 'Penulis Kutipan 1', '— Realita Finansial', 'text', 'nasihat'],
            ['quote_2', 'Kutipan Nasihat 2', '"Uang yang Anda depositkan ke slot hari ini adalah modal masa depan yang Anda buang secara cuma-cuma."', 'textarea', 'nasihat'],
            ['quote_2_author', 'Penulis Kutipan 2', '— Pengingat Diri', 'text', 'nasihat'],
            ['quote_3', 'Kutipan Nasihat 3', '"Deposito memberikan ketenangan pikiran. Anda tidur nyenyak, uang Anda tetap bekerja menumbuhkan nilai."', 'textarea', 'nasihat'],
            ['quote_3_author', 'Penulis Kutipan 3', '— Ketenangan Pikiran', 'text', 'nasihat'],
            ['quote_4', 'Kutipan Nasihat 4', '"Stop sekarang! Alihkan uang Anda ke tabungan rasional dan bangun masa depan yang lebih baik untuk keluarga."', 'textarea', 'nasihat'],
            ['quote_4_author', 'Penulis Kutipan 4', '— Seruan Perubahan', 'text', 'nasihat'],
            ['comparison_title', 'Judul Seksi Perbandingan', 'Kenapa Deposito Lebih Unggul?', 'text', 'comparison'],
            ['comparison_subtitle', 'Subjudul Seksi Perbandingan', 'Ringkasan kontras antara keputusan rasional investasi aman vs perjudian spekulatif.', 'textarea', 'comparison'],
        ];

        $insertContent = $pdo->prepare("INSERT INTO site_contents (key, label, value, type, section, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?)");
        foreach ($contents as $item) {
            $insertContent->execute([$item[0], $item[1], $item[2], $item[3], $item[4], $now, $now]);
        }
    }

    // Unset all PDO handles to release SQLite database file lock before Laravel boots
    $stmt = null;
    $insertUser = null;
    $insertContent = null;
    $pdo = null;
} catch (\Throwable $e) {
    // Fail-safe PDO initialization
}

// Execute Laravel entry point safely
require __DIR__ . '/../public/index.php';
