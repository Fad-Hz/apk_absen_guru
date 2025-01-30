<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Dashboard'; ?></title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/css/uikit.min.css" />
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/js/uikit-icons.min.js"></script>
    <style>
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
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="uk-navbar-container uk-margin-small uk-padding-horizontal" uk-navbar>
        <div class="uk-navbar-left">
            <a href="#" class="uk-navbar-toggle" uk-toggle="target: #offcanvas-sidebar">
                <span uk-navbar-toggle-icon></span>
                <span class="uk-margin-small-left">Menu</span>
            </a>
        </div>
        <div class="uk-navbar-right">
            <a href="/logout" class="uk-button uk-button-danger uk-button-small">Logout</a>
        </div>
    </nav>


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

    <!-- Main Content -->
    <div class="uk-container uk-margin-large-top">
        <?= $this->renderSection('content'); ?>
    </div>

    <!-- Footer -->
    <footer>
        <div class="uk-container">
            <p>&copy; <?= date('Y') ?> Fadillah Maulana. All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>