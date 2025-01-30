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
</head>

<body>
    <!-- Navbar -->
    <nav class="uk-navbar-container uk-navbar" uk-navbar style="position: fixed; width: 100%; top: 0; z-index: 1000;">
        <div class="uk-container">
            <div class="uk-navbar-right">
                <!-- Navbar for Desktop -->
                <ul class="uk-navbar-nav uk-visible@m">
                    <li><a href="/home"><span uk-icon="icon: home"></span> Home</a></li>
                    <li><a href="/home#about"><span uk-icon="icon: info"></span> About</a></li>
                    <li><a href="/home#service"><span uk-icon="icon: settings"></span> Service</a></li>
                    <li>
                        <a href="/logout" onclick="logout()"><span uk-icon="icon: sign-out"></span> Logout</a>
                    </li>
                </ul>

                <!-- Dropdown Menu for Mobile -->
                <div class="uk-hidden@m">
                    <a class="uk-navbar-toggle" href="#" uk-toggle="target: #mobile-menu" uk-navbar-toggle-icon></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Dropdown Menu -->
    <div id="mobile-menu" hidden>
        <ul class="uk-nav uk-nav-default uk-background-default uk-padding-small uk-box-shadow-small">
            <li><a href="/home"><span uk-icon="icon: home"></span> Home</a></li>
            <li><a href="/home#about"><span uk-icon="icon: info"></span> About</a></li>
            <li><a href="/home#service"><span uk-icon="icon: settings"></span> Service</a></li>
        </ul>
    </div>

    <!-- Content Section -->
    <div class="uk-container uk-margin-large-top" style="margin-top: 70px;">
        <?= $this->renderSection('content'); ?>
    </div>

</html>