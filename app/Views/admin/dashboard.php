<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/css/uikit.min.css" />
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/js/uikit-icons.min.js"></script>
    <style>
        /* Custom Styles for Elegance */
        .hero-section {
            height: 100vh;
            background: linear-gradient(135deg, #1e3a8a, #1e87f0);
            color: white;
            box-shadow: inset 0 0 50px rgba(0, 0, 0, 0.5);
        }

        .hero-title {
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .hero-buttons a {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .uk-navbar-container {
            background-color: #1e3a8a;
            color: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .uk-navbar-container .uk-logo {
            color: white;
        }

        footer {
            background-color: #1e3a8a;
            color: white;
            padding: 20px 0;
        }

        .uk-card {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .uk-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="uk-navbar-container" uk-navbar>
        <div class="uk-navbar-left">
            <a href="#" class="uk-navbar-toggle" uk-toggle="target: #offcanvas-sidebar">
                <span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span>
            </a>
        </div>
        <div class="uk-navbar-right">
            <a href="/logout" class="uk-button uk-button-danger uk-button-small">Logout</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section uk-flex uk-flex-middle uk-flex-center uk-text-center">
        <div>
            <h1 class="uk-heading-medium hero-title">Selamat Datang di Admin Dashboard</h1>
            <p class="uk-text-lead">Kelola data dan pantau aktivitas dengan mudah dan efisien.</p>
            <div class="hero-buttons uk-margin">
                <a href="#dashboard" class="uk-button uk-button-default uk-button-large uk-margin-small-right">Lihat Dashboard</a>
                <a href="#learn-more" class="uk-button uk-button-secondary uk-button-large">Pelajari Fitur</a>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div id="offcanvas-sidebar" uk-offcanvas="overlay: true">
        <div class="uk-offcanvas-bar">
            <h3>Menu Navigasi</h3>
            <ul class="uk-nav uk-nav-default">
                <li><a href="/admin/datascan"><span uk-icon="icon: qrcode"></span> Data Scan QR</a></li>
                <li><a href="/admin/dataguru"><span uk-icon="icon: users"></span> Semua Data Guru</a></li>
                <li><a href="/admin/datamapel"><span uk-icon="icon: file-text"></span> Data Mata Pelajaran</a></li>
                <li class="uk-nav-divider"></li>
                <li><a href="/admin/dataalpa"><span uk-icon="icon: ban"></span> Guru Alpa Hari Ini</a></li>
                <li><a href="/admin/dataijin"><span uk-icon="icon: sign-out"></span> Guru Ijin Hari Ini</a></li>
                <li><a href="/admin/datakehadiran"><span uk-icon="icon: check"></span> Guru Yang Hadir Hari Ini</a></li>
            </ul>
        </div>
    </div>

    <!-- Dashboard Section -->
    <div id="dashboard" class="uk-section uk-section-default">
        <div class="uk-container">
            <h2 class="uk-heading-line uk-text-center"><span>Dashboard Admin</span></h2>
            <div class="uk-grid-small uk-child-width-1-3@m uk-grid-match" uk-grid>
                <!-- Card 1 -->
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-text-center">
                        <span uk-icon="icon: qrcode; ratio: 2"></span>
                        <h3 class="uk-card-title">Data Scan QR</h3>
                        <p>Kelola data scan QR harian di sini.</p>
                        <a href="/admin/datascan" class="uk-button uk-button-primary">Lihat Data</a>
                    </div>
                </div>
                <!-- Card 2 -->
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-text-center">
                        <span uk-icon="icon: users; ratio: 2"></span>
                        <h3 class="uk-card-title">Data Guru</h3>
                        <p>Lihat dan kelola semua data guru.</p>
                        <a href="/admin/dataguru" class="uk-button uk-button-primary">Lihat Data</a>
                    </div>
                </div>
                <!-- Card 3 -->
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-text-center">
                        <span uk-icon="icon: file-text; ratio: 2"></span>
                        <h3 class="uk-card-title">Data Mata Pelajaran</h3>
                        <p>Kelola data mata pelajaran dengan mudah.</p>
                        <a href="/admin/datamapel" class="uk-button uk-button-primary">Lihat Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Learn More Section -->
    <div id="learn-more" class="uk-section uk-section-muted">
        <div class="uk-container uk-text-center">
            <h2 class="uk-heading-line"><span>Pelajari Lebih Lanjut</span></h2>
            <p class="uk-text-lead">Platform ini dirancang untuk memberikan kemudahan dalam mengelola data dan memantau aktivitas secara efisien.</p>
            <div class="uk-grid-small uk-child-width-1-3@m uk-grid-match uk-margin-top" uk-grid>
                <!-- Feature 1 -->
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-text-center">
                        <span uk-icon="icon: check; ratio: 2"></span>
                        <h3 class="uk-card-title">Kemudahan</h3>
                        <p>Antarmuka yang sederhana dan mudah digunakan oleh semua pengguna.</p>
                    </div>
                </div>
                <!-- Feature 2 -->
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-text-center">
                        <span uk-icon="icon: lock; ratio: 2"></span>
                        <h3 class="uk-card-title">Keamanan</h3>
                        <p>Data Anda terlindungi dengan sistem keamanan terbaik.</p>
                    </div>
                </div>
                <!-- Feature 3 -->
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-text-center">
                        <span uk-icon="icon: bolt; ratio: 2"></span>
                        <h3 class="uk-card-title">Efisiensi</h3>
                        <p>Kelola data dengan cepat dan tanpa hambatan.</p>
                    </div>
                </div>
            </div>
            <!-- Scroll to Top Button -->
            <button id="scroll-to-top" class="uk-button uk-button-primary uk-border-rounded" style="position: fixed; bottom: 20px; right: 20px; display: none;">
                <span uk-icon="icon: arrow-up"></span>
            </button>
        </div>
    </div>


    <!-- Footer -->
    <footer>
        <div class="uk-container">
            <p>&copy; <?= date('Y') ?> Fadillah Maulana. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Scroll to Top Script -->
    <script>
        // Show/Hide Scroll to Top Button
        const scrollToTopButton = document.getElementById('scroll-to-top');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 200) {
                scrollToTopButton.style.display = 'block';
            } else {
                scrollToTopButton.style.display = 'none';
            }
        });

        // Smooth Scroll to Top
        scrollToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>

</body>

</html>