<?= $this->extend('layouts/user') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<div class="hero-section">
    <div class="hero-container">
        <h1 class="hero-heading">Sistem Absensi Guru</h1>
        <p class="hero-subheading">Kelola data guru, mata pelajaran, dan kehadiran dengan mudah.</p>
        <div class="hero-buttons">
            <a href="/ijin" class="hero-button hero-button-default">
                <span uk-icon="icon: calendar"></span> Ajukan Ketidakhadiran
            </a>
            <a href="/scan" class="hero-button hero-button-primary">
                <span uk-icon="icon: check"></span> Absen Kehadiran Hari Ini
            </a>
        </div>
    </div>
</div>

<style>
    /* Fullscreen Hero Section */
    .hero-section {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #004aad, #007cff, #00aaff);
        background-size: 400% 400%;
        animation: gradient-animation 15s ease infinite;
        color: #fff;
        text-align: center;
        position: relative;
        overflow: hidden;
    }


    /* Hero Content Styling */
    .hero-container {
        max-width: 700px;
        padding: 20px;
    }

    .hero-heading {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .hero-subheading {
        font-size: 1.5rem;
        margin-bottom: 40px;
        font-weight: 300;
    }

    /* Buttons Styling */
    .hero-buttons {
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .hero-button {
        font-size: 1.2rem;
        padding: 15px 30px;
        border-radius: 50px;
        border: none;
        cursor: pointer;
        text-decoration: none;
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    /* Default Button */
    .hero-button-default {
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.5);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .hero-button-default:hover {
        background: rgba(255, 255, 255, 0.4);
        border-color: #fff;
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    /* Primary Button */
    .hero-button-primary {
        background: #005eff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }

    .hero-button-primary:hover {
        background: #003fc1;
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
    }
</style>


<!-- Tentang Sistem Section -->
<div class="uk-section uk-section-muted uk-flex uk-flex-middle" id="about" style="min-height: 100vh; padding: 50px; display: flex; justify-content: center; align-items: center;">
    <div class="uk-container">
        <!-- Heading -->
        <h2 class="uk-heading-line uk-text-bold uk-text-center uk-margin-large-bottom"><span>Tentang Sistem</span></h2>
        <p class="uk-text-lead uk-text-center">
            Sistem Absensi Guru berbasis QR Code adalah solusi modern yang dirancang untuk mempermudah pengelolaan data guru, mata pelajaran, dan kehadiran.
            Dengan berbagai fitur unggulan, sistem ini memberikan kemudahan dalam pencatatan kehadiran serta memastikan data yang akurat.
        </p>

        <!-- Grid: Kenapa Memilih Kami & Fitur Unggulan -->
        <div class="uk-grid-large uk-child-width-1-2@m uk-margin-large-top" uk-grid>
            <!-- Kenapa Memilih Kami -->
            <div>
                <h4 class="uk-text-bold uk-text-center">Kenapa Memilih Kami?</h4>
                <ul class="uk-list uk-list-large uk-margin-medium-top">
                    <li>
                        <span uk-icon="icon: check; ratio: 1.5" class="uk-margin-small-right"></span>
                        <strong>Efisien</strong>: Sistem presensi berbasis QR mempercepat proses pencatatan kehadiran.
                    </li>
                    <li>
                        <span uk-icon="icon: database; ratio: 1.5" class="uk-margin-small-right"></span>
                        <strong>Terlindungi</strong>: Data guru dan presensi tersimpan dengan aman.
                    </li>
                    <li>
                        <span uk-icon="icon: bell; ratio: 1.5" class="uk-margin-small-right"></span>
                        <strong>Real-Time</strong>: Dapatkan pemberitahuan kehadiran atau izin secara instan.
                    </li>
                    <li>
                        <span uk-icon="icon: cloud; ratio: 1.5" class="uk-margin-small-right"></span>
                        <strong>Akses Mudah</strong>: Kelola data kapan saja dan dari mana saja.
                    </li>
                    <li>
                        <span uk-icon="icon: users; ratio: 1.5" class="uk-margin-small-right"></span>
                        <strong>Kolaborasi</strong>: Dukung pengelolaan tim dengan fitur manajemen data.
                    </li>
                </ul>
            </div>

            <!-- Fitur Unggulan -->
            <div>
                <h4 class="uk-text-bold uk-text-center">Fitur Unggulan</h4>
                <ul class="uk-list uk-list-large uk-margin-medium-top">
                    <li>
                        <span uk-icon="icon: clock; ratio: 1.5" class="uk-margin-small-right"></span>
                        <strong>Presensi Cepat</strong>: Rekam kehadiran hanya dalam hitungan detik dengan QR Code.
                    </li>
                    <li>
                        <span uk-icon="icon: file-text; ratio: 1.5" class="uk-margin-small-right"></span>
                        <strong>Laporan Lengkap</strong>: Lihat dan unduh laporan presensi dengan mudah.
                    </li>
                    <li>
                        <span uk-icon="icon: calendar; ratio: 1.5" class="uk-margin-small-right"></span>
                        <strong>Ketidakhadiran</strong>: Ajukan izin dan kelola ketidakhadiran dengan transparan.
                    </li>
                    <li>
                        <span uk-icon="icon: shield; ratio: 1.5" class="uk-margin-small-right"></span>
                        <strong>Keamanan Tinggi</strong>: Data tersimpan dengan enkripsi yang aman.
                    </li>
                    <li>
                        <span uk-icon="icon: heart; ratio: 1.5" class="uk-margin-small-right"></span>
                        <strong>Dukungan Pelanggan</strong>: Tim kami siap membantu Anda kapan saja.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



<!-- Services Section -->
<div class="uk-section uk-section-default uk-flex uk-flex-middle" id="service" style="min-height: 100vh;">
    <div class="uk-container">
        <h2 class="uk-heading-line uk-text-center"><span>Layanan Kami</span></h2>
        <ul class="uk-list uk-list-divider uk-margin-large-top">
            <li>
                <span uk-icon="icon: users; ratio: 1.5"></span>
                <strong>Manajemen Data Guru</strong>: Kelola informasi guru dan mata pelajaran dengan mudah.
            </li>
            <li>
                <span uk-icon="icon: calendar; ratio: 1.5"></span>
                <strong>Presensi Masuk & Keluar</strong>: Rekam kehadiran secara otomatis dan akurat.
            </li>
            <li>
                <span uk-icon="icon: file-text; ratio: 1.5"></span>
                <strong>Pengajuan Ketidakhadiran</strong>: Ajukan izin dengan proses yang cepat dan transparan.
            </li>
            <li>
                <span uk-icon="icon: bell; ratio: 1.5"></span>
                <strong>Notifikasi Real-Time</strong>: Dapatkan pemberitahuan langsung tentang absensi dan izin.
            </li>
        </ul>
    </div>
</div>

<?= $this->endSection() ?>