<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SiteContent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // --- Users ---
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User Demo',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // --- Site Contents ---
        $contents = [
            // HERO SECTION
            ['key' => 'hero_title', 'label' => 'Judul Utama Hero', 'value' => 'Slot atau Deposito?', 'type' => 'text', 'section' => 'hero'],
            ['key' => 'hero_subtitle', 'label' => 'Subjudul Hero', 'value' => 'Bandingkan hasil keuangan dari kebiasaan main slot judi online versus menyimpan uang di deposito bank secara obyektif, terukur, dan rasional.', 'type' => 'textarea', 'section' => 'hero'],
            ['key' => 'hero_badge', 'label' => 'Badge Hero', 'value' => 'Edukasi & Literasi Keuangan', 'type' => 'text', 'section' => 'hero'],
            ['key' => 'hero_cta_button', 'label' => 'Teks Tombol CTA Hero', 'value' => 'Buka Simulator', 'type' => 'text', 'section' => 'hero'],

            // SLOT SECTION
            ['key' => 'slot_title', 'label' => 'Judul Panel Slot', 'value' => 'Risiko Tinggi & Hampir Pasti Rugi', 'type' => 'text', 'section' => 'slot'],
            ['key' => 'slot_description', 'label' => 'Deskripsi Panel Slot', 'value' => 'Judi online dirancang dengan algoritma House Edge yang menguntungkan bandar. Kebanyakan pemain mengalami kekalahan total (rungkat).', 'type' => 'textarea', 'section' => 'slot'],
            ['key' => 'slot_fact_1', 'label' => 'Fakta Slot 1', 'value' => 'Algoritma diatur oleh sistem bandar', 'type' => 'text', 'section' => 'slot'],
            ['key' => 'slot_fact_2', 'label' => 'Fakta Slot 2', 'value' => 'Kemenangan awal hanyalah umpan', 'type' => 'text', 'section' => 'slot'],
            ['key' => 'slot_fact_3', 'label' => 'Fakta Slot 3', 'value' => 'Makin lama main, makin habis saldo', 'type' => 'text', 'section' => 'slot'],

            // DEPOSITO SECTION
            ['key' => 'deposit_title', 'label' => 'Judul Panel Deposito', 'value' => 'Pertumbuhan Pasti & Aman', 'type' => 'text', 'section' => 'deposito'],
            ['key' => 'deposit_description', 'label' => 'Deskripsi Panel Deposito', 'value' => 'Deposito bank dijamin oleh LPS (Lembaga Penjamin Simpanan) dengan bunga pasti setiap bulan tanpa risiko kehilangan modal.', 'type' => 'textarea', 'section' => 'deposito'],
            ['key' => 'deposit_advantage_1', 'label' => 'Keunggulan Deposito 1', 'value' => 'Bunga pasti cair tiap bulan', 'type' => 'text', 'section' => 'deposito'],
            ['key' => 'deposit_advantage_2', 'label' => 'Keunggulan Deposito 2', 'value' => 'Modal awal 100% utuh & dijamin', 'type' => 'text', 'section' => 'deposito'],
            ['key' => 'deposit_advantage_3', 'label' => 'Keunggulan Deposito 3', 'value' => 'Bebas dari stress & rungkat', 'type' => 'text', 'section' => 'deposito'],

            // NASIHAT / QUOTES
            ['key' => 'quote_1', 'label' => 'Kutipan Nasihat 1', 'value' => '"Tidak ada orang yang kaya dari judi online, tapi sudah tak terhitung berapa banyak yang hancur karenanya."', 'type' => 'textarea', 'section' => 'nasihat'],
            ['key' => 'quote_1_author', 'label' => 'Penulis Kutipan 1', 'value' => '— Realita Finansial', 'type' => 'text', 'section' => 'nasihat'],
            ['key' => 'quote_2', 'label' => 'Kutipan Nasihat 2', 'value' => '"Uang yang Anda depositkan ke slot hari ini adalah modal masa depan yang Anda buang secara cuma-cuma."', 'type' => 'textarea', 'section' => 'nasihat'],
            ['key' => 'quote_2_author', 'label' => 'Penulis Kutipan 2', 'value' => '— Pengingat Diri', 'type' => 'text', 'section' => 'nasihat'],
            ['key' => 'quote_3', 'label' => 'Kutipan Nasihat 3', 'value' => '"Deposito memberikan ketenangan pikiran. Anda tidur nyenyak, uang Anda tetap bekerja menumbuhkan nilai."', 'type' => 'textarea', 'section' => 'nasihat'],
            ['key' => 'quote_3_author', 'label' => 'Penulis Kutipan 3', 'value' => '— Ketenangan Pikiran', 'type' => 'text', 'section' => 'nasihat'],
            ['key' => 'quote_4', 'label' => 'Kutipan Nasihat 4', 'value' => '"Stop sekarang! Alihkan uang Anda ke tabungan rasional dan bangun masa depan yang lebih baik untuk keluarga."', 'type' => 'textarea', 'section' => 'nasihat'],
            ['key' => 'quote_4_author', 'label' => 'Penulis Kutipan 4', 'value' => '— Seruan Perubahan', 'type' => 'text', 'section' => 'nasihat'],

            // COMPARISON SECTION
            ['key' => 'comparison_title', 'label' => 'Judul Seksi Perbandingan', 'value' => 'Kenapa Deposito Lebih Unggul?', 'type' => 'text', 'section' => 'comparison'],
            ['key' => 'comparison_subtitle', 'label' => 'Subjudul Seksi Perbandingan', 'value' => 'Ringkasan kontras antara keputusan rasional investasi aman vs perjudian spekulatif.', 'type' => 'textarea', 'section' => 'comparison'],
        ];

        foreach ($contents as $item) {
            SiteContent::create($item);
        }
    }
}
