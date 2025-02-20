<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/css/uikit.min.css" />
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/js/uikit-icons.min.js"></script>

    <style>
        /* Navbar */
        .uk-navbar-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #004aad, #007cff, #00aaff);
            background-size: 400% 400%;
            animation: gradient-animation 10s ease infinite;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        @keyframes gradient-animation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Responsive Hero Container */
        .hero-container {
            max-width: 90%;
            padding: 20px;
        }

        /* Responsiveness */
        .hero-heading {
            font-size: clamp(2rem, 5vw, 3rem);
        }

        .hero-subheading {
            font-size: clamp(1.2rem, 3vw, 1.5rem);
        }

        /* Buttons */
        .hero-buttons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        /* Offcanvas Menu for Mobile */
        .uk-offcanvas-bar {
            padding: 20px;
        }

        .uk-nav>li>a {
            font-size: 1.2rem;
        }

        /* Content Section */
        .content-container {
            margin-top: 80px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="uk-navbar-container uk-navbar" uk-navbar>
        <div class="uk-container">
            <div class="uk-navbar-right">
                <!-- Navbar for Desktop -->
                <ul class="uk-navbar-nav uk-visible@m">
                    <li><a href="<?= base_url('home'); ?>"><span uk-icon="icon: home"></span> Home</a></li>
                    <li><a href="<?= base_url('history'); ?>"><span uk-icon="icon: clock"></span> History</a></li>
                    <li><a href="<?= base_url('penggajian'); ?>"><span uk-icon="icon: credit-card"></span> Penggajian</a></li>
                    <li><a href="<?= base_url('mapel'); ?>"><span uk-icon="icon: file-text"></span> Mapel Anda</a></li>
                    <li><a href="<?= base_url('logout'); ?>"><span uk-icon="icon: sign-out"></span> Logout</a></li>
                </ul>

                <!-- Mobile Navbar Toggle -->
                <a class="uk-navbar-toggle uk-hidden@m" uk-toggle="target: #mobile-menu" uk-navbar-toggle-icon></a>
            </div>
        </div>
    </nav>

    <!-- Offcanvas Menu for Mobile -->
    <div id="mobile-menu" uk-offcanvas="overlay: true">
        <div class="uk-offcanvas-bar">
            <button class="uk-offcanvas-close" type="button" uk-close></button>
            <ul class="uk-nav uk-nav-default">
                <li><a href="<?= base_url('home'); ?>"><span uk-icon="icon: home"></span> Home</a></li>
                <li><a href="<?= base_url('history'); ?>"><span uk-icon="icon: clock"></span> History</a></li>
                <li><a href="<?= base_url('penggajian'); ?>"><span uk-icon="icon: credit-card"></span> Penggajian</a></li>
                <li><a href="<?= base_url('mapel'); ?>"><span uk-icon="icon: file-text"></span> Mapel Anda</a></li>
                <li><a href="<?= base_url('logout'); ?>"><span uk-icon="icon: sign-out"></span> Logout</a></li>
            </ul>
        </div>
    </div>

    <!-- Content Section -->
    <div class="uk-container content-container">
        <?= $this->renderSection('content'); ?>
    </div>
</body>

</html>