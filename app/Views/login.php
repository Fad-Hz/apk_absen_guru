<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/css/uikit.min.css" />
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/js/uikit-icons.min.js"></script>
</head>

<body class="uk-flex uk-flex-middle uk-flex-center uk-height-viewport uk-background-muted">
    <!-- Login Form -->
    <div class="uk-card uk-card-default uk-card-body uk-width-medium">
        <h3 class="uk-card-title uk-text-center">Login</h3>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="uk-alert-danger" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p><span uk-icon="icon: warning"></span> <?= session()->getFlashdata('error') ?></p>
            </div>
        <?php endif; ?>
        <form action="/login" method="POST">
            <!-- Username -->
            <div class="uk-margin">
                <label class="uk-form-label" for="username">Username</label>
                <input class="uk-input" id="username" type="text" name="username" placeholder="Enter your username" required>
            </div>
            <!-- Password -->
            <div class="uk-margin">
                <label class="uk-form-label" for="password">Password</label>
                <input class="uk-input" id="password" type="password" name="password" placeholder="Enter your password" required>
            </div>
            <!-- Submit Button -->
            <div class="uk-margin">
                <button type="submit" class="uk-button uk-button-primary uk-width-1-1">Login</button>
            </div>
        </form>
    </div>
</body>

</html>