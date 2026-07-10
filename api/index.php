<?php

// Paksa folder cache dan view Laravel pindah ke folder temporary Vercel
$appEnv = __DIR__ . '/../storage/framework';
if (!is_dir('/tmp/storage/framework/views')) {
    mkdir('/tmp/storage/framework/views', 0755, true);
    mkdir('/tmp/storage/framework/cache', 0755, true);
    mkdir('/tmp/storage/framework/sessions', 0755, true);
}

// Jalankan aplikasi Laravel bawaan
require __DIR__ . '/../public/index.php';
