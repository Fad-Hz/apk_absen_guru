<?= $this->extend('layouts/user') ?>

<?= $this->section('content') ?>

<div class="hero-section">
    <div class="hero-container">
        <h1 class="hero-heading">Sistem Absensi Guru</h1>
        <p class="hero-subheading">Kelola data guru, mata pelajaran, dan kehadiran dengan mudah.</p>
        <div class="hero-buttons">
            <a href="<?= base_url('ijin') ?>" class="hero-button hero-button-default">
                Ajukan Ketidakhadiran
            </a>
            <a href="<?= base_url('scan') ?>" class="hero-button hero-button-primary">
                Absen Kehadiran Hari Ini
            </a>
        </div>
    </div>
</div>

<!-- Tentang Sistem Section -->
<div class="about-section" id="about">
    <div class="about-container">
        <h2 class="section-heading">Tentang Sistem</h2>
        <p class="section-description">
            Sistem Absensi Guru berbasis QR Code adalah solusi modern untuk mempermudah pengelolaan kehadiran guru.
            Dengan fitur unggulan, sistem ini memastikan pencatatan kehadiran yang akurat dan transparan.
        </p>
        <p class="section-description">
            Tidak hanya itu, sistem ini juga dirancang agar mudah digunakan oleh setiap pengguna, baik guru maupun administrator,
            sehingga dapat meningkatkan efisiensi dan akurasi dalam pencatatan data kehadiran.
        </p>
        <div class="about-grid">
            <div class="about-box">
                <h4>Kenapa Memilih Kami?</h4>
                <ul>
                    <li>✅ Efisien: Cepat dengan QR Code</li>
                    <li>🔒 Aman: Data presensi tersimpan dengan baik</li>
                    <li>🌍 Akses Mudah: Bisa dikelola dari mana saja</li>
                    <li>📈 Meningkatkan Akurasi: Data otomatis diperbarui secara real-time</li>
                </ul>
            </div>
            <div class="about-box">
                <h4>Fitur Unggulan</h4>
                <ul>
                    <li>⏳ Presensi Cepat: Absen dalam hitungan detik</li>
                    <li>📊 Laporan Lengkap: Bisa diunduh kapan saja</li>
                    <li>📞 Dukungan 24/7: Bantuan selalu tersedia</li>
                    <li>📅 Pengajuan Ketidakhadiran: Mudah dan Transparan</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Layanan Section -->
<div class="service-section" id="service">
    <div class="service-container">
        <h2 class="section-heading">Layanan Kami</h2>
        <ul class="service-list">
            <li>👨‍🏫 Manajemen Data Guru</li>
            <li>📆 Presensi Masuk & Keluar</li>
            <li>📋 Pengajuan Ketidakhadiran</li>
            <li>📌 Monitoring Penggajian</li>
            <li>📑 Rekapitulasi Kehadiran Otomatis</li>
        </ul>
    </div>
</div>

<style>
    /* Global Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
    }

    /* Hero Section */
    .hero-section {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #004aad, #007cff, #00aaff);
        text-align: center;
        color: #fff;
        padding: 20px;
    }

    .hero-container {
        max-width: 700px;
    }

    .hero-heading {
        font-size: 2.5rem;
        font-weight: bold;
    }

    .hero-subheading {
        font-size: 1.3rem;
        margin: 20px 0;
    }

    .hero-buttons {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .hero-button {
        padding: 12px 24px;
        border-radius: 25px;
        border: none;
        cursor: pointer;
        text-decoration: none;
        color: white;
        font-size: 1rem;
        transition: 0.3s;
    }

    .hero-button-default {
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.5);
    }

    .hero-button-default:hover {
        background: rgba(255, 255, 255, 0.4);
        transform: translateY(-3px);
    }

    .hero-button-primary {
        background: #005eff;
    }

    .hero-button-primary:hover {
        background: #003fc1;
        transform: translateY(-3px);
    }

    /* About Section */
    .about-section {
        padding: 50px 20px;
        background: #f4f4f4;
        text-align: center;
    }

    .about-container {
        max-width: 800px;
        margin: auto;
    }

    .section-heading {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .section-description {
        font-size: 1.2rem;
        margin-bottom: 40px;
    }

    .about-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .about-box {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .about-box h4 {
        margin-bottom: 10px;
        font-size: 1.4rem;
    }

    .about-box ul {
        list-style: none;
        padding: 0;
    }

    .about-box li {
        margin-bottom: 10px;
        font-size: 1rem;
    }

    /* Service Section */
    .service-section {
        padding: 50px 20px;
        background: white;
        text-align: center;
    }

    .service-container {
        max-width: 600px;
        margin: auto;
    }

    .service-list {
        list-style: none;
        font-size: 1.2rem;
    }

    .service-list li {
        margin-bottom: 15px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-heading {
            font-size: 2rem;
        }

        .hero-subheading {
            font-size: 1.1rem;
        }

        .hero-buttons {
            flex-direction: column;
            gap: 10px;
        }

        .about-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<?= $this->endSection() ?>